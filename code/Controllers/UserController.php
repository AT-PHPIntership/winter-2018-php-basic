<?php
include_once '../Models/User.php';
include_once 'BaseController.php';

use PHP\Controllers\BaseController;

class UserController extends BaseController
{
    function __construct()
    {
        $this->folder = 'user';
    }

    public function store(){
        $data = [
            'name' => 'Thanh Bui V',
            'year' => 1997,
            'gender' => 1,
            'score' => 9,
            'provice_id' => 1
        ];
        $user = new User();
        $result = $user->insert($data);
        
        $this->render('store', $result);
        // print_r($result);
    }

    public function index(){
        $user = new User();
        $result = $user->selectAll();
        $this->render('index', $result);
        // print_r($result);
    }

    public function error()
    {
        $this->render('error');
    }
}
$userController = new UserController();
$userController->redirectToAction($userController);