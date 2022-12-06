<?php
include_once('../app/config.php');

session_start();
if (!isset($_SESSION['idUsuario'])) {
  header('location:../index.php?cod=401');
}

#conecta com o banco
$con = connecta();
$busca = "SELECT * FROM especialidade";

## exclui registros do banco
if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {

  $id = $_GET['id'];
  $sql = "DELETE FROM especialidade WHERE idEspecialidade=$id";
  $con->query($sql);
}

#busca dados do banco
//
if (isset($_GET['busca']) && isset($_GET['busca']) != '') {

  $catNome = $_GET['busca'];
  $busca = "SELECT * FROM especialidade WHERE espNome LIKE '%$espNome%' ";
}

#executa bsca simples ou personalisada
$result = $con->query($busca);

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/personalizado.css">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link rel="stylesheet" href="espec.css">
  <title>Gerenciar Especialidade</title>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

    <a class="navbar-brand" href="">GERENCIAR ESPECIALIDADE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href=""><span class="sr-only">(atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="btn btn-lg btn-success btn-block" href="formCriarEspecialidade.php">Nova Especialidade</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"></a>
        </li>
      </ul>

      <ul class="nav justify-content-center">
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

  <main role="main" class="espectContainer">

    <form action="index.php" method="get" class="form">

      <br>
      <!-- <input type="text" name="busca" value="" class="cp" placeholder="Buscar...">
      <input type="submit" name="enviar" value="Buscar" class="btn btn-dark"">-->


      <div class="container espectContainer">
        <div class="form-row text-dark">
          <div class="border border-dark col-sm-2 centerDivTabela">ID</div>
          <div class="border border-dark col-sm-2 centerDivTabela">Especialidades</div>
          <div class="border border-dark col-sm-2 centerDivTabela">Alterar</div>
          <div class="border border-dark col-sm-2 centerDivTabela">Excluir</div>
        </div>

        <?php
        #percorre o resultado da busca e fatia para imprimir na tela   
        while ($lista = $result->fetch_assoc()) {
          extract($lista);

        ?>
          <div class="form-row">
            <div class="border border-dark col-sm-2 centerDivTabela"><?php echo $idEspecialidade; ?></div>
            <div class="border border-dark col-sm-2 centerDivTabela"><?php echo $espNome; ?></div>
            <div class="border border-dark col-sm-2 centerDivTabela">
              <a style="color: #0000FF" href="formAlterarEspecialidade.php?id=<?php echo $idEspecialidade; ?>"> Alterar</a>
            </div>
            <div class="border border-dark col-sm-2 centerDivTabela">
              <a style="color: #FF0000" href="index.php?acao=excluir&id=<?php echo $idEspecialidade; ?>"> Excluir</a>
            </div>
          </div>

        <?php  } ?>

    </form>
    </div>
  </main>
</body>

</html>