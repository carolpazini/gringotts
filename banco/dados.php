<!DOCTYPE html>

<?php 

session_start();
require 'config.php';

if(isset($_SESSION['banco']) && !empty($_SESSION['banco'])){
 #A sessão foi encontrada, logo vamos pegar o id dessa sessao para pegar o restante das informações

	$id   = $_SESSION['banco'];
	$nome = $_SESSION['nome'];
	
	$sql=$pdo->prepare("SELECT *FROM contas WHERE id = :id");
	$sql -> bindValue(":id", $id);
	$sql->execute();
	#se o select retornar alguma linha, significa que existe um usuário. Pegamos os dados da tabela desse usuário passando para variavel $info, que será o vetor.
	if ($sql->rowCount()>0) {
		$info = $sql->fetch();
	}else{
		#caso contrario, não achou ou não bate a senha, encaminha para o login
		header("Location: login.php");
		exit;
	}
}else{
		#caso contrario mandamos para o login e paramos o processamento da pagina
		header("Location: login.php");
		exit;
	}

?>


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
		<div class = "esquerda">	
		
		
				<?php echo "Olá, ".$nome; ?>
				
		</div >

		<h1 class ="esquerda3" >Seus dados bancários:</h1>
		<div class = "esquerda2">

        
            Titular: <?php echo $info['titular'];?> <br>
			Agência: <?php echo $info['agencia'];?> <br>
			Conta: 	 <?php echo $info['conta'  ];?> <br>

		</div>	
		
	</body>
	</html>
