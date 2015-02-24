<?php

class IndexController extends ControllerBase
{
    /**
     * [indexAction description]
     * @return [type] [description]
     */
    public function indexAction()
    {
        Phalcon\Tag::setTitle("index controller - indexAction");
        parent::initialize();

        $this->view->setVars(array(
        	"tags"            => Tag::find(),
		    "battles"         => Battle::find(),
	        "battles_has_tag" => BattleHasTag::find(),
	        "num_tags"        => BattleHasTag::count(array("group" => "id_tag"))
        ));
    }

}
