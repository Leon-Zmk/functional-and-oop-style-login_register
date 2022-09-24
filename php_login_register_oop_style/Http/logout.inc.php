<?php

include "../Controller/DbController.php";
include "../Controller/UserController.php";

    if(isset($_POST['logout'])){

            $user= new UserController();
            $user->logout();

            header("location:../index.php");
    }


?>