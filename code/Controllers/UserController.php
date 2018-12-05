<?php
require('../Models/User.php');
require('BaseController.php');

use PHP\Controllers\BaseController;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'user';
    }
    public function store()
    {
        $data = [
            'username' => 'Thanh',
            'gender' => 'female',
            'provinceId' => 1
        ];
        $user = new User();
        $result = $user->insert($data);
        $this->render('store', $result);
    }
    public function index()
    {
        $user = new User();
        $result = $user->selectAll();
        $this->render('index', $result);
    }
}
$userController = new UserController();
$userController->redirectToAction($userController);
