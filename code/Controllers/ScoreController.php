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
        var_dump($result);
        $this->render('avg', ['data' => $result]);
    }
    public function maxSkillOfUser()
    {   
        $score = new Score();
        $result = $score->maxSkillOfUser();
        $this->render('maxSkillOfUser', $result);
        
        
    }

    public function skillFavorite()
    {
        $score = new Score();
        $result = $score->skiFavorite();
        $this->render('skillFavorite', ['data' => $result]);
    }
    function skillHasSecondPoint() {
        
    }

    public function error()
    {
        $this->render('error');
    }
}

$scoreController = new ScoreController();
$scoreController->redirectToAction($scoreController);
