<?php

/**
 * Every instance of a model represents a row in the table.
 * You can easily access record data by reading object properties.
 * For example, for a table “robots” with the records:
 * +----+------------+------------+------+
 * | id | name       | type       | year |
 * +----+------------+------------+------+
 * |  1 | Robotina   | mechanical | 1972 |
 * |  2 | Astro Boy  | mechanical | 1952 |
 * |  3 | Terminator | cyborg     | 2029 |
 * +----+------------+------------+------+
 *
 * You could find a certain record by its primary key and then print its name:
 *
 *      $robot = Robots::findFirst(3);
 *      echo $robot->name;
 *
 * Once the record is in memory, you can make modifications to its data
 * and then save changes:
 *
 *       $robot = Robots::findFirst(3);
 *       $robot->name = "RoboCop";
 *       $robot->save();
 *
 * As you can see, there is no need to use raw SQL statements.
 * Phalcon\Mvc\Model provides high database abstraction for web applications.
 *
 */


/**
 * Phalcon\Mvc\Model also offers several methods for querying records.
 * The following examples will show you how to query one or more records
 * from a model:
 *
 * http://docs.phalconphp.com/en/latest/reference/models.html#finding-records
 */

class Robots extends \Phalcon\Mvc\Model
{

    /**
     * Models can be implemented with properties of public scope,
     * meaning that each property can be read/updated from any part
     * of the code that has instantiated that model class without
     * any restrictions
     *
     * Public properties provide less complexity in development.
     * However getters/setters can heavily increase the testability,
     * extensibility and maintainability of applications.
     * Developers can decide which strategy is more appropriate for the
     * application they are creating. The ORM is compatible with both schemes
     * of defining properties.
     */

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var integer
     */
    public $year;


    /**
     * By default, the model “Robots” will refer to the table “robots”.
     * If you want to manually specify another name for the mapping table,
     * you can use the getSource() method:
     */
    // public function getSource()
    // {
    //     return "the_robots";
    // }


    /**
     * ou então é possivel fazer o mesmo que foi feito em cima mas no método
     * initialize
     *
     * The initialize() method aids in setting up the model with a custom behavior
     * i.e. a different table. The initialize() method is only called
     * once during the request.
     */
    // public function initialize()
    // {
    //     $this->setSource("the_robots");
    // }


    /**
     * If you want to perform initialization tasks for every instance
     * created you can ‘onConstruct’:
     */
    // public function onConstruct()
    // {
    //
    // }

}
