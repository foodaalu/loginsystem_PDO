<?php
/* -------------------------------------inheriance to  databse connection to user -------------------------- ---------------*/
    class User extends Database{
/*--------------creating table -------------extends in child-------------------------------------------------- */
        public function __construct()
        {
            parent::__construct();
            $this->table('client');
        }
/*--------------end of creating table -------------extends in child-------------------------------------------------- */
/*---------------------receving call function in "user.php" with making its function and generate sql query ------------------- */
        public function getUserByUserName($email){
            /* 
                    SELECT * FROM client WHERE email ='".$email."';
                    to generate plugin of SQL we have to "Database.php" that is direct fetch to MYSQL db.
            
            */
            //string format
            $args = array(
                /* 'fields' => 'id, name, email,password,role,status' */
                //'where' => "email = '".$email."'"
                'where' => array(
                    'email' => $email,
                    'status' => 'active'
                )
            );
            //array format
           /*  $args = array(
                'fields' => ['id', 'name', 'email','password','role','status']
            ); */
            return $this->select($args);
        }
/*--------------------- END receving call function in" user.php" with making its function and generate sql query ------------------- */
/*--------------------- ----------------function for updateUser ----------------------------------------------------------- ------------------- */
/*--------------------- --------------- wehether cookie set or not in db ----------------------------------------------------------- ------------------- */
public function getUserByToken($token){
    /* 
            SELECT * FROM client WHERE remember_token ='".$token."';
    */
    //string format
    $args = array(
        'where' => array(
        'remember_token' => $token,
        )
    );
    //array format
   /*  $args = array(
        'fields' => ['id', 'name', 'email','password','role','status']
    ); */
    return $this->select($args);
}
/*--------------------- ----------------end wehether cookie set or not in db----------------------------------------------------------- ------------------- */

        public function updateUser($data,$user_id){
            /* 
                UPDATE users SET last_ip = $date['last_ip'], 
                last_login = $data['last_login'],
                remember_token = $date['remember_token']
                WHERE id = $user_id
            */
            $args = array('where' => array(
                'id' => $user_id
            ));
            $success = $this->update($data,$args);
            if ($success){
                return $user_id;
            }else{
                return false;
            }
        }
/*----------------------------------- END function for updateUser---------------------------------------------------------------------------- */

    }
/* -------------------------------------end of inheriance to  databse connection to user -------------------------- ---------------*/


?>