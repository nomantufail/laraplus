<?php

namespace App\Http\Controllers;


use Libs\Auth\Auth;
use Libs\RouteHelper;
use ModelMappers\UserMapper;
use Models\User;
use RepoFactories\UsersRepoFactory;

class InstitutesController extends ParentController
{
    public $usersRepo = null;
    public function __construct()
    {
        parent::__construct();
        $this->usersRepo = (new UsersRepoFactory())->getRepo();
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
     * @param \Requests\RegisterInstituteRequest $request
     * @return mixed
     * Description: Register an institute
     */
    public function register(\Requests\RegisterInstituteRequest $request)
    {
        try
        {
            $agentId = 1; //todo: create an agent first
            $newUser = $this->usersRepo->create(new User('', $request->get('username'), bcrypt($request->get('password')), $agentId));
            Auth::login($newUser);
            return RouteHelper::goToHomePage();
        }catch (\Exception $e){
            return $this->response->respondInternalServerError($e->getMessage());
        }
    }
//DummyNewRequestMethod
}
