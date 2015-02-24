<?php


class RouterController extends BaseController
{

	public function initialize()
	{
		// faz com que o main layout deste controller seja - /layouts/urlparams.phtml
		// NOTA: tem de ser necessariamente uma pasta chamada "layouts" e o ficheiro phtml
		// tem de ter o nome do controller
		$this->view->setMainView("layouts/router.phtml");
	}

	public function indexAction()
	{

	}

	public function jumpAction()
	{

	}

	public function flyAction()
	{

	}
}

?>
