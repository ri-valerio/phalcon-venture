<?php


class UrlParamsController extends BaseController
{

	public function initialize()
	{
		// faz com que o main layout deste controller seja - /layouts/urlparams.phtml
		// NOTA: tem de ser necessariamente uma pasta chamada "layouts" e o ficheiro phtml
		// tem de ter o nome do controller
		$this->view->setMainView("layouts/urlparams.phtml");
	}

	public function indexAction()
	{

	}

	// http://localhost:8080/PhalconTorrentUdemy/controller/action/<param1>/<param2>
	// http://localhost:8080/PhalconTorrentUdemy/urlparams/process/Ricardo/23
	// nota: se fossem passados mais params n aconteceria nada...
	public function processAction($username = null, $age = null, $color = null)
	{
		if (isset( $username, $age, $color) && !empty($color) ) {
			$this->view->setVar("bazinga", $username);
			$this->view->setVar("idade", $age);
			$this->view->setVar("cor", $color);
		}

		// prevent the view from being loaded!
		// $this->view->disable();

		// prevent the urlparams layout from being loaded
		// $this->view->disableLevel(\Phalcon\Mvc\View::LEVEL_LAYOUT);

	}

	/*

		public function processAction($username = null, $age = null)
		{
			if (isset($username) && isset($age) ) {
				$this->view->setVar("bazinga", $username);
				$this->view->setVar("idade", $age);
			}

				// é chamado dps de tudo o que está nesta action ser executado..

				$this->dispatcher->forward(array(
					"controller" => "urlparams",
					"action" => "test"
				));

				echo "echo AFTER the forward dispatcher's call <br> ";

		}

		public function testAction()
		{
			echo " -- TEST ACTION -- <br> ";
		}
	*/


}
?>
