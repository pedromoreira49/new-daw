<?php
	namespace src\models;

	class HomeModel{
		public static function getAllProducts(){
			$pdo = \src\Mysql::connect();

			$produtos = $pdo->prepare("SELECT * FROM produtos");

			$produtos->execute();

			return $produtos->fetchAll();
		}

		public static function getProductsByName($name){
			$pdo = \src\Mysql::connect();

			$produtos = $pdo->prepare("SELECT * FROM produtos WHERE nome LIKE ?");

			$produtos->execute(array($name));

			return $produtos->fetchAll();
		}

		public static function getCategory(){
			$pdo = \src\Mysql::connect();

			$categorias = $pdo->prepare("SELECT * FROM categorias");

			$categorias->execute();

			return $categorias->fetchAll();
		}
	}
?>