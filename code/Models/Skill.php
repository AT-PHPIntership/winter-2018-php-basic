<?php 

include_once 'Model.php';

class Skill extends Model
{
    private $name;

    public function insert($param) {
        $stmt = $this->$connect->prepare("INSERT INTO skill (name) values (:name)");
        $stmt->execute($param);
        $lastId = $this->$connect->lastInsertId();
        $stmt = $this->$connect->prepare("SELECT * from skill WHERE id = {$lastId}");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectAll() {
        $stmt = $this->$connect->prepare("SELECT * FROM skill");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateById($param, $id) {
        $stmt = "UPDATE skill set name=:name where id=".$id;
        $stmt = $this->$connect->prepare($stmt);
        $result = $stmt->execute($param);
        return $result;
    }

    public function delete($id) {
        $stmt = "DELETE FROM skill WHERE id=".$id;
        $stmt = $this->$connect->prepare($stmt);
        $return = $stmt->execute();
        return $result;
    }
}
