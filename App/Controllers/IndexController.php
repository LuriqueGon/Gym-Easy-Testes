<?php

namespace App\Controllers;

use App\DAO\Muscle;
use App\DAO\Workout;
use IF\Controller\Action;

class IndexController extends Action
{

    public function index()
    {
        $this->view->title = "Home";
        $this->render('index');
    }

    public function alterarAtivo()
    {

        switch ($_POST['item']) {
            case 'muscle':
                Muscle::alterarAtivo($_POST['idItem'], $_POST['ativo']);
                return $_POST['ativo'];
                break;
            case 'workout':
                Workout::alterarAtivo($_POST['idItem'], $_POST['ativo']);
                return $_POST['ativo'];
                break;
            
            default:
                # code...
                break;
        }
        
    }
}