<?php

	namespace src\Controllers;

	class HomeController{
		public function index(){

			if(isset($_GET['loggout'])){
				session_unset();
				session_destroy();

				\src\Utils::redirect(INCLUDE_PATH);	
			}


			if(isset($_SESSION['login'])){
				\src\Views\MainView::render('home');
			}else{
				if(isset($_POST['login'])){
					$login = $_POST['email'];
					$senha = $_POST['pass'];

					$verifica = \src\Mysql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");
					$verifica->execute(array($login));

					if($verifica->rowCount() == 0){
						\src\Utils::alerta('Email incorretos! :(');
						\src\Utils::redirect(INCLUDE_PATH);
					}else{
						$dados = $verifica->fetch();
						$password = $dados['senha'];
						if(\src\Bcrypt::check($senha, $password)){
							$_SESSION['login'] = $dados['email'];
							$_SESSION['id'] = $dados['idusuario'];
							$_SESSION['nome'] = explode(' ', $dados['nome'])[0];
							\src\Utils::alerta('Logado com sucesso!');
							\src\Utils::redirect(INCLUDE_PATH);
						}else{
							\src\Utils::alerta('Dados incorretos!');
							\src\Utils::redirect(INCLUDE_PATH);
						}
					}
				}
				\src\Views\MainView::render('login');
			}
		}
	}

?>