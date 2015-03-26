<?php

class IndexController extends ControllerBase
{

	/***
	 * DATA ADAPTERS
	 *
	 * This component makes use of adapters to encapsulate
	 * different sources of data:
	 *
	 * NativeArray      Use a PHP array as source data
	 *
	 * Model            Use a Phalcon\Mvc\Model\Resultset object as source data.
	 *                  Since PDO doesn’t support scrollable cursors this adapter
	 *                  shouldn’t be used to paginate a large number of records.
	 *
	 * QueryBuilder    Use a Phalcon\Mvc\Model\Query\Builder object as source data
	 *
	 * more info in:
	 * http://docs.phalconphp.com/en/latest/reference/pagination.html#pagination
	 */

    public function indexAction($current_page = 1)
    {
		    // Create a Model paginator, show 10 rows by page starting from $currentPage
			$paginator = new Phalcon\Paginator\Adapter\Model(
				array(
					"data"  => Especialidades::find(),
					"limit" => 5, // irão ser passados 5 de cada vez
					"page"  => $current_page
				)
	        );

			// Variable $currentPage controls the page to be displayed .
			// The $paginator->getPaginate() returns a $page object that contains
			// the paginated data . It can be used for generating the pagination:
		    $page = $paginator->getPaginate();
		    $this->view->setVar("page", $page);
    }

	public function arrayPaginatorAction($current_page = 1)
	{
		//Passing an array as data
		$paginator = new \Phalcon\Paginator\Adapter\NativeArray(
			array(
				"data"  => array(
					array('id' => 1, 'name' => 'Artichoke'),
					array('id' => 2, 'name' => 'Carrots'),
					array('id' => 3, 'name' => 'Beet'),
					array('id' => 4, 'name' => 'Lettuce'),
					array('id' => 5, 'name' => 'Richard'),
					array('id' => 6, 'name' => 'Sylvie')
				),
				"limit" => 2, // só irão ser passados 2 de cada vez
				"page"  => $current_page
			)
		);
		$page = $paginator->getPaginate();
		$this->view->setVar("page", $page);
	}

	public function queryBuilderAction($current_page = 1)
	{
		//Passing a querybuilder as data
		$builder = $this->modelsManager->createBuilder()
			->columns("id, datetime_acordo, instituicao, foto_instituicao")
			->from("Acordos")
			->orderBy("id");

		$paginator = new Phalcon\Paginator\Adapter\QueryBuilder(array(
			"builder" => $builder,
			"limit"   => 3, // só irão ser passados 3 de cada vez
			"page"    => $current_page
		));

		$page = $paginator->getPaginate();
		$this->view->setVar("page", $page);
	}

}

