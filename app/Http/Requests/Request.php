<?php
/**
 * Created by PhpStorm.
 * User: nomantufail
 * Date: 11/16/2016
 * Time: 10:50 AM
 */

namespace Requests;


use Libs\Auth\Auth;
use Models\User;
use Models\UserLogin;
use Traits\RequestHelper;

abstract class Request
{
    use RequestHelper;

    /**
     * This variable defines weather a request should be authenticated or not.
     * */

    /** @var User $user */
    public $user = null;
    /** @var UserLogin $userlogin */
    public $userLogin = null;
    public $authenticatable = true;
    protected $autoTransform = false;
    public $antiAuth = false;
    public $type = 'web';

    public abstract function authorize();
    public abstract function rules();

    public function __construct()
    {
        $this->user = $this->user();
        $this->userLogin = $this->userLogin();
        $this->type = $this->getRequestType();
    }

    // public function getRequestType(){
    //     $routeParts = explode('/', request()->route()->getPrefix());
    //     if(isset($routeParts[0]) && $routeParts[0] == 'api')
    //         return 'api';

    //     return 'web';
    // }

    public function transform()
    {
        return [];
    }
    private function transformAutomatically()
    {
        $transformedValues = [];
        collect($this->originalRequest()->all())->each(function($value, $key) use(&$transformedValues){
            $transformedValues[lcFirst(str_replace(' ','', ucwords(join(' ', explode('_',$key)))))] = $value;
        })->toArray();
        return $transformedValues;
    }
    public function originalRequest()
    {
        return request();
    }

    /**
     * @return array
     */
    public function all(){
        $inputs = $this->autoTransform ? $this->transformAutomatically() : $this->originalRequest()->all();
        foreach($this->transform() as $key=>$value){
            $inputs[$key] = $value;
        }
        return $inputs;
    }

    public function get($key){
        return (!isset($this->all()[$key]))?$this->originalRequest()->get($key):$this->all()[$key];
    }

    public function input($key){
        return (!isset($this->all()[$key]))?$this->originalRequest()->input($key):$this->all()[$key];
    }

    public function file($key){
        return $this->originalRequest()->file($key);
    }

    /**
     * @return User $user
     * */
    public function user()
    {
        return Auth::user();
    }

    /**
     * @return UserLogin $user
     * */
    public function userLogin()
    {
        return Auth::userLogin();
    }

    public function messages()
    {
        return [];
    }


}