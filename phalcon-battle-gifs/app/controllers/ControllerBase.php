<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
  public function initialize()
  {
      $this->tag->setDoctype(\Phalcon\Tag::HTML5);

      Phalcon\Tag::prependTitle('Battle Gifs | ');

      // $this->assets->addCss('public/css/application.css')
      //        ->addCss('public/css/lightGallery.css');
      //
      // $this->assets->addJs('public/js/jquery.js')
      //        ->addJs('public/js/app.min.js');
  }

}
