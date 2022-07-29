<?php
	
	namespace src\Views;

	class MainView{

		public static function render($filename){
			include('templates/'.$filename.'.php');
		}

	}

?>