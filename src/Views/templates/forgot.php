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
	<h1>Informe o email cadastrado:</h1>
	<form method="post">
		<input type="email" name="email" placeholder="E-mail..." />
		<input type="submit" name="acao" value="Send" />
		<input type="hidden" name="forgot">
	</form>
</div>
</body>
</html>