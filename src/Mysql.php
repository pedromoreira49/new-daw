<?php
	namespace src;
	
	class Mysql{
		private static $pdo;
		public static function connect(){

			$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
			$dotenv->load();

			if(self::$pdo == null){
				try{
					self::$pdo = New \PDO('mysql:host=localhost;dbname=daw;', $_ENV['DB_USER'], $_ENV['DB_PASS'] ,array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
					self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				}catch(Exception $e){
					echo 'error to connect';
					error_log($e->getMessage());
				}
			}

			return self::$pdo;
		}
	}

?>