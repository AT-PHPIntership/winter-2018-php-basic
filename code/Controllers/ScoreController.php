<?php 

include_once '../Models/Score.php';
include_once 'BaseController.php';

class ScoreController extends PHP\Controllers\BaseController
{
    function __construct()
    {
        $this->folder = 'score';
    }

    public function avgUser() {
        $show = new Score();
        $result = $show->avg();
        $this->render('avgUser', $result);
    }

    public function maxSkillOfUser() {
        $show = new Score();
        $result = $show->maxSkill();
        $this->render('maxSkillOfUser', $result);
    }

    public function skillFavorite() {
        $show = new Score();
        $result = $show->skillFavorite();
        $this->render('skillFavorite', $result);
    }

    public function skillHasSecondPoint() {
        $show = new Score();
        $result = $show->skillHasSecondPoint();
        $this->render('skillHasSecondPoint', $result);
    }

    public function error()
    {
        $this->render('error');
    }
}
$scoreController = new ScoreController();
$scoreController->redirectToAction($scoreController);
