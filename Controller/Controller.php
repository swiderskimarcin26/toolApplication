<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-19
 * Time: 10:31
 */

class Controller
{
    public static function viewCreated($viewName){
        require_once ("./View/$viewName.php");
    }
}