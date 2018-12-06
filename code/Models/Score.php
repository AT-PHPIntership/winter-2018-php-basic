<?php 

include_once 'Model.php';

class Score extends Model
{
    private $userId;
    private $skillId;
    private $score;
    
    function avgUser(){
        $stmt = $this->$connect->prepare('SELECT user.name as user_name, AVG(score.score) score_avg, group_concat(skill.name) as group_skill_name 
        FROM user JOIN score ON user.id = score.user_id LEFT JOIN skill ON score.skill_id = skill.id GROUP BY user.id');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function maxSkillOfUser(){
        $stmt = $this->$connect->prepare('SELECT u1.name user_name, skill.name as skill_name, MAX(score.score) sk_score 
        FROM user u1 JOIN score ON u1.id = score.user_id LEFT JOIN skill ON score.skill_id = skill.id 
        GROUP BY u1.id, skill.name HAVING sk_score >= (SELECT MAX(score.score) FROM user u2 JOIN score ON u2.id = score.user_id LEFT JOIN skill ON score.skill_id = skill.id WHERE u1.id = u2.id GROUP BY u2.id)');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function skillFavorite(){
        $stmt = $this->$connect->prepare('select skill.name skill_name, group_concat(user.name) group_user_name 
        FROM user join score ON user.id = score.user_id LEFT JOIN  skill ON score.skill_id = skill.id 
        GROUP BY skill.id HAVING count(*) = (select count(*) as c FROM user join score ON user.id = score.user_id LEFT JOIN  skill ON score.skill_id = skill.id 
        GROUP BY skill.id ORDER BY c DESC LIMIT 1)');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function skillHasSecondPoint(){
        $stmt = $this->$connect->prepare('select sk.name skill_name, AVG(s.score) avg_score, group_concat(u.name) group_user_name 
        FROM user u join score s ON u.id = s.user_id LEFT JOIN  skill sk ON s.skill_id = sk.id 
        GROUP BY sk.id 
        HAVING avg_score = (select AVG(s2.score) avg_score_2 
            FROM user u2 
            join score s2 ON u2.id = s2.user_id 
            LEFT JOIN  skill sk2 ON s2.skill_id = sk2.id 
            GROUP BY sk2.id 
                HAVING avg_score_2 < (select AVG(s3.score) avg_score_3 
                FROM user u3 
                join score s3 ON u3.id = s3.user_id 
                LEFT JOIN  skill sk3 ON s3.skill_id = sk3.id 
                GROUP BY sk3.id 
                ORDER BY avg_score_3 DESC 
                LIMIT 1)
            ORDER BY avg_score_2 DESC 
            LIMIT 1)');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
