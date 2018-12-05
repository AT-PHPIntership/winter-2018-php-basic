<?php 

include_once 'Model.php';

class Score extends Model
{
    private $userId;
    private $skillId;
    private $score;
    
    function avgUser(){
        $stmt = $this->$connect->prepare('SELECT user.name as user_name, AVG(score.score) score_avg, group_concat(skill.name) as group_skill_name FROM user JOIN score ON user.id = score.user_id LEFT JOIN skill ON score.skill_id = skill.id GROUP BY user.id');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function maxSkillOfUser(){
        $stmt = $this->$connect->prepare('SELECT u1.name user_name, skill.name as skill_name, MAX(score.score) sk_score FROM user u1 JOIN score ON u1.id = score.user_id LEFT JOIN skill ON score.skill_id = skill.id GROUP BY u1.id, skill.name HAVING sk_score >= (SELECT MAX(score.score) FROM user u2 JOIN score ON u2.id = score.user_id LEFT JOIN skill ON score.skill_id = skill.id WHERE u1.id = u2.id GROUP BY u2.id)');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function skillFavorite(){
        $stmt = $this->$connect->prepare('select skill.name skill_name, group_concat(user.name) group_user_name FROM user join score ON user.id = score.user_id LEFT JOIN  skill ON score.skill_id = skill.id GROUP BY skill.id LIMIT 1');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function skillHasSecondPoint(){
        $stmt = $this->$connect->prepare('select skill.name skill_name, AVG(score.score) avg_score, group_concat(user.name) group_user_name FROM user join score ON user.id = score.user_id LEFT JOIN  skill ON score.skill_id = skill.id GROUP BY skill.id ORDER BY avg_score DESC limit 1,1');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
