<!--Inicio do bloco PHP-->
<?php 

	require_once "../classes/conexao.class.php";


	$c = new Conectar();
	$conexao = $c->conexao();

	$idmemorando = $_GET['id_mem'];

	$sql="SELECT mem.emissor_memorando, mem.destino_memorando, mem.assunto_memorando, mem.corpo_memorando, loc.setor_local, loc.nome_predio, fun.nome_funcionario  FROM tab_memorando mem JOIN tab_local loc JOIN tab_funcionario fun ON mem.id_local = loc.id_local AND fun.id_funcionario = mem.id_funcionario WHERE mem.id_memorando = '$idmemorando'";

    $result=mysqli_query($conexao,$sql);

	$ver = mysqli_fetch_row($result);

	$emissor  = utf8_encode($ver[0]);
	$destino  = utf8_encode($ver[1]);
	$assunto  = utf8_encode($ver[2]);
	$corpo    = utf8_encode($ver[3]);
	$local1   = utf8_encode($ver[4]);
	$local2   = utf8_encode($ver[5]);
	$funcion  = utf8_encode($ver[6]);
	$data     = date("Y/m/d");
	

 ?>	
<!--Fim do bloco PHP-->
 	

 	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
 	<script type="text/javascript" src="../../lib/bootstrap/js/bootstrap.min.js"></script> 
 		<style type="text/css" charset=utf-8>
 			#pagina{
 				height: 930px;
 				width: 620px;
 				border: 1px solid;
 				border-color: #cc0000;
 			}
 			/*Definição de tamnho para formatação*/
 			#cabecalho{
 				position: relative;			
 				max-height: 230px;

 			}
 			#corpo{
 				position: relative;
 				height: 500px;
 				max-height: 500px;
 			}
 			#rodape{
 				position: relative;
 				height: 162px;
 				max-height: 162px;
 			}
 			/*Fim da formatação*/
 			/*Formatação do conteudo cabeçalho*/
 			#conteudo_cabecalho{
 			   position: relative;
 			}
 			#data{
 				text-align: right;
 				margin-right: 10px;
 				margin-top: -20px;
 				font-size: 12px;
 			}
 			#imagem{

 				margin-top: 30px;
 				margin-left: 20px;
 			}
 			hr{
 				position: relative;
 				border-color: gray; 
 				top: -20px;
 				width: 500px;
 				size: 0.2px;
 			}
 			h4{
 				position: relative;
 				top: 20px;

 			}
 			/*Fim da formatação do cabeçalho*/
 			/*Formatação do conteudo corpo*/
 			#conteudo_corpo{
 				position: relative;

 			}
 			#conteudo_justifi{
 				text-align: justify;
 				font-size: 16px;
 				margin-top: 20px;
 			}
 			p{
 				margin-left: 20px;
 			}
 			/*Fim da formatação do corpo*/
 			/*Formatação do conteudo rodape*/
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
 			
 			/*Fim da formatação do rodape*/
 		</style>
 		<div id="pagina" class="container-fluid">
 			<div class="row">
 				<div id="cabecalho">
 					<div id="conteudo_cabecalho">
 						<img id="imagem" src="../../img/LogoNeuroCentro.png" width="200" height="120">
 						<p id="data">Teresina,&nbsp;<?php echo date("d/m/Y", strtotime($data))?>.</p>
 						<h4 id="linha" align="center">Memorando Interno</h4><br><br>
 						<hr>
 						
 					</div>
 					
 				</div>
 			</div>
 			<div class="row"> 
 				<div id="corpo">
 					<div id="conteudo_corpo">
 				    <p>De:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo utf8_encode($local2)."-".$local1 ?></p>
			        	<p>Para:&nbsp;&nbsp;<?php echo utf8_encode($destino)?></p>
			        	<p>Funcionario:&nbsp;&nbsp;<?php echo utf8_encode($funcion)?></p>
			        	<div id="conteudo_justifi">
			        		<?php echo utf8_encode($corpo)?>
			        	</div>
 					</div>
 					
 				</div>
 			</div>
 			<div class="row">
 				<div id="rodape">
 					<div id="conteudo_rodape">
 						<div id="esquerdo">
			        		_____________________<br>
			        		Assinatura Coordenador
		        		</div>
		        	<div id="centro">
			        		_____________________<br>
			        		Assinatura Administrativa
		        	</div>
		        	<div id="direita">
			        		_____________________<br>
			        		Assinatura Diretor
		        	</div>
 						
 					</div>
 					
 				</div>
 			</div>	
 	    </div>
