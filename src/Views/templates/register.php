<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Daw</title>
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>src/views/templates/css/styles.css">
</head>
<body>
	<div class="form-style-6">
		<h1>User Register</h1>
		<form method="post" enctype="multipart/form-data">
			<input type="text" name="nome" placeholder="Nome do usuario" />
			<input type="email" name="email" placeholder="email" />
			<input type="password" name="pass" placeholder="senha" />
			<input type="file" name="imagem" />
			<input type="submit" value="Cadastrar" />
			<input type="hidden" name="register">
		</form>
	</div>
</body>
</html>