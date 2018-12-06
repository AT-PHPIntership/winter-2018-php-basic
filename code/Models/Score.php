<?php
include 'Model.php';

class Score extends Model {
    private $userId;
    private $skillId;
    private $score;
    public function avgSore() {
        $stmt = $this->connectDb->prepare('SELECT a.username username, 
            AVG(b.score) as avg_score 
            FROM score b inner JOIN user a ON b.user_id = a.id 
            GROUP BY a.username');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function maxOfUser() {
        $stmt = $this->connectDb->prepare("SELECT a.username name,
            c.name skill, max(b.score) maxScore 
            FROM user a INNER JOIN score b ON a.id = b.user_id 
            INNER JOIN skill c ON b.skill_id = c.id 
            group by a.username, c.name 
            having maxScore = (SELECT max(b1.score) FROM user a1 
                INNER JOIN score b1 on a1.id = b1.user_id 
                INNER JOIN skill c1 ON b1.skill_id = c1.id 
                where a1.id = a.id 
                group by a1.id)");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function skiFavorite() {
        $stmt = $this->connectDb->prepare('SELECT b.name nameSkill, count(*) as skillFavorite
            from score a join skill b on a.skill_id = a.id
            group by nameSkill
            having skillFavorite = (select count(*) as skillFavorite
                        from score a
                        join skill b on a.skill_id = b.id
                        group by a.skill_id
                        order by skillFavorite desc limit 1
                        );');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function skillHasSecondPoint() {
        $stmt = $this->connectDb->prepare('SELECT sk.name skill, avg(s.score) avg_point, group_concat(u.username) user from user u
            inner join score s on u.id = s.user_id
            inner join skill sk on s.skill_id = sk.id
            where sk.id not in (select sk.id from user u 
                inner join score s on u.id = s.user_id
                inner join skill sk on s.skill_id = sk.id
                group by sk.id
                having avg(s.score) >= (select avg(s.score) avg_point from user u 
                    inner join score s on u.id = s.user_id
                    inner join skill sk on s.skill_id = sk.id
                    group by sk.id order by avg_point desc limit 1))
            group by sk.id
            having avg_point >= (select avg(s.score) avg_point from user u
                inner join score s on u.id = s.user_id
                inner join skill sk on s.skill_id = sk.id
                group by sk.id
                having avg_point < (select avg(s.score) avg_point from user u  
                    inner join score s on u.id = s.user_id
                    inner join skill sk on s.skill_id = sk.id
                    group by sk.id order by avg_point desc limit 1)
                    order by avg_point desc limit 1)');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }

}