<?php
  

$check = chdir("C:\\xampp\htdocs\pdo");

if ($check) {
    

     require_once "C:/xampp/htdocs/pdo"."/database/MySqldatabase.php";
 }

  

class Validator{

    private static  $errors = array();
     
    private static $db;

    public function __construct()
    {
        //self::$db = new MySqldatabase();
    }

    private static function secureInput(&$input){
       $input = trim($input , " ");
         $input = strip_tags($input);
         $input = htmlspecialchars($input);
        
    }


     public static function Required(&$input){
          
        self::secureInput($input);
         if ($input == '') {
             self::$errors["required"] = "all input must be filled";
             return false;
         } 
         
         return true;
     }

     public static function email($input){
          self::secureInput($input);
          if (self::Required($input) == true) {
               if (!filter_var($input , FILTER_VALIDATE_EMAIL)) {
                    self::$errors["email"] = "email must be valid";
                  } 
          }
          
     }


     public static function validateFails(){
           if (count(self::$errors) == 0) {
                return false;
           }

           return true;
     }

     public static function getErrors(){
          return self::$errors;
     }

     public static function unique($email){
           if (self::checkEmailExists($email) == false) {
                  return true;
           }

           self::$errors["unique"] = "email is already registred";
           return false;
     }

     private static function checkEmailExists($email){
            self::$db = new MySqldatabase();

            $stmt = self::$db->query("SELECT * FROM users WHERE email = :email");

             $stmt->execute(["email" => $email]);

            $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
            if (count($result) == 0) {
                 return false;
            }

            return true;
     }

}



  

 





