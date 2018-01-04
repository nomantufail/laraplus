<?php

namespace App\Http\Middleware;

use Libs\Auth\Auth;
use Illuminate\Support\Facades\Validator;
use Libs\RouteHelper;
use Requests\Institute\GetCreateInstituteRequest;
use Requests\Request;
use Closure;
use Responses\ResponseFactory;

class RequestHandler
{
    private $response;
    private $validationMessages = [];
    public function __construct()
    {
        $this->response = ResponseFactory::getInstance();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $customRequest = "")
    {
        $requestClass = "Requests\\".$customRequest;
        /** @var Request $customRequest */
        $customRequest = new $requestClass();

        if($customRequest->antiAuth && $customRequest->user){
            return RouteHelper::goToHomePage();
        }

        if($customRequest->authenticatable){
            if($customRequest->isApi()){
                if(isset(getallheaders()['Authorization']) && getallheaders()['Authorization'] != ""){
                    if(!Auth::authenticateWithToken(getallheaders()['Authorization']))
                        return $this->response->respondAuthenticationFailed();
                }else{
                    return $this->response->respondAuthenticationFailed();
                }
            }else{
                if(!$customRequest->user){
                    return $this->response->respondAuthenticationFailed();
                }
            }
        }
        if(!$customRequest->authorize())
            return $this->response->respondOwnershipConstraintViolation();
        if(!$this->validate($customRequest))
            return $this->response->respondValidationFails($this->validationMessages);

        return $next($request);
    }

    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
        if($validator->fails()){
            $this->validationMessages = $validator->errors();
            return false;
        }
        return true;
    }
}
