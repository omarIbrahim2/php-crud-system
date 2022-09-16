<?php

session_start();
$check = chdir("C:\\xampp\htdocs\pdo");

if ($check) {
    
    require_once "C:\\xampp\htdocs\pdo"."\\models\\user.php";
}



$userID = $_GET['id'];


$user = new user();


$deleted = $user->delete($userID);
  var_dump($deleted);


if ($deleted == null) {
    header("location:http://localhost/pdo/index.php");
     exit;
}else{
    $_SESSION["success"] = "user deleted successfully";
    header("location:http://localhost/pdo/index.php");
    exit;
}




