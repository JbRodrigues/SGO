<?php
include_once('../app/config.php');

session_start();
if (!isset($_SESSION['idUsuario'])) {
  header('location:../index.php?cod=401');
}

#conecta com o banco
$con = connecta();
$busca = "SELECT * FROM exame";

## exclui registros do banco
if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {

  $id = $_GET['id'];
  $sql = "DELETE FROM exame WHERE idExame=$id";
  $con->query($sql);
}

#busca dados do banco
//
if (isset($_GET['busca']) && isset($_GET['busca']) != '') {

  $pubTitulo = $_GET['busca'];
  $busca = "SELECT * FROM exame WHERE exNomeExame LIKE '%$exNomeExame%' ";
}


#executa bsca simples ou personalizada
$result = $con->query($busca);


?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/personalizado.css">
  <link rel="stylesheet" href="exames.css">
  <title>Gerenciar Exames</title>
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="">GERENCIAR EXAMES</a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href=""><span class="sr-only">(atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="btn btn-lg btn-success btn-block" id="novoExame" href="formCriarExames.php">Novo Exame</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"></a>
        </li>
      </ul>

      <ul class="nav justify-content-end">
        <li class="nav-item">
          <form class="form-inline mt-2 mt-md-0 navbarButtons">
            <a class="btn btn-primary my-2 my-sm-0" href="../painel.php">VOLTAR</a>
          </form>
        </li>
      </ul>

      <ul class="nav justify-content-end">
        <li class="nav-item">
          <form class="form-inline mt-2 mt-md-0 navbarButtons">
            <a class="btn btn-danger my-2 my-sm-0" href="../index.php?acao=sair">SAIR</a>
          </form>
        </li>
      </ul>
  </nav>
  <br>
  <br>
  <br>

  <main role="main" class="container">

    <h1 class="titulo1"></h1>

    <form action="index.php" method="get" class="form-group">
      <input type="text" name="busca" value="" class="inputBusca" placeholder="Buscar exames">
      <input type="submit" name="enviar" value="Buscar" class="btn btn-dark" id="btnBusca">

    </form>

    <div class="Container">

      <div class="form-row text-light">

        <div class="border border-dark col-sm-2 centerDivTabela">Id Exame</div>
        <div class="border border-dark col-sm-2 centerDivTabela">Nome do Exame</div>
        <div class="border border-dark col-sm-2 centerDivTabela">Nome do Paciente</div>
        <div class="border border-dark col-sm-2 centerDivTabela">Alterar Registro</div>
        <div class="border border-dark col-sm-2 centerDivTabela">Excluir Registro</div>

      </div>

      <?php
      #percorre o resultado da busca e fatia para imprimir na tela   
      while ($lista = $result->fetch_assoc()) {
        extract($lista);

      ?>
        <div class="form-row">
          <div class="border border-dark col-sm-2 centerDivTabela"><?php echo $idExame; ?></div>
          <div class="border border-dark col-sm-2 centerDivTabela"><?php echo $exNomeExame; ?></div>
          <div class="border border-dark col-sm-2 centerDivTabela"><?php echo $exNomePaciente; ?></div>
          <div class="border border-dark col-sm-2 centerDivTabela">
            <a value="Alterar" id="alterar" href="formAlterarExames.php?id=<?php echo $idExame; ?>">Alterar</a>
          </div>
          <div class="border border-dark col-sm-2 centerDivTabela">
            <a value="Excluir" id="delete" href="index.php?acao=excluir&id=<?php echo $idExame; ?>">Excluir</a>
          </div>
        </div>

      <?php  } ?>

    </div>
  </main>
</body>

</html>