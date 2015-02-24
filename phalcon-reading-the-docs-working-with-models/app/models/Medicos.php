<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Medicos extends \Phalcon\Mvc\Model
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
    public $primeiro_nome;

    /**
     *
     * @var string
     */
    public $ultimo_nome;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $contacto_tel;

    /**
     *
     * @var string
     */
    public $foto;

    /**
     *
     * @var integer
     */
    public $especialidades_id;

    /**
     *
     * @var integer
     */
    public $horarios_id;

    /**
     *
     * @var double
     */
    public $salario_mensal;

    /**
     * Validations and business logic
     */
    public function validation()
    {

        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'ConsultasMarcadas', 'medicos_id', NULL);
        $this->hasMany('id', 'ConsultasRealizadas', 'medicos_id', NULL);
        $this->hasMany('id', 'MedicosAdministracaoDeConsultas', 'medicos_id', NULL);
        $this->belongsTo('especialidades_id', 'Especialidades', 'id', NULL);
        $this->belongsTo('horarios_id', 'Horarios', 'id', NULL);
    }

}
