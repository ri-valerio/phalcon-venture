<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {

	    /**
	     * Flash messages are used to notify the user about the state of
	     * actions he/she made or simply show information to the users.
	     * These kind of messages can be generated using this component.
	     *
	     * This component makes use of adapters to define the behavior of the
	     * messages after being passed to the Flasher:
	     *
	     * 1) Direct
	     *      Directly outputs the messages passed to the flasher
	     *      (Phalcon\Flash\Direct)
	     * 2) Session
	     *      Temporarily stores the messages in session, then messages can
	     *      be printed in the next request (Phalcon\Flash\Session)
	     */

	    /**
	     * Usually the Flash Messaging service is requested from the services
	     * container, if you’re using
	     * Phalcon\DI\FactoryDefault then Phalcon\Flash\Direct
	     * is automatically registered as “flash” service:
	     */

	     $this->flash->success("Sucess: The post was correctly saved!");
	     $this->flash->warning("Warning: The post was correctly saved!");
	     $this->flash->error("Error: The post was correctly saved!");
	     $this->flash->notice("Notice: The post was correctly saved!");

		 // we can add messages with our own types:
	     $this->flash->message("debug", "Debug: This is a debug message");

	    /**
	     * Messages sent to the flash service are automatically formatted with html
	     * to see this in the source of the web page press [cmd + u]
	     *
	     * As you can see, CSS classes are added automatically to the DIVs.
	     * These classes allow you to define the graphical presentation of the
	     * messages in the browser. The CSS classes can be overridden,
	     * for example, if you’re using Twitter bootstrap,
	     * classes can be configured inside the services file as:
	     *
	     *
	     * //Register the flash service with custom CSS classes
	     *
	     * $di->set('flash', function(){
	     *   $flash = new \Phalcon\Flash\Direct(array(
	     *       'error' => 'alert alert-error',
	     *       'success' => 'alert alert-success',
	     *       'notice' => 'alert alert-info',
	     *   ));
	     *   return $flash;
	     * });
	     */
    }

	/**
	 * Depending on the adapter used to send the messages, it could be
	 * producing output directly, or be temporarily storing the messages
	 * in session to be shown later. When should you use each? That usually
	 * depends on the type of redirection you do after sending the messages.
	 * For example, if you make a “forward” is not necessary to store the messages
	 * in session, but if you do a HTTP redirect then,
	 * they need to be stored in session:
	 *
	 * para ilustrar isso, foram criado abaixo dois métodos
	 */
	public function forwardAction()
	{
		//Using direct flash
		$this->flash->success("FROM FORWARDACTION: Your information was
		stored correctly!");

		//Forward to the index action
		return $this->dispatcher->forward(array(
			"controller" => "index",
			"action"     => "index"
		));
	}

	public function redirectAction()
	{
		//Using session flash
		$this->flashSession->success("From redirectAction: Your information was
		stored correctly! yaaaayy");

		//Make a full HTTP redirection
		return $this->response->redirect("index/show");
	}

	public function showAction()
	{

	}
}

