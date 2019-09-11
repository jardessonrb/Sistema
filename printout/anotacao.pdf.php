<!--Inicio do bloco PHP-->
<?php 

	require_once "../classes/conexao.class.php";

	$c = new Conectar();
	$conexao = $c->conexao();

	$id_func  = $_GET['id_anotacao'];
	$pri_data = $_GET['pd'];
	$seg_data = $_GET['sd'];


	$sql = "SELECT ano.id_anotacao, ano.data_anotacao, ano.corpo_anotacao, fun.nome_funcionario, fun.telefone1_funcionario, fun.cargo_funcionario, fun.id_funcionario, usu.nome_usuario FROM tab_anotacao ano JOIN tab_funcionario fun JOIN tab_usuario usu on ano.id_funcionario = fun.id_funcionario and ano.id_usuario = usu.id_usuario WHERE ano.id_funcionario = '$id_func' AND ano.data_anotacao BETWEEN '$pri_data' AND '$seg_data' ORDER BY ano.id_anotacao DESC";

    $result = mysqli_query($conexao,$sql);


 ?>	
<!--Fim do bloco PHP-->
 	

 	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
 	<script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.min.js"></script> 
 		<style type="text/css" charset=utf-8>
 			#pagina{
 				height: 930px;
 				width: 650px;
 				
 			}
 			#cabecalho{
 				border-bottom: 0.5px solid #4F4F4F;
 				border-top: 0.5px solid #4F4F4F;
 			}
 			#imagem{

 				margin-top: 30px;
 				margin-left: 20px;
 			}
 			#conteudo_cabecalho{
 				border-bottom: 1px solid #333;
 			}
 			#conteudo_rodape{
 			     position: relative;
 			     top: 85px;
 			}
 			#esquerdo{
 				float: left;
 				margin-left: 10px;
 			}
 			#centro{
 				position: relative;
 				text-align: center;
 				margin-right: 160px;
 			}
 			#direita{
 				position: relative;
 				text-align: right;
 				margin-right: 10px;
 				top: -40px;

 			}
 			#data-impresso{
 				float: left;
 				font-size: 15px;
 				margin-left: 10px;
 				margin-top: -20px;
 				
 			}
 			#sep{
				position: relative;
		        margin-left: 0;
		        width: 70%;
		        border-color: #B5B5B5;
 			}
 			#conteudo_corpo{
 				position: relative;
 				margin-left: 13px;
 			}
 			.subnome{
 				font-size: 14px;
				font-family: Arial;
				font-weight: bold;
 			}
 			
 			/*Fim da formatação do rodape*/
 		</style>
 		<div id="pagina" class="container-fluid">
 			<div class="row">
 				<div id="cabecalho">
 					<div id="conteudo_cabecalho">
 						<img id="imagem" src="../../img/LogoNeuroCentro.png" width="200" height="120">
 						<h4 id="linha" align="center"><?php echo utf8_encode("Anotação Sobre Funcionário")?></h4><br><br>
 						<span id="data-impresso">Data:&nbsp;<?php echo date("Y/m/d") ?></span>
 					</div>
 					
 				</div>
 			</div>
 			
<div class="row"> 
<div id="corpo">
<div id="conteudo_corpo">
<?php while ($mostra = mysqli_fetch_row($result)): ?>
	<span class="subnome">

		<?php echo utf8_encode("Número Anotação") ?>: </span><span class="dados"><?php echo $mostra[0] ?>
	</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<span class="subnome">

		<?php echo utf8_encode("Data de Anotação") ?>:&nbsp;</span><span class="dados"><?php echo $mostra[1] ?>
	</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<span class="subnome">

	    Anotado por :&nbsp;</span><span class="dados"><?php echo $mostra[7] ?>
	</span>

	<p><span class="subnome">
		<?php $nome = utf8_encode($mostra[3]) ?>
	   Funcionario:&nbsp;</span><span class="dados"><?php echo utf8_encode($nome) ?>
	</span>&nbsp;&nbsp;&nbsp;

	<span class="subnome">

		Tel :&nbsp;</span><span class="dados"><?php echo $mostra[4] ?>
	</span>&nbsp;&nbsp;&nbsp;

	<span class="subnome">

		Cargo :&nbsp;</span><span class="dados"><?php echo utf8_encode($mostra[5]) ?>
	</span></p>

	<p><span class="subnome">
		<?php $anotacao = utf8_encode($mostra[2]) ?>
		<?php echo utf8_encode("Anotação") ?> :&nbsp;</span><span class="dados"><?php echo utf8_encode($anotacao) ?>
	</span></p>

	<hr id="sep">
<?php endwhile; ?>

</div>
</div>	
</div>