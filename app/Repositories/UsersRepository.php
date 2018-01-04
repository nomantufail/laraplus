<?php
/**
 * Created by PhpStorm.
 * user: nomantufail
 * Date: 10/10/2016
 * Time: 10:13 AM
 */

namespace Repositories;


use Illuminate\Support\Facades\DB;
use Libs\Helper;
use Libs\ModelMapper;
use ModelMappers\UserMapper;
use Models\User;
use Models\UserLogin;
use RepoFactories\UserLoginsRepoFactory;
use Repositories\Repository;
use RepoInterfaces\UsersRepoInterface;
use RepoInterfaces\UserLoginsRepoInterface;

class UsersRepository extends Repository implements UsersRepoInterface
{

    private $userLoginsRepo = null;
    public function __construct()
    {
        $this->userLoginsRepo = (new UserLoginsRepoFactory())->getRepo();
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail($email=''){
        //todo: implement user finding by email
        return null;
    }

    /**
     * @param $username
     * @return User|null
     */
    public function findByUsername($username){
        $userData = \LaraModels\User::with('logins')->where('username',$username)->first();
        return ($userData)?(new UserMapper())->map($userData):null;
    }

    /**
     * @param $userId
     * @param $sessionToken
     * @return UserLogin
     */
    public function createSessionToken($userId, $sessionToken){
        $inactiveSessions = $this->userLoginsRepo->getInactiveUserSessions($userId);
        if(sizeof($inactiveSessions)){
            return $this->userLoginsRepo->updateExistingSession($inactiveSessions[0],['sessionToken']);
        }
        return $this->userLoginsRepo->create(new UserLogin(null, $userId, $sessionToken, 1));
    }


    /**
     * @param $token
     * @return User|null
     */
    public function findByToken($token){
        $dbUser = (new \LaraModels\UserLogin)->where('session_token',$token)->with('user')->first();
        if($dbUser != null){
            return (new UserMapper())->map($dbUser->user);
        }
        return null;
    }

    /**
     * @param $token
     * @return bool
     */
    public function nullifyToken($token){
        //todo: implement this method
        return true;
    }

    public function create(User $user){
        return (new UserMapper())->map(\LaraModels\User::create((new UserMapper())->mapOnTable($user)));
    }
}