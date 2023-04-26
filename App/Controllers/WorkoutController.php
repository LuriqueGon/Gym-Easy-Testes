<?php

namespace App\Controllers;

use App\DAO\Muscle;
use App\DAO\Workout;
use App\Models\Message;
use IF\Controller\Action;

class WorkoutController extends Action
{

    public function index()
    {
        $this->view->title = "Workout";
        $this->view->muscles = Muscle::getMuscles();
        $this->view->workouts = Workout::getWorkoutsMainMuscles();

        $this->render('index');
    }

    public function create()
    {
        foreach ($_POST['auxMuscles'] as $key => $aux) {
            if($aux == $_POST['mainMuscle']) unset($_POST['auxMuscles'][$key]);
        }

        Workout::setWorkout($_POST['workout']);
        $idWorkout = Workout::getWorkoutByName($_POST['workout'])['id_workout'];
        Workout::setMuscleWorkout($_POST['mainMuscle'],$idWorkout,true);

        foreach ($_POST['auxMuscles'] as $aux) Workout::setMuscleWorkout($aux,$idWorkout,false);
        Message::setMessage('O Exercicio '. $_POST['workout']. 'foi adicionado com sucesso', 'success', 'back');
    }
}