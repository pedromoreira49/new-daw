<?php

	namespace src\Controllers;

	class ChangePasswordController{
		public static function index(){

			if(isset($_POST['change'])){
				if($_POST['newPass'] != '' && $_POST['confirm'] != ''){
					if($_POST['newPass'] == $_POST['confirm']){
						$password = $_POST['newPass'];
						$password = \src\Bcrypt::hash($_POST['newPass']);
						$pdo = \src\Mysql::connect()->prepare("UPDATE usuarios SET senha = ? , random_code = ? WHERE email = ?");
						$pdo->execute(array($password, null, $_SESSION['tmp_email']));
						\src\Utils::alerta("Alteração realizada com sucesso!");
						\src\Utils::redirect(INCLUDE_PATH);
					}else{
						\src\Utils::alerta("As senhas não são iguais");
					}
				}else{
					\src\Utils::alerta("Por favor, informe todos os campos");
				}
			}

			\src\Views\MainView::render("changepassword");
		}
	}


?>