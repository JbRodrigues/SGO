<?php
define('HOST','localhost');
define('USUARIO', 'root');
define('SENHA','');
define('BANCO','aplicacao');


function connecta(){
	
		$mysqli = new mysqli(HOST,USUARIO, SENHA, BANCO);
		$mysqli->set_charset("utf8");
	if ($mysqli->connect_errno) {
	    echo("Falha na conexão:".$mysqli->connect_errno);
	   return false;
	}else{
		//echo "Conectou";
		return $mysqli;
	}
}

	function extExt($name){
			$resultado=substr($name,strripos($name,'.'));
				
			return($resultado);
	}
	

