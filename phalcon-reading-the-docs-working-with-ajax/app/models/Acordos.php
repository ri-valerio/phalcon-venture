<?php

class Acordos extends \Phalcon\Mvc\Model
{

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

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'datetime_acordo' => 'datetime_acordo', 
            'instituicao' => 'instituicao', 
            'foto_instituicao' => 'foto_instituicao'
        );
    }

}
