<?php

class Battle extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_battle;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $image_one;

    /**
     *
     * @var string
     */
    public $image_two;

    /**
     *
     * @var string
     */
    public $image_three;

    /**
     *
     * @var string
     */
    public $created_at;

    /**
     *
     * @var string
     */
    public $image_one_link;

    /**
     *
     * @var string
     */
    public $image_two_link;

    /**
     *
     * @var string
     */
    public $image_three_link;
    public function initialize()
    {
        $this->hasMany('id_battle', 'BattleHasTag', 'id_battle', NULL);
        $this->hasMany('id_battle', 'Comment', 'id_battle', NULL);
        $this->hasOne('id_battle', 'Vote', 'id_battle', NULL);
    }

}
