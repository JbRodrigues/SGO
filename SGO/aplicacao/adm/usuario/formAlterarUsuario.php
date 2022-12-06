<?php
	include_once('../app/config.php');
		session_start();		
	if (!isset($_SESSION['idUsuario'])) {
		header('location:../index.php?cod=401');
	}

	if(isset($_POST['enviar'])){
		$post=$_POST;
		extract($post);

		if($post['usuSenha']==""){
			//não altera senha
			$usuNome = ucfirst($usuNome);
		$sql="UPDATE usuario SET usuNome='{$usuNome}',usuLogin='{$usuLogin}' WHERE idUsuario={$idUsuario} ";

		}else{
			$usuNome = ucfirst($usuNome);
			$sql="UPDATE usuario SET usuNome='{$usuNome}',usuLogin='{$usuLogin}', usuSenha='{$usuSenha}' WHERE idUsuario={$idUsuario} ";
			//altera a senha
		}

		$con= connecta();
		$con->query($sql);

		if($con->affected_rows>0){
				header("location:index.php?cod=10");
		}else{
				header("location:index.php?cod=404");
		}

	}

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$con=connecta();
		$sql="SELECT *FROM usuario WHERE idUsuario={$id}";
		$result=$con->query($sql);
		
		if ($con->affected_rows>0) {
			
			$lista=$result->fetch_assoc();
			extract($lista);

		}	
		
	}else{
		header("location:index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/personalizado.css">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <title>Alterar de Usuário</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="">ALTERAR USUÁRIO</a>

      
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

	<h1 class="titulo1">Alterar Usuário</h1>

	<form action="formAlterarUsuario.php" method="post" class="form">
		<input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
		<label class="rotulo">Nome:</label>
		<input type="text" class="cp" name="usuNome" value="<?php echo $usuNome; ?>">
		
		<label class="rotulo">Login:</label>
		<input type="text" name="usuLogin" class="cp" value="<?php echo $usuLogin; ?>">
	
		<label class="rotulo">Senha:</label>
			<input type="password" class="cp" name="usuSenha" value="">
	
		<label class="rotulo">Confirma Senha:</label>
			<input type="password" class="cp" name="usuConfirmaSenha" value="">
				
		<input type="submit" name="enviar" value="Atualizar" class="bt">
		<input type="reset" name="enviar" value="Limpar" class="bt">
	</form>
</body>
</html>