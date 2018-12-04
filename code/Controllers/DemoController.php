<?php
require('BaseController.php');

class DemoController extends PHP\Controllers\BaseController
{
    function __construct()
    {
        $this->folder = 'demo';
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
        // Call Models get data tại đây
        $data = ['data' => [1,2,3,4,5,6]];
        $this->render('show', $data);
    }

    public function error()
    {
        $this->render('error');
    }
}

$demoController = new DemoController();
$demoController->redirectToAction($demoController);
