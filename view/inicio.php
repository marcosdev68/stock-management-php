<?php 
	session_start();
	if(isset($_SESSION['usuario'])){

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Início</title>
	<?php include_once 'dependencias.php'; ?>
	<?php require_once "menu.php" ?>
</head>
<body>

<div id="vendasFeitas"></div>

</body>
</html>

<script type="text/javascript">
		$(document).ready(function(){

				
				$('#vendasFeitas').load('vendas/vendasRelatorios.php');
				
				$('#vendasFeitas').show();
				
		});

		

	</script>

<?php  

}else{
	header("location:../index.php");
}
?>