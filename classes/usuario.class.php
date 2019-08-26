<?php 

class Usuario{

	function logarSistema($dados){

		if(self::NotSqlN($dados[0]) == true && self::NotSqlS($dados[1]) == true){
 
			$c = new Conectar();
			$conexao = $c->conexao();
			
			session_start();
			$_SESSION['usuario'] = $dados[0];
			$_SESSION['nivel']   = self::trazerNI($dados);
			$_SESSION['id_user']   = self::trazerID($dados);

	        $sql = "SELECT nome_usuario, senha_usuario FROM tab_usuario WHERE nome_usuario = '$dados[0]' AND senha_usuario = '$dados[1]'";

			$result = mysqli_query($conexao, $sql);

			if (mysqli_num_rows($result) > 0) {
				
				return  1;

			}else{

				return 2;

			}

		}else{

			return 3;
			
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

	public function trazerNI($dados){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "SELECT nivel_acesso from tab_usuario where nome_usuario='$dados[0]' and senha_usuario = '$dados[1]' ";

		$result = mysqli_query($conexao, $sql);

		$mostra = mysqli_fetch_row($result);

		return $mostra[0];
	}

	public function trazerID($dados){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "SELECT id_usuario from tab_usuario where nome_usuario='$dados[0]' and senha_usuario = '$dados[1]' ";

		$result = mysqli_query($conexao, $sql);

		$mostra = mysqli_fetch_row($result);

		return $mostra[0];
	}

	public function NotSqlN($strNome){

    	$status = true;

    	$arr1 = str_split($strNome);

    	for($i = 0; $i < count($arr1); $i++ ){

			if($arr1[$i] == "'" || $arr1[$i] == "@" || $arr1[$i] == "#" || $arr1[$i] == "!" || $arr1[$i] == "1" || $arr1[$i] == "&"){

				$status = false;
			}
		
	    }

	    return $status;

	}

	public function NotSqlS($strSenha){

    	$stat = true;

    	$arr2 = str_split($strSenha);

    	for($j = 0; $j < count($arr2); $j++ ){

			if($arr2[$j] == "'" || $arr2[$j] == "@" || $arr2[$j] == "#" || $arr2[$j] == "!" || $arr2[$j] == " " || $arr2[$j] == "&"){

				$stat = false;
			}
		
	    }

	    return $stat;

	}

	public function getDadosUsuario($id_usuario){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "SELECT id_usuario, nome_usuario, senha_usuario, nivel_acesso from tab_usuario where id_usuario = '$id_usuario'";

		$result = mysqli_query($conexao, $sql);

		$mostra = mysqli_fetch_row($result);

		$dados = array(

			'id_usuario'      => $mostra[0],
			'nome_usuario' 	  => utf8_encode($mostra[1]),
			'senha_usuario'   => $mostra[2],
			'nivel_acesso'    => $mostra[3]
			

		);

		return $dados;


	}

	public function updateUsuario($dados){

		$c = new Conectar();
		$conexao = $c->conexao();

		$sql = "UPDATE tab_usuario SET senha_usuario = '$dados[1]', nivel_acesso = '$dados[2]' WHERE id_usuario = '$dados[0]'; ";


		$result = mysqli_query($conexao, $sql);


		return $result;
	}


}


?>