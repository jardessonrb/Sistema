<?php  

class Funcionario{

	function cadFuncionario($dados){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "INSERT INTO tab_funcionario(nome_funcionario, cpf_funcionario, telefone1_funcionario, telefone2_funcionario, cargo_funcionario) VALUES('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]')";

		$result = mysqli_query($conexao, $sql);

		return $result;

	}


	function getDadosFuncionario($id_fun){
		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "SELECT id_funcionario, nome_funcionario, telefone1_funcionario, telefone2_funcionario, cargo_funcionario, cpf_funcionario FROM tab_funcionario WHERE id_funcionario = '$id_fun'";

		$result = mysqli_query($conexao, $sql);

		$mostra = mysqli_fetch_row($result);

		$dados = array(
			'idfuncionario' => $mostra[0],
			'nome' 		    => utf8_encode($mostra[1]),
			'tel01'         => $mostra[2],
			'tel02'         => $mostra[3],
			'cargo'         => utf8_encode($mostra[4]),
			'cpf'           => $mostra[5]

		);

		return $dados;

	}

	function updateFuncionario($dados){
		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "UPDATE tab_funcionario SET nome_funcionario = '$dados[1]', telefone1_funcionario = '$dados[2]', telefone2_funcionario = '$dados[3]', cargo_funcionario = '$dados[4]', cpf_funcionario = '$dados[5]' WHERE id_funcionario = '$dados[0]'; ";


		$result = mysqli_query($conexao, $sql);


		return $result;
	}


	function listaFuncionario(){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "SELECT id_funcionario, nome_funcionario, telefone1_funcionario, telefone2_funcionario, cargo_funcionario FROM tab_funcionario";

		$result = mysqli_query($conexao, $sql);

		return $result;

	}

	function list_funcionario($nome){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "SELECT id_funcionario, nome_funcionario, telefone1_funcionario, telefone2_funcionario, cargo_funcionario FROM tab_funcionario WHERE nome_funcionario LIKE '%$nome%'";

		$result = mysqli_query($conexao, $sql);

		return $result;

		}


}


?>