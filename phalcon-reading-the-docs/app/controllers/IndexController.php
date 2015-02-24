<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$this->persistent->name = "Michael";
    }

    /**
     * action que ilustra a receção de parametros passados
     * na URI
     *
     * Estes são obrigatórios caso não sejam definidos valores default
     *
     * http://localhost:8080/phalcon-reading-the-docs/index/show/2015/hello
     */
    public function showAction($year = 2015, $title = "Hello World")
    {
    	echo $year . " " . $title;
        echo " Welcome, ", $this->persistent->name;

    }

    /**
     * dispatcher->forward redirects the flow of the app
     */
    public function otherAction()
    {
        $this->flash->error("You don't have permission to access this area");

        // Forward flow to another action
        $this->dispatcher->forward(array(
            "controller" => "index",
            "action" => "show"
        ));
    }

}

