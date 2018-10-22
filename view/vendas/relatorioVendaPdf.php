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
        pro.descricao
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

 	

 	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
 
 		<img src="../../img/logo.png" width="250" height="150" >
 		<br>
 		<table class="table">
 			<tr>
 				<td>Data: 
 				<?php echo date("d/m/Y", strtotime($data)) ?>
 				</td>
 			</tr>
 			<tr>
 				<td>Comprovante: <?php echo $comp ?></td>
 			</tr>
 			<tr>
 				<td>Cliente: <?php echo $objv->nomeCliente($idcliente); ?></td>
 			</tr>
 		</table>


 		<table class="table">
 			<tr>
 				<td>Produto</td>
 				<td>Preco</td>
 				<td>Quantidade</td>
 				<td>Descricao</td>
 			</tr>

 			<?php 
 			$sql="SELECT ve.id_venda,
						ve.dataCompra,
						ve.id_cliente,
						pro.nome,
				        pro.preco,
				        pro.descricao,
				        ve.quantidade
					from vendas  as ve 
					inner join produtos as pro
					on ve.id_produto=pro.id_produto
					and ve.id_venda='$idvenda'";

			$result=mysqli_query($conexao,$sql);
			$total=0;
			while($mostrar=mysqli_fetch_row($result)):
 			 ?>

 			<tr>
 				<td><?php echo $mostrar[3]; ?></td>
 				<td><?php echo "R$ ".$mostrar[4].",00"; ?></td>
 				<td><?php echo $mostrar[6]; ?></td>
 				<td><?php echo $mostrar[5]; ?></td>
 			</tr>
 			<?php 
 				$total=$total + $mostrar[4];
 			endwhile;
 			 ?>
 			 <tr>
 			 	<td>Total: <?php echo "R$ ".$total.",00"; ?></td>
 			 </tr>
 		</table>
