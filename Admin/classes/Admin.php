<?php

include_once "Db.php";

class Admin extends Db {
    public function index($email, $password){

        //check if email is in the Db 
        $sql = "SELECT * FROM admin WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $admin_count = $stmt->rowCount();

        //if it is not in the Db, then count will be less than 1
        if($admin_count < 1){
            //if it doesnt exit in Db, return error
            return "Incorrect Email or Password";
            exit();
        }
        //if it is not in the Db, we need the full details of the admin that owns the email
        $admin = $stmt->fetch(PDO::PARAM_STR);
            //return $admin;
        //check if password matches using password verify
        $password_matches = password_verify($password, $admin["password"]);
        if($password_matches){
            header("Location../dashboard.php");
            exit();
        }else{
            header("location:../index.php");
          exit();
          //else:return error message
          return "Either email or password is incorrect";
            die();
        }
        
    }
    
}

?>