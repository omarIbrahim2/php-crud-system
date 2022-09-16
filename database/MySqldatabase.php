<?php

 require_once "config/mysqlConfig.php";
 require_once "database/DatabseHandler.php";
class MySqldatabase implements DatabaseHandler {

   
   private $configs;

  

   function __construct()
   {
     
      $configure = new Mysqlconfig("localhost" , "mytest" , "root" , "");

      $this->configs = $configure->getConfigs();

      

      

      $this->connect();
   }


   public function connect(){

      try {


         $this->pdo = new PDO($this->configs['dsn'] , $this->configs['username'] , $this->configs['password']);
      
      } catch (PDOException $e) {
           echo "Error in connection " . $e->getMessage() . "<br>";
      }
      
   }


   public function  query($query)
   {
        $pdoStmt = $this->pdo->prepare($query);

         return $pdoStmt;

   }



 







}

?>