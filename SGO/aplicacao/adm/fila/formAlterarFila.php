<?php
	include_once("../app/config.php");
	$con=connecta();
	$fila=$con->query("SELECT * FROM fila");

  session_start();    
  if (!isset($_SESSION['idUsuario'])) {
    header('location:../index.php?cod=401');
  }

  	if (isset($_GET['id'])) {
  		$id=$_GET['id'];
  		$sql="SELECT * FROM fila WHERE idFila = '$id' ";
  		
  		$con=connecta();
  		$resultado= $con->query($sql);
  		$fila=$resultado->fetch_assoc();
  		extract($fila);
  		
  	}




	if (isset($_POST['enviar'])) {

		if(!in_array('',$_POST)){
			$file=$_FILES['pubFoto'];
			$post=$_POST;

			extract($post);
			extract($file);
			#******************INICIO UPLOAD**********************
			
			//substr($name,strripos($name,'.'));
			
			$sql="UPDATE fila SET catNome = '{$catNome}' WHERE idFila = '{$idFila}' ";

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
	
	<title>Fila</title>
</head>
<body>

<a href="../painel.php">Painel | </a>
<a href="index.php">Gerenciar Fila | </a>

	<?php
	echo (isset($msg))?$msg:'';
	?>
<form name="frm" id="form" class="form" action="formAlterarFila.php" method="post" enctype="multipart/form-data"> 
		
		<input type="hidden" name="idFila" value="<?php if(isset($id)){echo$id;}else{echo"";} ?>">

		<fieldset class="campos">
			<p class="msg" id="mensagens"></p>
			<label for="pubTitulo" class="rotulo">*Titulo da Fila:</label>
			
            <input type="text" class="cp" name="catNome" id="catNome" title="Nome da Fila" 
            value="<?= (isset($catNome))?$catNome:'';  ?>" >	

			<input type="submit" name="enviar" value="Salvar" class="bt">
	
	</form>
