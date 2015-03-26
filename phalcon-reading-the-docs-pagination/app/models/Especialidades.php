<?php

class Especialidades extends \Phalcon\Mvc\Model
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
    public $especialidade;

    /**
     *
     * @var string
     */
    public $descricao_especialidade;

    /**
     *
     * @var double
     */
    public $preco_consulta;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Medicos', 'especialidades_id', array('alias' => 'Medicos'));
        $this->hasMany('id', 'Medicos', 'especialidades_id', NULL);
    }

}
