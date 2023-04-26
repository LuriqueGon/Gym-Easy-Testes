<?php

namespace App\Controllers;

use IF\Controller\Action;

class IndexController extends Action
{

    public function index()
    {
        $this->view->title = "Home";
        $this->render('index');
    }
}