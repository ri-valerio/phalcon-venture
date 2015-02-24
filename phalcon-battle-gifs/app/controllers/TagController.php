<?php

/**
 * class para fazer a pesquisa de battles de acordo com a tag clicada
 */
class TagController extends ControllerBase
{

	public function indexAction( $tag = null )
	{
		$tag = Tag::findFirst("name = '$tag'");
		if ($tag != null && BattleHasTag::count("id_tag = '". $tag->id_tag. "'")) {

			$this->view->setVar("battles_with_tag", BattleHasTag::find(array(
                "conditions"             => "id_tag = :tag_id:",
                "bind" => array("tag_id" => $tag->id_tag )
			)));

		} else {
			$this->response->redirect("");
		}

	}
}
