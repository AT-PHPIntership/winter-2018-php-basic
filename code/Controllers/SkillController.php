<?php
include_once '../Models/Skill.php';
include_once 'BaseController.php';

use PHP\Controllers\BaseController;

class SkillController extends BaseController
{
    function __construct()
    {
        $this->folder = 'skill';
    }

    public function store(){
        $data = [
            'name' => 'Angular'
        ];
        $skill = new Skill();
        $result = $skill->insert($data);
        $this->render('store', $result);
    }

    public function index(){
        $skill = new Skill();
        $result = $skill->selectAll();
        $this->render('index', $result);
    }

    public function update(){
        $id = 7;
        $data = [
            'name' => 'React'
        ];
        $skill = new Skill();
        $result = $skill->updateById($data, $id);
        return $result;
    }

    public function delete(){
        $id = 7;
        $skill = new Skill();
        $result = $skill->delete($id);
        return $result;
    }

    public function error()
    {
        $this->render('error');
    }
}
$skillController = new SkillController();
$skillController->redirectToAction($skillController);
