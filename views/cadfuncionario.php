<?php 
	session_start();
	if(isset($_SESSION['usuario'])){

 ?>


<?php require_once "menu.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro Funcionario</title>
	<script src="../lib/jquery-3.2.1.min.js"></script>
	<script src="../js/funcoes.js"></script>
	<script src="../js/jquery.mask.min.js"></script>
</head>
<body>
	<div class="container">
			<h1>Cadastro do Funcionario</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCadFuncionario">
					<label>Nome Funcionário</label>
					<input type="text" class="form-control input-sm" id="nome_funcionario" name="nome_funcionario">
					<label>CPF Funcionário</label>
					<input type="text" class="form-control input-sm" id="cpf_funcionario" name="cpf_funcionario" placeholder="xxx.xxx.xxx - xx">
					<label>Tel 01</label>
					<input type="text" class="form-control input-sm" id="telefone1_funcionario" name="telefone1_funcionario" placeholder="(xx) xxxxx-xxxx">
					<label>Tel 02</label>
					<input type="text" class="form-control input-sm" id="telefone2_funcionario" name="telefone2_funcionario" placeholder="(xx) xxxxx-xxxx">
					<label>Cargo</label>
					<input type="text" class="form-control input-sm" id="cargo_funcionario" name="cargo_funcionario">
					<p></p>
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
<?php 

} else{
	
	header("location:../index.php");
}

 ?>
<script type="text/javascript">
	$("#cpf_funcionario").mask("000.000.000-00")
	$("#telefone1_funcionario").mask("(00) 00000-0000")
	$("#telefone2_funcionario").mask("(00) 00000-0000")
</script>
<script type="text/javascript">
		$(document).ready(function(){

			$('#btnCadFuncionario').click(function(){

				vazios=verCampo();

				if(vazios > 0){
					alert("Preencha os campos!!");
					return false;
				}

				dados=$('#frmCadFuncionario').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../controle/funcionario/cadfuncionario.cont.php",
					success:function(r){

						if(r==1){
							$('#frmCadFuncionario')[0].reset();
							alert("Funcionário Adicionado");
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
		var nome = document.getElementById('nome_funcionario').value;
		var cargo = document.getElementById('cargo_funcionario').value
		if ( nome == "" || cargo == "") {
			return 1;
		}else{
			return 0;
		}
	}
</script>