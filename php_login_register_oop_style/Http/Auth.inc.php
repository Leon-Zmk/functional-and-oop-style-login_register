<?php

include "../Controller/DbController.php";
include "../Controller/UserController.php";

$user=new UserController();

if($user->checkLogin() ==false){
    header("location:../index.php?error=authfail");
}

?>