<?php
include "Model.php";

class Score extends Model
{
    private $userId;
    private $skillId;
    private $score;


    public function avg()
    {
        try {
            $query = 'SELECT AVG(score.score) as avg, user.name as user_name 
                      FROM user INNER JOIN score ON user.id = score.user_id GROUP BY user.id';
            $statement = $this->$db->prepare($query);
            $statement->execute(array(''));
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
    public function maxSkillOfUser()
    {
        try {
            $query = 'SELECT skill.name as skill_name, user.name as user_name, score.score as max 
                    FROM score INNER JOIN user ON score.user_id = user.id 
                    INNER JOIN skill ON score.skill_id = skill.id 
                    INNER JOIN (SELECT user_id, MAX(score) as max_score FROM score GROUP BY user_id) topscore
                    ON score.user_id = topscore.user_id AND score.score = topscore.max_score';
            $statement = $this->$db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
    public function skillFavorite()
    {
        try {
            $query = 'SELECT skill.name as skill_name, group_concat(user.name) as user_group 
                    FROM user INNER JOIN score ON user.id = score.user_id 
                    LEFT JOIN  skill ON score.skill_id = skill.id GROUP BY skill.id 
                    HAVING count(*) = (SELECT count(*) as count FROM user INNER JOIN score ON user.id = score.user_id 
                    LEFT JOIN  skill ON score.skill_id = skill.id GROUP BY skill.id ORDER BY count DESC LIMIT 1)';
            $statement = $this->$db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
    public function skillHasSecondPoint()
    {
        try {
            $query = 'SELECT skill.name as skil_name, AVG(score) as avg, GROUP_CONCAT(user.name) as group_user
            FROM score INNER JOIN skill ON score.skill_id = skill.id
            INNER JOIN user ON score.user_id = user.id GROUP BY score.skill_id
            HAVING avg = ( SELECT AVG(score) as avg_score FROM score
                            GROUP BY score.skill_id
                            ORDER BY avg_score DESC LIMIT 1,1 )';
            $statement = $this->$db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
}
