<?php

class Horarios extends \Phalcon\Mvc\Model
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
    public $descricao_horario;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Medicos', 'horarios_id', array('alias' => 'Medicos'));
        $this->hasMany('id', 'Medicos', 'horarios_id', NULL);
    }

}
