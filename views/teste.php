
<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		require_once "menu.php";
		require_once "../classes/conexao.class.php";

		$itens_por_pag = 2;

		$pagina = intval($_GET['pagina']);

		$sql_code = "select nome_usuario, senha_usuario from tab_usuario LIMIT $pagina, $itens_por_pag";

		$execute = $mysqli->query($sql_code) or die($mysqli->error);

		$produto = $execute->fetch_assoc();
		$num = $execute->num_rows;

		$num_total = $mysqli->query("select nome_usuario, senha_usuario from tab_usuario")->num_rows;

		$num_paginas = ceil($num_total/$itens_por_pag);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4">
				<h1>Produtos</h1>
				<?php if($num > 0){ ?>

					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td>Nome</td>
								<td>Senha</td>
							</tr>
						</thead>
						<tbody>
							<?php do{ ?>
							<tr>
								<td><?php echo $produto['nome_usuario']; ?></td>
								<td><?php echo $produto['senha_usuario']; ?></td>
							</tr>
						<?php }while($produto = $execute->fetch_assoc()); ?>
						</tbody>
					</table>
					<nav aria-label="Page navigation example">
					  <ul class="pagination">
					    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
					    <?php for ($i=0; $i < $num_paginas; $i++) { ?>
					    	<?php  

					    	$estilo = "";
					    	if($pagina == $i){
					    		$estilo = "class=\"active\"";
					    	}
					    	?>
					    	<li <?php echo $estilo; ?> class="page-item"><a class="page-link" href="#"><?php echo $i ?></a></li>
					    <?php  } ?>
					    <li class="page-item"><a class="page-link" href="#">Next</a></li>
					  </ul>
					</nav>
				<?php } ?>
				
			</div>
		</div>
	</div>
</body>
</html>


<?php }else{
	header("location:../index.php");
}

?>

