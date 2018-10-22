<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/clientes.php";

$id = $_POST['idcliente'];

$obj = new clientes();
echo $obj->excluirCliente($id);

?>