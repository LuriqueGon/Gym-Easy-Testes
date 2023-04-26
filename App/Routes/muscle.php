<?php

$routes['muscles'] = array(
    'route' => '/muscles',
    'method' => 'GET',
    'controller' => 'MuscleController',
    'action' => 'index'
);
$routes['muscleAdd'] = array(
    'route' => '/muscle/add',
    'method' => 'POST',
    'controller' => 'MuscleController',
    'action' => 'create'
);
$routes['muscleDelete'] = array(
    'route' => '/muscle/delete',
    'method' => 'GET',
    'controller' => 'MuscleController',
    'action' => 'delete'
);

$routes['muscleUpdate'] = array(
    'route' => '/muscle/update',
    'method' => 'POST',
    'controller' => 'MuscleController',
    'action' => 'update'
);


