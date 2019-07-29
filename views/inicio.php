<?php 
	session_start();
	if(isset($_SESSION['usuario'])){


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Início</title>
	<?php require_once "menu.php" ?>
	<link rel="stylesheet" type="text/css" href="../meucss/positionrodape.css">
</head>
<body>
</body>
</html>

<?php 

} else{
	header("location:../index.php");
}

?>
