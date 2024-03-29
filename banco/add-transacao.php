<?php
session_start();
require 'config.php';

if (isset($_POST['tipo'])) {
	$tipo = $_POST['tipo'];
	$valor= str_replace(",", ".", $_POST['valor']);
	$valor=floatval($valor);

	$sql = $pdo->prepare("INSERT INTO historico (idConta, tipo, valor, dataOperacao) VALUES (:idConta, :tipo, :valor, NOW())");
	$sql->bindValue(":idConta", $_SESSION['banco']);
	$sql->bindValue(":tipo", $tipo);
	$sql->bindValue(":valor",$valor);
	$sql->execute();

	if($tipo == '0'){
		//deposito
		$sql = $pdo->prepare("UPDATE contas SET saldo = SALDO + :valor WHERE id = :id");
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":id", $_SESSION['banco']);
		$sql-> execute();

	}else{

		
		//retidada
		$sql = $pdo->prepare("UPDATE contas SET saldo = SALDO - :valor WHERE id = :id");
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":id", $_SESSION['banco']);
		$sql-> execute();

	}
	header("Location: index.php");
	exit;
	
	}
  ?>

  <!DOCTYPE html>
  <html>
  <head>
		<title>Gringotts</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="shortcut icon" href="img/gringotts.png">
	</head>


	<body>

		
	<div class="corpo branco fundoTopo">
    <header class="conteudo branco">
			<a href="index.php">
				<img src="img/gringotts.png" title="Redireciona para página inicial" class="logo">
			</a>
			<nav class="menu clearfix bordas sombra">
				<ul>
					<li><a href="index.php" > Home </a> </li>
					<li><a href="dados.php" >Seus dados </a></li>
					<li><a href="saldo.php" >Saldo </a></li>
					<li><a href="extrato.php" >Extrato</a></li>
					<li><a href="transacao.php" >Transações</a></li>
					<li><a href="sair.php" >Sair</a></li>
				</ul>
			</nav>
		</header>
	</div>
		
	  	<form method="POST">
	  		Tipo de transação<br>
	  		<select name="tipo">
	  			<option value="0">Depósito</option>
	  			<option value="1">Retirada</option>
	  		</select><br><br>

			  Valor: <br>
			  
			<input type="text" name="valor" pattern="[0-9.,]{1,}"><br><br>
			  
	  		<input type="submit" name="adicionar" value="Adicionar">
	  	</form>
	  </body>
</html>