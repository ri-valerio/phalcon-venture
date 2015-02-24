<?php

/**
*
*/
class Project extends BaseModel
{
	public function initialize()
	{
		// params: local field, reference table, reference field
		// NOTA: User é com Maiuscula!
		$this->belongsTo('user_id', 'User', 'id');
	}
}

?>
