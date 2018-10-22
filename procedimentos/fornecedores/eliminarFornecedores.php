<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/fornecedores.php";

$id = $_POST['idfornecedor'];

$obj = new fornecedores();
echo $obj->excluir($id);

?>