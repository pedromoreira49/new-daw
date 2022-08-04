<?php 

	namespace src\Controllers;

	class RegisterController{

		public function index(){

			if(isset($_POST['register'])){
				$nome = $_POST['nome'];
				$email = $_POST['email'];
				$password = $_POST['pass'];
				
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					\src\Utils::alerta('Email inválido!');
					\src\Utils::redirect(INCLUDE_PATH.'register');
				}else if(strlen($password) < 6){
					\src\Utils::alerta('Senha muito curta, minimo 6 caracteres');
					\src\Utils::redirect(INCLUDE_PATH.'register');
				}else if(\src\Models\UsersModels::dbVerifyEmail($email)){
					\src\Utils::alerta('Este email já esta em uso');
					\src\Utils::redirect(INCLUDE_PATH.'register');
				}else{
					$password = \src\Bcrypt::hash($password);
					if($_FILES['imagem']['tmp_name'] != ''){
						$image = $_FILES['imagem'];
						$fileExt = explode('.', $image['name']);
						$fileExt = $fileExt[count($fileExt) -1];
						if($fileExt == 'png' || $fileExt == 'jpg' || $fileExt == 'jpeg'){
							$size = intval($image['size'] / 1024);
							if($size <= 500){
								$uniqueID = uniqid().'.'.$fileExt;
								$_SESSION['code'] = \src\Models\EmailModels::sender($email, $nome);
								$sql = \src\Mysql::connect()->prepare("INSERT INTO usuarios VALUES (?, ?, ?, ?, ?, ?, ?)");
								$sql->execute(array(null, $nome, $email, $password, $uniqueID, 1, 1));
								move_uploaded_file($image['tmp_name'], 'c:/xampp/htdocs/new-daw/uploads/'.$uniqueID);
								$_SESSION['email'] = $email;
								\src\Utils::alerta('Verifique sua caixa de email');
								\src\Utils::redirect(INCLUDE_PATH.'verifyCode');	
							}else{
								\src\Utils::alerta('Tamanho da imagems muito grande!');
								\src\Utils::redirect(INCLUDE_PATH);
							}
						}else{
							\src\Utils::alerta('Formato de imagem não permitido!');
							\src\Utils::redirect(INCLUDE_PATH);
						}
					}else{
						$_SESSION['code'] = \src\Models\EmailModels::sender($email, $nome);
						$sql = \src\Mysql::connect()->prepare("INSERT INTO usuarios VALUES (?, ?, ?, ?, ?, ?, ?)");
						$sql->execute(array(null, $nome, $email, $password, null, 1, 0));
						$_SESSION['email'] = $email;
						\src\Utils::alerta('Verifique sua caixa de email');
						\src\Utils::redirect(INCLUDE_PATH.'verifyCode');
					}
				}
			}
			\src\Views\MainView::render('register');
		}


	}


?>