<?php
require('../Models/Skill.php');
require('BaseController.php');
class SkillController extends PHP\Controllers\BaseController {
    function __construct()
    {
        $this->folder = 'Skill';
    }
    public function store() {
        $param = [
            'name' => 'FullStack',
        ];
        $skill = new Skill();
        $result = $skill->insert($param);
        $this->render('store', $result);
        // print_r($result);
    }
    public function index()
    {
        $skill = new Skill();
        $result = $skill->selectAll();
        $this->render('index', $result);
    }
    public function update()
    {
        $param = [
            'skill_name' => 'Java',
        ];
        $id = 90;
        $skill = new Skill();
        $result = $skill->updateById($param, $id);
        print_r($result);
    }
    public function delete()
    {
        $id = 7;
        $skill = new Skill();
        $result = $skill->delete($id);
        print_r($result);
    }
}
$SkillController = new SkillController();
$SkillController->redirectToAction($SkillController);