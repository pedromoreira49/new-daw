<?php

	namespace src\Controllers;

	class VerifyController{
		public static function index(){

			if(isset($_POST['verify'])){
				if($_POST['code'] != ''){
					$pdo = \src\Mysql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");

					$pdo->execute(array($_SESSION['tmp_email']));

					$dados = $pdo->fetch();

					if($dados['random_code'] == $_SESSION['tmp_code']){
						\src\Utils::alerta('Codigo válido');
						\src\Utils::redirect(INCLUDE_PATH.'changepassword');
					}
				}else{
					\src\Utils::alerta("Informe um codigo");
				}
			}

			\src\Views\MainView::render('verify');
		}
	}


?>