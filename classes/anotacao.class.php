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

	function listaAnotacao($pri_data, $seg_data, $id_func){
	  $c = new Conectar();
	  $conexao = $c->conexao();

	  $sql = "SELECT ano.id_anotacao, ano.data_anotacao, ano.corpo_anotacao, fun.nome_funcionario, fun.telefone1_funcionario, fun.cargo_funcionario, fun.id_funcionario, usu.nome_usuario FROM tab_anotacao ano JOIN tab_funcionario fun JOIN tab_usuario usu on ano.id_funcionario = fun.id_funcionario and ano.id_usuario = usu.id_usuario WHERE ano.id_funcionario = '$id_func' AND ano.data_anotacao BETWEEN '$pri_data' AND '$seg_data' ORDER BY ano.id_anotacao DESC";

	  $result = mysqli_query($conexao, $sql);

	  return $result;

	}
	
}

?>