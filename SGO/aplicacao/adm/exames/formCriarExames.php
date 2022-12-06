<?php
include_once("../app/config.php");

$con = connecta();
$especialidade = $con->query("SELECT * FROM especialidade");

session_start();
if (!isset($_SESSION['idUsuario'])) {
	header('location:../index.php?cod=401');
}

if (isset($_POST['enviar'])) {

	if (!in_array('', $_POST)) {
		$file = $_FILES['exFoto'];
		$post = $_POST;

		extract($post);
		extract($file);
		#******************INICIO UPLOAD**********************
		$formatos = ['.jpg', '.png', '.jpeg'];
		$ext = extExt($name);

		$arquivo = "../img/";
		$exFoto = md5_file($tmp_name);
		$exFoto .= $ext;

		$arquivo .= $exFoto;
		//substr($name,strripos($name,'.'));

		if (in_array($ext, $formatos)) {

			move_uploaded_file($tmp_name, $arquivo);
		} else {
			echo "Formato Invalido";
		}

		#***************************FIM DO UPLOAD********

		#************INICIO DO INSERT**************
		$sql = "INSERT INTO exame ";
		$sql .= "(exNomeExame,exNomePaciente,exTexto,exFoto) ";
		$sql .= "VALUES ('{$exNomeExame}','{$exNomePaciente}','{$exTexto}','{$exFoto}') ";

		$con->query($sql);

		if ($con->affected_rows > 0) {
			header("location:index.php?cod=1");
		} else {
			header("location:index.php?cod=400");
		}
	} else {
		$msg = "Campos em branco";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="./exames.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/personalizado.css">
	<title>Exames</title>
</head>

<body>

	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="">CADASTRO DE EXAMES</a>

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
						<a class="btn btn-primary my-2 my-sm-0 navbarButtons" href="index.php">VOLTAR</a>
					</form>
				</li>
			</ul>

			<ul class="nav justify-content-end">
				<li class="nav-item">
					<form class="form-inline mt-2 mt-md-0 navbarButtons">
						<a class="btn btn-danger my-2 my-sm-0" href="index.php?acao=sair">SAIR</a>
					</form>
				</li>
			</ul>
	</nav>

	<!-- FIM NAVBAR -->

	<main role="main" class="container">

		<?php
		echo (isset($msg)) ? $msg : '';
		?>

		<form name="frm" id="form" class="form containerExame" action="formCriarExames.php" method="post" enctype="multipart/form-data">

			<fieldset class="campos containerExame">
				<p class="msg" id="mensagens"></p>
				<label for="exNomeExame" class="rotulo">Nome do Exame:</label>
				<input type="text" class="cp" name="exNomeExame" id="exNomeExame" title="Nome Do Exame" value="<?= (isset($exNomeExame)) ? $exNomeExame : '';  ?>">

				<label for="exNomePaciente" class="rotulo">Nome do Paciente:</label>
				<input type="text" class="cp" name="exNomePaciente" id="exNomePaciente" title="Nome do Paciente" value="<?= (isset($exNomePaciente)) ? $exNomePaciente : ''; ?>">

				<label for="exfoto" class="rotulo">Pedido médico: </label>
				<input type="file" class="cp" name="exFoto" id="exfoto" title="Arquivo da Foto">

			</fieldset>

			<fieldset class="campos">

				<label for="exTexto" class="rotulo">*Descriçao do Exame:</label>
				<textarea name="exTexto" class="box" id="exTexto" title="Descriçao do Exame"><?= (isset($exTexto)) ? $exTexto : '';  ?> </textarea>

				<label for="especialidade" class="rotulo">Especialidade Médica:</label>
				<select class="cp cps" name="exEspecialidade" id="exEspecialidade" title="Autor da publicação" id="marginEsp">

					<option value="">Escolha</option>
					<?php
					while ($linha = $especialidade->fetch_assoc()) {
						extract($linha);

						if ($idEspecialidade == $exEspecialidade) {
							$op = "<option selected value=\"$idEspecialidade\">$espNome</option>";
						} else {
							$op = "<option value=\"$idEspecialidade\">$espNome</option>";
						}
						echo $op;
					}

					?>
				</select>

			</fieldset>
			<div class="exameButtons">
				<input type="submit" name="enviar" value="Salvar" class="bt" id="btSalva">
				<input type="reset" name="cancelar" value="Limpar" class="bt" id="btLimpa">
			</div>
		</form>

	</main>
</body>

</html>