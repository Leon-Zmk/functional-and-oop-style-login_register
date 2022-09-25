<?php

include "../Controller/DbController.php";
include "../Controller/UserController.php";




if(isset($_POST['upgrade'])){

    $name=$_POST['name'];
    $file=$_FILES['image'];
    $id=$_POST['id'];


    $user=new UserController();

    $filepath=$file['tmp_name'];
    $filetype=mime_content_type($filepath);
    $extension=$user->getExtension($filetype);
    $newfilename=uniqid().".".$extension;
    
if(!$user->userInfoUpgrade($name,$newfilename,$id,$filepath)){

        header("location../index.php?error=upgradefail");

    }

    header("location../views/dashboard.php?upgrade=success");


}