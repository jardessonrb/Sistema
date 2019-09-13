<?php 

class Conectar{
	
	private $servidor = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $bd = "dbo_teste";

	public function conexao(){
		$conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->bd);

		return $conexao;
	}
}

?>

<?php

//$servidor = "localhost";
//$usuario = "root";
//$senha = "";
//$bd = "dbo_teste";

//$mysqli = new mysqli($servidor, $usuario, $senha, $bd);
//if($mysqli->connect_errno){

//	echo "Falha:".$mysqli->connect_errno.$mysqli->connect_error;
//
?>