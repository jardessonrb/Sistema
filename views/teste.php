<!--<?php 

	$str = "' or 1=1 #";

	$arr1 = str_split($str);
	$arr2 = str_split($str, 3);

	
	for($i = 0; $i < count($arr1); $i++ ){

		if($arr1[$i] == "'" || $arr1[$i] == "@" || $arr1[$i] == "#" || $arr1[$i] == "!" || $arr1[$i] == "1"){
			print_r($arr1[$i]);
		}
		
	}
	

?>-->
<?php 
	session_start();
	if(isset($_SESSION['usuario'])){


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
	<?php require_once "menu.php" ?>
	<script type="text/javascript" src="../lib/tinymce/tinymce.min.js"></script>
	<script>
		 tinymce.init({

		   selector: '#document'  //Change this value according to your HTML
		   
		 }); 
     </script>

	<style type="text/css">
		#container{}
		#geral{}
		#position{

			position: relative;
			margin-left: 60px;
			margin-top: 40px;

		}

		textarea{

			height: 350px;

		}
	</style>
</head>
<body>
	<div id="container">
		<div id="geral">
			<div id="position">
				<div class="col-sm-8">

					<form>

				   		<textarea id="document" name="document" placeholder="Informo que ..."></textarea>
				   		
				   </form>

				</div>
				
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
