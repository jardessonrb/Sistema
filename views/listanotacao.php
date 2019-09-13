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

<?php require_once "menu.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="../css/ajustes.css">
  <script type="text/javascript">
    window.onload = function(){

          focus();

    }
  </script>
  <style type="text/css">

    #pri_data, #seg_data{
      width: 200px;
      min-width: 180px;
      margin-top: 5px;
      margin-left: 2%; 
    }
    #id_funcionario{
      width: 200px;
      min-width: 180px;
      margin-top: 5px;
      margin-left: 2%;
    }
    .label-input{
      margin-left: 25px;
    }
    #btnPesquisa{

      position: relative;
      margin-left: 25px;
      margin-top: 25px;
      width: 100px;
    }
    #label1, #label2{
      float: left;
      margin-left: 6px;
    }
    #label3{
      position: relative;
      margin-left: 6px;
    }
    
    #pri_data, #seg_data{
      position: relative;
      margin-left: 38px;
    }
    #seg_data{
      margin-top: -3px;
      margin-left: 10px;
    }

    #id_funcionario{
      margin-left: 38px;
    }
    #btnPesquisa{
      position: relative;
      margin-left: 38px;
    }

    h2{
      position: relative;
      margin-left: 2%;
    }


  </style>
</head>
<body>
	<div id="pesquisa">
    <h2>Buscar Anotação</h2><br>
    <form id="frmBuscar" action="list/listanotacao.php" method="POST">
      <label class="label-input" id="label1">DE:</label>
      <input type="date" class="form-control input-sm" id="pri_data" name="pri_data" required=""><br><br>
      <label class="label-input" id="label2">ATÉ:</label>
      <input type="date" class="form-control input-sm" id="seg_data" name="seg_data" required=""><br><br>
      <label class="label-input" id="label3">SELECIONE FUNCIONÁRIO:</label>
      <select class="form-control input-sm" name="id_funcionario" id="id_funcionario" required="">
          <option value="nulo" selected="">Selecione Funcionário</option>
          <?php while ($mostra = mysqli_fetch_row($nome)):?>
            <option value="<?php echo $mostra[0] ?>"><?php echo utf8_encode($mostra[1]) ?></option>
          <?php endwhile; ?>  
      </select><br><br>
      <div id="buttom">
          
      <button type="submit" class="btn btn-primary" id="btnPesquisa">
        <span class="glyphicon glyphicon-search">&nbsp;Buscar</span>
      </button>
        
      </div>
    </form>
  </div>

</body>
</html>
<?php 

} else{
  
  header("location:../index.php");
}

?>
<script type="text/javascript">

  function focus(){
    
    document.getElementById("pri_data").focus();

  }

</script>