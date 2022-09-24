<?php


if(isset($_POST["login"])){

    $name=$_POST['name'];
    $password=$_POST['password'];

    //init sign in

    include "../Controller/DbController.php";
    include "../Controller/UserController.php";
    include "../Classes/UserClass.php";

    $user=new User($name,$password);

     print_r($user->login());


     header("location:../index.php?login=success");
   
    //
}