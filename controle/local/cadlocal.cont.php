<?php  

require_once "../../classes/conexao.class.php";
require_once "../../classes/local.class.php";

$obj = new Local();

$dados = array(

	$_POST['nome_predio'],
	$_POST['nome_setor']

);

echo $obj->cadLocal($dados);


?>
