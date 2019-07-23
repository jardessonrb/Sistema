<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/memorando.class.php";

$obj = new Memorando();

$id_memorando = $_POST['id_memorando'];


echo json_encode($obj->getDadosMemorando($id_memorando));

?>