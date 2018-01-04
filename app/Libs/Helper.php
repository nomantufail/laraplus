<?php
/**
 * Created by PhpStorm.
 * User: nomantufail
 * Date: 20/09/2017
 * Time: 6:14 PM
 */

namespace Libs;


class Helper
{
    /**
     * @param $string
     * @param bool $capitalizeFirstCharacter
     * @return mixed|string
     */
    public static function strToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));
        return (!$capitalizeFirstCharacter)?lcfirst($str):$str;
    }

    /**
     * @param $string
     * @return string
     */
    public static function camlecaseToUnderscore($string){
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $string, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

    /**
     * @param $arr
     * @return array
     */
    public static function keysToCamel($arr){
        $final_arr = [];
        foreach ($arr as $key => $elem){
            $final_arr[self::strToCamelCase($key)] = $elem;
        }
        return $final_arr;
    }

    /**
     * @param $arr
     * @return array
     */
    public static function keysToUnderScore($arr){
        $final_arr = [];
        foreach ($arr as $key => $elem){
            $final_arr[self::camlecaseToUnderscore($key)] = $elem;
        }
        return $final_arr;
    }

    public static function modelsArrayToJson($models){
        $final_array = [];
        foreach ($models as $key => $value) {
            $final_array[] = $value->toJson();
        }
        return $final_array;
    }
}