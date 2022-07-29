<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	define('INCLUDE_PATH', 'http://localhost/new-daw/');

	require('vendor/autoload.php');

	$app = new src\Application();

	$app->run();

?>