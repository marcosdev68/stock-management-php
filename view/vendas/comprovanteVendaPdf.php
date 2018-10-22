<?php 
	require_once "../../classes/conexao.php";
	require_once "../../classes/vendas.php";

	$objv= new vendas();


	$c= new conectar();
	$conexao=$c->conexao();
	$idvenda=$_GET['idvenda'];

 $sql="SELECT ve.id_venda,
		ve.dataCompra,
		ve.id_cliente,
		pro.nome,
        pro.preco,
        pro.quantidade
	from vendas  as ve 
	inner join produtos as pro
	on ve.id_produto=pro.id_produto
	and ve.id_venda='$idvenda'";

$result=mysqli_query($conexao,$sql);

	$ver=mysqli_fetch_row($result);

	$comp=$ver[0];
	$data=$ver[1];
	$idcliente=$ver[2];

 ?>	


 	<style type="text/css">
		
@page {
            margin-top: 0.3em;
            margin-left: 0.6em;
        }
    body{
    	font-size: xx-small;
    }
	</style>

	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
 
 		<p class="">Vendas</p>
 		<p>
 			Data: 
 			<?php echo date("d/m/Y", strtotime($data)) ?>
 		</p>
 		<p>
 			Comprovante: <?php echo $comp ?>
 		</p>
 		<p>
 			Cliente: <?php echo $objv->nomeCliente($idcliente); ?>
 		</p>
 		
 		<table style="border-collapse: collapse;" border="1" width="135px">
 			<tr>
 				<td>Nome</td>
 				<td>Preco</td>
 				<td>Quantidade</td>
 			</tr>
 			<?php 
 				$sql="SELECT ve.id_venda,
							ve.dataCompra,
							ve.id_cliente,
							pro.nome,
					        pro.preco,
					        pro.quantidade
						from vendas  as ve 
						inner join produtos as pro
						on ve.id_produto=pro.id_produto
						and ve.id_venda='$idvenda'";

				$result=mysqli_query($conexao,$sql);
				$total=0;
				while($mostrar=mysqli_fetch_row($result)){
 			 ?>
 			<tr>
 				<td><?php echo $mostrar[3]; ?></td>
 				<td><?php echo "R$ ".$mostrar[4].",00" ?></td>
 				<td><?php echo $mostrar[5]; ?></td>
 			</tr>
 			<?php
 				$total=$total + $mostrar[4];
 				} 
 			 ?>
 			 <tr>
 			 	<td colspan="3">Total: <?php echo "R$ ".$total.",00" ?></td>
 			 </tr>
 		</table>

 		
