<?php 
include "config.php";

class Model extends Config 
{
    public $db;

    public function __construct()
    {
        $this->$db = $this->dbConfig();
    }
    public function dbConfig()
    {
        try {
            $conn = new PDO('mysql:host='.Config::DB_HOST.'; port='.Config::DB_PORT.'; dbname='.Config::DB_NAME,
            Config::DB_USERNAME, Config::DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            // echo "Connected successfully"; 
        } 
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
