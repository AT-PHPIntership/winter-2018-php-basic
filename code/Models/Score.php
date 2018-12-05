<?php
include_once 'Model.php';
class Score extends Model {
    private $userId;
    private $skillId;
    private $score;
    public function avgUser() {
        $stmt = $this->connect->prepare('SELECT user.user_id, user.user_name, ROUND(AVG(score),2) as avg_score FROM score JOIN user ON score.user_id=user.user_id GROUP BY score.user_id');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function maxSkillOfUser() {
        $stmt = $this->connect->prepare('
            select user.user_name, skill.skill_name, sub_max_score.max_score
            from score
            join (
                select score.user_id, MAX(score) as max_score
                from score
                group by user_id
            ) as sub_max_score on score.user_id = sub_max_score.user_id AND score.score = sub_max_score.max_score
            join skill on score.skill_id = skill.skill_id
            join user on score.user_id = user.user_id');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function skillFavorite() {
        $stmt = $this->connect->prepare('
            select skill.skill_name, count(*) as skill_num
            from score
            join skill on score.skill_id = skill.skill_id
            group by score.skill_id
            having skill_num = (select count(*) as skill_num
                        from score
                        join skill on score.skill_id = skill.skill_id
                        group by score.skill_id
                        order by skill_num desc limit 1
                        );');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function skillHasSecondPoint() {
        $stmt = $this->connect->prepare('
            select skill.skill_name, avg(score) as avg_skill_score, group_concat(user.user_name) as group_user_name
            from score
            join skill on score.skill_id = skill.skill_id
            join user on score.user_id = user.user_id
            group by score.skill_id
            having avg_skill_score = (
                select avg(score) as avg_skill_score
                from score
                group by score.skill_id
                order by avg_skill_score desc limit 1,1
        )');
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}