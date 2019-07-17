<?php require_once "menu.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="../lib/jquery-3.2.1.min.js"></script>
	<script src="../js/funcoes.js"></script>
	<script src="../js/jquery.mask.min.js"></script>
</head>
<body>
<div id="testediv">
	<form id="teste" method="POST">
		<label>Nome Funcionário</label>
			<input type="text" size="40"  id="id_fun" name="id_fun">
		<span class="btn btn-primary" id="btnteste">Cadastrar</span>
	</form>
</div>
<?php require_once "teste.php" ?>
</body>
</html>
<script type="text/javascript">
		$(document).ready(function(){

			$('#btnteste').click(function(){

				dados=$('#teste').serialize();
				alert(dados);

				$.ajax({
					type:"POST",
					data:dados,
					url:"teste.php",
					success:function(r){

						alert(r);
						if(r==1){
							$('#teste')[0].reset();
							alert("Funcionário Adicionado");
						}else{
							alert("Não foi possível adicionar");
						}
					}
				});
			});
		});
	</script>