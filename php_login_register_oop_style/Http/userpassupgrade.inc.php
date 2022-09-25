<?php

include "../Controller/DbController.php";
include "../Controller/UserController.php";


if(isset($_POST['upgradepass'])){

    $oldpass=$_POST['old_password'];
    $newpass=$_POST['new_password'];
    $id=$_POST['id'];


    $user=new UserController();

  if(!$user->userPassUpgrade($oldpass,$newpass,$id)){

        header("location../index.php?error=upgradefail");

    }

   


}