<?php

$router = new Phalcon\Mvc\Router();
/**
 * /blog/1990/08/my-birthday
 */
$router->add('/blog/{year}/{month}/{title}', array(
	'controller' => 'index',
	'action'     => 'show'
))->setName('show-post');

