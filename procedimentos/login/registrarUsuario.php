<?php 

require_once "../../classes/conexao.php";
require_once "../../classes/usuarios.php";


$obj = new usuarios();

$senha = sha1($_POST['senha']);

$dados=array(
	$_POST['nome'],
	$_POST['usuario'],
	$_POST['email'],
	$senha

);

echo $obj->registroUsuario($dados);

 ?>