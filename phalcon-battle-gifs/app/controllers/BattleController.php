<?php

class BattleController extends ControllerBase
{
    /**
     * [indexAction description]
     * @return [type] [description]
     */
	public function indexAction()
	{
				Phalcon\Tag::setTitle('Find Everything You Want!');
				parent::initialize();
				$this->view->setVar("tags", Tag::find());
	}

    /**
     * [createAction description]
     * @return [type] [description]
     */
	public function createAction()
  {
        if ($this->request->isPost()
            && $this->security->checkToken()
            && $this->request->hasFiles()
            && count($this->request->getUploadedFiles()) == 3)
        {

            foreach ($this->request->getUploadedFiles() as $file)
            {
                if (!$file->getExtension() === "gif")
                {
                    // parar o processo
                    echo "ERRO: o ficheiro". $file->getName() ." não é do tipo gif <br>";
                }
            }

            $gifs = $this->request->getUploadedFiles();

            $battle = new Battle();
            $battle->name             = $this->request->getPost("name");
            $battle->image_one        = sha1($gifs[0]->getName().microtime());
            $battle->image_two        = sha1($gifs[1]->getName().microtime());
            $battle->image_three      = sha1($gifs[2]->getName().microtime());
            $battle->created_at       = date("Y-m-d");
            $battle->image_one_link   = "profit.link";
            $battle->image_two_link   = "profit.link";
            $battle->image_three_link = "profit.link";

            $gifs[0]->moveTo("img/". $battle->image_one . ".gif");
            imagepng(imagecreatefromstring(file_get_contents("img/". $battle->image_one .".gif")), "img/". $battle->image_one .".png");

            $gifs[1]->moveTo("img/". $battle->image_two . ".gif");
            imagepng(imagecreatefromstring(file_get_contents("img/". $battle->image_two .".gif")), "img/". $battle->image_two .".png");

            $gifs[2]->moveTo("img/". $battle->image_three . ".gif");
            imagepng(imagecreatefromstring(file_get_contents("img/". $battle->image_three .".gif")), "img/". $battle->image_three .".png");


            $vote = new Vote();
            $vote->image_one   = 0;
            $vote->image_two   = 0;
            $vote->image_three = 0;

            $battle->vote = $vote;

            if ( $battle->create() ) { $this->response->redirect(""); }

        }else{
        	echo "por favor insira 3 imagens gif";
        }
    }

    /**
     * [fightAction description]
     * @param  integer $id battle_id
     * @return [type]     [description]
     */
    public function fightAction($id = null)
    {
        // verificar se o id passado existe na BD
        if ($id != null && is_numeric($id) && Battle::findFirstByIdBattle($id)) {
               $this->view->setVar("battle", Battle::findFirstByIdBattle($id));
        } else {
            $this->response->redirect("");
        }
    }

    /**
     * [randomAction description]
     * @return [type] [description]
     */
    public function randomAction()
    {
        $random_battle = Battle::findFirst(array(
            "order"  => "RAND()"
        ));

        $this->response->redirect("fight/$random_battle->id_battle");

    }

}
