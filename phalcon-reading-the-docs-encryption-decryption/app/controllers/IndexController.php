<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
		/**
		 * Phalcon provides encryption facilities via the Phalcon\Crypt component.
		 * This class offers simple object-oriented wrappers to
		 * the mcrypt php’s encryption library.
		 *
		 * By default, this component provides secure encryption
		 * using AES-256 (rijndael-256-cbc).
		 *
		 * http://docs.phalconphp.com/en/latest/reference/crypt.html#encryption-decryption
		 */
	    echo "<h2>Utilização básica:</h2>";

	    $key  = "le password";
	    $text = "This is a secret text";

	    echo "key: ", $key, "<br>";
	    echo "text: ", $text, "<br>";

	    // encriptar informação
		$encrypted =  $this->crypt->encrypt($text, $key);
	    echo "mensagem encriptada: ", $encrypted, "<br>";

	    // decriptar essa informação
	    echo "mensagem decriptada: ", $this->crypt->decrypt($encrypted, $key), "<br>";


	    echo "<hr>";
	    echo "<h2>Mostrar que é sempre gerado novos valores:</h2>";

	    /**
	     * é sempre gerado valores diferentes como se irá ver a seguir
	     */
	    $texts = array(
		    "my-key"    => "This is a secret text",
		    "other-key" => "This is a very secret"
	    );

	    foreach ($texts as $key => $text) {

		    //Perform the encryption
		    echo "mensagem encriptada: ", $this->crypt->encrypt($text, $key), "<br>";

		    //Now decrypt
		    echo "mensagem decriptada: ", $this->crypt->decrypt($encrypted, $key), "<br>";
	    }


	    echo "<hr>";
	    echo "<h2>Alterar o tipo de encriptação aplicado:</h2>";
	    /**
	     * é ainda possível mudar a forma ou o tipo de encriptação que é
	     * aplicado:
	     *
	     * http://docs.phalconphp.com/en/latest/reference/crypt.html#encryption-options
	     */

			//Exempo: Usar o tipo "blowfish"
			$this->crypt->setCipher("blowfish");

			$key  = "chave-da-info-ultra-secreta";
			$text = "info-ultra-secreta-que-a-NSA-não-pode-saber";

			echo "mensagem encriptada: ", $this->crypt->encrypt($text, $key), "<br>";


	    echo "<hr>";
	    echo "<h2>Encriptação para a web:</h2>";
	    /**
	     * codificação para a web base64
	     * http://docs.phalconphp.com/en/latest/reference/crypt.html#base64-support
	     */

	    $key  = "a-minha-key";
	    $text = "CIA-secreto";

	    //Está a aparecer um erro deste tipo:
	    //http://stackoverflow.com/questions/28019839/warning-mcrypt-encrypt-size-of-key-is-too-large-for-this-algorithm
	    echo "mensagem encriptada: ", $this->crypt->encryptBase64($text, $key);
	    echo "mensagem decriptada: ", $this->crypt->decryptBase64($text, $key);

	    /**
	     * SETTING UP AN ENCRYPTION SERVICE:
	     *
	     * You can set up the encryption component in the services container
	     * in order to use it from any part of the application:
	     *
	     * ver o ficheiro services na pasta config
	     */


    }

}

