<?php

try {

 (new \Phalcon\Debug)->listen();

/*****************************************************************/
    //Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(
        array(
            '../app/controllers/',
            '../app/models/'
        )
    )->register();

/*****************************************************************/


    //Create a DI
    $di = new Phalcon\DI\FactoryDefault();

/*==============================================================*/
    //Set the database service
    $di->set('db', function(){
        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => "localhost",
            "username" => "root",
            "password" => "bazinga",
            "dbname" => "learning-phalcon"
        ));
    });

/*==============================================================*/
    //Setting up the view component
    $di->set('view', function(){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');

        // // registar o template engine volt
        // $view->registerEngines(array(
        //     '.volt' => '\Phalcon\Mvc\View\Engine\Volt'
        // ));

        return $view;
    });

/*==============================================================*/
    //Router
    $di->set('router',function (){
        $router = new \Phalcon\Mvc\Router();
        $router->add('/superhero/', array(
            'controller' => 'router',
            'action' => 'jump'
        ));
        $router->add('/supernerd/', array(
            'controller' => 'router',
            'action' => 'fly'
        ));
        return $router;
    });

/*==============================================================*/
    // Session
    $di->setShared('session', function(){
        $session = new \Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
    });

/*==============================================================*/
    //Setup a base URI so that all generated URIs include the "tutorial" folder
    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/phalcon-udemy-course/');
        return $url;
    });

/*****************************************************************/

    //Handle the request
    $application = new \Phalcon\Mvc\Application($di);
/*
    // forma opcional se $di não for passado como argumento
    $application = new \Phalcon\Mvc\Application();
    $application->setDI($di); // optional
*/
    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}
