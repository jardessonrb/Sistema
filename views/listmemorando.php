<?php require_once "menu.php" ?>
<?php 
require_once "../classes/conexao.class.php";

$c = new Conectar();
$conexao = $c->conexao();

/*$sql =  "SELECT mem.id_memorando,loc.setor_local, usu.nome_usuario, mem.data_memorando, mem.assunto_memorando, mem.corpo_memorando  FROM tab_memorando mem JOIN tab_usuario usu JOIN tab_local loc on mem.id_usuario = usu.id_usuario where mem.id_memorando = 1 LIMIT 4";*/

$sql =  "SELECT mem.id_memorando,loc.setor_local, usu.nome_usuario, mem.data_memorando, mem.assunto_memorando, mem.assunto_memorando  FROM tab_memorando mem JOIN tab_usuario usu JOIN tab_local loc on mem.id_usuario = usu.id_usuario ORDER BY mem.data_memorando DESC LIMIT 4";

$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>listagem de memorando</title>
</head>
<body>
<div id="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Numero</th>
      <th scope="col">Setor</th>
      <th scope="col">Usuario</th>
      <th scope="col">Data Memorando</th>
      <th scope="col">Asssunto</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($mostra = mysqli_fetch_row($result)): ?>
    <tr id="corpo">
      <td><?php echo $mostra[0] ?></td>
      <td><?php echo utf8_encode($mostra[1]) ?></td>
      <td><?php echo utf8_encode($mostra[2]) ?></td>
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