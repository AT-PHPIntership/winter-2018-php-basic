<?php 

include_once 'Model.php';

class User extends Model
{
    private $username;
    private $gender;
    private $provinceId;
    
    public function insert($param){
        $stmt = $this->$connect->prepare('INSERT INTO user (name, year, gender, point, provice_id) values (:name, :year, :gender, :score, :provice_id)');
        $stmt->execute($param);
        $lastId = $this->$connect->lastInsertId();
        $stmt = $this->$connect->prepare("SELECT user.name as user_name, year, gender, point, provice.name as province_name FROM user INNER JOIN provice ON user.provice_id = provice.id WHERE user.id = {$lastId}");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function selectAll() {
        $stmt = $this->$connect->prepare('SELECT user.name as user_name, year, gender, point, provice.name as province_name FROM user INNER JOIN provice ON user.provice_id = provice.id');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}
