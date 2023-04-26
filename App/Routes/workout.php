<?php

$routes['workouts'] = array(
    'route' => '/workouts',
    'method' => 'GET',
    'controller' => 'workoutController',
    'action' => 'index'
);
$routes['workoutAdd'] = array(
    'route' => '/workout/add',
    'method' => 'POST',
    'controller' => 'WorkoutController',
    'action' => 'create'
);
$routes['workoutDelete'] = array(
    'route' => '/workout/delete',
    'method' => 'GET',
    'controller' => 'WorkoutController',
    'action' => 'delete'
);

$routes['workoutUpdate'] = array(
    'route' => '/workout/update',
    'method' => 'POST',
    'controller' => 'WorkoutController',
    'action' => 'update'
);


