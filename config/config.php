<?php


abstract class config{
 
 protected array $configs;

 

 function __construct($host , $dbname , $username , $password)
 {
    $this->configs['host'] = $host;
    $this-> configs['dbname'] = $dbname;
    $this -> configs['username'] = $username;
    $this->configs['password'] = $password;

 }

}