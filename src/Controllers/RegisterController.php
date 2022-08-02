<?php 

	namespace src\Controllers;

	class RegisterController{

		public function index(){

			if(isset($_POST['register'])){
				$nome = $_POST['nome'];
				$email = $_POST['email'];
				$password = $_POST['pass'];
				
				if($_FILES['imagem']['tmp_name'] != ''){
					$image = $_FILES['imagem'];
					$fileExt = explode('.', $image['name']);
					$fileExt = $fileExt[count($fileExt) -1];
					if($fileExt == 'png' || $fileExt == 'jpg' || $fileExt == 'jpeg'){
						$size = intval($image['size'] / 1024);
						if($size <= 500){
							$uniqueID = uniqid().'.'.$fileExt;
							$sql = \src\Mysql::connect()->prepare("INSERT INTO usuarios VALUES (?, ?, ?, ?, ?, ?, ?)");
							$sql->execute(array(null, $nome, $email, $password, $uniqueID, 1, 0));
							move_uploaded_file($image['tmp_name'], 'c:/xampp/htdocs/new-daw/uploads/'.$uniqueID);
							\src\Utils::alerta('Registrado com sucesso');
							\src\Utils::redirect(INCLUDE_PATH);
						}else{
							\src\Utils::alerta('Tamanho da imagems muito grande!');
							\src\Utils::redirect(INCLUDE_PATH);
						}
					}else{
						\src\Utils::alerta('Formato de imagem não permitido!');
						\src\Utils::redirect(INCLUDE_PATH);
					}
				}else{
					$sql = \src\Mysql::connect()->prepare("INSERT INTO usuarios VALUES (?, ?, ?, ?, ?, ?, ?)");
					$sql->execute(array(null, $nome, $email, $password, null, 1, 0));
					\src\Utils::alerta('Registrado com sucesso!');
					\src\Utils::redirect(INCLUDE_PATH);
				}

			}


			\src\Views\MainView::render('register');
		}


	}


?>