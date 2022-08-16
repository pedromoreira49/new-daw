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
	<h1>Informe a nova senha:</h1>
	<form method="post">
		<input type="password" name="oldPass" placeholder="Old Password..." />
		<input type="password" name="newPass" placeholder="New Password..." />
		<input type="password" name="confirm" placeholder="Confirm Password..." />
		<input type="submit" name="acao" value="Send" />
		<input type="hidden" name="change">
	</form>
	<p><a href="<?php echo INCLUDE_PATH;?>">Back</a></p>
</div>
</body>
</html>