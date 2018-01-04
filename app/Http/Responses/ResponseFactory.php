<?php
/**
 * Created by PhpStorm.
 * User: nomantufail
 * Date: 04/05/2017
 * Time: 9:38 AM
 */
namespace Responses;

use Traits\RequestHelper;

class ResponseFactory
{
    use RequestHelper;

    /**
     * @var WebResponse
     */
    private static $webResponse = null;

    /**
     * @var ApiResponse
     */
    private static $apiResponse = null;

    private function __construct(){}

    /**
     * @return ApiResponse
     */
    private static function getApiResponse(){
        if(self::$apiResponse == null)
            self::$apiResponse = new ApiResponse();
        return self::$apiResponse;
    }

    /**
     * @return webResponse
     */
    private static function getWebResponse(){
        if(self::$webResponse == null)
            self::$webResponse = new WebResponse();
        return self::$webResponse;
    }

    public static function getInstance(){
        if(self::isApi())
            return self::getApiResponse();
        else
            return self::getWebResponse();
    }
}