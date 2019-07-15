<?php 

class Usuario{

	function logarSistema($dados){

		$c = new Conectar();
		$conexao = $c->conexao();


		$sql = "SELECT nome_usuario, senha FROM tab_usuario WHERE  nome_usuario = '$dados[1]' AND senha_usuario = '$dados[0]'";

		$result = mysqli_fetch($conexao, $sql);

		return $result;

	}
}

?>