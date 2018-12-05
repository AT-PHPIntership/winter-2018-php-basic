<?php
include 'Model.php';

class Skill extends Model
{
  private $name;

  public function selectAll(){
    $showAll = $this->connect->prepare('select id, name from skill');
    $showAll->execute();
    $result = $showAll-> fetchAll();
    // var_dump($result);
    return $result;
  }

  public function insert($param){

    $insertItem = $this->connect->prepare('insert into skill (name) VALUES (:name)');
    $insertItem->execute($param);
    $lastId = $this->connect->lastInsertId();
    $show = $this->connect->prepare('select id, name from skill where id = '.$lastId);
    $show->execute();
    $result = $show->fetchAll();
    return $result;    
  }

  public function updateById($param, $id) {

    $updateItem = $this->connect->prepare('update skill set name = :name where id='.$id);
    $result = $updateItem->execute($param);
    return $result;
  }

  public function delete($id) {

    $deleteItem = $this->connect->prepare('delete from skill where id ='.$id);
    $result = $deleteItem->execute($param);
    return $result;
  }

}