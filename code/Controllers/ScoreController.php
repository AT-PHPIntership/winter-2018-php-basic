<?php
include_once 'BaseController.php';
require('../Models/Score.php');


class ScoreController extends PHP\Controllers\BaseController
{
    function __construct()
    {
        $this->folder = 'score';
    }

    function avgUser() {
        $score = new Score();
        $result = $score->avgSore();
        $this->render('avg', ['data' => $result]);
    }
    public function maxSkillOfUser()
    {   
        $score = new Score();
        $result = $score->maxOfUser();
        $this->render('maxSkillOfUser', $result);
        
        
    }

    public function skillFavorite()
    {
        $score = new Score();
        $result = $score->skiFavorite();
        $this->render('skillFavorite', ['data' => $result]);
    }
    function skillHasSecondPoint() {
        $score = new Score();
        $result = $score->skillHasSecondPoint();
        $this->render('skillHasSecondPoint', ['data' => $result]);
    }

    public function error()
    {
        $this->render('error');
    }
}

$scoreController = new ScoreController();
$scoreController->redirectToAction($scoreController);
