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

	public function serverInfoAction()
	{
		// Check the request layer
		if ($this->request->isSecureRequest()) {
			echo "The request was made using a secure layer";
		}

		// Get the servers's ip address. ie. 192.168.0.100
		$serverIpAddress = $this->request->getServerAddress();
		echo "Server Ip Adress: " . $serverIpAddress . "<br>" ;

		// Get the client's ip address ie. 201.245.53.51
		$clientIpAddress = $this->request->getClientAddress();
		echo "Client Ip Adress: " . $clientIpAddress . "<br>";

		// Get the User Agent (HTTP_USER_AGENT)
		$userAgent = $this->request->getUserAgent();
		echo "UserAgent: " . $userAgent . "<br>";

		// Get the best acceptable content by the browser. ie text/xml
		$contentType = $this->request->getAcceptableContent();
		echo "Content Type: " . var_dump($contentType) . "<br>";

		// Get the best charset accepted by the browser. ie. utf-8
		$charset = $this->request->getBestCharset();
		echo "Charset: " . $charset . "<br>";

		// Get the best language accepted configured in the browser. ie. en-us
		$language = $this->request->getBestLanguage();
		echo "Language: " . $language . "<br>";

	}


	public function redirectAction($typeOfRedirect = null)
	{
		switch($typeOfRedirect)
		{
			case "default":
				//Redirect to the default URI
				$this->response->redirect();
				break;
			case "local":
				//Redirect to the local base URI
				$this->response->redirect("index/index");
				break;
			case "external":
				//Redirect to an external URL
				$this->response->redirect("http://en.wikipedia.org", TRUE);
				break;
			case "status-code":
				//Redirect specifyng the HTTP status code
				$this->response->redirect("http://www.example.com/new-location", TRUE,
					301);
				break;
			case "lang":
				//Redirect based on a named route
				 $this->response->redirect(array(
					"for"        => "index-lang", // named route
					"lang"       => "jp", // named param
					"controller" => "index", // controller
					 "action"    => "index" // action
				));
				break;

			default:
				$this->response->redirect("http://www.google.com", TRUE);
		}

		$this->view->disable();
	}


	/**
	 * existe ainda info sobre:
	 *
	 * http://docs.phalconphp.com/en/latest/reference/response.html#setting-an-expiration-time
	 * http://docs.phalconphp.com/en/latest/reference/response.html#cache-control
	 * http://docs.phalconphp.com/en/latest/reference/response.html#e-tag
	 */
}

