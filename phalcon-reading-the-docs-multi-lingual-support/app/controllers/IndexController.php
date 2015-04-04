<?php

	use Phalcon\Translate\Adapter\NativeArray as NativeArray;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
		/**
		 * The component Phalcon\Translate aids in creating
		 * multilingual applications.
		 * Applications using this component, display content in different
		 * languages, based on the user’s chosen language supported by the application.
		 *
		 * It uses PHP arrays to store the messages in various languages you like.
		 * This is the best option in terms of performance.
		 *
		 * Translation strings are stored in files.
		 * The structure of these files could vary depending of the adapter used.
		 * Phalcon gives you the freedom to organize your translation strings.
		 *
		 * A simple structure could be:
		 *
		 *      app/messages/en.php
		 *      app/messages/fr.php
		 *      app/messages/pt.php
		 *
		 *
		 * Each file contains an array of the translations in a key/value manner.
		 * For each translation file, keys are unique.
		 * The same array is used in different files, where keys remain the same
		 * and values contain the translated strings depending on each language.
		 *
		 *
		 * Implementing the translation mechanism in your application is trivial
		 * but depends on how you wish to implement it. You can use an automatic
		 * detection of the language from the user’s browser or you can provide
		 * a settings page where the user can select their language.
		 *
		 * A simple way of detecting the user’s language is to
		 * parse the $_SERVER[‘HTTP_ACCEPT_LANGUAGE’] contents,
		 * or if you wish, access it directly by calling
		 * $this->request->getBestLanguage() from an action/controller:
		 */

	    //Ask browser what is the best language
	    $language = $this->request->getBestLanguage();

	    //Check if we have a translation file for that lang

	    echo "Language: ", $language, "<br>";

	    if (file_exists("../app/messages/" . $language . ".php")) {
		    require "../app/messages/" . $language . ".php";
	    } else {
		    // fallback to some default
		    require "../app/messages/en.php";
	    }

	    //Return a translation object
	    $content = new NativeArray(array(
		    "content" => $messages
	    ));


	    /**
	     * LOGGING MESSAGES TO FIREPHP
	     *
	     * http://docs.phalconphp.com/en/latest/reference/logging.html
	     */

		$this->view->setVar("name", "Ricardo Valério");
		$this->view->setVar("t", $content);

	    $logger = new \Phalcon\Logger\Adapter\Firephp("");
	    $logger->log("This is a message", \Phalcon\Logger::INFO);
	    $logger->log("This is an error", \Phalcon\Logger::ERROR);
	    $logger->error("This is another error");

	}

}

