<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
	    return $this->response->redirect("noticia");
	    /**
	     * Não é necessário porque foi retornado
	     */
//	    $this->view->disable();
    }

}

