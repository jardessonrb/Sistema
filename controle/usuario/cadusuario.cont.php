<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/usuario.class.php";

$obj = new Usuario();

$dados = array(

	$_POST['nome_funcionario'],
	$_POST['nome_usuario'],
	$_POST['senha_usuario'],
	$_POST['nivel_acesso']

);


echo $obj->cadUsuario($dados);


?>