<?php 

session_start();

$check = chdir("C:\\xampp\htdocs\pdo");

if ($check) {
    
    require_once "C:\\xampp\htdocs\pdo"."\\models\\user.php";
    require_once "C:\\xampp\htdocs\pdo"."\\validation\\Validator.php";
}


$user = new user();
 



 if (isset($_POST["submit"])) {
    unset($_POST["submit"]);

    Validator::Required($_POST["email"]);
    Validator::email($_POST["email"]);
    Validator::unique($_POST["email"]);
    Validator::Required($_POST["name"]);
    if (Validator::validateFails() == true) {
          $errors = Validator::getErrors();
          $_SESSION["errors"] = $errors; 
          header("location:http://localhost/pdo/createForm.php");
        


    }else{

        if ($user->create($_POST)) {
            header("location:http://localhost/pdo/index.php");
            $_SESSION["createSUCC"] = "user created successfully";
       }else{
           header("location:http://localhost/pdo/index.php");
       }

    }

   
    
 }else{

    header("location:http://localhost/pdo/index.php");
 }
 

    