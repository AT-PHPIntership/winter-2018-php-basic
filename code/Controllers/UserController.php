<?php
require('../Models/User.php');
require('BaseController.php');
class UserController extends PHP\Controllers\BaseController {
    function __construct()
    {
        $this->folder = 'User';
    }
    public function store() {
        $param = [
            'name' => 'Phan Thi Hong Nhung',
            'gender' => 1,
            'provinceId' => 1,
        ];
        $user = new User();
        $result = $user->insert($param);
        $this->render('store', $result);
        // print_r($result);
    }
    public function index()
    {
        $user = new User();
        $result = $user->selectAll();
        $this->render('index', $result);
    }
}
$UserController = new UserController();
$UserController->redirectToAction($UserController);