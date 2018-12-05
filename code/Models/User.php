<?php
include 'Model.php';

class User extends Model {
    private $username;
    private $gender;
    private $provinceId;

    public function insert($param) {
        $stmt = $this->connectDb->prepare("INSERT INTO user (username, gender, provinceId)
            values (:username, :gender, :provinceId)");
        $stmt->execute($param);
        $lastId = $this->connectDb->lastInsertId();
        $stmt = $this->connectDb->prepare("SELECT id, username, gender, provinceId from user
            WHERE id = {$lastId}");           
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function selectAll() {
        $stmt = $this->connectDb->prepare('select username, gender, provinceId from user');
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}