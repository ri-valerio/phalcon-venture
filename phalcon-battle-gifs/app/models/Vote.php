<?php

class Vote extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_battle;

    /**
     *
     * @var integer
     */
    public $image_one;

    /**
     *
     * @var integer
     */
    public $image_two;

    /**
     *
     * @var integer
     */
    public $image_three;
    public function initialize()
    {
        $this->belongsTo('id_battle', 'Battle', 'id_battle', NULL);
    }

}
