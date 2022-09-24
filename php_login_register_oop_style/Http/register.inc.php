<?php


if(isset($_POST["register"])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];

    //init sign up

    include "../Controller/DbController.php";
    include "../Controller/UserController.php";
    include "../Classes/UserClass.php";

    $user= new User($name,$password,$email,$confirm_password);

    $user->register();

    header("location:../index.php?register=success");
    
    //
}