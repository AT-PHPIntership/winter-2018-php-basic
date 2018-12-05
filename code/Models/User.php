<?php
include "Model.php";

class User extends Model
{
    private $username;
    private $gender;
    private $provinceId;


    public function insert($param)
    {
        try {
            $query = 'INSERT INTO user
              (username, gender, provinceId) VALUES
              (:username, :gender, :provinceId)';
            $statement = $this->$db->prepare($query);
            $statement->execute($param);
            $lastId = $this->$db->lastInsertId();
            $statement = $this->$db->prepare("SELECT user.username, gender, province.name as province_name from user INNER JOIN province ON user.provinceId = province.id where user.id = {$lastId}");
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
    public function selectAll()
    {
        try {
            $query = 'SELECT * from user';
            $statement = $this->$db->prepare($query);
            $statement->execute();
            $statement = $this->$db->prepare("SELECT user.username, gender, province.name as province_name from user INNER JOIN province ON user.provinceId = province.id");
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
}
