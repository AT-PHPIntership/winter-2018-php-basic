<?php
require('../Models/Score.php');
require('BaseController.php');
class ScoreController extends PHP\Controllers\BaseController {
    function __construct()
    {
        $this->folder = 'Score';
    }
    public function avgUser() {
        $score = new Score();
        $result = $score->avgUser();
        $this->render('avgUser', $result);
        // print_r($result);
    }
    public function maxSkillOfUser() {
        $score = new Score();
        $result = $score->maxSkillOfUser();
        $this->render('maxSkillOfUser', $result);
        // print_r($result);
    }
    public function skillFavorite() {
        $score = new Score();
        $result = $score->skillFavorite();
        $this->render('skillFavorite', $result);
        // print_r($result);
    }
    public function skillHasSecondPoint() {
        $score = new Score();
        $result = $score->skillHasSecondPoint();
        $this->render('skillHasSecondPoint', $result);
        // print_r($result);
    }
    
}
$ScoreController = new ScoreController();
$ScoreController->redirectToAction($ScoreController);