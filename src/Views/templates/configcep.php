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
	<h1>Informe seu cep:</h1>
	<form method="post">
		<input type="text" name="cep" placeholder="Your location..." />
		<input type="submit" name="acao" value="check" />
		<input type="hidden" name="check">
	</form>
</div>

<?php

    if(isset($_POST['check'])){
        if($_POST['cep'] != ''){
            $result = \src\Services\ApiServices::callApi($_POST['cep']);
            $obj = json_decode($result, true);
?>
<div class="card">
        <p>Logradouro:
            <?php echo $obj['logradouro'];?>
        </p>
    </div>
    <div class="card">
        <p>Complemento:
            <?php echo $obj['complemento'];?>
        </p>
    </div>
    <div class="card">
        <p>Bairro:
            <?php echo $obj['bairro'];?>
        </p>
    </div>
    <div class="card">
        <p>Cidade:
            <?php echo $obj['localidade'];?>
        </p>
    </div>
    <div class="card">
        <p>UF:
            <?php echo $obj['uf'];?>
        </p>
    </div>
<?php
        }else{
            \src\Utils::alerta("Informe um cep!");
        }
    }


?>

    
</body>
</html>