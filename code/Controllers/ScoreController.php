<?php
require('../Models/Score.php');
require('BaseController.php');

use PHP\Controllers\BaseController;

class ScoreController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'score';
    }
    public function avgUser()
    {
        $score = new Score();
        $result = $score->avg(array(''));
        $this->render('avg', $result);
    }
    public function maxSkillOfUser()
    {
        $score = new Score();
        $result = $score->maxSkillOfUser(array(''));
        $this->render('max', $result);
    }
    public function skillFavorite()
    {
        $score = new Score();
        $result = $score->skillFavorite(array(''));
        $this->render('favorite', $result);
    }
    public function skillHasSecondPoint()
    {
        $score = new Score();
        $result = $score->skillHasSecondPoint(array(''));
        $this->render('secondPoint', $result);
    } 
}
$scoreController = new ScoreController();
$scoreController->redirectToAction($scoreController);
