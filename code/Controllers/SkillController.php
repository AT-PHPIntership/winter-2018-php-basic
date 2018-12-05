<?php
require('../Models/Skill.php');
require('BaseController.php');

use PHP\Controllers\BaseController;

class SkillController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'skill';
    }
    public function store()
    {
        $data = [
            'name' => 'PHP'
        ];
        $skill = new Skill();
        $result = $skill->insert($data);
        $this->render('index', $result);
    }
    public function index()
    {
        $skill = new Skill();
        $result = $skill->selectAll();
        $this->render('index', $result);
    }
    public function update()
    {
        $id = 2;   
        $data = [
            'name' => 'MySQL'
        ];
        $skill = new Skill();
        $result = $skill->updateById($data, $id);
        $this->render('index', $result);
    }
    public function delete()
    {
        $id = 2;   
        $skill = new Skill();
        $result = $skill->delete($id);
        echo "Delete skill successfull!";
    }
}
$skillController = new SkillController();
$skillController->redirectToAction($skillController);
