<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/usuario.class.php";

$obj = new Usuario();

$dados = array(

	$_POST['id_usuario'],
	$_POST['senhaU'],
	$_POST['nivel_acesso']
	
);


echo $obj->updateUsuario($dados);

?>