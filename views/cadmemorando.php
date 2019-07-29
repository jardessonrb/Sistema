<?php 
	session_start();
	if(isset($_SESSION['usuario'])){

 ?>


<?php require_once "menu.php";?>
<?php 
require_once "../classes/conexao.class.php";

$c = new Conectar();
$conexao = $c->conexao();

$sql1 =  "SELECT id_local, nome_predio, setor_local FROM tab_local";

$nome_loc = mysqli_query($conexao, $sql1);

?>
<?php 

$sql2 =  "SELECT id_funcionario, nome_funcionario FROM tab_funcionario";

$nome_func = mysqli_query($conexao, $sql2);
?>


<!DOCTYPE html>
<html>
<head>
	<title>cadastro memorando</title>
	<script type="text/javascript" src="../lib/tinymce/tinymce.min.js"></script>
	<script>
		 tinymce.init({

		   selector: '#nome_justificativa'  //Change this value according to your HTML
		   
		 }); 
     </script>
</head>
<body>
<div class="container"> 
	<h1>Novo memorando</h1>
	<div class="row">
		<div class="col-sm-6">
			<form id="frmCadMemorando" action="../controle/memorando/cadmemorando.cont.php" method="POST">
			<label>Nome Local</label>
			<select class="form-control input-sm" name="nome_local" id="nome_local">
				<option value="nulo" selected="">Selecione Local</option>
				<?php while ($mostra = mysqli_fetch_row($nome_loc)):?>
					<option value="<?php echo $mostra[0] ?>"><?php echo $mostra[1]." - ".$mostra[2]?></option>
				<?php endwhile; ?>	
			</select>
			<label>Funcionario</label>
			<select class="form-control input-sm" name="nome_funcionario" id="nome_funcionario">
				<option value="nulo" selected="">Selecione o Funcionário</option>
				<?php while ($mostra = mysqli_fetch_row($nome_func)):?>
					<option value="<?php echo $mostra[0] ?>"><?php echo $mostra[1]?></option>
				<?php endwhile; ?>	
			</select>
			<label>Destino</label>
			<input type="text" class="form-control input-sm" id="nome_destino" name="nome_destino" placeholder="Ex: R.H">
			<label>Assunto</label>
			<input type="text" class="form-control input-sm" id="nome_assunto" name="nome_assunto" placeholder="Ex: Falta por motivos de saúde">
			<label>Justificativa</label>
			<textarea class="form-control input-sm" style="height: 500px;" id="nome_justificativa" name="nome_justificativa" placeholder="Informo que ..."></textarea>
			<p></p><br>
			<button type="submit" class="btn btn-primary" name="btnCad">Cadastrar</button>
			<!--<span class="btn btn-primary" id="btnCadFuncionario">Cadastrar</span>-->
			</form>
		</div>
		<div class="col-sm-8">
			<div id="tabelaClientesLoad"></div>
		</div>
	</div>
</div>
</body>
</html>

<?php 

} else{
	
	header("location:../index.php");
}

?>
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
					url:"../controle/memorando/cadmemorando.cont.php",
					success:function(r){

						alert(r);
						if(r==1){
							$('#frmCadMemorando')[0].reset();
							alert("Memorando Adicionado");
						}else{
							alert("Não foi possível adicionar");
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
		var funcionario = document.getElementById('nome_funcionario').value;
		if (local == "nulo" || funcionario == "nulo" || destino == "" || assunto == "" corpo == "") {
			return 1;
		}else{
			return 0;
		}
	}
</script>