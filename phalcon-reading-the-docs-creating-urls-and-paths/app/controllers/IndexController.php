<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
	    echo "<h2>IndexController - indexAction</h2>";

	    echo "<h3>BaseURI:</h3>" . $this->url->getBaseUri() . "<br>";
	    echo "<h3>basic URL:</h3>" . $this->url->get("index/hello") . "<br>";
	    echo "<h3>URL for named route:</h3>" .
		    $this->url->get(array(
		    "for"   => "show-post",
		    "year"  => "1990",
		    "month" => "08",
		    "title" => "some-blog-post"
	    )) . "<br>";
    }

	public function helloAction()
	{
		echo "<h2>IndexController - helloAction</h2>";
	}

	/**
	 * EXAMPLE ROUTE: /blog/1990/08/my-birthday
	 */
	public function showAction()
	{
		echo "<h2>IndexController - showAction</h2>";
	}
}

