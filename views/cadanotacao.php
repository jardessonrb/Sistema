<?php 
	session_start();
	if(isset($_SESSION['usuario'])){

?>

<?php 

require_once "../classes/conexao.class.php";

$c = new Conectar();
$conexao = $c->conexao();

$sql = "SELECT id_funcionario, nome_funcionario FROM tab_funcionario";

$nome = mysqli_query($conexao, $sql);

?>

<?php require_once "menu.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Anotação</title>
	<style type="text/css">
		#container-list{
			float: right;
			width: 300px;
			margin-right: 100px;
			
		}
	</style>
</head>
<body>
	<div class="container">
	   <h1 class="titulo_cadastro">Cadastro de Anotação</h1>
		<div class="row">
			<div class="col-sm-4">
				<form id="frmCadAnotacao" action="" method="POST">
				<label>Nome Funcionário</label>
				<select class="form-control input-sm" name="nome_funcionario" id="nome_funcionario">
					<option value="nulo" selected="">Selecione Funcionário</option>
					<?php while ($mostra = mysqli_fetch_row($nome)):?>
						<option value="<?php echo $mostra[0] ?>"><?php echo utf8_encode($mostra[1]) ?></option>
					<?php endwhile; ?>	
				</select>
				<label>Anotação</label>
				<textarea class="form-control input-sm" style="height: 200px;" id="nome_anotacao" name="nome_anotacao" placeholder="Informo que ..."></textarea>
				<p></p>
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
		$(document).ready(function(){

			$('#btnCadastrar').click(function(){

				vazios=verCampo();

				if(vazios > 0){
					alert("Preencha os campos!!");
					return false;
				}

				dados=$('#frmCadAnotacao').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../controle/anotacao/cadanotacao.cont.php",
					success:function(r){

						if(r==1){
							$('#frmCadAnotacao')[0].reset();
							alert("Anotação Adicionada");
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
		var anotacao = document.getElementById('nome_anotacao').value
		if ( nome == "nulo" || anotacao == "") {
			return 1;
		}else{
			return 0;
		}
	}
</script>
<script type="text/javascript">

  function focus(){
    
    document.getElementById("nome_pesquisa").focus();

  }

</script>