<?php
include 'config.php';

abstract class Model
{
    public $connectDb;

    public function __construct() {
        $this->connectDb = $this->dbConfig();
    }

    public function dbConfig(){
        try {
            
            $conn = new PDO("mysql:host=".Config::DB_HOST.";port=".Config::DB_PORT.";
            dbname=".Config::DB_NAME.";charset=utf8", Config::DB_USERNAME, Config::DB_PASSWORD);
                // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully", "<br>";
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() , "<br>";
        }
    }
}