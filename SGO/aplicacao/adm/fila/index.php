<?php
  include_once('../app/config.php');

  session_start();    
  if (!isset($_SESSION['idUsuario'])) {
    header('location:../index.php?cod=401');
  }

#conecta com o banco
  $con= connecta();
  $busca="SELECT * FROM especialidade";
  $busca="SELECT * FROM exames";

# exclui registros do banco
if(isset($_GET['acao']) && $_GET['acao'] =='excluir' ){
  
  $id=$_GET['id'];
  $sql="DELETE FROM especialidade WHERE idEspecialidade=$id";
  $con->query($sql);
 
}

#busca nos dados do banco
//
if(isset($_GET['busca']) && isset($_GET['busca'])!=''){
    
    $espNome=$_GET['busca'];
    $busca="SELECT * FROM fila WHERE espNome LIKE '%$espNome%' ";

}
 
#executa buscas simples ou personalisadas
$result=$con->query($busca);

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/personalizado.css">
  <title>Gerenciar Fila de Espera</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="">GERENCIAR FILA DE ESPERA</a>

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

  <h1 class="titulo1"></h1>
  <!--
  <form action="index.php" method="get" class="form">
    <label class="rotulo">Pesquisa:</label>
    <input type="text" name="busca" value="" class="cp">
    <input type="submit" name="enviar" value="Buscar" class="bt">
    <input type="reset" name="limpar" value="Limpar" class="bt">
    <br>
    <br>
-->

<?php
	echo (isset($msg))?$msg:'';
	?>

    <form name="frm" id="form" class="form" action="formCriarExames.php" method="post" enctype="multipart/form-data"> 
		<fieldset class="campos">
		 <p class="msg" id="mensagens"></p>
		 <label for="exTitulo" class="rotulo">Nome do Exame:</label>
		 <input type="text" class="cp" name="exTitulo" id="exTitulo" title="Titulo da notícia" value="<?= (isset($exTitulo))?$exTitulo:'';  ?>" >	
			<label for="exSubTitulo" class="rotulo">Nome do Paciente:</label>
			<input type="text" class="cp" name="exSubTitulo" id="exSubTitulo" title="Sub-Título" value="<?= (isset($exSubTitulo))?$exSubTitulo:''; ?>" >	
			
			<label for="foto" class="rotulo">Pedido médico: </label>
			<input type="file" class="cp" name="exFoto" id="foto" title="Arquivo da Foto"  >	
			
			
		</fieldset>
		<fieldset class="campos">

			<label for="exTexto" class="rotulo">*Descriçao do Exame:</label>
			<textarea name="exTexto" class="box" id="exTexto" title="Descriçao do Exame"><?= (isset($exTexto))?$exTexto:'';  ?> </textarea>
			<input type="submit" name="enviar" value="Salvar " class="bt">
			<input type="reset" name="cancelar" value="Limpar " class="bt">
			
		</fieldset>
			
			
			<label for="categoria" class="rotulo">Especialidade Médica:</label>		
			<select class="cp cps" name="exIdCategoria" id="categoria" title="Autor da publicação">	
			
			<option value="">Escolha</option>
	        <?php
		     while ($linha=$especialidade->fetch_assoc()) {
			 extract($linha);
	
			if($idEspecialidade==$exEspecialidade){
				$op="<option selected value=\"$idEspecialidade\">$espNome</option>";
			}else{
				$op="<option value=\"$idEspecialidade\">$espNome</option>";
			}
		      echo $op;	
		    }

	?>
				</select>
  </form>
 </body>
</html>