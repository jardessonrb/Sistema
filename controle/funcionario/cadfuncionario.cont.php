<?php  
require_once "../../classes/conexao.class.php";
require_once "../../classes/funcionario.class.php";

$obj = new Funcionario();

$dados = array(

	utf8_decode($_POST['nome_funcionario']),
	$_POST['cpf_funcionario'],
	$_POST['telefone1_funcionario'],
	$_POST['telefone2_funcionario'],
	utf8_decode($_POST['cargo_funcionario'])

);


echo $obj->cadFuncionario($dados);


?>