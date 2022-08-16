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
	<h1>Verify code:</h1>
	<form method="post">
		<input type="number" name="code" placeholder="Code" />
		<input type="submit" name="acao" value="Entrar" />
		<input type="hidden" name="verify">
	</form>
</div>
</body>
</html>