<?php

	namespace src\Models;

	class UsersModels{
		public static function dbVerifyEmail($email){
			$pdo = \src\Mysql::connect()->prepare("SELECT * FROM `usuarios` WHERE email = ?");
			$pdo->execute(array($email));


			if($pdo->rowCount() == 1){
				return true;
			}else{
				return false;
			}
		}
	}


?>