<?php
include_once '../Models/Score.php';
include_once 'BaseController.php';

use PHP\Controllers\BaseController;

class ScoreController extends BaseController
{
    function __construct()
    {
        $this->folder = 'score';
    }

    public function avgUser(){
        $score = new Score();
        $result = $score->avgUser();
        $this->render('avgUser', $result);
    }

    public function maxSkillOfUser(){
        $score = new Score();
        $result = $score->maxSkillOfUser();
        $this->render('maxSkillOfUser', $result);
    }

    public function skillFavorite(){
        $score = new Score();
        $result = $score->skillFavorite();
        $this->render('skillFavorite', $result);
    }

    public function skillHasSecondPoint(){
        $score = new Score();
        $result = $score->skillHasSecondPoint();
        $this->render('skillHasSecondPoint', $result);
    }

    public function error()
    {
        $this->render('error');
    }
}
$scoreController = new ScoreController();
$scoreController->redirectToAction($scoreController);