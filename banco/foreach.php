<?php

	require 'config.php';
	$sql = $pdo-> prepare("SELECT * FROM clientes");
	$sql -> execute();

	if($sql->rowCount() > 0){
		foreach ($sql->fetchAll() as $item) {
			# code...
			echo $item['idClientes'].",";

			echo $item['clientesNome'].",";

			echo $item['clientesFone'].",";

			echo $item['clientesEmail']."<br>";
		}
	}

  ?>