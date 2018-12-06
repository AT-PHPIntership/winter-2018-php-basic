<?php
include '../Models/Score.php';
include 'BaseController.php';

use PHP\Controllers\BaseController;

class ScoreController extends BaseController
{
    function __construct() {
        $this->folder = 'Score';
    }

  // Tính trung bình từng user rồi show ra view dạng table
    public function avgUser()
    {
        $user = new Score();
        $result = $user->avgUser();
        $this->render('avgTable', $result);
    }

  // Tìm max skill của từng user rồi show ra view dạng table
    public function maxSkillOfUser()
    {
        $user = new Score();
        $result = $user->maxScore();
        $this->render('maxTable', $result);
    }

    // Tìm và show ra skill có nhiều user tham gia nhất
    public function skillFavorite()
    {
        $user = new Score();
        $result = $user->maxUser();
        $this->render('skill_max_user', $result);
    }

    // Tìm skill có điểm trung bình cao thứ hai sau đó show skill name, avg point và user nào học skill đó ra view
    public function skillHasSecondPoint()
    {
        $user = new Score();
        $result = $user->max2_Score();
        $this->render('skill_max2_score', $result);
    }
}

$scoreController = new ScoreController();
$scoreController->redirectToAction($scoreController);
