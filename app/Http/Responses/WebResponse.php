<?php
/**
 * Created by PhpStorm.
 * User: waqas
 * Date: 3/16/2016
 * Time: 1:46 PM
 */

namespace Responses;

use Libs\RouteHelper;

class WebResponse extends Response implements ResponseInterface
{
    private $view = 'defaultView';
    private $DEFAULT_VIEW = 'defaultView';
    private $redirectTo = '';
    public function __construct(){}

    /**
     * @param array $response
     * @param array $headers
     * @return mixed
     */
    public function respond(array $response = [], array $headers = []){
        $http_status = $this->getHttpStatus();
        $response['status'] = ($http_status == 200)?1:0;
        $response['message'] = (isset($data['message']))?$data['message']:config('constants.SUCCESS_MESSAGE');
        return view($this->getView())->with('response',$response);
    }

    /**
     * @return mixed
     */
    public function respondWithErrors(){
        \Session::flash('errors',$this->getErrorMessages());
        return $this->redirect()->withInput();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function respondWithValidationErrors()
    {
        \Session::flash('validationErrors',$this->getErrorMessages());
        return $this->redirect()->withInput();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectBack()
    {
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        return $this->getRedirectTo() == '' ? $this->intendedRedirect() : redirect($this->getRedirectTo());
    }

    public function intendedRedirect(){
        switch ($this->getHttpStatus()){
            case self::AUTHENTICATION_FAILED:
                return RouteHelper::gotoLoginPage();
                break;
            default:
                return $this->redirectBack();
        }
    }

    /**
     * @param $appName
     * @param $version
     * @param array $data
     * @return $this
     */
    public function app($appName, $version, $data = ['data'=>''])
    {
        if(!isset($data['version']))
            $data['version'] = $version;

        $appPath = 'apps.'.$appName.'.'.$version.'.app';
        return $this->setView($appPath)->respond($data);
    }

    /**
     * @param $viewName
     * @return $this
     */
    public function setView($viewName)
    {
        $this->view = ($viewName == '')?$this->DEFAULT_VIEW:$viewName;
        return $this;
    }

    /**
     * @return string
     */
    public function getView()
    {
        return $this->view;
    }


    /**
     * @return string
     */
    public function getRedirectTo()
    {
        return $this->redirectTo;
    }

    /**
     * @param string $redirectTo
     * @return $this
     */
    public function setRedirectTo($redirectTo)
    {
        $this->redirectTo = $redirectTo;
        return $this;
    }


    /**
     * @param array $messages
     * @return mixed
     */
    public function respondInternalServerError($messages = ["Something went wrong with the server!"])
    {
        return $this->setHttpStatus(500)
            ->setCustomStatus(505)
            ->setErrorMessages($messages)
            ->setRedirectTo('/snap')
            ->respondWithErrors();
    }

    /**
     * @param array $messages
     * @return mixed
     */
    public function respondNotFound($messages = ["record not found"])
    {
        return $this->setHttpStatus(404)
            ->setCustomStatus(404)
            ->setErrorMessages($messages)
            ->setRedirectTo('/page-not-found')
            ->respondWithErrors();
    }

}