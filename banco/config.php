<?php

$dns 	= "mysql:dbname=banco;host=localhost";
$dbUser = "root";
$dbPass = "";

try{
	$pdo = new PDO($dns,$dbUser, $dbPass);

}catch (PDOException $e){
	echo "Erro: ".$e->getMessage();
}

?>