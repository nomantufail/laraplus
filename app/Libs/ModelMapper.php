<?php
/**
 * Created by PhpStorm.
 * User: nomantufail
 * Date: 20/09/2017
 * Time: 12:33 PM
 */

/**
 * DEPRECATED: use dadicated classes instead..
*/

namespace Libs;


use LaraModels\User;
use LaraModels\UserLogin;

class ModelMapper
{


    /**
     * @param UserLogin $laraUserLogin
     * @param $direction
     * @return \Models\UserLogin
     * Description: this method accepts laravel model object and map its properties
     * on the custom universal model.
     */
    public static function mapUserLogin(UserLogin $laraUserLogin, $direction=0){
        return new \Models\UserLogin($laraUserLogin->id, $laraUserLogin->session_token, $laraUserLogin->active);
    }
}