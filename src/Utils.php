<?php

	namespace src;

	class Utils{
		public static function redirect($url){
			echo '<script>window.location.href="'.$url.'"</script>';
			die();
		}

		public static function alerta($mensagem){
			echo '<script>alert("'.$mensagem.'")</script>';
		}

	}


?>