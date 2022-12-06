<?php
	include_once("../app/config.php");

	$con=connecta();
	$fila=$con->query("SELECT * FROM fila");

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
			$catNome = strtoupper($catNome);

			$sql="INSERT INTO fila (catNome) VALUES ('{$catNome}') ";

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
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	
	<title>Noticia</title>
</head>
<body>

<a href="../painel.php">Painel | </a>
<a href="index.php">Gerenciar Fila | </a>

	<?php
	echo (isset($msg))?$msg:'';
	?>
<form name="frm" id="form" class="form" action="formCriarFila.php" method="post" enctype="multipart/form-data"> 
		
			<p class="msg" id="mensagens"></p>
			<label for="pubTitulo" class="rotulo">*Nome da Fila:</label>
			
<input type="text" class="cp" name="catNome" id="catNome" title="Nome da Fila" 
value="<?= (isset($catNome))?$catNome:'';  ?>" >	
	
			<input type="submit" name="enviar" value="Salvar" class="bt">
			
	</form>
  </body>
</html>
