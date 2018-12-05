<?php
include 'Model.php';

class User extends Model {
    private $username;
    private $gender;
    private $provinceId;

    public function insert($param) {
        $stmt = $this->connectDb->prepare('insert into user(username, gender, provinceId)
            values (?,?,?)');
        $data = $param;
        $stmt->execute($data);
        return $stmt->fetchAll();
    }

    public function selectAll() {
        $stmt = $this->connectDb->prepare('select username, gender, provinceId from user');
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}