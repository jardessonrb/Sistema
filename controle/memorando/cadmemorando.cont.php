<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/memorando.class.php";

$obj = new Memorando();

$dados = array(
	$_POST['nome_funcionario'],
	$_POST['nome_local'],
	$_POST['nome_destino'],
	$_POST['nome_assunto'],
	$_POST['nome_justificativa']

);

echo $obj->cadMemorando($dados);


?>