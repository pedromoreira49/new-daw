<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>src/views/templates/css/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Daw</title>
</head>
<body>
<div class="form-style-6">
	<h1>Login:</h1>
	<form method="post">
		<input type="text" name="email" placeholder="Email" />
		<input type="password" name="pass" placeholder="Senha" />
		<input type="submit" name="acao" value="Entrar" />
		<input type="hidden" name="login">
	</form>
	<p><a href="<?php echo INCLUDE_PATH ?>register">Register</a></p>
	<p><a href="<?php echo INCLUDE_PATH ?>forgot">Forgot password</a></p> 
</div>
</body>
</html>