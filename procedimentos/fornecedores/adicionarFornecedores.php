<?php 

session_start();
require_once "../../classes/conexao.php";
require_once "../../classes/fornecedores.php";




$idusuario = $_SESSION['iduser'];



$obj = new fornecedores();



$dados=array(
	$idusuario,
	$_POST['nome'],
	$_POST['sobrenome'],
	$_POST['endereco'],
	$_POST['email'],
	$_POST['telefone'],
	$_POST['cpf']

);

echo $obj->adicionar($dados);

 ?>