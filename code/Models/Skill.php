<?php
include_once 'Model.php';
class Skill extends Model {
    private $name;

    public function insert($param) {
        $stmt = $this->connect->prepare('INSERT INTO skill (skill_name) values (:name)');
        $stmt->execute($param);
        $lastId = $this->connect->lastInsertId();
        $stmt = $this->connect->prepare("SELECT skill_id, skill_name FROM skill WHERE skill_id=".$lastId);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function selectAll() {
        $stmt = $this->connect->prepare('SELECT * FROM skill');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function updateById($param, $id) {
        $stmt = $this->connect->prepare("UPDATE skill SET skill_name =(:skill_name) WHERE skill_id=".$id) ;
        return (boolean) $stmt->execute($param);
    }

    public function delete($id) {
        $stmt = $this->connect->prepare("DELETE FROM skill WHERE skill_id=".$id) ;
        return (boolean) $stmt->execute();
    }
}