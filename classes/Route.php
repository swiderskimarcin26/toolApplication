<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-19
 * Time: 09:34
 */

class Route
{
    public static $validRoute=array();


    public static function set($route,$function){
        self::$validRoute[]=$route;

        //print_r(self::$validRoute);
        if(isset($_GET['url'])==$route OR $GLOBALS['argv'][1]==$route){
            $function->__invoke();

        }
    }
}