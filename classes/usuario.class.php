<?php 

class Usuario{

	function logarSistema($dados){

		$c = new Conectar();
		$conexao = $c->conexao();


		$sql = "SELECT nome_usuario, senha_usuario FROM tab_usuario WHERE nome_usuario = '$dados[0]' AND senha_usuario = '$dados[1]'";

		$result = mysqli_query($conexao, $sql);

		if (mysqli_num_rows($result) > 0) {
			
			 return  1;
		}	

	}

	function cadUsuario($dados){
		$c = new Conectar();
		$conexao = $c->conexao();

		$data = date("Y/m/d");

		$sql = "INSERT INTO tab_usuario(id_funcionario, nome_usuario, senha_usuario, nivel_acesso, captura_usuario) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$data')";

		$result = mysqli_query($conexao, $sql);


		return $result;

	}
}

?>