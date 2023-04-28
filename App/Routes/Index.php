<?php

$routes['home'] = array(
    'route' => '/',
    'method' => 'GET',
    'controller' => 'IndexController',
    'action' => 'index'
);
$routes['alterarAtivo'] = array(
    'route' => '/alterarAtivo',
    'method' => 'POST',
    'controller' => 'IndexController',
    'action' => 'alterarAtivo'
);
