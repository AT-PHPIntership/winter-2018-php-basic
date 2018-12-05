<?php

include 'config.php';

class Model
{
  protected $connect;

  public function __construct()
  {
    $this->connect = $this->dbConfig();
  }
  public function dbConfig()
  {
    try {
      $conn = new PDO("mysql:host=".Config::HOST."; port=".Config::PORT."; dbname=".Config::DBNAME."; charset=utf8", Config::USERNAME, Config::PASSWORD);

      return $conn;
    }
    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }
  }
}
