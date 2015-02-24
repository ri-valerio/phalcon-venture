<?php

class Tag extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_tag;

    /**
     *
     * @var string
     */
    public $name;
    public function initialize()
    {
        $this->hasMany('id_tag', 'BattleHasTag', 'id_tag', NULL);
    }

}
