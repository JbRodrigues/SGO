<?php
include_once('adm/app/config.php');

  $sql="SELECT * FROM exame ORDER BY idExame ASC";
  $con=connecta();
  $result=$con->query($sql);
  
   if(isset($_GET['id'])){

   }
   ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="adm/css/estilo.css">
  <link rel="stylesheet" type="text/css" href="adm/bootstrap/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="adm/bootstrap/personalizado.css">
  <title>Sistema de Gerenciamento de Exames</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="">FILA DE ESPERA - SUS</a>

      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href=""><span class="sr-only">(atual)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"></a>
          </li>
        </ul>

        <ul class="nav justify-content-end">
         <li class="nav-item">
          <form class="form-inline mt-2 mt-md-0" >
           <a class="btn btn-success my-2 my-sm-0" href="adm/index.php">FAÇA O LOGIN</a>
          </form>
         </li>
      </ul>
    </nav>
    <br>
    <br>

    <main role="main" class="meuContainer">

    <div  class="containerLista">
		<div class="form-row text-danger">
			<div class="border border-dark col-sm-2">ID</div>
			<div class="border border-dark col-sm-2">Nome do Exame</div>
			<div class="border border-dark col-sm-2">Nome do Paciente</div>
		</div>

    <?php	 
	#percorre o resultado da busca e fatia para imprimir na tela   
		while($lista=$result->fetch_assoc()){ 
			extract($lista);
	?>

    <div class="form-row">
			<div class="border border-dark col-sm-2"><?php echo $idExame;?></div>
			<div class="border border-dark col-sm-2"><?php echo $exNomeExame;?></div>
			<div class="border border-dark col-sm-2"><?php echo $exNomePaciente;?></div>
		</div>

    <?php  } ?>	

	
  </div>
  </html>
	