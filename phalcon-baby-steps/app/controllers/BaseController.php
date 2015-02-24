<?php


class BaseController extends \Phalcon\Mvc\Controller
{

	public function initialize()
	{
		$this->assets->addCss('css/normalize.css');
		$this->assets->addCss('css/mainLayout.css');
		$this->assets->addJs('js/jquery.min.js');

		// $this->view->setVar('function',__FUNCTION__);
		// $this->view->setVar('method',__METHOD__);
		// $this->view->setVar('class',__CLASS__);

	}

}

?>
