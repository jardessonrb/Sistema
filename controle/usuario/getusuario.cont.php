<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/usuario.class.php";

$obj = new Usuario();

$id_usuario = $_POST['id_usuario'];


echo json_encode($obj->getDadosUsuario($id_usuario));

?>