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
}

?>