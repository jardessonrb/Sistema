<?php  

class Funcionario{

	function cadFuncionario($dados){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "INSERT INTO tab_funcionario(nome_funcionario, cpf_funcionario, telefone1_funcionario, telefone2_funcionario, cargo_funcionario) VALUES('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]')";

		$result = mysqli_query($conexao, $sql);

		return $result;

	}


}


?>