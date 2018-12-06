<?php
include 'Model.php';

class User extends Model
{
    private $username;
    private $gender;
    private $provinceId;

    public function selectAll()
    {
        $showAll = $this->connect->prepare('select id, name, gender, year, provice_id, point from user');
        $showAll->execute();
        $result = $showAll->fetchAll();
        return $result;
    }

    public function insert($param)
    {
        $insertItem = $this->connect->prepare('insert into user (name, gender, year, provice_id, point)
            VALUES (:name, :gender, :year, :provice_id, :point)');
        $insertItem->execute($param);
        $lastId = $this->connect->lastInsertId();

        $show = $this->connect->prepare('select id, name, gender, year, provice_id, point from user
            where id = '.$lastId);
        $show->execute();
        $result = $show->fetchAll();
        return $result;
    }
}
