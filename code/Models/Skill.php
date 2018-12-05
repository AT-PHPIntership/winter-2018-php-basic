<?php
include "Model.php";

class Skill extends Model
{
    private $name;


    public function insert($param)
    {
        try {
            $query = 'INSERT INTO skill
              (name) VALUES
              (:name)';
            $statement = $this->$db->prepare($query);
            $statement->execute($param);
            $lastId = $this->$db->lastInsertId();
            $statement = $this->$db->prepare("SELECT name from skill where id = {$lastId}");
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
            $query = 'SELECT * from skill';
            $statement = $this->$db->prepare($query);
            $statement->execute();
            $statement = $this->$db->prepare("SELECT * from skill");
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
    public function updateById($param, $id)
    {
        try {
            $query = "UPDATE skill
              SET name = :name WHERE id = $id";
            $statement = $this->$db->prepare($query);
            $statement->execute($param);
            $statement = $this->$db->prepare("SELECT * from skill where id = {$id}");
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
    public function delete($id)
    {
        try {
            $query = "DELETE FROM
              skill WHERE id = $id";
            $statement = $this->$db->prepare($query);
            $statement->execute(array($id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
}
