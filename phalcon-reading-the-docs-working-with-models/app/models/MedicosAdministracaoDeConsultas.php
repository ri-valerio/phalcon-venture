<?php

class MedicosAdministracaoDeConsultas extends \Phalcon\Mvc\Model
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
    public $username;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $datetime_ultimo_login;

    /**
     *
     * @var integer
     */
    public $medicos_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('medicos_id', 'Medicos', 'id', NULL);
    }

}
