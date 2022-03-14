<?php 

$localhost = "localhost";
$user = "root";
$pass = "";
$db_name = "assignment2";

 try {
     $db = new PDO("mysql:host=$localhost;dbname=$db_name", $user, $pass);
    // echo "Successfuly connected to database";
 } catch(PDOException $e){
    echo "Connection failed : ". $e->getMessage();
    }