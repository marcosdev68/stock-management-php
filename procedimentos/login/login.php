<?php 

session_start();

require_once "../../classes/conexao.php";
require_once "../../classes/usuarios.php";


$obj = new usuarios();



$dados=array(
	
	$_POST['email'],
	$_POST['senha']
	

);



echo $obj->login($dados);

 ?>