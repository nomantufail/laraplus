<?php
/**
 * Created by PhpStorm.
 * User: waqas
 * Date: 3/17/2016
 * Time: 12:08 PM
 */

namespace Libs\Auth;

use Illuminate\Support\Facades\Session;
use Libs\Helper;
use ModelMappers\UserMapper;
use Models\Model;
use Models\UserLogin;
use RepoFactories\UsersRepoFactory;
use Repositories\UsersRepository;
use Models\User;
use Illuminate\Support\Facades\Hash;
use Traits\RequestHelper;

class Auth
{
    use RequestHelper;

    /**
     * @param array $credentials
     * @param $attemptBy
     * @return bool
     */
    public static function attempt(array $credentials, $attemptBy='email')
    {
            $user = (new UsersRepoFactory())->getRepo()->findByUsername($credentials[$attemptBy]);
            return ($user != null && Hash::check($credentials['password'], $user->getPassword()));
    }

    /**
     * @param User $authenticatedUser
     * @return User
     */
    public static function login(User $authenticatedUser){
        $userLogin = (new UsersRepoFactory())->getRepo()->createSessionToken($authenticatedUser->getId(), bcrypt($authenticatedUser->getId()));
        if(self::isWeb()){
            session([
                'user'=> json_encode($authenticatedUser->toJson()),
                'user_login' => json_encode($userLogin->toJson())
            ]);
        }
        return $authenticatedUser;
    }

    public static function logout(User $authenticatedUser = null)
    {
        if(self::isApi()){
            (new UsersRepoFactory())->getRepo()->nullifyToken(self::getAccessToken());
        }else{
            session()->forget('user');
            session()->forget('user_login');
        }
    }

    public static function authenticateWithToken($token)
    {
        return ((new UsersRepoFactory())->getRepo()->findByToken($token) == null)?false:true;
    }


    /**
     * @return User|null
     */
    public static function user()
    {
        $user = null;
        if(self::isApi() && self::getAccessToken() != null){
            return (new UsersRepoFactory())->getRepo()->findByToken(self::getAccessToken());
        }
        $userJson = json_decode(session('user'));
        if($userJson){
            $user = Model::jsonToObj($userJson, new User());
        }
        return $user;
    }


    /**
     * @return UserLogin|null
     */
    public static function userLogin()
    {
        $userLogin = null;
        $loginJson = json_decode(session('user_login'));
        if($loginJson){
            $userLogin = Model::jsonToObj($loginJson, new UserLogin());
        }
        return $userLogin;
    }


    /**
     * @return bool
     */
    public static function check()
    {
        return (Auth::user() != null);
    }
}