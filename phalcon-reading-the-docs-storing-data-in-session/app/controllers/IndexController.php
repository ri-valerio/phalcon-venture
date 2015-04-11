<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
	    echo "<h2>IndexController - indexAction [the session and the persistent
variables were set]</h2>";
		// set the session variable
	    $this->session->set("user-name", "Ricardo Valério");

	    // existem outra forma de organizar as session variables
	    // em forma de bags:
	    // http://docs.phalconphp.com/en/latest/reference/session.html#session-bags

		// ANOTHER WAY TO PERSIST DATA BETWEEN REQUESTS
	    // Create a persistent variable "name"
	    $this->persistent->name = "Laura Caetano";

	    // É IMPORTANTE PERCEBER QUE:
		// The data added to the session($this->session) are available
		// throughout the application, while persistent($this->persistent)
		// can only be accessed in the scope of the current class.
    }


	/* SESSION VARIABLES METHODS */

	public function displaySessionAction()
	{
		echo "<h2>IndexController - welcomeAction [the session variable will be displayed if
 it
exists]</h2>";
		//Check if the variable is defined
		if ($this->session->has("user-name")) {
			//Retrieve its value
			echo $this->session->get("user-name");
		}
	}

	public function removeSessionAction()
	{
		echo "<h2>IndexController - removeAction [the session variable will be removed if it
exists]</h2>";
		//Remove a session variable
		$this->session->remove("user-name");
	}

	public function destroySessionAction()
	{
		echo "<h2>IndexController - logoutAction [the session variable will be destroyed if
 it exists]</h2>";
		//Destroy the whole session
		$this->session->destroy();
	}


	/* PERSISTENT VARIABLES METHODS */

	public function displayPersistentVariableAction()
	{
		echo "<h2>IndexController - displayPersistentVariableAction [the persistent variable
will be displayed if it exists]</h2>";
		if (isset($this->persistent->name)) {
			echo "Welcome, ", $this->persistent->name;
		}
	}

	public function removePersistentVariableAction()
	{
		echo "<h2>IndexController - removePersistentVariableAction [the persistent variable
will be displayed if it exists]</h2>";
		if (isset($this->persistent->name)) {
			$this->persistent->remove("name");
		}
	}

	public function destroyPersistentVariableAction()
	{
		echo "<h2>IndexController - destroyPersistentVariableAction [the persistent variable
will be displayed if it exists]</h2>";
		if (isset($this->persistent->name)) {
			$this->persistent->destroy();
		}
	}

}

