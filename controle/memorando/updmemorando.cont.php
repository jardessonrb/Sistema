<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/memorando.class.php";

$obj = new Memorando();


$dados = array(

	$_POST['idMemorandoU'],
	$_POST['nome_localU'],
	$_POST['dataU'],
	$_POST['assuntoU'],
	$_POST['justificativaU']
	
);


echo $obj->updateMemorando($dados);

?>