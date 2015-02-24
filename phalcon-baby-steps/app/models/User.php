<?php

use \Phalcon\Mvc\Model\Behavior\SoftDelete;

/**
*
*/
class User extends BaseModel
{

	/*********************************************
	 caso o nome da tabela na DB seja diferente
	 do nome desta classe basta criar apenas um dos dois métodos
	 abaixo para relacionar esta classe com a tabela da DB.

	 ex:   tabela na DB:   users
	 	 nome da classe:   User

	 Nota: apesar de os nomes não serem muito diferentes
	 	   em outras situações em que possam ser, esta
	 	   possibilidade é sem dúvida uma mais valia.
	*********************************************/

	// public function getSource()
	// {
	// 	// return "nome_da_tabela_na_DB";
	// 	return "users";
	// }

	// public function initialize()
	// {
	// 	// argumento: "nome_da_tabela_na_db"
	// 	$this->setSource("users");
	// }

	///////////////////////////////////////////////////////////

	public function initialize()
	{
		// params: local field; reference table, reference field
		// NOTA: Project é com Maiscula!
		$this->hasMany('id', 'Project', 'user_id');

		// soft delete (não elimina os dados na BD fisicamente, apenas deixa
		// de os considerar como parte integrante da aplicação)
		$this->addBehavior(new SoftDelete(array(
			// campo da tabela que queremos mapear para fazer o soft delete
			'field' => 'deleted',
			// valor a inserir no campo acima
			'value' => 1
		)));
	}

}

?>
