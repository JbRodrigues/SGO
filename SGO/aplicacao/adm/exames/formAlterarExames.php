<?php
	include_once("../app/config.php");
	$con=connecta();
	$categoria=$con->query("SELECT * FROM categoria");

  session_start();    
  if (!isset($_SESSION['idUsuario'])) {
    header('location:../index.php?cod=401');
  }

  	if (isset($_GET['id'])) {
  		$id=$_GET['id'];
  		$sql="SELECT * FROM exame WHERE idExame = '$id' ";
  		
  		$con=connecta();
  		$resultado= $con->query($sql);
  		$noticia=$resultado->fetch_assoc();
  		extract($noticia);
  		
  	}

	if (isset($_POST['enviar'])) {

		if(!in_array('',$_POST)){
			$file=$_FILES['pubFoto'];
			$post=$_POST;

			extract($post);
			extract($file);
			#******************INICIO UPLOAD**********************
			if (!$file['name']=='') {
				$formatos=['.jpg','.png','.jpeg'];
				$ext=extExt($name);
		
				$arquivo="../img/";
				$pubFoto=md5_file($tmp_name);
				$pubFoto.=$ext;

				$arquivo.=$pubFoto;
				//substr($name,strripos($name,'.'));
			
				if(in_array($ext,$formatos )){
				
					move_uploaded_file($tmp_name, $arquivo);
						
				}else{
					echo "Formato invalido Invalido";
				}

				$sql="UPDATE exame ";
				$sql.="SET pubTitulo = '{$pubTitulo}', pubSubTitulo = '{$pubSubTitulo}', pubIdCategoria = '{$pubIdCategoria}', pubTexto = '{$pubTexto}', pubFoto = '{$pubFoto}' ";
				$sql.="WHERE idExame = '{$idExame}' ";

			}else{
				$sql="UPDATE exame ";
				$sql.="SET pubTitulo = '{$pubTitulo}', pubSubTitulo = '{$pubSubTitulo}', pubIdCategoria = '{$pubIdCategoria}', pubTexto = '{$pubTexto}' ";
				$sql.="WHERE idExame = '{$idExame}' ";
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
<a href="index.php">Gerenciar Notícia | </a>

	<?php
	echo (isset($msg))?$msg:'';
	?>
<form name="frm" id="form" class="form" action="formAlterarNoticia.php" method="post" enctype="multipart/form-data"> 
		
		<input type="hidden" name="idExame" value="<?php if(isset($id)){echo$id;}else{echo"";} ?>">

		<fieldset class="campos">
			<p class="msg" id="mensagens"></p>
			<label for="pubTitulo" class="rotulo">*Titulo:</label>
			
<input type="text" class="cp" name="exTitulo" id="pubTitulo" title="Titulo da notícia" 
value="<?= (isset($exTitulo))?$exTitulo:'';  ?>" >	


			<label for="exSubTitulo" class="rotulo">Sub-Título:</label>
			<input type="text" class="cp" name="exSubTitulo" id="exSubTitulo" title="Sub-Título" value="<?= (isset($exSubTitulo))?$exSubTitulo:''; ?>" >	
			



			
			
			<label for="categoria" class="rotulo">*Categoria:</label>			
			
			<select class="cp cps" name="exIdCategoria" id="categoria" title="Autor da publicação">	
				<option value="">Escolha</option>
	<?php
		while ($linha=$categoria->fetch_assoc()) {
			extract($linha);
	
			if($idCategoria==$pubIdCategoria){
				$op="<option selected value=\"$idCategoria\">$catNome</option>";
			}else{
				$op="<option value=\"$idCategoria\">$catNome</option>";
			}
		echo $op;	
		}

	?>
				</select>
			

			<label for="foto" class="rotulo">Foto da postagem: </label>
			<input type="file" class="cp" name="pubFoto" id="foto" title="Arquivo da Foto"  >	
			
			
		</fieldset>
		<fieldset class="campos">

			
			<label for="pubTexto" class="rotulo">*Texto da notícia:</label>
			<textarea name="pubTexto" class="box" id="pubTexto" title="Texto da notícia"><?= (isset($pubTexto))?$pubTexto:'';  ?> </textarea>
				
			
			
			<input type="submit" name="enviar" value="Salvar Postagem" class="bt">
			<input type="reset" name="cancelar" value="Limpar Postagem" class="bt">
			
		</fieldset>
	</form>
