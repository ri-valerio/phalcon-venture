<?php

class Comment extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_comment;

    /**
     *
     * @var string
     */
    public $comment;

    /**
     *
     * @var string
     */
    public $created_at;

    /**
     *
     * @var integer
     */
    public $id_battle;
    public function initialize()
    {
        $this->belongsTo('id_battle', 'Battle', 'id_battle', NULL);
    }

}
