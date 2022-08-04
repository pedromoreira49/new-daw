<?php 

	namespace src\Models;

	class VerifyModels{

		public static function genCode(){
			$numbers = "0123456789";
			srand((double)microtime()*1000000);

			$i = 0;
			$pass = '';
			while($i <= 7){
				$num = rand() % 33;
				$tmp = substr($numbers, $num, 1);
				$pass = $pass . $tmp;
				$i++;
			}

			return $pass;
		}

	}


?>