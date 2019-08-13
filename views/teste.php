<?php 

	$str = "' or 1=1 #";

	$arr1 = str_split($str);
	$arr2 = str_split($str, 3);

	
	for($i = 0; $i < count($arr1); $i++ ){

		if($arr1[$i] == "'" || $arr1[$i] == "@" || $arr1[$i] == "#" || $arr1[$i] == "!" || $arr1[$i] == "1"){
			print_r($arr1[$i]);
		}
		
	}
	

?>
<script type="text/javascript">
		$(document).ready(function(){

			$('#btnCadFuncionario').click(function(){
				var teste = document.getElementById('nome_funcionario').value;

				for(var i = 0; teste.length; i++){


				}

				alert(teste.length);


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