<?php
include_once 'Model.php';
class User extends Model {
    private $username;
    private $gender;
    private $provinceId;

    public function insert($param) {
        $stmt = $this->connect->prepare('INSERT INTO user (user_name, gender, province_id) values (:name, :gender, :provinceId)');
        $stmt->execute($param);
        $lastId = $this->connect->lastInsertId();
        $stmt = $this->connect->prepare("SELECT user_name, gender, province_id FROM user WHERE user_id=".$lastId);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function selectAll() {
        $stmt = $this->connect->prepare('SELECT * FROM user');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}