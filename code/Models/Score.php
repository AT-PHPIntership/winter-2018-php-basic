<?php 

include_once 'Model.php';

class Score extends Model
{
    private $userId;
    private $skillId;
    private $score;

    public function avg() {

        $sql = "SELECT u.name name,avg(s.score) avg_point, group_concat(k.name) skill 
        FROM user u JOIN score s on u.id = s.user_id 
        LEFT JOIN skill k on s.skill_id = k.id 
        GROUP BY u.id";

        $sql = $this->$connect->prepare($sql);

        $sql->execute();

        $result = $sql->fetchAll();

        return $result;
    }

    public function maxSkill() {

        $sql = "SELECT u1.id id, u1.name name, k1.name skill, max(s1.score) point 
        FROM user u1 LEFT JOIN score s1 ON u1.id = s1.user_id 
        LEFT JOIN skill k1 ON s1.skill_id = k1.id 
        group by u1.id, k1.name 
        having point >= (SELECT max(s.score) FROM user u 
            INNER JOIN score s on u.id = s.user_id 
            LEFT JOIN skill k ON s.skill_id = k.id 
            where u.id = u1.id 
            group by u.id)";

        $sql = $this->$connect->prepare($sql);

        $sql->execute();

        $result = $sql->fetchAll();

        return $result;
    }

    public function skillFavorite() {

        $sql = "SELECT k.name skill, count(*) total1 
        from user u left join score s on u.id = s.user_id
        left join skill k on s.skill_id = k.id
        group by k.name
        having total1 >= (select count(*) total from user u 
            left join score s on u.id = s.user_id 
            left join skill k on s.skill_id = k.id
            group by k.id order by total desc limit 1)";

        $sql = $this->$connect->prepare($sql);

        $sql->execute();

        $result = $sql->fetchAll();

        return $result;
    }

    public function skillHasSecondPOint() {
        $sql = "SELECT sk.id id, sk.name skill, avg(s.score) avg_point, group_concat(u.name) user from user u
            join score s on u.id = s.user_id
            left join skill sk on s.skill_id = sk.id
            where sk.id not in (select sk.id from user u 
                join score s on u.id = s.user_id
                left join skill sk on s.skill_id = sk.id
                group by sk.id
                having avg(s.score) >= (select avg(s.score) avg_point from user u 
                    join score s on u.id = s.user_id
                    left join skill sk on s.skill_id = sk.id
                    group by sk.id order by avg_point desc limit 1))
            group by sk.id
            having avg_point >= (select avg(s.score) avg_point from user u
                join score s on u.id = s.user_id
                left join skill sk on s.skill_id = sk.id
                group by sk.id
                having avg_point < (select avg(s.score) avg_point from user u   #
                    join score s on u.id = s.user_id
                    left join skill sk on s.skill_id = sk.id
                    group by sk.id order by avg_point desc limit 1)
                    order by avg_point desc limit 1)";

        $sql = $this->$connect->prepare($sql);

        $sql->execute();

        $result = $sql->fetchAll();

        return $result;
    }
}
