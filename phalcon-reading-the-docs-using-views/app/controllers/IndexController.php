<?php

class IndexController extends ControllerBase
{

	// é possível desabilitar os vários níveis existentes
	// na renderização das views
	// http://docs.phalconphp.com/en/latest/reference/views.html

    public function indexAction()
    {
	    // coloca o template que está na pasta layout
		$this->view->setTemplateAfter("template_common");
		//$this->view->setTemplateBefore("template_common");
    }

	public function helloAction()
	{
		//TRANSFER VALUES FROM THE CONTROLLER TO VIEWS

		//Pass all the posts to the views
		$this->view->setVar("medicos", Medicos::find());
		// ou usando o mágico setter
		$this->view->acordos = Acordos::find();
		//Passing more than one variable at the same time
		$this->view->setVars(array(
			'series_title' => "The Big Bang Theory",
			'actor' => "Sheldon Cooper"
		));
	}

	public function pickAction()
	{
		// the view default render is the one related with the last controller
		// and action executed.
		// But we can override this by using the Phalcon\Mvc\View::pick()
		// method:
		$this->view->pick("index/another_view");

		// reparo que por estar a usar o método acima, não me dei ao trabalho
		// de criar uma view com o mesmo nome que esta action

		// para mais informação - de como referenciar a view a ser renderizada
		// http://docs.phalconphp.com/en/latest/reference/views.html#picking-views
	}

	public function goodbyeAction()
	{
		//		DISABLING THE VIEW
		//If the controller doesn’t produce any output in the view
		// (or not even have one) we may disable the view component
		// avoiding unnecessary processing:

		//----------------------DESTA FORMA:-----------------------
		//An HTTP Redirect
		$this->response->redirect('index/index');
		//Disable the view to avoid rendering
		$this->view->disable();

		//----------------OU DESTA FORMA:--------------------------
		// You can return a ‘response’ object to avoid disable the view manually:
		return $this->response->redirect("index/index");
	}

}

