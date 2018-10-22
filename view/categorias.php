<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Categorias</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Categorias</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCategorias">
						<label>Categoria</label>
						<input type="text" class="form-control input-sm" name="categoria" id="categoria">
						<p></p>
						<span class="btn btn-primary" id="btnAdicionarCategoria">Adicionar <i class="fa fa-plus"></i></span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tabelaCategoriaLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="atualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Atualizar Categoria</h4>
					</div>
					<div class="modal-body">
						<form id="frmCategoriaU">
							<input type="text" hidden="" id="idcategoria" name="idcategoria">
							<label>Categoria</label>
							<input type="text" id="categoriaU" name="categoriaU" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnAtualizaCategoria" class="btn btn-warning" data-dismiss="modal">Salvar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tabelaCategoriaLoad').load("categorias/tabelaCategorias.php");

			$('#btnAdicionarCategoria').click(function(){

				vazios=validarFormVazio('frmCategorias');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmCategorias').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/categorias/adicionarCategorias.php",
					success:function(r){
						
						if(r==1){
					//limpar formulário
					$('#frmCategorias')[0].reset();

					$('#tabelaCategoriaLoad').load("categorias/tabelaCategorias.php");
					alertify.success("Categoria adicionada com sucesso!");
				}else{
					alertify.error("Não foi possível adicionar a categoria");
				}
			}
		});
			});
		});
	</script>




	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAtualizaCategoria').click(function(){

				dados=$('#frmCategoriaU').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/categorias/atualizarCategorias.php",
					success:function(r){
						if(r==1){
							$('#tabelaCategoriaLoad').load("categorias/tabelaCategorias.php");
							alertify.success("Atualizado com Sucesso :)");
						}else{
							alertify.error("Não foi possível atualizar :(");
						}
					}
				});
			});
		});
	</script>



	<script type="text/javascript">

		function adicionarDado(idCategoria,categoria){
			$('#idcategoria').val(idCategoria);
			$('#categoriaU').val(categoria);
		}


		function eliminaCategoria(idcategoria){
			alertify.confirm('Deseja excluir esta categoria?', function(){ 
				$.ajax({
					type:"POST",
					data:"idcategoria=" + idcategoria,
					url:"../procedimentos/categorias/eliminarCategorias.php",
					success:function(r){
						if(r==1){
							$('#tabelaCategoriaLoad').load("categorias/tabelaCategorias.php");
							alertify.success("Excluido com sucesso!!");
						}else{
							alertify.error("Não Excluido");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelado !')
			});
		}

	</script>




<?php 
}else{
	header("location:../index.php");
}
?>