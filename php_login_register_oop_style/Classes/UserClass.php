<?php


class User extends UserController{

    private $name;
    private $email;
    private $password;
    private $confirm_password;
    

    public function __construct($name,$password,$email="",$confirm_password="")
    {   

       

        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
        $this->confirm_password=$confirm_password;
    }

    public function register(){

        if($this->checkEmpty()==false){
            header("location:../index.php?err=emptystring");
        }
        if($this->invalidCheck()==false){
            header("location:../index.php?err=invalidstrings");
        }
        if($this->emailCheck()==false){
            header("location:../index.php?err=invalidemail");
        }
        if($this->confirmpassCheck()==false){
            header("location:../index.php?err=passwordnotmatch");
        }
        if($this->invalidUserCheck()==false){
            header("location:../index.php?err=accountalreadyexist");
        }

        $this->userRegister($this->name,$this->email,$this->password);

    }

    public function login(){

        if(empty($this->name) || empty($this->password)){

            header("location:../index.php?error=emptystring");
        }
        $this->loginUser($this->name,$this->password);

    }

    private function checkEmpty(){

        $result=null;
        if(!empty($this->name) || empty($this->email) || empty($this->password)){
            $result=true;
        }else{
            $result=false;
        }

        return $result;

    }

    private function invalidCheck(){

        $result=null;
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->name)){
            $result=true;
        }else{
            $result=false;
        }

        return $result;

    }

    private function emailCheck(){

        $result=null;
        if(filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result=true;
        }else{
            $result=false;
        }

        return $result;

    }

    private function confirmpassCheck(){

        $result=null;

        
        if($this->password == $this->confirm_password){

            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }
    
    private function invalidUserCheck(){
        
        $result=null;
        if(!$this->checkUserExist($this->email)){
            $result=true;
        }else{
            $result=false;
        }

        return $result;
    }

}