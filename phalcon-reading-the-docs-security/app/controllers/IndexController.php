<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
	    /**
	     * The salt is generated using pseudo-random bytes with the PHP’s
	     * function openssl_random_pseudo_bytes so is required to have the
	     * openssl extension loaded.
	     */
		$myAwesomePassword = "1tvuyiu23";
	    $passHashed = $this->security->hash($myAwesomePassword);
	    $otherTimeHashedPass = $this->security->hash($myAwesomePassword);

	    echo "<hr>";
	    echo "Original Pass: ". $myAwesomePassword ."<br>";
	    echo "<hr>";
	    echo "Hashed Pass: ". $passHashed ."<br>";
	    echo "Hashed Pass again: ". $otherTimeHashedPass ."<br>";
	    echo "<hr>";
		echo "<p>como podemos ver, para a mesma password, este algoritmo, faz com que
				a hash gerada seja sempre diferente!</p>";

		/**
		 * no entanto o seu conteúdo original é o mesmo!
		 */
	    if ($this->security->checkHash($myAwesomePassword, $passHashed)) {
		    echo "Ainda assim, The original value of the passwords are equal! <br>";
	    }

	    if ($this->security->checkHash($myAwesomePassword, $otherTimeHashedPass)) {
		    echo "Ainda assim, The original value of the passwords are equal! <br>";
	    }

    }

	public function formAction()
	{
		if ($this->request->isPost()) {
			if ($this->security->checkToken()) {
				echo "<h1>O token é o mesmo, logo não há nenhum cracker
				manhoso a tentar coisas.</h1>";
			}
		}
	}

}

