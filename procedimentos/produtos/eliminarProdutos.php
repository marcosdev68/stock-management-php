<?php 

	require_once "../../classes/conexao.php";
	require_once "../../classes/produtos.php";

	$obj= new produtos();

	$idpro=$_POST['idproduto'];

	echo $obj->excluir($idpro);

?>