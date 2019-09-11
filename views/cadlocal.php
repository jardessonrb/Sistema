<?php 
	session_start();
	if(isset($_SESSION['usuario'])){

 ?>



<?php require_once "menu.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Local</title>
</head>
<body>
<div class="container"> 
	<h1 class="titulo_cadastro">Cadastro de Local</h1>
	<div class="row">
		<div class="col-sm-4">
			<form id="frmCadLocal">
			<label>Nome Predio</label>
			<select class="form-control input-sm" name="nome_predio" id="nome_predio">
				<option value="nulo" selected="">Selecione Prédio</option>
				<option value="Principal">Prédio Principal</option>
				<option value="Anexo">Prédio Anexo</option>
				<option value="Luma">Prédio Luma</option>
			</select>
			<label>Setor Local</label>
			<input type="text" class="form-control input-sm" id="nome_setor" name="nome_setor" placeholder="Ex: Recepção 1° andar">
			<p></p><br>
			<span class="btn btn-primary" id="btnCadastrar"><span class="glyphicon glyphicon-plus"> Cadastrar</span></span>
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
	function verCampo(){
		var predio = document.getElementById('nome_predio').value;
		var setor = document.getElementById('nome_setor').value;
		if (predio == "nulo" || setor == "") {
			return 1;
		}else{
			return 0;
		}
	}
</script>
<script type="text/javascript">
		$(document).ready(function(){

			$('#btnCadastrar').click(function(){

				vazios=verCampo();

				if(vazios > 0){
					alert("Preencha os campos!!");
					return false;
				}

				dados=$('#frmCadLocal').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../controle/local/cadlocal.cont.php",
					success:function(r){
						
						if(r==1){
							$('#frmCadLocal')[0].reset();
							alert("Local Adicionado");
						}else{
							alert("Não foi possível adicionar");
						}
					}
				});
			});
		});
</script>


