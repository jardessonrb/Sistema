<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/funcionario.class.php";

$obj = new Funcionario();


$dados = array(

	$_POST['idfuncionarioU'],
	$_POST['nomeU'],
	$_POST['tel01U'],
	$_POST['tel02U'],
	$_POST['cargoU'],
	$_POST['cpfU']
	
);


echo $obj->updateFuncionario($dados);

?>