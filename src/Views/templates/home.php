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
	<div class="w50 center">
		<h1>Olá, <?php echo $_SESSION['nome'];?></h1>
	</div>
	<div class="w50 center">
		<h1><a href="<?php echo INCLUDE_PATH ?>?loggout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></h1>
	</div>
	<form action="actions/procurarProdutos.php" method="post">
		<input type="text" name="nome" placeholder="Pesquisar produtos" />
		<input type="submit" value="Procurar" />
		<input type="button" value="Cadastrar Categoria" onclick="window.location.href='categorias.php'">
		<input type="button" value="Cadastrar Produtos" onclick="window.location.href='produtos.php'">
	</form>
</div>
</body>
</html>