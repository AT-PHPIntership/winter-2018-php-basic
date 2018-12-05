<?php
include 'Model.php';


class Skill extends Model {
    private $name;
    
    public function insert($param) {
        $stmt = $this->connectDb->prepare("INSERT INTO skill (name)
            values (:name)");
        $stmt->execute($param);
        $lastId = $this->connectDb->lastInsertId();
        $stmt = $this->connectDb->prepare("SELECT id, name from skill
            WHERE id = {$lastId}");           
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function showAll() {
        $stmt = $this->connectDb->prepare('select id, name from skill');
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateById($param, $id) {
        $stmt = $this->connectDb->prepare('update skill set name = :name 
        where id = '. $id);
        $stmt->execute($param);
        return $stmt;
        
    }

    public function delete($id) {
        $stmt = $this->connectDb->prepare('delete from skill where id =' . $id);
        $stmt->execute();
        return $stmt;
    }
}