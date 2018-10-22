<?php 


require_once "../../classes/conexao.php";
	$c= new conectar();
	$conexao=$c->conexao();

	$dados=$_POST['dados'];

	$idproduto = $dados[0];
	$quantidade = $dados[3].$dados[4].$dados[5].$dados[6];


	
	$sqlU = "UPDATE produtos SET quantidade = '$quantidade' where id_produto = '$idproduto' ";
		mysqli_query($conexao,$sqlU);

	


 ?>