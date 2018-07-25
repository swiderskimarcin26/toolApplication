<?php
require_once ('./Routes.php');

function __autoload($class_name){
    if(file_exists('./classes/'.$class_name.'.php')){
        require_once './classes/'.$class_name.'.php';
    }
    elseif (file_exists('./Controller/'.$class_name.'.php')){
        require_once './Controller/'.$class_name.'.php';
    }
    elseif (file_exists('./Service/'.$class_name.'Service/'.$class_name.'.php')){
        require_once './Service/'.$class_name.'Service/'.$class_name.'.php';
    }
    elseif (file_exists('./Parameters/'.$class_name.'.php')){
        require_once './Parameters/'.$class_name.'.php';
    }
}


