<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/newsportal/config/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/newsportal/config/functions.php';
    spl_autoload_register(function($class_name){
        require_once $_SERVER['DOCUMENT_ROOT'].'/newsportal/class/'.$class_name.".php";
    });

?>