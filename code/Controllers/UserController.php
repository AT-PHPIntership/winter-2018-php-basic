<?php 

include_once '../Models/User.php';
include_once 'BaseController.php';

class UserController extends PHP\Controllers\BaseController
{

    function __construct()
    {
        $this->folder = 'user';
    }

    public function store() {
        $param = [
            'name' => 'PhuongTran',
            'gender' => 0,
            'year' => 2018,
            'provice_id' => 1
        ];
        $show = new User();
        $result = $show->insert($param);
        $this->render('store', $result);
    }

    public function index() {
        $show = new User();
        $result1 = $show->selectAll();
        $this->render('index', $result1);
    }

    public function error()
    {
        $this->render('error');
    }
}

$userController = new UserController();
$userController->redirectToAction($userController);
