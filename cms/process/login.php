<?php
 require $_SERVER['DOCUMENT_ROOT'].'/newsportal/config/init.php';
/* ---------object of User.php it will auto load ------------------------------- */
 $user = new User();
/* ---------end object of User.php it will auto load ------------------------------- */

  if (isset($_POST) && !empty($_POST)) {
       //debug($_POST);   
      // email validation 
      $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
      if(!$email){
          redirect('../cms/index.php','error','Email format invalid');
      }
      if (empty($_POST['email']) && empty($_POST['password'])){
            redirect('../cms/index.php','error','Email and Password Required');
      }
      
      //password validation  
      $password = sha1($email.$_POST['password']);


/* -------------------- Using Object to create function and catch $email value on it pass to user.php-----------------------*/
      $user_info = $user->getUserByUserName($email);
      //debug($user_info);  //debug the date
       //exit;
 /*----------//validation for email format "admin@bbc.com"  and password validation ---------------------------------------------*/
      if (!$user_info){
            redirect('../cms/index.php','error','Unrecognized username.');
      }else{
            if($user_info[0]->password == $password){
                  if($user_info[0]->role == 'admin' || $user_info[0]->role == 'editor'){
                        $_SESSION['user_id'] = $user_info[0]->id;
                        $_SESSION['name'] = $user_info[0]->name;
                        $_SESSION['email'] = $user_info[0]->email;
                        $_SESSION['role'] = $user_info[0]->role;
                        $token = generateRandomString(100);
                        $data = array(
                              'last_ip' => $_SERVER['REMOTE_ADDR'],
                              'last_login' => date('Y-m-d H:i:s')
                        );
                        //echo $token;
                        if(isset($_POST['remember']) && !empty($_POST['remember'])){
                              setcookie('_au',$token,time() + 8640000,'/');
                              //user_update
                              $data['remember_token'] = $token;
                        }
                        
                        $_SESSION['token'] = $token; /// access user data from server by using session.
                        //debug($data, true);
                        $user->updateUser($data, $user_info[0]->id);
                        
                        redirect('../cms/dashboard.php','success','Welcome to Admin Panel');
                        //debug($_POST);
                        
                        //last_login, ip set
                        
                  }else{
                        redirect('../cms/index.php','error','You are not authorized to access this page');
                        
                  }
            }else{
                  redirect('../cms/index.php','error','Password does not match');
            }
      }
 /*----------//validation for email format "admin@bbc.com"  and password validation ---------------------------------------------*/ 
      
/* -------------------- end of Using Object to create function -----------------------*/


  }else{
     redirect('../cms/index.php','error','Your are not authorized to access this page');
  }
 
  
      

?>