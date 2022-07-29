<?php
	
	namespace src;

	class Application{
		private $controller;

		private function setApp(){

			$loadName = 'src\Controllers\\';
			$url = explode('/', @$_GET['url']);

			if($url[0] == ''){
				$loadName.='Home';
			}else{
				$loadName.=ucfirst(strtolower($url[0]));
			}

			$loadName.='Controller';
			if(file_exists($loadName.'.php')){
				$this->controller = new $loadName();
			}else{
				include('views/templates/404.php');
				echo $loadName;
				die();
			}

			$this->controller = new $loadName();
		}

		public function run(){
			$this->setApp();
			$this->controller->index();
		}
	}

?>