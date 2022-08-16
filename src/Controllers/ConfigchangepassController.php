<?php
	
	namespace src\Controllers;

	class ConfigchangepassController{
		public static function index(){
			if(isset($_POST['change'])){
				$pdo = \src\Mysql::connect()->prepare("SELECT * FROM usuarios WHERE idusuario = ?");

				$pdo->execute(array($_SESSION['id']));
				if($_POST['oldPass'] != ''){
					$dados = $pdo->fetch();
					if(\src\Bcrypt::check($_POST['oldPass'], $dados['senha'])){
						if($_POST['newPass'] != ''){
							$newPass = $_POST['newPass'];
							if($_POST['confirm'] != ''){
								$confirmPass = $_POST['confirm'];
								if($newPass === $confirmPass){
									$newPass = \src\Bcrypt::hash($newPass);
									$update = \src\Mysql::connect()->prepare("UPDATE usuarios SET senha = ? WHERE idusuario = ?");
									$update->execute(array($newPass, $_SESSION['id']));
									\src\Utils::alerta("Senha alterada com sucesso");
								}else{
									\src\Utils::alerta("Senhas diferentes!");
								}
							}else{
								\src\Utils::alerta("Informe a confirmação da senha!");
							}
						}else{
							\src\Utils::alerta("Informe uma nova senha!");
						}
					}else{
						\src\Utils::alerta("A senha antiga está errada!");
					}
				}else{
					\src\Utils::alerta("Informe uma senha!");
				}
			}

			\src\Views\MainView::render('configchangepass');
		}
	}

?>