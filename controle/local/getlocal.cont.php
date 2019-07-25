<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/local.class.php";

$obj = new Local();

$id_local = $_POST['id_local'];


echo json_encode($obj->getDadosLocal($id_local));

?>