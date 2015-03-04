<?php

class ConsultasMarcadas extends \Phalcon\Mvc\Model
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
    public $datetime_confirmacao;

    /**
     *
     * @var string
     */
    public $data_consulta;

    /**
     *
     * @var string
     */
    public $hora_consulta;

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
        $this->belongsTo('medicos_id', 'Medicos', 'id', array('alias' => 'Medicos'));
        $this->belongsTo('utentes_email', 'Utentes', 'email', array('alias' => 'Utentes'));
        $this->belongsTo('medicos_id', 'Medicos', 'id', NULL);
        $this->belongsTo('utentes_email', 'Utentes', 'email', NULL);
    }

}
