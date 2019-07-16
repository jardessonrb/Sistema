<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/usuario.class.php";

$obj = new Usuario();

$dados = array(

	$_POST['usuario'],
	$_POST['senha']

);

echo $obj->logarSistema($dados);

?>