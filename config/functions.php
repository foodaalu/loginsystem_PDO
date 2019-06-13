<?php
/* ------------------debug the what data is coming------------------------------------------------------------- */
    function debug($data,$is_exit = false){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        if ($is_exit) {
                exit;
        }
    }
/* ------------------end of debug the what data is coming-------------------------------------------------------- */

/* ------------------SESSION message setting and header redirect ------------------------------------------------ */
    function  redirect($path,$msg_key=null,$msg=null){ //path -> where to redirect(compulsary_argument), to set error message
        // of SESSION (sometime it won't set message or redirect without message it will used), message itself..
        if($msg_key != null){
            setFlash($msg_key,$msg);
        } 
        //$_SESSION[$msg_key]  = $msg;
        header('location:../'.$path); 
        exit;
    }
// defining setFlash function call
    function setFlash($msg_key,$msg){
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION[$msg_key] = $msg;
    }
    function flash(){
        
       if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
           echo '<p class="alert alert-success">'.$_SESSION['success'].'</p>';
           unset($_SESSION['success']);
       }
    //    debug($_SESSION);
    //     exit;
       if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
       echo '<p class="alert alert-danger">'.$_SESSION['error'].'</p>';
       unset($_SESSION['error']);
       }
       if(isset($_SESSION['warning']) && !empty($_SESSION['warning'])){
        echo '<p class="alert alert-success">'.$_SESSION['warning'].'</p';
        unset($_SESSION['warning']);
        }
    }
/* ------------------------END SESSION message setting and header redirect --------------------------------------- */
/* ------------------------Generate Random String  --------------------------------------------------------------- */
function generateRandomString($length = 100){
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $len = strlen($chars);
    $random = "";
    for($i=0;$i<$length;$i++){
        $posn = rand(0, $len - 1);
        $random .= $chars[$posn];
    }
    return $random;
       
}
/* ------------------------END Generate Random String ----------------------------------------------------------- */





    

?>