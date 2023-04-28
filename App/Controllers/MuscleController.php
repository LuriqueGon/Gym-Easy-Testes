<?php

namespace App\Controllers;

use App\DAO\Muscle;
use App\Models\Message;
use IF\Controller\Action;

class MuscleController extends Action
{

    public function index()
    {
        if(isset($_GET['id']) && $_GET['id'] > 0) $this->view->muscle = Muscle::getMuscle($_GET['id']);
        else $this->view->muscle = array(
            'id_muscle' => '',
            'muscle' => ''
        );


        $this->view->title = "Muscle";
        $this->view->muscles = Muscle::getMuscles(2);
        $this->render('index');
    }

    public function create()
    {
        Muscle::setMuscle($_POST['muscle']);
        Message::setMessage('O musculo '. $_POST['muscle']. 'foi adicionado com sucesso', 'success', 'back');
    }

    public function delete()
    {
        Muscle::deleteMuscle($_GET['id']);
        Message::setMessage('O musculo de id '. $_GET['id']. 'foi Deletado com sucesso', 'success', 'back');
    }

    public function update()
    {
        Muscle::updateMuscle($_POST['id'], $_POST['muscle']);
        Message::setMessage('O musculo '. $_POST['muscle']. 'foi Editado com sucesso', 'success', '/muscles');
    }
}