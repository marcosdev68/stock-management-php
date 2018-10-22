<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/clientes.php";



$obj = new clientes();



$dados=array(
	$_POST['idclienteU'],
	$_POST['nomeU'],
	$_POST['sobrenomeU'],
	$_POST['enderecoU'],
	$_POST['emailU'],
	$_POST['telefoneU'],
	$_POST['cpfU']
	

);

echo $obj->atualizarCliente($dados);

 ?>