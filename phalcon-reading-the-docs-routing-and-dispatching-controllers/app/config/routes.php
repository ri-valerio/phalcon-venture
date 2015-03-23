<?php

	$router = new Phalcon\Mvc\Router();

	/**
	 * Sometimes a route could be accessed with extra/trailing slashes
	 * and the end of the route, those extra slashes would lead to produce
	 * a not-found status in the dispatcher. You can set up the router to
	 * automatically remove the slashes from the end of handled route:
	 */
	$router->removeExtraSlashes(true);

	// root route
	$router->add("/", array(

		'controller' => 'index',
		'action'     => 'index',
	));

	$router->add("/hello-world/:params", array(

		'controller' => 'index',
		'action'     => 'index',
		'params'     => 1
	));

	$router->add("/create", array(

		'controller' => 'index',
		'action'     => 'create'
	));



//Define a flexible route
	/**
	 * exemplo url: /admin/index/a/flexible/dave/301
	 */
	$router->add(
		"/admin/:controller/a/:action/:params",
		array(
			"controller" => 1,
			"action"     => 2,
			"params"     => 3,
		)
	);
// reparo que a route definida acima, é flexível ao ponto de poder
// ser usada com qualquer tipo de controller e action



// POSSIBLE PLACEHOLDERS
	// /:module
	// /:controller
		//	Controller names are camelized, this means that characters
		// (-) and (_) are removed and the next character is uppercased.
		// For instance, some_controller is converted to SomeController.
	// /:action
	// /:params
	// /:namespace
	// /:int



//	the order in which routes are added indicate their relevance,
// latest routes added have more relevance than first added. Internally,
// all defined routes are traversed in reverse order until Phalcon\Mvc\Router
// finds the one that matches the given URI and processes it,
// while ignoring the rest.

	/**
	 * exemplo url: /news/2015/03/23/Lisboa
	 */
	$router->add(
		"/news/([0-9]{4})/([0-9]{2})/([0-9]{2})/:params",
		array(
			"controller" => "index",
			"action"     => "date",
			"year"       => 1, // ([0-9]{4})
			"month"      => 2, // ([0-9]{2})
			"day"        => 3, // ([0-9]{2})
			"params"     => 4, // :params
		)
	);


	/**
	 * exemplo url: /documentation/bazinga/php
	 */
	$router->add(
		"/documentation/{name}/{type:[a-zA-Z]+}",
		array(
			"controller" => "index",
			"action"     => "show"
		)
	)->setName("doc-bazinga");
	// naming routes
// http://docs.phalconphp.com/en/latest/reference/routing.html#naming-routes


/*****************************************/
// Array form
	$router->add(
		"/posts/([0-9]+)/([a-z\-]+)",
		array(
			"controller" => "index",
			"action"     => "posts",
			"year"       => 1,
			"title"      => 2,
		)
	);
// Short form of the route above
	$router->add("/posts/{year:[0-9]+}/{title:[a-z\-]+}", "Index::posts");
/*****************************************/


// it's also possible to create routes with namespaces and modules
//	more info:
//http://docs.phalconphp.com/en/latest/reference/routing.html#routing-to-modules


//	When you add a route using simply add(), the route will be enabled
// for any HTTP method. Sometimes we can restrict a route to a specific method,
// this is especially useful when creating RESTful applications:
//	http://docs.phalconphp.com/en/latest/reference/routing.html#http-method-restrictions


	//The action name allows dashes, an action can be: /sluggy/new-ipod-nano-4-generation
	$router
		->add("/sluggy/{slug:[a-z\-]+}", array(
			"controller" => "index",
			"action" => "sluggy"
		))->convert("slug", function($slug) {
			//Transform the slug removing the dashes
			return str_replace('-', '', $slug);
		});

// Defining routes in groups to easily manager them:
//	http://docs.phalconphp.com/en/latest/reference/routing.html#groups-of-routes

//	NOT FOUND PATHS
//If none of the routes specified in the router are matched,
// you can define a group of paths to be used in this scenario:
// more info: http://docs.phalconphp.com/en/latest/reference/routing.html#not-found-paths

	// por algum motivo isto não está a funcionar
	$router->notFound(array(
		"controller" => "index",
		"action" => "route404"
	));
