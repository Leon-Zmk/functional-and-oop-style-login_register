<?php


class UserController extends DbConnect{


    protected function checkUserExist($email){
        $statment=$this->connect()->prepare("SELECT email FROM users WHERE email= ? ;");
        $check=null;
        if(!$statment->execute([$email])){
            $statment=null;
            exit();
        }
        if($statment->rowCount() > 0){
            $check=false;
        }

        $check=true;

    }

    public function checkLogin(){

        session_start();
        if($_SESSION['id']){
            return true;
        }else{
            return false;
        }

    }


    protected function userRegister($name,$email,$password){

        $statment=$this->connect()->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
        $hash_pass=password_hash($password,PASSWORD_DEFAULT);

        if(!$statment->execute([$name,$email,$hash_pass])){
            $statment=null;
            header("location:../index.php?error=queryfail");
            exit();
        }

        $statment=null;


    }


    protected function loginUser($name,$password){

        $statment=$this->connect()->prepare("SELECT * FROM users WHERE name = ? OR email = ? ;");

        if(!$statment->execute([$name,$name])){
            $statment=null;
            header("location:../index.php?error=queryfail");
            exit();
        }

        if(!$statment->rowCount() > 0){
            $statment=null;
            header("location../index.php?error=thereisnouseraccount");
        }

        $user=$statment->fetch(PDO::FETCH_ASSOC);
        $passverify=password_verify($password,$user['password']);

        if($passverify==false){
            $statment=null;
            header('location:../index.php?error=passwordoremailnotmatch');
        }

        if($passverify==true){

            session_start();
            $_SESSION['id']=$user['id'];
            $_SESSION['username']=$user['name'];
            
            $statment=null;
            
        }

    }

    public function logout(){

        session_start();
        session_unset();
        session_destroy();

    }

}