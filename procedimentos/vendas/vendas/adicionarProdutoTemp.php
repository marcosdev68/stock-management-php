<?php 
	session_start();
	require_once "../../classes/conexao.php";
	$c= new conectar();
	$conexao=$c->conexao();

	$idcliente=$_POST['clienteVenda'];
	$idproduto=$_POST['produtoVenda'];
	$descricao=$_POST['descricaoV'];
	$quantidade=$_POST['quantidadeV'];
	$quantV=$_POST['quantV'];
	$preco=$_POST['precoV'];


	$sql="SELECT nome,sobrenome 
			from clientes 
			where id_cliente='$idcliente'";
	$result=mysqli_query($conexao,$sql);

	$c=mysqli_fetch_row($result);

	$ncliente=$c[0]." ".$c[1];

	$sql="SELECT nome 
			from produtos
			where id_produto='$idproduto'";
	$result=mysqli_query($conexao,$sql);

	$nomeproduto=mysqli_fetch_row($result)[0];

	$produto=$idproduto."||".
				$nomeproduto."||".
				$descricao."||".
				$preco."||".
				$ncliente."||".
				$quantidade."||".
				$quantV."||".
				$quantV * $preco."||".
				$idcliente;

	$_SESSION['tabelaComprasTemp'][]=$produto;




	//ATUALIZAÇÃO DO ESTOQUE
	$quantNova = $quantidade - $quantV;
	$sqlU = "UPDATE produtos SET quantidade = '$quantNova' where id_produto = '$idproduto' ";
		mysqli_query($conexao,$sqlU);

 ?>