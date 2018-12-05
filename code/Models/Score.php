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

    }
    public function skiFavorite() {
        $stmt = $this->connectDb->prepare('
            select b.name nameSkill, count(*) as skillFavorite
            from score a
            join skill b on a.skill_id = a.id
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


    }

}