<?php


session_start();

$check = chdir("C:\\xampp\htdocs\pdo");

if ($check) {
    
    require_once "C:\\xampp\htdocs\pdo"."\\models\\user.php";
    require_once "C:\\xampp\htdocs\pdo"."\\validation\\Validator.php";
}


$user = new user();


   
if (isset($_POST["submit"])){

    

     $uId = $_POST["id"];

    unset($_POST["id"]);
     unset($_POST["submit"]);


     Validator::Required($_POST["email"]);
     Validator::email($_POST["email"]);
    // Validator::unique($_POST["email"]);
     Validator::Required($_POST["name"]);



     if (Validator::validateFails() == true) {
        $errors = Validator::getErrors();
      $_SESSION["errors"] = $errors; 
         header("location:http://localhost/pdo/updateForm.php");
      


   }else{

  if ($user->update($_POST , $uId)) {

            $_SESSION["update"] = "user updated successfully";
            header("location:http://localhost/pdo/index.php");
          
        }

  }
    
    
} else{

   header("location:http://localhost/pdo/index.php");
}
