<?php
	include_once("../app/config.php");

	$con=connecta();
	$especialidade=$con->query("SELECT * FROM especialidade");

    session_start();
  if (!isset($_SESSION['idUsuario'])) {
    header('location:../index.php?cod=401');
  }

	if (isset($_POST['enviar'])) {

		if(!in_array('',$_POST)){
			$post=$_POST;

			extract($post);
			
			#************INICIO DO INSERT**************
			//$pubIdUsuario=$_SESSION['idUsuario'];
			$espNome = strtoupper($espNome);

			$sql="INSERT INTO especialidade (espNome) VALUES ('{$espNome}') ";

			$con->query($sql);
			var_dump($sql);
			
			if($con->affected_rows>0){
					header("location:index.php?cod=1");
			}else{
					//header("location:index.php?cod=400");
			}
		}else{
			$msg="Campos em branco";
		}		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/personalizado.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	
	<title>Gerenciar Especialidade</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="">CADASTRO DE ESPECIALIDADES</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" > <span class="sr-only">(atual)</span></a>
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
           <a class="btn btn-primary my-2 my-sm-0" href="index.php">VOLTAR</a>
          </form>
         </li>
      </ul>
        
        <ul class="nav justify-content-end">
         <li class="nav-item">
          <form class="form-inline mt-2 mt-md-0" >
           <a class="btn btn-danger my-2 my-sm-0" href="index.php?acao=sair">SAIR</a>
          </form>
         </li>
      </ul>
	</nav>

	<main role="main" class="container">

	<?php
	echo (isset($msg))?$msg:'';
	?>
  <form name="frm" id="form" class="form" action="formCriarEspecialidade.php" method="post" enctype="multipart/form-data"> 
		<p class="msg" id="mensagens"></p>
		<label for="pubTitulo" class="rotulo">Título da Especialidade:</label>
		<input type="text" class="cp" name="espNome" id="espNome" title="Nome da Categoria" value="<?= (isset($espNome))?$espNome:'';  ?>" >	
		<input type="submit" name="enviar" value="Salvar" class="bt">
		<input type="reset" name="limpar" value="Limpar" class="bt">
  </form>

  </body>
</html>
