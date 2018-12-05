<?php
include 'Model.php';

class Score extends Model
{
  private $userId;
  private $skillId;
  private $score;

  public function avgUser()
  {
    $sql = 'select user.name as name, group_concat(skill.name) as skills, avg(score.score) as avg_user
            from user
            inner join score 
            on user.id = score.user_id
            inner join skill
            on  skill.id= score.skill_id
            group by score.user_id;';
    $avg_users = $this->connect->prepare($sql);
    $avg_users->execute();
    $result = $avg_users->fetchAll();
    return $result;    
  }

  public function maxScore()
  {
    $sql = 'select u.name user_name, sk.name skill_name, sc.score avg_user
            from score sc
            inner join (select user_id, max(score) as max 
                  from score
                  group by user_id) s 
            on  sc.user_id = s. user_id and s.max = sc.score
            inner join user u
            on u.id = sc.user_id
            inner join skill sk
            on sk.id = sc.skill_id';
    $max_score = $this->connect->prepare($sql);
    $max_score->execute();
    $result = $max_score->fetchAll();
    return $result;    
  }

  public function maxUser()
  {
    $sql = 'select sk.name, count(sc.user_id) as number_users
            from score sc
            inner join skill sk
            on sc.skill_id = sk.id
            group by sc.skill_id
            having number_users = (
              select count(user_id)
              from score
              group by skill_id
              limit 1
            )';
    $max_users = $this->connect->prepare($sql);
    $max_users->execute();
    $result = $max_users->fetchAll();
    return $result;    
  }

  public function max2_Score()
  {
    $sql = 'select sk.name as skill, group_concat(u.name) as users, avg(sc.score) as avg_score
            from score sc
            inner join user u
            on u.id = sc.user_id
            inner join skill sk
            on  sk.id= sc.skill_id
            group by sc.skill_id
            having avg_score = ( 
                 select avg(score) avg_score
                 from score
                group by skill_id
                having avg_score < (
                  select avg(score) avg_score
                  from score
                  group by skill_id
                  order by avg_score desc
                  limit 1
                  )
                limit 1
                )';
    $max2_score = $this->connect->prepare($sql);
    $max2_score->execute();
    $result = $max2_score->fetchAll();
    return $result;    
  }
}