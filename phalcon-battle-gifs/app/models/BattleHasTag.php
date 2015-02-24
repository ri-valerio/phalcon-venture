<?php

class BattleHasTag extends \Phalcon\Mvc\Model
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
    public $id_tag;
    public function initialize()
    {
        $this->belongsTo('id_battle', 'Battle', 'id_battle', NULL);
        $this->belongsTo('id_tag', 'Tag', 'id_tag', NULL);
    }

}
