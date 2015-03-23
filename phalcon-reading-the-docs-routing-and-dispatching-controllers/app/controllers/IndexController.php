<?php

class IndexController extends ControllerBase
{

	/**
	 * ROUTE: / (root route)
	 * ROUTE: /hello-world
	 */
    public function indexAction($name = null)
    {
	    echo "<h2>IndexController - indexAction</h2>";

		if($name != null){
			echo "<p>My name is: $name</p>";
        }
    }

	/**
	 *  ROUTE: /create
	 */
	public function createAction()
	{
		echo "<h2>IndexController - createAction</h2>";
	}

	/**
	 *  ROUTE: /admin/index/a/flexible/dave/301
	 */
	public function flexibleAction($name = null, $id = null)
	{
		echo "<h2>IndexController - flexibleAction</h2>";

		if($name != null && $id != null){
			echo "<p>Name: $name</p>";
			echo "<p>Id: $id</p>";
		}
	}

	/**
	 *  ROUTE: /news/2015/03/23/Lisboa
	 */
	public function dateAction($local = null)
	{
		echo "<h2>IndexController - dateAction</h2>";

		// Return "year" parameter
		$year = $this->dispatcher->getParam("year");
		// Return "month" parameter
		$month = $this->dispatcher->getParam("month");
		// Return "day" parameter
		$day = $this->dispatcher->getParam("day");

		echo "<p>$year/$month/$day</p>";

		if($local != null){
			echo "<p>Local: $local</p>";
		}
	}

	/**
	 *  ROUTE:  /documentation/bazinga/php
	 */
	public function showAction()
	{
		echo "<h2>IndexController - showAction</h2>";

		// Returns "name" parameter
		$name = $this->dispatcher->getParam("name");
		// Returns "type" parameter
		$type = $this->dispatcher->getParam("type");

		echo "<p>$name - $type</p>";

		// porque foi definido setName("doc-bazinga") na route
		echo $this->url->get(array(
			"for" => "doc-bazinga",
			"name" => "phalcon",
			"type" => "C"
		));
	}

	/**
	 *  ROUTE: /posts/2015/title
	 */
	public function postsAction()
	{
		echo "<h2>IndexController - postsAction</h2>";

		// Returns "year" parameter and filter it
		$year = $this->dispatcher->getParam("year", "int");
		// Returns "title" parameter
		$title = $this->dispatcher->getParam("title");

		echo "<p>$year - $title</p>";

	}

	/**
	 * ROUTE: /sluggy/new-ipod-nano-4-generation
	 * por qualquer motivo, isto não está a funcionar
	 */
	public function sluggyAction()
	{
		echo "<h2>IndexController - sluggyAction</h2>";

		// Returns "type" parameter
		$slug = $this->dispatcher->getParam("slug");

		echo "<p>$slug</p>";

	}

	/**
	 * quando uma route não existe esta action é chamada
	 */
	public function route404()
	{
		echo "<h2>IndexController - route404Action</h2>";
	}
}

