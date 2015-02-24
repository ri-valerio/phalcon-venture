<?php

$router = new Phalcon\Mvc\Router();

$router->add("/tag/:params", array(

    'controller' => 'tag',
    'action'     => 'index',
    'params'     => 1

));

$router->add("/create", array(

    'controller' => 'battle',
    'action'     => 'index'
));

$router->add("/fight/:params", array(

    'controller' => 'battle',
    'action'     => 'fight',
    "params"	 => 1
));
