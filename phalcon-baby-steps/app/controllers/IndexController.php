<?php


class IndexController extends BaseController
{

	public function indexAction()
	{
	}

	public function startSessionAction()
	{
		$this->session->set('user', array(
			'name' => 'Catarina Teodoro',
			'age' => '20'
		));

		$this->session->set('name','Ricardo');
	}

	public function getSessionAction()
	{
		echo $this->session->get('name');
		echo "<br />";
		print_r($this->session->get('user'));
	}

	public function removeSessionAction()
	{
		// $this->session->remove('user');
		$this->session->remove('name');
	}

	public function destroySessionAction()
	{
		$this->session->destroy();
	}
}

?>
