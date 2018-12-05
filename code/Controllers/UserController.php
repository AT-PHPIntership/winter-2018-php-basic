<?php
include '../Models/User.php';
include 'BaseController.php';

use PHP\Controllers\BaseController;

class UserController extends BaseController
{
  function __construct() {
      $this->folder = 'User';
  }

  public function index() {
    $user = new User();
    $result = $user->index();
    $this->render('index', $result);
  }

  public function store() {
    $user = new User();
    $param = [
      'name' => 'Test Insert',
      'gender' => 1,
      'year'=> 1997,
      'provice_id'=> 1,
      'point' => 9
    ];
    $result = $user->insert($param);
    // print_r($result);
    $this->render('insert', $result);
  }
}

$userController = new UserController();
$userController->redirectToAction($userController);
