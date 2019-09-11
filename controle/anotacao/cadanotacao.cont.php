<?php  
require_once "../../classes/conexao.class.php";
require_once "../../classes/anotacao.class.php";

$obj = new Anotacao();

$dados = array(

	$_POST['nome_funcionario'],
	utf8_decode($_POST['nome_anotacao'])

);


echo $obj->cadAnotacao($dados);


?>