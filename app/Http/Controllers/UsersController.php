<?php

namespace App\Http\Controllers;

use Libs\Helper;
use Libs\Auth\Auth;
use Libs\RouteHelper;
use Models\User;

class UsersController extends ParentController
{
    /**
    * @var UsersRepository
    */
    public $usersRepo = null;
    public function __construct()
    {
        parent::__construct();
        $this->usersRepo = (new \RepoFactories\UsersRepoFactory())->getRepo();
    }


    /**
     * @param \Requests\RegisterFormRequest $request
     * @return mixed
     * Description: 
     */
    public function registerForm(\Requests\RegisterFormRequest $request)
    {
        try
        {
            return $this->response->setView('auth.register')->respond([
                'data'=>[]
            ]);
        }catch (\Exception $e){
            return $this->response->respondInternalServerError($e->getMessage());
        }
    }


    /**
     * @param \Requests\RegisterUserRequest $request
     * @return mixed
     * Description: Register an institute
     */
    public function register(\Requests\RegisterUserRequest $request)
    {
        try
        {
            $newUser = $this->usersRepo->create(new User('', $request->get('username'), bcrypt($request->get('password'))));
            Auth::login($newUser);
            return RouteHelper::goToHomePage();
        }catch (\Exception $e){
            return $this->response->respondInternalServerError($e->getMessage());
        }
    }

    
//DummyNewRequestMethod
}
