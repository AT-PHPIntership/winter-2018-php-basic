<?php
require('BaseController.php');
require('../Models/User.php');

class UserController extends PHP\Controllers\BaseController
{
    function __construct()
    {
        $this->folder = 'user';
    }

    function store() {
        $param = [
            'username' => 'Thanh',
            'gender' => 0,
            'provinceId' => 1
        ];
        $show = new User();
        $result = $show->insert($param);
        $this->render('index', $result);
    }
    public function index()
    {
        $data = [
            'name' => 'PHP',
            'age' => 22,
        ];
        $this->render('index', $data);
    }

    public function show()
    {
        $user = new User();
        $result = $user->selectAll();
        $this->render('show', ['data' => $result]);
    }

    public function error()
    {
        $this->render('error');
    }
}

$userController = new UserController();
$userController->redirectToAction($userController);
