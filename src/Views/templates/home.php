<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>src/views/templates/css/styles.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
	<form method="post">
		<input type="text" name="produto" placeholder="Pesquisar produtos" />
		<input type="hidden" name="procurar" />
		<input type="submit" name="acao" value="Procurar" />
	</form>
</div>

<?php

	if(isset($_POST['procurar'])){
		if($_POST['produto'] != ''){
			$produtos = \src\Models\HomeModel::getProductsByName($_POST['produto']);

			foreach($produtos as $key => $value){
?>
				<div class="form-style-6">
				<div class="w50 center"><h1><?php echo $value['nome']; ?></h1></div>
				<div class="w50 center"><h1>Quantidade: <?php echo $value['quantidade']; ?></h1></div>
				</div>
				<div class="card"><p><?php echo $value['descricao']; ?></p></div>
<?php
			}
		}else{
			$produtos = \src\Models\HomeModel::getAllProducts();
			$category = \src\Models\HomeModel::getCategory();
			$categorias = array();
			foreach ($category as $key => $value){
				$categorias[$key]['idcategoria'] = $value['idcategoria'];
				$categorias[$key]['nome'] = $value['nome'];
			}
			foreach ($produtos as $key => $value) {
				$produto = $produtos[$key]['idcategoria'];
?>
				<div class="form-style-6">
					<div class="w50 center"><h1><?php echo $value['nome']; ?></h1></div>
					<div class="w50 center"><h1>Quantidade: <?php echo $value['quantidade']; ?></h1></div>
				</div>
				<div class="card"><p><?php echo $value['descricao']; ?></p></div>
				<div class="card"><p><?php foreach($categorias as $key => $value) {
					if($produto == $value['idcategoria']){
						echo $value['nome'];
					}
				}
			?></p></div>
<?php
			}
		}
	}
?>

</body>
</html>