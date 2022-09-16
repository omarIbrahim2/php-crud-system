<?php

interface DatabaseHandler{

    public function connect();

    public  function query($query);
    
}