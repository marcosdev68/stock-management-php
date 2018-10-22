<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>



<!DOCTYPE html>
	<html>
	<head>
		<title>Usuários</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		<div class="container">
			<h1>Administrar Usuários <i class="fa fa-users-cog"></i></h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmRegistro">
						<label>Nome <i class="fa fa-user"></i></label>
						<input type="text" class="form-control input-sm" name="nome" id="nome" placeholder="Nome do Usuário">
						<label>Usuário <i class="fa fa-user-check"></i></label>
						<input type="text" class="form-control input-sm" name="usuario" id="usuario" placeholder="ex: usuario123">
						<label>Email <i class="fa fa-envelope-open"></i></label>
						<input type="text" class="form-control input-sm" name="email" id="email" placeholder="example@email.com">
						<label>Senha <i class="fa fa-key"></i></label>
						<input type="text" class="form-control input-sm" name="senha" id="senha" placeholder="************">
						<p></p>
						<span class="btn btn-primary" id="registro">Salvar Usuario <i class="fa fa-plus"></i></span>

					</form>
				</div>
				<div class="col-sm-7">
					<div id="tabelaUsuariosLoad"></div>
				</div>
			</div>
		</div>


		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="atualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
					</div>
					<div class="modal-body">
						<form id="frmRegistroU">
							<input type="text" hidden="" id="idUsuario" name="idUsuario">
							<label>Nome</label>
							<input type="text" class="form-control input-sm" name="nomeU" id="nomeU">
							<label>Usuário</label>
							<input type="text" class="form-control input-sm" name="usuarioU" id="usuarioU">
							<label>Email</label>
							<input type="text" class="form-control input-sm" name="emailU" id="emailU">

						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAtualizaUsuario" type="button" class="btn btn-warning" data-dismiss="modal">Editar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function adicionarDados(idusuario){

			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"../procedimentos/usuarios/obterDados.php",
				success:function(r){

					dado=jQuery.parseJSON(r);

					$('#idUsuario').val(dado['id']);
					$('#nomeU').val(dado['nome']);
					$('#usuarioU').val(dado['user']);
					$('#emailU').val(dado['email']);
				}
			});
		}

		function eliminarUsuario(idusuario){
			alertify.confirm('Deseja excluir este usuario?', function(){ 
				$.ajax({
					type:"POST",
					data:"idusuario=" + idusuario,
					url:"../procedimentos/usuarios/eliminarUsuario.php",
					success:function(r){
						if(r==1){
							$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');
							alertify.success("Excluido com sucesso!!");
						}else{
							alertify.error("Não excluido :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelado !')
			});
		}


	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAtualizaUsuario').click(function(){

				datos=$('#frmRegistroU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procedimentos/usuarios/atualizarUsuario.php",
					success:function(r){

						

						if(r==1){
							$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');
							alertify.success("Editado com sucesso :D");
						}else{
							alertify.error("Não foi possível editar :(");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');

			$('#registro').click(function(){

				vazios=validarFormVazio('frmRegistro');

				if(vazios > 0){
					alertify.alert("Preencha os campos!!");
					return false;
				}

				datos=$('#frmRegistro').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procedimentos/login/registrarUsuario.php",
					success:function(r){
						//alert(r);

						if(r==1){
							$('#frmRegistro')[0].reset();
							$('#tabelaUsuariosLoad').load('usuarios/tabelaUsuarios.php');
							alertify.success("Adicionado com sucesso");
						}else{
							alertify.error("Falha ao adicionar :(");
						}
					}
				});
			});
		});
	</script>





<?php
}else{
	header("location:../index.php");
}
?>