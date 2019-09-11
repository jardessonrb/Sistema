<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/anotacao.class.php";

$obj = new Anotacao();

$id_anotacao = $_POST['id_anotacao'];

echo $obj->delAnotacao($id_anotacao);

?>