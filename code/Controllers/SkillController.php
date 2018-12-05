<?php
require('BaseController.php');
require('../Models/Skill.php');

class SkillController extends PHP\Controllers\BaseController
{
    function __construct()
    {
        $this->folder = 'skill';
    }

    public function store() {
        $param = ['name' => 'IOS'];
        $skill = new Skill();
        $result = $skill->insert($param);
        $this->render('insert', ['data' => $result]);
    }

    

    public function index()
    {
        $skill = new SkilL();
        $result = $skill->showAll();
        $this->render('show', ['data' => $result]);
    }
    
    public function update() {
        $param = ['name' => 'TF'];
        $id = 1;
        $skill = new Skill();
        $result = $skill->updateById($param, $id);
        $this->render('update', ['data' => $result]);
    }

    public function delete() {
        $id = 5;
        $skill = new Skill();
        $result = $skill->delete($id);
        $this->render('delete', ['data' => $result]);
    }

    public function error()
    {
        $this->render('error');
    }
}

$skillController = new SkillController();
$skillController->redirectToAction($skillController);
