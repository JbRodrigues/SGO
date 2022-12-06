<?php
	include_once("../app/config.php");
	$con=connecta();
	$especialidade=$con->query("SELECT * FROM especialidade");

  session_start();    
  if (!isset($_SESSION['idUsuario'])) {
    header('location:../index.php?cod=401');
  }

  	if (isset($_GET['id'])) {
  		$id=$_GET['id'];
  		$sql="SELECT * FROM especialidade WHERE idEspecialidade = '$id' ";
  		
  		$con=connecta();
  		$resultado= $con->query($sql);
  		$especialidade=$resultado->fetch_assoc();
  		extract($especialidade);
  		
  	}

	if (isset($_POST['enviar'])) {

		if(!in_array('',$_POST)){
			$file=$_FILES['pubFoto'];
			$post=$_POST;

			extract($post);
			extract($file);
			#******************INICIO UPLOAD**********************
			
			//substr($name,strripos($name,'.'));
			
			$sql="UPDATE especialidade SET espNome = '{$espNome}' WHERE idEspecialidade = '{$idEspecialidade}' ";

			}
			#************FIM DO UPLOAD*****************
			
			#************INICIO DO UPDATE**************
			$pubIdUsuario=$_SESSION['idUsuario'];

		
			$con=connecta();
			$con->query($sql);
			
			if($con->affected_rows>0){
					header("location:index.php?cod=1");
			}else{
					header("location:index.php?cod=400");
			}

		}else{
			$msg="Campos em branco";
		}		
	
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/personalizado.css">
	<title>Alterar Especialidade</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="">ALTERAR ESPECIALIDADE</a>

      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href=""><span class="sr-only">(atual)</span></a>
		  </li>
		  
          <li class="nav-item">
		  <a class="" href=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"></a>
          </li>
        </ul>

		<ul class="nav justify-content-center">
         <li class="nav-item">
          <form class="form-inline mt-2 mt-md-0" >
           <a class="btn btn-primary my-2 my-sm-0" href="../painel.php">VOLTAR</a>
          </form>
         </li>
      </ul>
        
        <ul class="nav justify-content-end">
         <li class="nav-item">
          <form class="form-inline mt-2 mt-md-0" >
           <a class="btn btn-danger my-2 my-sm-0" href="../index.php?acao=sair">SAIR</a>
          </form>
         </li>
      </ul>
	</nav>
	
	<main role="main" class="container">

<a href="../painel.php">Painel | </a>
<a href="index.php">Gerenciar Especialidade | </a>

	<?php
	echo (isset($msg))?$msg:'';
	?>
<form name="frm" id="form" class="form" action="formAlterarEspecialidade.php" method="post" enctype="multipart/form-data"> 
		
		<input type="hidden" name="idEspecialidade" value="<?php if(isset($id)){echo$id;}else{echo"";} ?>">

		<fieldset class="campos">
			<p class="msg" id="mensagens"></p>
			<label for="pubTitulo" class="rotulo">Titulo da Especialidade:</label>
			
            <input type="text" class="cp" name="catNome" id="catNome" title="Nome da Especialidade" 
            value="<?= (isset($espNome))?$espNome:'';  ?>" >	

			<input type="submit" name="enviar" value="Salvar" class="bt">
			<input type="reset" name="limpar" value="Limpar" class="bt">
	
	</form>
