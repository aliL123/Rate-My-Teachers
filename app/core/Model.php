<?php
namespace App\core;

class Model{
    protected static $connection;
    public function __construct()
    {
        $host = "localhost"; // 10.03.103
        $DBName = "finalproject";
        $username = "root"; //default user is root
        $password = ""; // default password is empty
        //connecting to the dtaabse
        self::$connection = new \PDO("mysql:host=$host;dbname=$DBName;charset=utf8;", $username, $password);
        //preventing errors
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      //self refers to the current class
    }  
  }
?>