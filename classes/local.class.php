<?php  

class Local{

	function cadLocal($dados){
		$c = new Conectar();
		$conexao = $c->conexao();


		$sql = "INSERT INTO tab_local(nome_predio, setor_local) VALUES('$dados[0]', '$dados[1]')";

		$result = mysqli_query($conexao, $sql);

		return $result;

	}
}


?>