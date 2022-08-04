<?php

	namespace src\Controllers;

	class VerifycodeController{
		public function index(){
			$pdo = \src\Mysql::connect();
			if(isset($_POST['verify'])){
				if($_POST['code'] != ''){
					if($_POST['code'] == $_SESSION['code']){
						$update = $pdo->prepare("UPDATE usuarios SET status = 1 WHERE email = ?");
						var_dump($_SESSION['email']);
						$update->execute(array($_SESSION['email']));
						\src\Utils::alerta('Registrado com sucesso');
						\src\Utils::redirect(INCLUDE_PATH);
					}else{
						\src\Utils::alerta('codigo inválido');
						\src\Utils::redirect(INCLUDE_PATH);
					}
				}else{
					\src\Utils::alerta('Informe um código válido');
					\src\Utils::redirect(INCLUDE_PATH);
				}
			}

			\src\Views\MainView::render('verifyCode');
		}


	}


?>