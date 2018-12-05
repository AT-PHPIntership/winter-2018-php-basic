<?php

include_once 'Model.php';

class User extends Model
{

    private $username;
    private $gender;
    private $provinceId;
    
    function selectAll() {
        $query =  "SELECT u.id, u.name name, gender, year, p.name province FROM user u LEFT JOIN provice p ON u.provice_id = p.id";
        $statement =  $this->$connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($param) {
        $stmt =$this->$connect->prepare('INSERT INTO user (name, gender, year, provice_id) values (:name, :gender, :year, :provice_id)');
        $stmt->execute($param);
        $lastId = $this->$connect->lastInsertId();
        $stmt = $this->$connect->prepare("SELECT user.name username, gender,year, provice.name province FROM user LEFT JOIN provice ON user.provice_id = provice.id WHERE user.id = {$lastId}");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
