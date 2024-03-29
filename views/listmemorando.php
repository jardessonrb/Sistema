<?php 
  session_start();
  if(isset($_SESSION['usuario'])){

  require_once "menu.php";
  require_once "../classes/conexao.class.php";
  require_once "../classes/memorando.class.php";
  require_once "../classes/local.class.php";

  $obj_local = new Local();
  $obj_memorando = new Memorando();


  $nome_loc = $obj_local->listaLocal();

  $result = $obj_memorando->listaMemorando();

?>

<!DOCTYPE html>
<html>
<head>
	<title>listagem de memorando</title>
  <link rel="stylesheet" type="text/css" href="../css/listagem.min.css">
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/pesquisa.min.css">
  <script src="../lib/jquery-3.2.1.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="../lib/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
    window.onload = function(){

          focus();

    }
  </script>
  <style type="text/css">
    h2{
      position: relative;
      margin-left: 2%;
    }
  </style>
</head>
<body>
<div id="container">
  <h2>Buscar Memorando</h2>
  <div id="pesquisa">
    <form id="frmBuscar" action="list/listmemorando.php" method="POST">
      <input type="text" class="form-control input-sm" id="nome_pesquisa" name="nome_pesquisa" placeholder="Digite o nome do funcionário" required="">
      <button type="submit" class="btn btn-primary" id="btnPesquisa"><span class="glyphicon glyphicon-search">&nbsp;Buscar</span></button>
    </form>
  </div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">N°</th>
      <th scope="col">Setor</th>
      <th scope="col">Criado por:</th>
      <th scope="col">Data</th>
      <th scope="col">Referente:</th>
      <th scope="col">Assunto</th>
      <th scope="col">Imprimir</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($mostra = mysqli_fetch_row($result)): ?>
    <tr id="corpo">
      <td><?php echo $mostra[0] ?></td>
      <td><?php echo $mostra[2]." - ".$mostra[1] ?></td>
      <td><?php echo $mostra[3]?></td>
      <td><?php echo $mostra[4] ?></td>
      <td><?php echo utf8_encode($mostra[5]) ?></td>
      <td><?php echo $mostra[6] ?></td>
      <td>
        <a href="../controle/print/memorando.print.php?id_mem=<?php echo $mostra[0]?>" class="btn btn-primary btn-xs"><span>
          <span class="glyphicon glyphicon-print"></span>
        </span></a>
      </td>
      <td>
      
    <span  data-toggle="modal" data-target="#abremodalMemorandoUpdate" class="btn btn-primary btn-xs" onclick="getDadosMemorando('<?php echo $mostra[0] ?>')">
      <span class="glyphicon glyphicon-pencil"></span>
    </span>
    </td>
	</tr>
</tbody>
<?php endwhile; ?>
</table>

</div>
<div class="modal fade" id="abremodalMemorandoUpdate" data-target="#mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-xm-8" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" id="fecharModal" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Atualizar Memorando</h4>
          </div>
          <div class="modal-body">
            <form id="frmMemorandoU" action="../controle/memorando/updatememorando.cont.php" method="POST">
              <input type="text" hidden="" id="idMemorandoU" name="idMemorandoU">
              <label>Nome Local</label>
              <select class="form-control input-sm" name="nome_localU" id="nome_localU">
                <option value="nulo" selected="">Selecione Local</option>
                <?php while ($mostra = mysqli_fetch_row($nome_loc)):?>
                  <option value="<?php echo $mostra[0] ?>"><?php echo $mostra[1]." - ".$mostra[2]?></option>
                <?php endwhile; ?>  
              </select>
              <label>Data</label>
              <input type="date" class="form-control input-sm" id="dataU" name="dataU">
              <label>Assunto</label>
              <input type="text" class="form-control input-sm" id="assuntoU" name="assuntoU">
              <label>Justificativa</label>
              <textarea style="height: 500px; max-height: 500px;" class="form-control input-sm" id="justificativaU" name="justificativaU">
              </textarea>
              <button type="submit" style="margin-top: 10%;" class="btn btn-primary"  name="btnCad">Atualizar</button>
            </form>
          </div>
          <div class="modal-footer">
            
        <!--<button id="btnAtualizarMemorandoU" type="button" class="btn btn-primary" data-dismiss="modal">Atualizar</button>-->
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
<script type="text/javascript">
    function getDadosMemorando(id_memorando){
      $.ajax({
        type:"POST",
        data:"id_memorando=" + id_memorando,
        url:"../controle/memorando/getmemorando.cont.php",
        success:function(r){
          
          dado=jQuery.parseJSON(r);

          var conf = confirm("Atualizar Memorando ?");

          if(conf == true){

            $('#idMemorandoU').val(dado['idmemorando']);
            $('#dataU').val(dado['data']);
            $('#assuntoU').val(dado['assunto']);
            $('#justificativaU').val(dado['justificativa']); 
            document.getElementById("dataU").disabled = true;
            ativaTinymce();    

          }else{
            window.location.reload();
          }
        }
      });
    }
    $(document).ready(function(){
      $('#btnAtualizarMemorandoU').click(function(){

        var local = document.getElementById("nome_localU").value;
        dados=$('#frmMemorandoU').serialize();

        $.ajax({
          type:"POST",
          data:dados,
          url:"../controle/memorando/updmemorando.cont.php",
          success:function(r){

            if(r==1){
              alert("Atualizado com sucesso!");
              window.location.reload();
            }else{
              alert("Não foi possível atualizar");
            }
          }
        });
      })
    })
</script>
<script>
  function ativaTinymce(){

     tinymce.init({

       selector: '#justificativaU'  //Change this value according to your HTML
       
     }); 

  }
</script>
<script type="text/javascript">

  function focus(){
    
    document.getElementById("nome_pesquisa").focus();

  }

</script>

<script type="text/javascript">
 $(document).ready(function(){
      $('#fecharModal').click(function(){
        
        window.location.reload();

      })
    })
</script>
