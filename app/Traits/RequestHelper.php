<?php
/**
 * Created by PhpStorm.
 * User: nomantufail
 * Date: 04/05/2017
 * Time: 9:57 AM
 */

namespace Traits;

use Mockery\Exception;



trait RequestHelper
{
    public static function getRequestType()
    {
        $routeParts = explode('/', request()->route()->getPrefix());
        if(isset($routeParts[0]) && $routeParts[0] == 'api')
            return 'api';
        return 'web';
    }

    /*
     * incoming request is an api request or not?
     */
    public static function isApi()
    {
        return (self::getRequestType() == 'api')?true:false;
    }

    /*
     * incoming request is a web request or not?
     */
    public static function isWeb()
    {
        return (!self::isApi())?true: false;
    }

    /*
    * return Authorization token within the
    * incoming request.
    */
    public static function getAccessToken()
    {
        $authorization = request()->header('Authorization');
        // $authorization = @getallheaders()['Authorization'];
        // before running unit tests...
        //$authorization = '$2y$10$tSM.PiN9BnMfyonqjHlwTONa1DPHbyQSAMOtmt4chJYXenGeYySHC';
        return (isset($authorization))?$authorization:null;
    }
}