<!DOCTYPE html>
<html>
<head>
  <?php require_once "dependencias.php" ?>
</head>
<body>

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="inicio.php"><img class="img-responsive logo img-thumbnail" src="../img/logo.png" alt="" width="200px" height="150px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

            

            <!-- Inicio do Menu -->

            <li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Início</a>
            </li>

            
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Gestão Produtos <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="categorias.php">Categorias <i class="fa fa-shopping-cart "></i></a></li>
              <li><a href="produtos.php">Produtos <i class="fa fa-tags"></i></a></li>
            </ul>
          </li>


       
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Pessoas <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="clientes.php">Clientes <i class="fa fa-users"></i></a></li>
              <li><a href="fornecedores.php">Fornecedores <i class="fa fa-cart-arrow-down "></i></a></li>
            </ul>
          </li>




         
          <li><a href="vendas.php"><span class="glyphicon glyphicon-usd"></span> Vendas</a>
          </li>
          
          <li class="dropdown" >
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuário:   <span class="caret"></span></a>
            <ul class="dropdown-menu">


              
            <li> <a href="usuarios.php"><span class="glyphicon glyphicon-user"></span> Gestão Usuários</a></li>
          

              <li> <a style="color: red" href="../procedimentos/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->





<!-- /container -->        


</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').width(100);
      $('.logo').height(60);

    }
    else {
      $('.logo').height(100);
      $('.logo').width(150);
    }
  }
  );
</script>