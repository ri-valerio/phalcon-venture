<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
	    echo "<h2>IndexController - indexAction</h2>";
    }

	/**
	 * checks if the http request was made with GET
	 */
	public function isGetAction()
	{
		echo "<h2>IndexController - isGetAction</h2>";
		if ($this->request->isGet()) {
			echo "the request was made with GET";
		}
	}

	/**
	 * checks if the http request was made with POST
	 */
	public function isPostAction()
	{
		echo "<h2>IndexController - isPostAction</h2>";
		if ($this->request->isPost()) {
			echo "the request was made with POST";
		}
	}

	/**
	 * checks if the http request was made with POST and with an AJAX call
	 */
	public function isAjaxAction()
	{
		echo "<h2>IndexController - isAjaxAction</h2>";
		if ($this->request->isAjax()) {
			echo "the request was made with POST and with an AJAX call";
		}
	}


	public function formViaGetAction()
	{
		echo "<h2>IndexController - formViaGetAction</h2>";
		// grab the GET variables and sanitize them

//		http://docs.phalconphp.com/en/latest/reference/request.html#getting-values
		if ($this->request->isGet() && $this->security->checkToken()){
			$username = $this->request->get("username", "string");
			$email    = $this->request->get("user_email", "email");
		}

// ALL POSSIBLE FILTERS:
//		http://docs.phalconphp.com/en/latest/reference/filter.html#types-of-built-in-filters

		echo "$username - $email";
	}

	public function formViaPostAction()
	{
		echo "<h2>IndexController - formViaPostAction</h2>";

		/**
		 *        http://docs.phalconphp.com/en/latest/reference/request.html#getting-values
		 */
		 if ($this->request->isPost() && $this->security->checkToken()) {

			 /**
			 * grab the post variables and sanitize them
			 */
			$username = $this->request->getPost("username", "string");
			/**
			 * which is the same as:
			 */
			// $username = $this->filter->sanitize($this->request->getPost
			//("username"), "string");

			$email = $this->request->getPost("user_email", "email");
			/**
			 * posso ainda passar um valor default caso não seja passado nenhum
			 * valor pelo utilizador
			 */
			// $email = $this->request->getPost("user_email", "email",
			// "default_email@gmail.com");
		}

		echo "$username - $email";
	}


	public function uploadFilesAction()
	{
		echo "<h2>IndexController - uploadFilesAction</h2>";
		// Check if the user has uploaded files
		echo ($this->request->hasFiles());

		if ($this->request->isPost() && $this->security->checkToken())
			if ($this->request->hasFiles()) {

				// Print the real file names and sizes
				foreach ($this->request->getUploadedFiles() as $file) {

					//Print file details
					echo $file->getName(), " ", $file->getSize(), "\n";

					//Move the file into the application
					$file->moveTo('files/' . $file->getName());
				}
			}
	}

}

