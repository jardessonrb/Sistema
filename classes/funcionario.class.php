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
			'nome' 		    => $mostra[1],
			'tel01'         => $mostra[2],
			'tel02'         => $mostra[3],
			'cargo'         => $mostra[4],
			'cpf'           => $mostra[5]

		);

		return $dados;

	}


}


?>