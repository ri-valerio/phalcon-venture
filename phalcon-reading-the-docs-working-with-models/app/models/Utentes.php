<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Utentes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $email;

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
    public $morada;

    /**
     *
     * @var string
     */
    public $contacto_tel;

    /**
     *
     * @var string
     */
    public $datetime_registo;

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
        $this->hasMany('email', 'ConsultasMarcadas', 'utentes_email', NULL);
        $this->hasMany('email', 'ConsultasRealizadas', 'utentes_email', NULL);
    }

}
