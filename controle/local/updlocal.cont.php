<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/local.class.php";

$obj = new Local();


$dados = array(

	$_POST['idlocalU'],
	$_POST['setor_localU']
	
	
);


echo $obj->updateLocal($dados);

?>