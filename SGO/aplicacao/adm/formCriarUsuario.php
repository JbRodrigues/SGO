<?php
include_once("app/config.php");

session_start();
//if (!isset($_SESSION['idUsuario'])) {
//	header('location:../index.php?cod=401');
//}

if (isset($_POST['enviar'])) {
	//echo "Formulario Enviado!";
	$post = $_POST;
	unset($post['enviar']);
	extract($post);
	if (!in_array("", $post)) {

		if ($usuSenha != $usuConfirmaSenha) {
			echo "Senhas Não conferem!";
		} else {

			$usuSenha = md5($usuSenha);
			$usuNome = ucfirst($usuNome);
			$sql = "INSERT INTO usuario ";
			$sql .= "(usuNome, usuSenha, usuLogin) VALUES";
			$sql .= "('{$usuNome}','{$usuSenha}','{$usuLogin}')";

			$con = connecta();
			$con->query($sql);

			if ($con->affected_rows > 0) {
				header("location:index.php");
			} else {
				echo "Erro ao gravar os dados";
			}
		}
	} else {
		$msg = "Todos os campos precisam estar preenchidos!";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="./bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/personalizado.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Cadastro de Usuário</title>
</head>

<body>

	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href=""></a>


		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link"> <span class="sr-only">(atual)</span></a>
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
					<form class="form-inline mt-2 mt-md-0">
						<a class="btn btn-danger my-2 my-sm-0" href="index.php?acao=sair">SAIR</a>
					</form>
				</li>
			</ul>
	</nav>


	<main role="main" class="container">
		<div class="jumbotron">

			<h1 class="titulo1">Cadastro de Usuários</h1>

			<?php
			echo (isset($msg)) ? $msg : '';
			?>
			<!--<a href="index.php">TESTE </a> <br>-->
			<form action="formCriarUsuario.php" method="post" class="form">
				<label class="rotulo">Nome:</label>
				<input type="text" class="cp" name="usuNome" value="<?= (isset($usuNome)) ? $usuNome : ""; ?>">

				<label class="rotulo">Login:</label>
				<input class="cp" type="text" name="usuLogin" value="<?= (isset($usuLogin)) ? $usuLogin : ""; ?>">

				<label class="rotulo">Senha:</label>
				<input class="cp" type="password" name="usuSenha" value="<?= (isset($usuSenha)) ? $usuSenha : ""; ?>">

				<label class="rotulo">Confirma Senha:</label>
				<input type="password" class="cp" name="usuConfirmaSenha" value="<?= (isset($usuConfirmaSenha)) ? $usuConfirmaSenha : ""; ?>">

				<input type="submit" name="enviar" value="Salvar" class="bt btn-success">
				<input type="reset" name="limpar" value="Limpar" class="bt">
			</form>
		</div>
	</main>
</body>

</html>