<?php 

include_once '../Models/Skill.php';
include_once 'BaseController.php';

class SkillController extends PHP\Controllers\BaseController
{
    
    function __construct()
    {
        $this->folder = 'skill';
    }

    public function store() {
        $param = [
            'name' => 'PHP',
        ];
        $show = new Skill();
        $result = $show->insert($param);
        $this->render('store', $result);
    }

    public function index() {
        $show = new Skill();
        $result = $show->selectAll();
        $this->render('index', $result);
    }

    public function update() {
        $param = [
            'name' => 'Ruby'
        ];
        $id = 22;
        $show = new Skill();
        $result = $show->updateById($param, $id);
        print_r($result);
    }

    public function delete() {
        $id = 20;
        $show = new Skill();
        $result = $show->delete($id);
        print_r($result);
    }

    public function error()
    {
        $this->render('error');
    }
}

$skillController = new SkillController();
$skillController->redirectToAction($skillController);
