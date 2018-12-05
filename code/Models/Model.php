<?php

include_once 'config.php';

abstract class Model {
    protected static $connect;

    public function __construct() {
        $this->$connect = $this->dbConfig();
    }

    public function dbConfig() {
        try {
            $conn = new PDO("mysql:host=".Config::DB_HOST."; port=".Config::DB_PORT."; dbname=".Config::DB_NAME."; charset=utf8", Config::DB_USERNAME, Config::DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connect Successfully";
            return $conn;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>
