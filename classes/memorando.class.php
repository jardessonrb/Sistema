<?php  

class Memorando{

	function cadMemorando($dados){
		//Cadastro de Memorando

		$c = new Conectar();
		$conexao = $c->conexao();

		session_start();
		$id_usuario = $_SESSION['id_user'];
		$data = date("Y/m/d");
		//$emissor = "Emissor Memorando";
		$emissor = self::buscarFuncionario($id_usuario);
		$destino = $dados[2];
		$assunto = $dados[3];
		$corpo   = $dados[4];


		$sql = "INSERT INTO tab_memorando(id_funcionario, id_usuario, id_local, emissor_memorando, data_memorando,destino_memorando, assunto_memorando, corpo_memorando) VALUES
		('$dados[0]','$id_usuario','$dados[1]','$emissor','$data','$destino','$assunto','$corpo')";


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

	function getDadosMemorando($id_mem){
		//Selecionar Dados do Memorando

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "SELECT mem.id_memorando, loc.nome_predio, mem.data_memorando, mem.assunto_memorando, mem.corpo_memorando FROM tab_memorando mem JOIN tab_local loc ON mem.id_local = loc.id_local WHERE id_memorando = '$id_mem'";

		$result =  mysqli_query($conexao, $sql);

		$mostra = mysqli_fetch_row($result);

		$dados = array(
			
			'idmemorando'   => $mostra[0],
			'nome_local'    => $mostra[1],
			'data'          => $mostra[2],
			'assunto'       => $mostra[3],
			'justificativa' => $mostra[4]

		);

		return $dados;

	}


	function updateMemorando($dados){
		//Atualizar Memorando

		$c = new Conectar();
		$conexao = $c->conexao();
		if ($dados[1] == "nulo") {
			$sql = "UPDATE tab_memorando SET data_memorando = '$dados[2]' , assunto_memorando = '$dados[3]', corpo_memorando = '$dados[4]' WHERE id_memorando = '$dados[0]';";
		}else{
			$sql = "UPDATE tab_memorando SET id_local = '$dados[1]', data_memorando = '$dados[2]' , assunto_memorando = '$dados[3]', corpo_memorando = '$dados[4]' WHERE id_memorando = '$dados[0]';";
		}

		$result =  mysqli_query($conexao, $sql);

		return $result;

	}

	function listaMemorando(){

		$c = new Conectar();
		$conexao = $c->conexao();


		$sql = "SELECT mem.id_memorando,loc.setor_local,loc.nome_predio, usu.nome_usuario, mem.data_memorando, fun.nome_funcionario,  mem.assunto_memorando FROM tab_memorando mem JOIN tab_usuario usu JOIN tab_local loc JOIN tab_funcionario fun on mem.id_usuario = usu.id_usuario AND mem.id_local = loc.id_local AND fun.id_funcionario = mem.id_funcionario ORDER BY mem.id_memorando  DESC LIMIT 4";

		$result = mysqli_query($conexao, $sql);

		return $result;

	}

	function list_memorando($nome){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "SELECT mem.id_memorando,loc.setor_local,loc.nome_predio, usu.nome_usuario, mem.data_memorando, fun.nome_funcionario,  mem.assunto_memorando FROM tab_memorando mem JOIN tab_usuario usu JOIN tab_local loc JOIN tab_funcionario fun on mem.id_usuario = usu.id_usuario AND mem.id_local = loc.id_local AND fun.id_funcionario = mem.id_funcionario WHERE fun.nome_funcionario LIKE '%$nome%' ORDER BY mem.id_memorando";

		$result = mysqli_query($conexao, $sql);

		return $result;

	}


}

?>