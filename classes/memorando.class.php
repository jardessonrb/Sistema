<?php  

class Memorando{

	function cadMemorando($dados){
		//Cadastro de Memorando

		$c = new Conectar();
		$conexao = $c->conexao();

		$id_usuario = 1;
		$data = date("Y/m/d");
		//$emissor = "Emissor Memorando";
		$emissor = self::buscarFuncionario($id_usuario);

		$sql = "INSERT INTO tab_memorando(id_funcionario, id_usuario, id_local, emissor_memorando, data_memorando,destino_memorando, assunto_memorando, corpo_memorando) VALUES
		('$dados[0]','$id_usuario','$dados[1]','$emissor','$data','$dados[2]','$dados[3]','$dados[4]')";


		$result = mysqli_query($conexao, $sql);

		return $result;
	}

	function buscarFuncionario($id){
		//Buscar o nome do Funcionario de acordo com o usuario
		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "SELECT fun.nome_funcionario FROM tab_funcionario fun JOIN tab_usuario usu on fun.id_funcionario = usu.id_funcionario WHERE usu.id_usuario = '$id'";

		$result =  mysqli_query($conexao, $sql);

		$mostra = mysqli_fetch_row($result);

		return $mostra[0];

	}
}




?>