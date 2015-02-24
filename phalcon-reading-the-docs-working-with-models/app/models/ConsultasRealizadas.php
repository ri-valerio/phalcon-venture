<?php

class ConsultasRealizadas extends \Phalcon\Mvc\Model
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
    public $datetime_consulta_realizada;

    /**
     *
     * @var double
     */
    public $valor_consulta;

    /**
     *
     * @var string
     */
    public $diagnostico;

    /**
     *
     * @var string
     */
    public $prescricao;

    /**
     *
     * @var integer
     */
    public $medicos_id;

    /**
     *
     * @var string
     */
    public $utentes_email;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('medicos_id', 'Medicos', 'id', NULL);
        $this->belongsTo('utentes_email', 'Utentes', 'email', NULL);
    }

}
