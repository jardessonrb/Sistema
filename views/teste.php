<?php 

require_once "../classes/conexao.class.php";

$c = new Conectar();
$conexao = $c->conexao();


if (isset($_POST['id_fun'])) {
	$sql = "SELECT id_funcionario, nome_funcionario, telefone1_funcionario, telefone2_funcionario, cargo_funcionario FROM tab_funcionario";
}else{
	$id = $_POST['id_fun'];
	$sql = "SELECT id_funcionario, nome_funcionario, telefone1_funcionario, telefone2_funcionario, cargo_funcionario FROM tab_funcionario Where id_funcionario = 'id'";
}

$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
	<link rel="stylesheet" type="text/css" href="../css/listagem.min.css">
</head>
<body>
	<div id="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Tel 01</th>
      <th scope="col">Tel 02</th>
      <th scope="col">Cargo</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($mostra = mysqli_fetch_row($result)): ?>
    <tr id="corpo">
      <td><?php echo utf8_encode($mostra[1]) ?></td>
      <td><?php echo $mostra[2] ?></td>
      <td><?php echo $mostra[3] ?></td>
      <td><?php echo utf8_encode($mostra[4]) ?></td>
	  <td>
		<span  data-toggle="modal" data-target="#abremodalUpdateProduto" class="btn btn-primary btn-xs" onclick="atualizarFuncionario('<?php echo $mostra[0] ?>')">
			<span class="glyphicon glyphicon-pencil"></span>
		</span>
      </td>
	</tr>
</tbody>
<?php endwhile; ?>
</table>
</div>
</body>
</html>