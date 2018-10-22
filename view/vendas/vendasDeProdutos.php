<?php 

require_once "../../classes/conexao.php";
	$c= new conectar();
	$conexao=$c->conexao();
?>


<h4>Efetuar Venda</h4>
<div class="row">
	<div class="col-sm-4">
		<form id="frmVendasProdutos">
			<label>Selecionar Cliente <i class="fa fa-user"></i></label>
			<select class="form-control input-sm" id="clienteVenda" name="clienteVenda">
				<option value="A">Selecionar</option>
				<option value="0">Sem Clientes</option>
				<?php
				$sql="SELECT id_cliente,nome,sobrenome 
				from clientes";
				$result=mysqli_query($conexao,$sql);
				while ($cliente=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1]." ".$cliente[2] ?></option>
				<?php endwhile; ?>
			</select>
			<label>Produto <i class="fa fa-tag"></i></label>
			<select class="form-control input-sm" id="produtoVenda" name="produtoVenda">
				<option value="A">Selecionar</option>
				<?php
				$sql="SELECT id_produto,
				nome
				from produtos";
				$result=mysqli_query($conexao,$sql);

				while ($produto=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $produto[0] ?>"><?php echo $produto[1] ?></option>
				<?php endwhile; ?>
			</select>
			<label>Descrição <i class="fa fa-pen"></i></label>
			<textarea readonly="" id="descricaoV" name="descricaoV" class="form-control input-sm"></textarea>
			<label>Quantidade no Estoque <i class="fa fa-list-ol"></i></label>
			<input readonly="" type="text" class="form-control input-sm" id="quantidadeV" name="quantidadeV">
			<label>Preço <i class="fab fa-stripe-s"></i></label>
			<input readonly="" type="text" class="form-control input-sm" id="precoV" name="precoV">
			<label>Quantidade Vendida <i class="fa fa-shopping-basket "></i></label>
			<input type="text" class="form-control input-sm" id="quantV" name="quantV">
			<p></p>
			<span class="btn btn-primary" id="btnAddVenda">Adicionar Produto <i class="fa fa-plus"></i></span>
			<span class="btn btn-danger" id="btnLimparVendas">Cancelar Venda <i class="fa fa-times"></i></span>
		</form>
	</div>
	<div class="col-sm-3">
		<div id="imgProduto"></div>
	</div>
	<div class="col-sm-4">
		<div id="tabelaVendasTempLoad"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");

		$('#produtoVenda').change(function(){

			$.ajax({
				type:"POST",
				data:"idproduto=" + $('#produtoVenda').val(),
				url:"../procedimentos/vendas/obterDadosProdutos.php",
				success:function(r){
					dado=jQuery.parseJSON(r);

					$('#descricaoV').val(dado['descricao']);

					$('#quantidadeV').val(dado['quantidade']);
					$('#precoV').val(dado['preco']);
					
					$('#imgProduto').prepend('<img class="img-thumbnail" id="imgp" src="' + dado['url'] + '" />');
					
				}
			});
		});

		$('#btnAddVenda').click(function(){
			vazios=validarFormVazio('frmVendasProdutos');

			quant = 0;
			quantidade = 0;

			quant = $('#quantV').val();
			quantidade = $('#quantidadeV').val();



			if(quant > quantidade){
				alertify.alert("Quantidade inexistente em estoque!!");
				quant = $('#quantV').val("");
				return false;
			}else{
				quantidade = $('#quantidadeV').val();
			}

			if(vazios > 0){
				alertify.alert("Preencha os Campos!!");
				return false;
			}

			dados=$('#frmVendasProdutos').serialize();
			$.ajax({
				type:"POST",
				data:dados,
				url:"../procedimentos/vendas/adicionarProdutoTemp.php",
				success:function(r){
					$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
				}
			});
		});

		$('#btnLimparVendas').click(function(){

		$.ajax({
			url:"../procedimentos/vendas/limparTemp.php",
			success:function(r){
				$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
			}
		});
	});

	});
</script>

<script type="text/javascript">

	function editarP(dados){
		
		$.ajax({
			type:"POST",
			data:"dados=" + dados,
			url:"../procedimentos/vendas/editarEstoque.php",
			success:function(r){
				
				$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
				alertify.success("Estoque Atualizado com Sucesso!!");
			}
		});
	}


	function fecharP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"../procedimentos/vendas/fecharProduto.php",
			success:function(r){
				$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
				alertify.success("Produto Removido com Sucesso!!");
			}
		});
	}

	function criarVenda(){
		$.ajax({
			url:"../procedimentos/vendas/criarVenda.php",
			success:function(r){
				
				if(r > 0){
					$('#tabelaVendasTempLoad').load("vendas/tabelaVendasTemp.php");
					$('#frmVendasProdutos')[0].reset();
					alertify.alert("Venda Criada com Sucesso!");
				}else if(r==0){
					alertify.alert("Não possui lista de Vendas");
				}else{
					alertify.error("Venda não efetuada");
				}
			}
		});
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#clienteVenda').select2();
		$('#produtoVenda').select2();

	});
</script>