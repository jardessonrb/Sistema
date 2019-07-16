<?php require_once "menu.php" ?>
<?php 
require_once "../classes/conexao.class.php";

$c = new Conectar();
$conexao = $c->conexao();

$sql = "SELECT id_local, nome_predio, setor_local FROM tab_local";

$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>listagem de locais</title>
	<link rel="stylesheet" type="text/css" href="../css/listagem.min.css">
</head>
<body>
	<div id="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome Prédio</th>
      <th scope="col">Setor</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($mostra = mysqli_fetch_row($result)): ?>
    <tr id="corpo">
      <td><?php echo utf8_encode($mostra[1]) ?></td>
      <td><?php echo utf8_encode($mostra[2]) ?></td>
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