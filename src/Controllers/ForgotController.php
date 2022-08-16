<?php

	namespace src\Controllers;

	class ForgotController{
		public static function index(){
			if(isset($_POST['forgot'])){
				if($_POST['email'] != ''){
					$pdo = \src\Mysql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");
					$pdo->execute(array($_POST['email']));
					if($pdo->rowCount() > 0){
						$dados = $pdo->fetch();
						$code = \src\Models\EmailModels::sender($_POST['email'], $dados['nome']);
						$change = \src\Mysql::connect()->prepare("UPDATE usuarios SET random_code = ? WHERE email = ?");
						$change->execute(array($code, $_POST['email']));
						$_SESSION['tmp_code'] = $code;
						$_SESSION['tmp_email'] = $_POST['email'];
						\src\Utils::alerta("Verifique sua caixa de email!");
						\src\Utils::redirect(INCLUDE_PATH.'verify');
					}else{
						\src\Utils::alerta("Não existem usuarios com este email");
					}
				}else{
					\src\Utils::alerta("Por favor informe um email");
				}
			}

			\src\Views\MainView::render('forgot');
		}
	}


?>