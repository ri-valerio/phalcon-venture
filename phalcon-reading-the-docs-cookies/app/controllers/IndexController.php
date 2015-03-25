<?php

class IndexController extends ControllerBase
{

	protected $value_of_cookie = null;
	
    public function indexAction()
    {
	    //Check if the cookie has previously set
	    if ($this->cookies->has('remember-me')) {

		    //Get the cookie
		    $rememberMe = $this->cookies->get('remember-me');

		    //Get the cookie's value
		    $this->value_of_cookie = $rememberMe->getValue();

		    // echo its value in the view if it is not empty
		    $this->view->setVar("cookie_value", $this->value_of_cookie);

	    }else {
		    // set the cookie
		    $this->cookies->set('remember-me', 'some value of the cookie', time
			    () + 15 * 86400);
	    }
    }

	public function cleanAction()
	{
//		$this->cookies->delete("remember-me");
		/**
		 * por qualquer motivo a instrução acima não está a funcionar
		 * nesse caso, depois de uma breve pesquisa no google,
		 * a seguinta instrução remenda
		 */
		$this->cookies->set('remember-me', null, time() - 86400);

		$this->value_of_cookie = null;
		$this->response->redirect();
		$this->view->disable();
	}

}

