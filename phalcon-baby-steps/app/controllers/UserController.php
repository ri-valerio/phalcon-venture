<?php


class UserController extends BaseController
{

	public function initialize()
	{
		$this->view->setMainView("layouts/user.phtml");
	}

	public function indexAction()
	{
		$this->view->setVars(array(
			'single' => User::findFirstById(1),
			'all'    => User::find(array("deleted IS NULL"))
		));

	}

	public function createAction()
	{
		$user 				= new User();
        $user->email        = "test@test5.com";
        $user->password     = "test5";

        // já está a ser feito automaticamente na classe User.php - method beforeCreate()
        // $user->created_at   = date("Y-m-d H:i:s");

		// é também possível usar o metodo save()
		$resutl = $user->create();

		if (!$resutl) {
			print_r($user->getMessages());
		}else{
			echo "User created successfully";
		}

	}

	public function createProjectAssocAction()
	{
		// só para poder actualizar várias linhas ao mesmo tempo
		$id_do_user = 1;
		// tambem resultava se fosse o metodo findFirstById()
		// NOTA: no metodo abaixo tambem poderia ser passada um argumento com uma string
		// como se fosse uma where clause.
		// assim: findFirst("name = ricardo");
		$user = User::findFirst($id_do_user);
		$project = new Project();

		// A linha abaixo pode ser escrita assim também: $project->user = $user;
		$project->user_id = $user->id;
		$project->title = "Mais um projecto para o User com id $id_do_user";

		// ou o metodo save()
		$result = $project->create();
		if (!$result) {
			print_r($project->getMessages());
		} else {
			echo "Project was created successfully!";
		}
	}

	public function updateAction($email = "updated@email.com", $password = "bazinga")
	{
		// instancia um objecto da classe User.php automagicamente
		$heyyyy = User::findFirstById(12);
		if (!$heyyyy){

			echo "heyyyy not found";
			die;

		}else{

            $heyyyy->email         = $email;
            $heyyyy->password      = $password;

            // já está a ser feito automaticamente na classe User.php - method beforeUpdate()
            // $heyyyy->updated_at    = date("Y-m-d H:i:s");

			// é também possível usar o metodo save();
			$result = $heyyyy->update();

			if (!$result) {
				print_r($heyyyy->getMessages());
			}else{
				echo "User updated successfully";
			}
		}
	}

	public function deleteAction()
	{
		$user = User::findFirstById(11);
		if (!$user) {
			echo "User not found";
			die;
		}

		$result = $user->delete();
		if (!$result) {
			print_r($result->getMessages());
		}else{
			echo "User deleted successfully!";
		}
	}


	public function loginAction()
	{
		if ($this->request->has('username')) {echo "From has() -> Request Data Exists <br>";}
		if ($this->request->hasQuery('username')) {echo "From hasQuery() -> Get Data Exists <br>";}
		if ($this->request->hasPost('username')) {echo "From hasPost() -> Post Data Exists <br><br>";}

		/************************************
		*	EXEMPLO PARA $_REQUEST
		************************************/
		$requestData = $this->request->get(); // $_REQUEST
		echo "Hi from get() - (Request Object) <br>";
		print_r($requestData);
		echo "<br><br>";

		/************************************
		*	EXEMPLO PARA $_GET
		************************************/

		// armazena toda a informação que foi enviada por get
		// NOTA: existe sempre o parametro _url no array $_GET
		$getData = $this->request->getQuery(); // $_GET
		echo "Hi from getQuery() (Get Object) <br>";
		print_r($getData);
		echo "<br><br>";

		// echo $getData['parametro_get'];
		// echo $this->request->getQuery('parametro_get');

		// echo $getData['parametro_get'];
		// echo $this->request->getQuery('parametro_get');

		/************************************
		*	EXEMPLO PARA $_POST
		************************************/

		// armazena toda a informação que foi enviada por post
		$postData = $this->request->getPost(); // $_POST
		echo "Hi from getPost() (Post Object) <br>";
		print_r($postData);
		echo "<br><br>";

		// echo $postData['username'];
		// echo $this->request->getPost('username');

		// echo $postData['password'];
		// echo $this->request->getPost('password');
	}

}


?>
