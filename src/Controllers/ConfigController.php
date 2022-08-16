<?php

	namespace src\Controllers;

	class ConfigController{
		public static function index(){
			\src\Views\MainView::render('config');
		}
	}

?>