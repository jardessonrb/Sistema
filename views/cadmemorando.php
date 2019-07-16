<?php require_once "menu.php";?>
<?php 
require_once "../classes/conexao.class.php";

$c = new Conectar();
$conexao = $c->conexao();

$sql =  "SELECT id_local, nome_predio, setor_local FROM tab_local";

$nome = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>cadastro memorando</title>
</head>
<body>
<div class="container"> 
	<h1>Novo memorando</h1>
	<div class="row">
		<div class="col-sm-4">
			<form id="frmCadMemorando">
			<label>Nome Local</label>
			<select class="form-control input-sm" name="nome_local" id="nome_local">
						<option value="nulo" selected="">Selecione Local</option>
						<?php while ($mostra = mysqli_fetch_row($nome)):?>
							<option value="<?php echo $mostra[0] ?>"><?php echo $mostra[1]." - ".utf8_encode($mostra[2])?></option>
						<?php endwhile; ?>	
					</select>
			<label>Destino</label>
			<input type="text" class="form-control input-sm" id="nome_destino" name="nome_destino" placeholder="Ex: R.H">
			<label>Assunto</label>
			<input type="text" class="form-control input-sm" id="nome_assunto" name="nome_assunto" placeholder="Ex: Falta por motivos de saúde">
			<label>Justificativa</label>
			<textarea class="form-control input-sm" id="nome_justificativa" name="nome_justificativa" placeholder="Informo que ..."></textarea>
			<p></p><br>
			<span class="btn btn-primary" id="btnCadFuncionario">Cadastrar</span>
			</form>
		</div>
		<div class="col-sm-8">
			<div id="tabelaClientesLoad"></div>
		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
		$(document).ready(function(){

			$('#btnCadFuncionario').click(function(){

				vazios=verCampo();

				if(vazios > 0){
					alert("Preencha os campos!!");
					return false;
				}

				dados=$('#frmCadMemorando').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/clientes/cadastrocliente.php",
					success:function(r){

						if(r==1){
							$('#frmClientes')[0].reset();
							alertify.success("Cliente Adicionado");
						}else{
							alertify.error("Não foi possível adicionar");
						}
					}
				});
			});
		});
</script>
<script type="text/javascript">
	function verCampo(){
		var local = document.getElementById('nome_local').value;
		var destino = document.getElementById('nome_destino').value;
		var assunto = document.getElementById('nome_assunto').value;
		var corpo = document.getElementById('nome_justificativa').value;
		if (local == "nulo" || destino == "" || assunto == "" || corpo == "" ) {
			return 1;
		}else{
			return 0;
		}
	}
</script>