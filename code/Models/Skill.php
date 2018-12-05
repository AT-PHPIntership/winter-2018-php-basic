<?php 

include_once 'Model.php';

class Skill extends Model
{
    private $name;
    
    public function insert($param){
        $stmt = $this->$connect->prepare('INSERT INTO skill (name) values (:name)');
        $stmt->execute($param);
        $lastId = $this->$connect->lastInsertId();
        $stmt = $this->$connect->prepare("SELECT * FROM skill WHERE id = {$lastId}");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function selectAll(){
        $stmt = $this->$connect->prepare('SELECT * FROM skill');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function updateById($param, $id){
        $stmt = $this->$connect->prepare("UPDATE skill SET name = (:name) WHERE id = {$id}");
        return $stmt->execute($param);
    }

    function delete($id){
        $stmt = $this->$connect->prepare("DELETE FROM skill WHERE id = {$id}");
        return $stmt->execute($param);
    }
}
