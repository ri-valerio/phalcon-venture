<?php

use Phalcon\Validation,
	Phalcon\Validation\Validator\PresenceOf,
	Phalcon\Validation\Validator\Email;

class IndexController extends ControllerBase
{

	public function indexAction()
    {

    }

	public function showAction()
	{
		$validation = new Validation();

		/**
		 * os nomes das variáveis têm de ser iguais às passadas via POST
		 * que estão no form - atributo "name"
		 *
		 * neste caso:      name & email
		 */
		$validation->add('name', new PresenceOf(array(
			'message' => 'The name is required'
		)));

		$validation->add('email', new PresenceOf(array(
			'message' => 'The e-mail is required'
		)));

		$validation->add('email', new Email(array(
			'message' => 'The e-mail is not valid'
		)));


		/**
		 * VALIDATORS EXISTENTES
		 *
		 * Phalcon exposes a set of built-in validators for this component:
		 *
		 * http://docs.phalconphp.com/en/latest/reference/validation.html#validators
		 *
		 * PresenceOf
		 * Identical
		 * Email
		 * ExclusionIn
		 * InclusionIn
		 * Regex
		 * StringLength
		 * Between
		 * Confirmation
		 * Url
		 */

		/**
		 * É TAMBÉM POSSÍVEL CRIÁRMOS OS NOSSOS PRÓPRIOS VALIDATORS
		 */

		/**
		 * faz a validação em relação aos valores que são passados por POST
		 */
		$messages = $validation->validate($_POST);
		if (count($messages)) {
			foreach ($messages as $message) {
				echo $message, '<br>';
				echo $message->getField(), '<br>';
				echo $message->getMessage(), '<br>';
				echo $message->getType(), '<br>';
				echo $message->getCode(), '<br>';
				echo "<hr>";
			}
		}
	}

}

