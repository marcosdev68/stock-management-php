<?php
	require_once "classes/conexao.php";
	$obj = new conectar();
	$conexao = $obj->conexao();

	$sql = "SELECT * from usuarios where email='admin'";
	$result = mysqli_query($conexao, $sql);

?>


 <!DOCTYPE html>
<html>
<head>
	<title>Registrar Usuário</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="lib/jquery-3.2.1.min.js"></script>
	<script src="js/funcoes.js"></script>
	<?php include_once 'view/dependencias.php'; ?>

</head>
<body style="background-color: #485053">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 fundo">
				<div class="panel panel-default">
					<div class="panel panel-heading">Registrar Administrador <i class="fa fa-user-check"></i></div>
					<div class="panel panel-body">
						<form id="frmRegistro">
							<label>Nome <i class="fa fa-user"></i></label>
							<input type="text" class="form-control input-sm" name="nome" id="nome" placeholder="Nome do Usuário"><br>
							<label>Usuário <i class="fa fa-user-check"></i></label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario" placeholder="ex: usuario123"><br>
							<label>Email <i class="fa fa-envelope-open"></i></label>
							<input type="text" class="form-control input-sm" name="email" id="email" placeholder="example@email.com"><br>
							<label>Senha <i class="fa fa-key"></i></label>
							<input type="password" class="form-control input-sm" name="senha" id="senha" placeholder="****************"><br>
							<p></p>
							<span class="btn btn-primary" id="registro">Registrar <i class="fa fa-cog"></i></span>
							<a href="index.php" class="btn btn-default">Voltar Login <i class="fa fa-arrow-circle-left"></i></a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>




<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){

			vazios=validarFormVazio('frmRegistro');

			if(vazios > 0){
				alert("Preencha os Campos!!");
				return false;
			}

			dados=$('#frmRegistro').serialize();
			
			$.ajax({
				type:"POST",
				data:dados,
				url:"procedimentos/login/registrarUsuario.php",
				success:function(r){
					//alert(r);

					if(r==1){
						alert("Inserido com Sucesso!!");
						window.location.href = "index.php?user_add_success";
					}else{
						alert("Erro ao Inserir");
					}
				}
			});
		});
	});
</script>
