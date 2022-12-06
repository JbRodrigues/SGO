<?php
include_once('app/config.php');

session_start();

if (isset($_GET['acao']) and $_GET['acao'] == 'sair') {
  session_destroy();
  header('location:index.php?cod=202');
}

if (!isset($_SESSION['idUsuario'])) {
  header('location:index.php?!painel');
}

//<?php $_SESSION['$usuNome']; 
$horario = date('d/m/Y  H:i')
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="./css/estilo.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/personalizado.css">


  <title>Painel</title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="painel.php">PAINEL DO USUÁRIO - SEJA BEM VINDO </a>
    <a class='navbar-brand navName'> <?php echo $_SESSION['usuNome']?></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link"> <span class="sr-only">(atual)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link"> </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="time"> <?php echo $horario ?></a>
        </li>
      </ul>

      <ul class="nav justify-content-end">
        <li class="nav-item">
          <form class="form-inline mt-2 mt-md-0">
            <a class="btn btn-danger my-2 my-sm-0" href="index.php?acao=sair">SAIR</a>
          </form>
        </li>
      </ul>
  </nav>

  <main role="main" class="container">
    <div class="jumbotron">
      
      <a class="btn btn-lg btn-primary btn-block" href="./fila.php">Vizualizar Fila</a>
      <a class="btn btn-lg btn-primary btn-block" href="usuario/index.php">Gerenciar Usuário</a>
      <a class="btn btn-lg btn-primary btn-block" href="exames/index.php">Cadastrar Exames</a>
      <a class="btn btn-lg btn-primary btn-block" href="especialidade/index.php">Especialidade Médica</a>
    </div>
</body>
 <script src="./app/script.js"></script>
</html>