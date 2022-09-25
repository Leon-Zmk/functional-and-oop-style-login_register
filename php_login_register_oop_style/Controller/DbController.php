<?php
 ob_start();

 

class DbConnect {


  
   protected function connect()
   {

    $servername = "localhost";
    $username = "username";
    $password = "password";
    
    try {
      $conn = new PDO("mysql:host=localhost;dbname=php_oop", 'root', '');
      return $conn;
      echo "Connected successfully";

    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

        

   }

   


}