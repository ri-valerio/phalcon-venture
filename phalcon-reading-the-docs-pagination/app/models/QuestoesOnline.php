<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class QuestoesOnline extends \Phalcon\Mvc\Model
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
    public $nome;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $mensagem;

    /**
     *
     * @var string
     */
    public $datetime_questao;

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

}
