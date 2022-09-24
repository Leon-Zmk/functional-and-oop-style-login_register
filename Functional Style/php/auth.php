<?php

session_start();



if(empty($_SESSION['user'])){
	return header("location:login.php");
}else{
	
}