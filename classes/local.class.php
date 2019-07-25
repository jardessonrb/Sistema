<?php  

class Local{

	function cadLocal($dados){
		$c = new Conectar();
		$conexao = $c->conexao();


		$sql = "INSERT INTO tab_local(nome_predio, setor_local) VALUES('$dados[0]', '$dados[1]')";

		$result = mysqli_query($conexao, $sql);

		return $result;

	}

	function getDadosLocal($id_local){
		$c = new Conectar();
		$conexao = $c->conexao();


		$sql = "SELECT id_local, nome_predio, setor_local FROM tab_local WHERE id_local = '$id_local'";

		$result = mysqli_query($conexao, $sql);

		$mostra = mysqli_fetch_row($result);

		$dados = array(

			'get_id_local'    => $mostra[0],
			'get_nome_predio' => $mostra[1],
			'get_setor_local' => $mostra[2]

        );

		return $dados;

	}

	function updateLocal($dados){
		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "UPDATE tab_local SET setor_local = '$dados[1]' WHERE id_local = '$dados[0]'; ";


		$result = mysqli_query($conexao, $sql);


		return $result;

	}
}


?>