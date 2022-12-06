<?php
	include_once('app/config.php');
	if (isset($_POST['enviar'])) {
		$con=connecta();
		$usuLogin=filter_input(INPUT_POST, 'usuLogin');
		$usuSenha=filter_input(INPUT_POST,'usuSenha');
		$usuSenha=md5($usuSenha);
		
		$sql="SELECT *FROM usuario WHERE usuLogin='$usuLogin' AND usuSenha='$usuSenha'";
		$result=$con->query($sql);
		
		if($result->num_rows){
			$usuario=$result->fetch_assoc();

			session_start();
			$_SESSION['usuNome']=$usuario['usuNome'];
			$_SESSION['idUsuario']=$usuario['idUsuario'];
			$_SESSION['usuNivel']=$usuario['usuNivel'];
			header('location:painel.php');
		}else{
			$msg="Login ou senha incorretos";
		}
	}

	if (isset($_POST['cadastrar'])){
		header('location:formCriarUsuario.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
	 <link href="./bootstrap/signin.css" rel="stylesheet">
	 <link href="./css/estilo.css" rel="stylesheet" >
	
	<title>Login</title>
</head>
<body class="text-center">

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="../index.php">PÁGINA INICIAL</a>

      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href=""><span class="sr-only">(atual)</span></a>
		  </li>
</nav>
         
	
 <form method="post" action="index.php" class="form-signin">
	<?php
	echo (isset($msg))?$msg:'';
	?>
	<img class="mb-4" src="imagens/saude.png" alt="" width="150" height="150">
	 <label class="rotulo">Login</label>
	  <input type="text" name="usuLogin" class="form-control" placeholder="Usuario">
	  <input type="password" name="usuSenha" class="form-control passLogin" placeholder="Senha">
	  <input type="submit" name="enviar" value="Logar" class="btn btn-lg btn-dark btn-block">
	  <input type="submit" name="cadastrar" value="Cadastre-se" class="btn btn-lg btn-primary btn-block">
	  <p class="mt-5 mb-3 text-muted">©2020</p>
 </form>
	
</body>
</html>