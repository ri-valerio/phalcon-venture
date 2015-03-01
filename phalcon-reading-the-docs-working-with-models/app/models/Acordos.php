<?php

class Acordos extends \Phalcon\Mvc\Model
{

    // POINTING TO A DIFFERENT SCHEMA
    // If a model is mapped to a table that is in a different schemas/databases
    // than the default. You can use the getSchema method to define that:

    // public function getSchema()
    // {
    //     return "DATABASE_NAME";
    // }

    // it's also possible to set multiple databases, both for reading and writting
    // http://docs.phalconphp.com/en/latest/reference/models.html#setting-multiple-databases

/*---------------------------------------------------*/


    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $datetime_acordo;

    /**
     *
     * @var string
     */
    public $instituicao;

    /**
     *
     * @var string
     */
    public $foto_instituicao;

/*************************************************************/

    // MODEL EVENTS
    // Models allow you to implement events that will be thrown when
    // performing an insert/update/delete. They help define business
    // rules for a certain model. The following are the events supported
    // by Phalcon\Mvc\Model and their order of execution:
    //
    // todos os eventos existentes estão abaixo definidos
    // para mais informação:
// http://docs.phalconphp.com/en/latest/reference/models.html#events-and-events-manager

    // The easier way to make a model react to events is implement a method
    // with the same name of the event in the model’s class.


    public function beforeValidation()
    {
         echo <br> . "The Method beforeValidation was executed!" . <br> ;
    }

    public function beforeValidationOnCreate()
    {
         echo <br> . "The Method beforeValidationOnCreate was executed!" . <br> ;
    }

    public function beforeValidationOnUpdate()
    {
         echo <br> . "The Method beforeValidationOnUpdate was executed!" . <br> ;
    }

    public function onValidationFails()
    {
         echo <br> . "The Method onValidationFails was executed!" . <br> ;
    }

    public function afterValidationOnCreate()
    {
         echo <br> . "The Method afterValidationOnCreate was executed!" . <br> ;
    }

    public function afterValidationOnUpdate()
    {
         echo <br> . "The Method afterValidationOnUpdate was executed!" . <br> ;
    }

    public function afterValidation()
    {
         echo <br> . "The Method afterValidation was executed!" . <br> ;
    }

    public function beforeSave()
    {
         echo <br> . "The Method beforeSave was executed!" . <br> ;
    }

    public function beforeUpdate()
    {
         echo <br> . "The Method beforeUpdate was executed!" . <br> ;
    }

    public function beforeCreate()
    {
         echo <br> . "The Method beforeCreate was executed!" . <br> ;
    }

    public function afterUpdate()
    {
         echo <br> . "The Method afterUpdate was executed!" . <br> ;
    }

    public function afterCreate()
    {
         echo <br> . "The Method afterCreate was executed!" . <br> ;
    }

    public function afterSave()
    {
         echo <br> . "The Method afterSave was executed!" . <br> ;
    }

    // The following events are available to define custom business rules
    // that can be executed when a delete operation is performed:
    // more info:
    // http://docs.phalconphp.com/en/latest/reference/models.html#deleting-records

    public function beforeDelete()
    {
         echo <br> . "The Method beforeDelete was executed!" . <br> ;
    }

    public function afterDelete()
    {
         echo <br> . "The Method afterDelete was executed!" . <br> ;
    }

    // Validation Failed Events
    // Another type of events are available when the data validation process
    // finds any inconsistency:

        // notSave
        // onValidationFails

    // more info:
    // http://docs.phalconphp.com/en/latest/reference/models.html#validation-failed-events


/*************************************************************/

    // VALIDATING DATA INTEGRITY
    // Phalcon\Mvc\Model provides several events to validate data
    // and implement business rules. The special “validation” event allows us
    // to call built-in validators over the record.
    // Phalcon exposes a few built-in validators that can be
    // used at this stage of validation:

        // PresenceOf
        // Email
        // ExclusionIn
        // InclusionIn
        // Numericality
        // Regex
        // Uniqueness
        // StringLength
        // Url


    // In addition to the built-in validators, you can create your own validators:
    // more info:
    // http://docs.phalconphp.com/en/latest/reference/models.html#validating-data-integrity



    // BEHAVIORS
    // The following built-in behaviors are provided by the framework:

    // Timestampable:
    //
    // Allows to automatically update a model’s attribute saving the datetime
    // when a record is created or updated
    // http://docs.phalconphp.com/en/latest/reference/models.html#timestampable
    //
    // SoftDelete:
    //
    // Instead of permanently delete a record it marks the record as deleted
    // changing the value of a flag column
    // http://docs.phalconphp.com/en/latest/reference/models.html#softdelete



}
