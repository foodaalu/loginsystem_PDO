<?php
    require  $_SERVER['DOCUMENT_ROOT'].'/newsportal/config/init.php';
    if(isset($_COOKIE,$_COOKIE['_au'])){
        setcookie('_au','',time() - 60, '/');
    }
    $data = array(
        'remember_token' => ''
    );
    $user = new User();
    $user_id = $_SESSION['user_id'];
    $user->updateUser($data,$user_id);
    session_destroy();
    redirect('cms/index.php');
    //debug($_SESSION);
    //debug($_COOKIE);
?>