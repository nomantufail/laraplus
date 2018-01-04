<?php
/**
 * Created by PhpStorm.
 * User: nomantufail
 * Date: 20/09/2017
 * Time: 6:14 PM
 */

namespace Libs;


class RouteHelper
{
    public static function goToHomePage(){
        return redirect('home');
    }

    public static function goToExitPage(){
        return self::gotoLoginPage();
    }

    public static function gotoLoginPage(){
        return redirect('login');
    }
}