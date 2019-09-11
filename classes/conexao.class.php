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