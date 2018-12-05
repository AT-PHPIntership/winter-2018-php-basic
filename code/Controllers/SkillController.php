<?php
include '../Models/Skill.php';
include 'BaseController.php';

use PHP\Controllers\BaseController;

class SkillController extends BaseController
{
  function __construct() {
      $this->folder = 'Skill';
  }

  public function index() {
    $skill = new Skill();
    $result = $skill->selectAll();
    $this->render('index', $result);
  }

  public function store() {
    $skill = new Skill();
    $param = [
      'name' => 'Test Insert Skill'
    ];
    $result = $skill->insert($param);
    // print_r($result);
    $this->render('insert', $result);
  }

  public function update() {
    $skill = new Skill();
    $param = [
      'name' => 'PHP'
    ];
    $id = 1;
    $result = $skill->updateById($param, $id);
    $this->render('update', $result);  
    
  }

  public function delete()
  {
    $skill = new Skill();
    $id = 41;
    $result = $skill->delete($id);
    $this->render('delete', $result);  
  }

}

$skillController = new SkillController();
$skillController->redirectToAction($skillController);
