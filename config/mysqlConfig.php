<?php
 require_once "config/config.php";

class Mysqlconfig extends config{
   

   private $dsn; 
  function __construct($host , $dbname , $username , $password)
  {
    parent::__construct($host ,$dbname , $username , $password);
     
    $host = $this->configs["host"];
    $dbname = $this->configs["dbname"];
    $this->dsn= "mysql:host=$host;dbname=$dbname";
    $this->configs['dsn'] = $this->dsn;
  
  }





public function getConfigs(){

   return $this->configs;

}


}