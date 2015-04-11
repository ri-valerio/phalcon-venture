<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    	/**
    	 * http://php.net/manual/en/mongocollection.find.php
    	 */

	    if ($this->mongo->scientists->insert(array( "name" => "Sheldon Cooper")) == FALSE) {
		    echo "Could not be Saved!!";
	    } else {
		    echo "Data Saved!!";
	    }

	    echo "<hr>";

	    $collection = new MongoCollection($this->mongo, 'scientists');
	    $cursor = $collection->find();
		$array = iterator_to_array($cursor);

		var_dump($array);

		$collection->drop();
    }

}

