<?php 
	session_start();
	if(isset($_SESSION['usuario'])){

 ?>

<?php require_once "menu.php";?>
<?php 
require_once "../classes/conexao.class.php";

$c = new Conectar();
$conexao = $c->conexao();

$sql = "SELECT id_funcionario, nome_funcionario FROM tab_funcionario";

$nome = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuario</title>
</head>
<body>
<div class="container"> 
			<h1>Cadastro de Usuario</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCadUsuario">
					<label>Nome Funcionário</label>
					<select class="form-control input-sm" name="nome_funcionario" id="nome_funcionario">
						<option value="nulo" selected="">Selecione Funcionário</option>
						<?php while ($mostra = mysqli_fetch_row($nome)):?>
							<option value="<?php echo $mostra[0] ?>"><?php echo $mostra[1] ?></option>
						<?php endwhile; ?>	
					</select>
					<label>Nome Usuario</label>
					<input type="text" class="form-control input-sm" id="nome_usuario" maxlength="20" name="nome_usuario">
					<label>Senha Usuario</label>
					<input type="password" class="form-control input-sm" maxlength="10" id="senha_usuario" name="senha_usuario" >
					<h6 style="opacity: 0.5">Limite 10 caracteres.</h6>
					<label>Nivel de Acesso</label>
					<select class="form-control input-sm" name="nivel_acesso" id="nivel_acesso">
						<option value="nulo" selected="">Selecione Nivel</option>
							<option value="1">Baixo</option>
							<option value="2">Medio</option>
							<option value="3">Alto</option>
					</select>
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

				dados=$('#frmCadUsuario').serialize();
				
				$.ajax({
					type:"POST",
					data:dados,
					url:"../controle/usuario/cadusuario.cont.php",
					success:function(r){
						
						if(r==1){
							$('#frmCadUsuario')[0].reset();
							alert("Usuario Adicionado");
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
		var funcionario = document.getElementById('nome_funcionario').value;
		var nome = document.getElementById('nome_usuario').value;
		var senha = document.getElementById('senha_usuario').value;
		var nivel = document.getElementById('nivel_acesso').value;
		if (funcionario == "nulo" || nome == "" || senha == "" || nivel == "nulo" ) {
			return 1;
		}else{
			return 0;
		}
	}
</script>