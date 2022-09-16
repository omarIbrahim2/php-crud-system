<?php

 require_once "database/MySqldatabase.php";
 
 
 abstract class model{

     private  $database;

    protected static
      $table;

     static $className;

     private $query;
    
    function __construct()
    {

       $this->database = new MySqldatabase();
        
    }



    public  function getAll(){

         $table = static::$table;


         if (strlen($this->query) == 0) {
            $this->query = "SELECT * FROM" . " " . $table;

        }else{

            $this->query .= " FROM". " ". $table;
        }

        $stmt =  $this->database->query($this->query);
        $stmt -> execute();
        return $stmt->fetchAll( PDO::FETCH_CLASS ,$this::class);

         
    }


    public function find($id){
        $table = static::$table;
       $query = "SELECT * FROM". " ". "$table". " " . "WHERE id=". ":id".";";

       $stmt = $this->database->query($query);

       $stmt->bindParam("id" , $id , PDO::PARAM_INT);

       $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS , $this::class);
    }


    public function delete($id){
        $table = static::$table;

       
        $query = "DELETE FROM". " " . "$table". " ". "WHERE id=".":id".";";

        $stmt = $this->database->query($query);
         
        $stmt->bindParam("id" , $id , PDO::PARAM_INT);
        
       return $stmt->execute();

    }


   
  public function select(...$params)
  {
    
      $this->query = "select";

      for ($i=0; $i < count($params) ; $i++) { 
        $this->query.= " " . $params[$i] . ' ,';
     }

     $queryArr =  explode(' ' , $this->query , -1);
      $this->query = implode(" " ,$queryArr);

      return $this;
  }

  public function create($user){
       
    $table = static::$table;
    $query = "INSERT INTO " . " ". $table . " SET";
    
      foreach($user as $key=>$index){

          $query .= " ".$key."="."'$index'"." ". ",";
      }

      $queryInArr = explode(" " , $query , -1);
       $query = implode(" " , $queryInArr);

       $query .= ";";
       
       
        
       $stmt = $this->database->query($query);

       

    
       return $stmt->execute();

        
    

      
      
  }
    
}