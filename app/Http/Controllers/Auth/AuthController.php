<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\ValidationErrorException;
use App\Http\Controllers\ParentController;
use Libs\Auth\Auth;
use Libs\RouteHelper;
use Models\User;
use RepoFactories\UsersRepoFactory;
use Repositories\UsersRepository;

class AuthController extends ParentController
{

    public $usersRep = null;


    /**
     * @var $auth Auth
     */
    public $auth = null;
    public function __construct(UsersRepoFactory $usersRepository)
    {
        parent::__construct();
        $this->usersRep = $usersRepository->getRepo();
        $this->auth = new Auth();
    }

    public function getLoginForm(\Requests\LoginFormRequest $request)
    {
        try
        {
            return $this->response->setView('auth.login')->respond([
                'data'=>[]
            ]);
        }catch (\Exception $e){
            return $this->response->respondInternalServerError($e->getMessage());
        }
    }


    /**
     * @param \Requests\LoginRequest $request
     * @return mixed
     * Description: responsible for the login procedure
     */
    public function login(\Requests\LoginRequest $request)
    {
        try
        {
            if($this->loginCore($request->get('username'), $request->get('password'))){
                return RouteHelper::goToHomePage();
            }else{
                return $this->response->respondInvalidCredentials();
            }
        }catch (\Exception $e){
            return $this->response->respondInternalServerError($e->getMessage());
        }
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    private function loginCore($username, $password){
        if(($this->auth->attempt(['username'=>$username, 'password'=>$password] , 'username'))){
            Auth::login($this->usersRep->findByUsername($username));
            return true;
        }
        return false;
    }


    /**
     * @param \Requests\LogoutRequest $request
     * @return mixed
     * Description: 
     */
    public function logout(\Requests\LogoutRequest $request)
    {
        try
        {
            Auth::logout($request->user);
            return RouteHelper::goToExitPage();
        }catch (\Exception $e){
            return $this->response->respondInternalServerError($e->getMessage());
        }
    }
//DummyNewRequestMethod
}