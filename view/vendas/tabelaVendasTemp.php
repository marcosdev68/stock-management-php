<?php 

	session_start();
	
 ?>

 <h4>Criar Venda</h4>
 <h4><strong><div id="nomeclienteVenda"></div></strong></h4>
 <table class="table table-bordered table-hover table-condensed" style="text-align: center;">
 	<caption>
 		<span class="btn btn-success" onclick="criarVenda()"> Criar Venda
 			<span class="glyphicon glyphicon-usd"></span>
 		</span>
 	</caption>
 	<tr>
 		<td>Nome</td>
 		<td>Descrição</td>
 		<td>Preço</td>
 		<td>Quantidade</td>
 		<td>Remover</td>
 	</tr>
 	<?php 
 	$total=0;//total da venda em dinheiro
 	$cliente=""; //nome cliente
 		if(isset($_SESSION['tabelaComprasTemp'])):
 			$i=0;
 			foreach (@$_SESSION['tabelaComprasTemp'] as $key) {

 				$d=explode("||", @$key);
 	 ?>

 	<tr>
 		<td><?php echo $d[1] ?></td>
 		<td><?php echo $d[2] ?></td>
 		<td><?php echo "R$ ".$d[3].",00" ?></td>
 		<td><?php echo $d[6]; ?></td>
 		<td>

 			

 			<span class="btn btn-danger btn-xs" onclick="fecharP('<?php echo $i; ?>'), editarP('<?php echo $d[0]; ?>, <?php echo $d[5]; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>
 	</tr>

 <?php 
 		$calc = $d[3] * $d[6];
		$total = $_SESSION['total_venda'] = $total + $calc;
		$_SESSION['quantidade'] = $d[6];
 		$cliente=$d[4];
 	}
 	endif; 
 ?>

 	<tr>
 		<td colspan="5">Total da venda: <?php echo "<b>R$ ".$total.",00</b>"; ?></td>
 	</tr>

 </table>


 <script type="text/javascript">
 	$(document).ready(function(){
 		nome="<?php echo @$cliente ?>";
 		$('#nomeclienteVenda').text("Nome de cliente: " + nome);
 	});
 </script>