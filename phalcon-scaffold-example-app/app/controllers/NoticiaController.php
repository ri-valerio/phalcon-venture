<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class NoticiaController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for noticia
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Noticia", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "Id_noticia";

        $noticia = Noticia::find($parameters);
        if (count($noticia) == 0) {
            $this->flash->notice("The search did not find any noticia");

            return $this->dispatcher->forward(array(
                "controller" => "noticia",
                "action"     => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data"  => $noticia,
            "limit" => 10,
            "page"   => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a noticia
     *
     * @param string $Id_noticia
     */
    public function editAction($Id_noticia)
    {

        if (!$this->request->isPost()) {

            $noticia = Noticia::findFirstById_noticia($Id_noticia);
            if (!$noticia) {
                $this->flash->error("noticia was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "noticia",
                    "action"     => "index"
                ));
            }

            $this->view->Id_noticia = $noticia->Id_noticia;

            $this->tag->setDefault("Id_noticia", $noticia->Id_noticia);
            $this->tag->setDefault("lead", $noticia->lead);
            $this->tag->setDefault("texto", $noticia->texto);
            $this->tag->setDefault("data", $noticia->data);
            $this->tag->setDefault("titulo", $noticia->titulo);
            $this->tag->setDefault("imagem", $noticia->imagem);
            
        }
    }

    /**
     * Creates a new noticia
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "noticia",
                "action"     => "index"
            ));
        }

        $noticia = new Noticia();

        $noticia->lead   = $this->request->getPost("lead");
        $noticia->texto  = $this->request->getPost("texto");
        $noticia->data   = $this->request->getPost("data");
        $noticia->titulo = $this->request->getPost("titulo");
        $noticia->imagem = $this->request->getPost("imagem");
        

        if (!$noticia->save()) {
            foreach ($noticia->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "noticia",
                "action"     => "new"
            ));
        }

        $this->flash->success("noticia was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "noticia",
            "action"     => "index"
        ));

    }

    /**
     * Saves a noticia edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "noticia",
                "action"     => "index"
            ));
        }

        $Id_noticia = $this->request->getPost("Id_noticia");

        $noticia = Noticia::findFirstById_noticia($Id_noticia);
        if (!$noticia) {
            $this->flash->error("noticia does not exist " . $Id_noticia);

            return $this->dispatcher->forward(array(
                "controller" => "noticia",
                "action"     => "index"
            ));
        }

        $noticia->lead   = $this->request->getPost("lead");
        $noticia->texto  = $this->request->getPost("texto");
        $noticia->data   = $this->request->getPost("data");
        $noticia->titulo = $this->request->getPost("titulo");
        $noticia->imagem = $this->request->getPost("imagem");
        

        if (!$noticia->save()) {

            foreach ($noticia->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "noticia",
                "action"     => "edit",
                "params"     => array($noticia->Id_noticia)
            ));
        }

        $this->flash->success("noticia was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "noticia",
            "action"     => "index"
        ));

    }

    /**
     * Deletes a noticia
     *
     * @param string $Id_noticia
     */
    public function deleteAction($Id_noticia)
    {

        $noticia = Noticia::findFirstById_noticia($Id_noticia);
        if (!$noticia) {
            $this->flash->error("noticia was not found");

            return $this->dispatcher->forward(array(
                "controller" => "noticia",
                "action"     => "index"
            ));
        }

        if (!$noticia->delete()) {

            foreach ($noticia->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "noticia",
                "action"     => "search"
            ));
        }

        $this->flash->success("noticia was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "noticia",
            "action"     => "index"
        ));
    }

}
