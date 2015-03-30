<?php

class IndexController extends ControllerBase
{

	/**
	 * AJAX exemplo completo feito pelo Konius:
	 *
	 *
	 * //        if ($this->request->isAjax()) {
	 * //            $payload     = array(1, 2, 3);
	 * //            $status      = 200;
	 * //            $description = 'OK';
	 * //            $headers     = array();
	 * //            $contentType = 'application/json';
	 * //            $content     = json_encode($payload);
	 * //
	 * //            $response = new \Phalcon\Http\Response();
	 * //
	 * //            $response->setStatusCode($status, $description);
	 * //            $response->setContentType($contentType, 'UTF-8');
	 * //            $response->setContent($content);
	 * //
	 * //            // Set the additional headers
	 * //            foreach ($headers as $key => $value) {
	 * //                $response->setHeader($key, $value);
	 * //            }
	 * //
	 * //            $this->view->disable();
	 * //
	 * //            return $response;
	 * //        }
	 *
	 *
	 * @return \Phalcon\Http\ResponseInterface
	 */

	/**
	 * pesquisar info no forum:
	 *
	 * este exemplo é muito bom para aprender
	 * http://forum.phalconphp.com/discussion/2822/ajax
	 */

    public function indexAction()
    {
	    if ($this->request->isAjax()) {

		    $this->view->disable();
		    $this->response->setContentType("application/json", 'UTF-8');

		    foreach (Acordos::find() as $acordo) {
			    $data[] = array(
				    'id'               => $acordo->id,
				    'datetime_acordo'  => $acordo->datetime_acordo,
				    'instituicao'      => $acordo->instituicao,
				    'foto_instituicao' => $acordo->foto_instituicao
			    );
		    }

		    return $this->response->setJsonContent(json_encode(array(
			    $data
		    )));

	    }
    }

	public function ajaxPostAction()
	{
		if ($this->request->isAjax()) {

			$this->view->disable();
			$this->response->setContentType("application/json", 'UTF-8');

			foreach(Especialidades::find() as $especialidade) {
				$data[] = array(
					'id'                    => $especialidade->id,
					'especialidade'         => $especialidade->especialidade,
					'descricao_especialide' => $especialidade->descricao_especialidade,
					'preco_consulta'        => $especialidade->preco_consulta
				);
			}

			return $this->response->setJsonContent(json_encode(array(
				$data
			)));

		}

	}


	public function ajaxGetAction()
	{
		if ($this->request->isAjax() && $this->request->hasQuery("id")) {

			echo "hello";
			die;
			$this->view->disable();
			$this->response->setContentType("application/json", 'UTF-8');

			$acordos = Acordos::find(array(
				"WHERE id = " . $this->request->getQuery("id", "int")
			));

			foreach ( $acordos as $acordo) {
				$data[] = array(
					'id'               => $acordo->id,
					'datetime_acordo'  => $acordo->datetime_acordo,
					'instituicao'      => $acordo->instituicao,
					'foto_instituicao' => $acordo->foto_instituicao
				);
			}

			return $this->response->setJsonContent(json_encode(array(
				$data
			)));

		}

	}
}

