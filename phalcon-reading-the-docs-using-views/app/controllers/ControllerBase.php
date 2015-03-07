<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	public function initialize()
	{
		// ao definirmos aqui o doctype, quando usamos todos os tag helpers
		// estes são gerados de acordo com as convenções do HTML especificado
		// http://docs.phalconphp.com/en/latest/reference/tags.html#document-type-of-content
		$this->tag->setDoctype(\Phalcon\Tag::HTML5);

		// Phalcon\Tag offers helpers to change dynamically the document title
		// from the controller.
		// Then inside each action you can prepend or append other subtitles!
		$this->tag->setTitle("Title in ControllerBase");
	}
}
