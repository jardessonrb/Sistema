<?php 

class Anotacao{

	function cadAnotacao($dados){

		$c = new Conectar();
		$conexao = $c->conexao();

		session_start();
		$id_usuario = $_SESSION['id_user'];

		$data = date("Y/m/d");

		$sql = "INSERT INTO tab_anotacao(id_funcionario, id_usuario, data_anotacao, corpo_anotacao) VALUES ('$dados[0]', '$id_usuario', '$data', '$dados[1]')";

		$result = mysqli_query($conexao, $sql);

		return $result;

	}


	function updateAnotacao($dados){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "UPDATE tab_anotacao SET WHERE id_anotacao = '$dados[0]'; ";


		$result = mysqli_query($conexao, $sql);


		return $result;

	}

	function delAnotacao($id_anotacao){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "DELETE FROM tab_anotacao WHERE id_anotacao = '$id_anotacao'; ";


		$result = mysqli_query($conexao, $sql);


		return $result;

	}
	
}

?>