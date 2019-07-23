<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/funcionario.class.php";

$obj = new Funcionario();

$id_funcionario = $_POST['id_funcionario'];


echo json_encode($obj->getDadosFuncionario($id_funcionario));

?>