<?php


function con(){
	return mysqli_connect("localhost","root","","php_crud_functional");
}


$dynamicurl="http://{$_SERVER['HTTP_HOST']}/php_crud_functional/functional_Style/";



