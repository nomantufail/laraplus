<?php
/**
 * Created by PhpStorm.
 * user: nomantufail
 * Date: 10/10/2016
 * Time: 10:13 AM
 */

namespace Repositories;


use Illuminate\Support\Facades\DB;
use LaraModels\UserLogin as DbUserLogin;
use ModelMappers\UserLoginMapper;
use Models\UserLogin;
use RepoInterfaces\UserLoginsRepoInterface;

class UserLoginsRepository extends Repository implements UserLoginsRepoInterface
{
    public $dbUserLogin = null;
    /**
    * @var UserLoginMapper
    */
    public $userLoginMapper = null;
    public function __construct()
    {
        $this->dbUserLogin = new DbUserLogin();
        $this->userLoginMapper = new UserLoginMapper();
    }


    public function create(UserLogin $ulogin){
        return (new UserLoginMapper())->map(\LaraModels\UserLogin::create((new UserLoginMapper)->mapOnTable($ulogin)));
    }

    /**
     * @param $userId
     * @return UserLogin[] array
     */
    public function getUserSessions($userId){
        $logins = [];
        $db_logins = DbUserLogin::where('user_id',$userId)->get()->all();
        foreach ($db_logins as $login){
            $logins[] = $this->userLoginMapper->map($db_logins);
        }
        return $logins;
    }


    /**
     * @param $userId
     * @return UserLogin[] array
     */
    public function getInactiveUserSessions($userId){
        $logins = [];
        $db_logins = DbUserLogin::where('user_id',$userId)->where('active',0)->get()->all();
        foreach ($db_logins as $login){
            $logins[] = $this->userLoginMapper->map($login);
        }
        return $logins;
    }

    /**
     * @param $userId
     * @return UserLogin[] array
     */
    public function getActiveUserSessions($userId){
        $logins = [];
        $db_logins = DbUserLogin::where('user_id',$userId)->where('active',1)->get()->all();
        foreach ($db_logins as $login){
            $logins[] = $this->userLoginMapper->map($db_logins);
        }
        return $logins;
    }

    public function updateExistingSession(UserLogin $userLogin, $columns=[]){
        (new DbUserLogin())->update($this->createUpdateableArray($userLogin, $columns));
        return $userLogin;
    }

    /**
    * @param $session_token
    * @return $userId
    */
    public function getUserIdBySessionToken($session_token){
        $response = $this->dbUserLogin->where('session_token', $session_token)->first();
    }

}