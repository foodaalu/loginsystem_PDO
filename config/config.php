<?php
    ob_start();  /// header redirect gharda problem na hoss  bhanara
    session_start();
    /* echo "<pre>";
    print_r($_SERVER);
    exit; */
    define('SITE_URL',$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST']);
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_NAME','bbc_loc');
    define('ADMIN_URL',SITE_URL.'/newsportal/cms');
    define('ERROR_LOG', $_SERVER['DOCUMENT_ROOT'].'/newsportal/error/error.log');
    //echo SITE_URL;
    /* admin url */
    define('ADMIN_ASSETS',ADMIN_URL.'/assets');
   /*  echo ADMIN_URL;
    exit; */   
    define('ADMIN_CSS',ADMIN_ASSETS.'/css');
    define('ADMIN_JS',ADMIN_ASSETS.'/js');
    /* echo ADMIN_JS;
    exit; */


?>