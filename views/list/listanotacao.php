<?php 
  session_start();
  if(isset($_SESSION['usuario'])){

 ?>

<?php require_once "menu.php" ?>

<?php 
require_once "../../classes/conexao.class.php";
require_once "../../classes/anotacao.class.php";

$pri_data = $_POST['pri_data'];
$seg_data = $_POST['seg_data'];
$id_func  = $_POST['id_funcionario'];

$obj = new Anotacao();

$result = $obj->listaAnotacao($pri_data, $seg_data, $id_func);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista de Funcionários</title>
	<link rel="stylesheet" type="text/css" href="../../css/listagem.min.css">
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../css/pesquisa.min.css">
  <script src="../../lib/jquery-3.2.1.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.js"></script>
  <script src="../../js/jquery.mask.min.js"></script>
  <style type="text/css">
    #container #sep{
      position: relative;
      margin-left: 0;
      width: 30%;
     border-color: #7bac3b; 
    }
    #hr-top{
      margin-left: 0;
      width: 40%;
      border-color: #7bac3b
    }
    #sep{
      margin-top: -5px;
    }
    .subnome{
      font-size: 14px;
      font-family: Arial;
      font-weight: bold;
    }
    #conteudo, h3{
      position: relative;
      margin-left: 5px;

     
    }
    #btnImprimir{
      height: 33px;
     
      margin-left: 0;
      margin-bottom: 15px;
    }
    #btnVoltar01{
      position: relative;
      margin-top: -15px;
      height: 33px;
    }
    #img-icon{
      max-width: 20px;
      height: 20px;
    }
    #btnExcluir{
      position: relative;
      margin-left: 5px;
    }
    #limit{
      position: relative;
      max-width: 550px;
    }
  </style>
</head>
<body>

<div id="container">
  <div id="conteudo">
        <?php if(mysqli_num_rows($result) > 0){ ?>   
          <h3>Anotações do Funcionário</h3>
          <hr id="hr-top">
          <?php while ($mostra = mysqli_fetch_row($result)): ?>
          <span class="subnome">N° : </span><span class="dados"><?php echo $mostra[0] ?></span>
          <span class="subnome">Data de Anotação:&nbsp;</span><span class="dados"><?php echo $mostra[1] ?></span>
          <span class="subnome">Anotado por :&nbsp;</span><span class="dados"><?php echo utf8_encode($mostra[7]) ?></span>
          <p><span class="subnome">Funcionário :&nbsp;</span><span class="dados"><?php echo utf8_encode($mostra[3]) ?></span>
          <span class="subnome">Tel :&nbsp;</span><span class="dados"><?php echo $mostra[4] ?></span>
          <span class="subnome">Cargo :&nbsp;</span><span class="dados"><?php echo utf8_encode($mostra[5]) ?></span></p>
          <div id="limit">
          <p><span class="subnome">Anotação :&nbsp;</span><span class="dados"><?php echo utf8_encode($mostra[2]) ?></span></p>
          <div id="delete-anotacao">
          </div>
            <span class="subnome" id="label-excluir">Excluir anotação:</span>
            <span class="btn btn" id="btnExcluir" onclick="excluir_anotacao(<?php echo $mostra[0] ?>)"><span class="icons"><img id="img-icon" src="../../img/icon-excluir.ico"></span></span>
          </div>
          <hr id="sep">
          <?php endwhile; ?>
          <div id="voltar">
          <a href="../../controle/print/anotacao.print.php?id_anotacao=<?php echo $id_func?>&p_d=<?php echo $pri_data?>&s_d=<?php echo $seg_data?>" class="btn btn-primary btn-xs" id="btnImprimir"><span>
            <span class="glyphicon glyphicon-print">&nbsp;Imprimir Anotação</span>
          </span></a>
              <span class="btn btn-primary" id="btnVoltar01" onclick="voltar()"><span class="glyphicon glyphicon-arrow-left">&nbsp;Nova Pesquisa</span></span>
          </div><br>
        <?php }else{ ?>
            <div id="result_zero">
              <span id="mensagem">Nenhum registro encontrado com esse valor. Pesquise novamente.</span>
            </div>
            <div id="voltar">
                <span class="btn btn-primary" id="btnVoltar02" onclick="voltar()"><span class="glyphicon glyphicon-arrow-left">&nbsp;Nova Pesquisa</span></span>
            </div><br>
        <?php } ?>
        </div>
  </div>
</div>
</body>
</html>
<?php 

} else{
  
  header("location:../../index.php");
}

?>
<script type="text/javascript">
  function voltar(){

    $(document).ready(function(){

       window.location = "../listanotacao.php";

    });
  }

  function excluir_anotacao(id_anotacao){

    var confirme = confirm("Deseja excluir a anotação "+id_anotacao+" ?");

    if(confirme == true){

    $.ajax({
          type:"POST",
          data:"id_anotacao=" + id_anotacao,
          url:"../../controle/anotacao/delanotacao.cont.php",
          success:function(r){
        
            if(r==1){

              var atualiza = confirm("Excluido com sucesso. Deseja Atualizar a página ?");

              if (atualiza == true) {

                 window.location.reload();
              }

            }else{

              alert("Não foi possível Excluir");
            }
          }
    });

  }else{

    alert("Operação Cancelada!");
  }

  }
</script>
