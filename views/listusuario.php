<?php 
  session_start();
  if(isset($_SESSION['usuario'])){

 ?>

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
	
</div>
</body>
</html>
<?php 

} else{
	
	header("location:../index.php");
}

 ?>