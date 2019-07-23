<?php require_once "menu.php" ?>
<?php 
require_once "../classes/conexao.class.php";

$c = new Conectar();
$conexao = $c->conexao();

$sql1 =  "SELECT id_local, nome_predio, setor_local FROM tab_local";

$nome_loc = mysqli_query($conexao, $sql1);

?>
<?php 
require_once "../classes/conexao.class.php";

$c = new Conectar();
$conexao = $c->conexao();

/*$sql =  "SELECT mem.id_memorando,loc.setor_local, usu.nome_usuario, mem.data_memorando, mem.assunto_memorando, mem.corpo_memorando  FROM tab_memorando mem JOIN tab_usuario usu JOIN tab_local loc on mem.id_usuario = usu.id_usuario where mem.id_memorando = 1 LIMIT 4";*/

$sql =  "SELECT mem.id_memorando,loc.setor_local, usu.nome_usuario, mem.data_memorando, mem.assunto_memorando, mem.assunto_memorando  FROM tab_memorando mem JOIN tab_usuario usu JOIN tab_local loc on mem.id_usuario = usu.id_usuario ORDER BY mem.data_memorando DESC LIMIT 4";

$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>listagem de memorando</title>
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
  <script src="../lib/jquery-3.2.1.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div id="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Numero</th>
      <th scope="col">Setor</th>
      <th scope="col">Usuario</th>
      <th scope="col">Data Memorando</th>
      <th scope="col">Asssunto</th>
      <th scope="col">Imprimir</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($mostra = mysqli_fetch_row($result)): ?>
    <tr id="corpo">
      <td><?php echo $mostra[0] ?></td>
      <td><?php echo utf8_encode($mostra[1]) ?></td>
      <td><?php echo utf8_encode($mostra[2]) ?></td>
      <td><?php echo $mostra[3] ?></td>
      <td><?php echo utf8_encode($mostra[4]) ?></td>
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
<div class="modal fade" id="abremodalMemorandoUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-xm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Atualizar Memorando</h4>
          </div>
          <div class="modal-body">
            <form id="frmClientesU">
              <input type="text" hidden="" id="idMemorandoU" name="idMemorandoU">
              <label>Nome Local</label>
              <select class="form-control input-sm" name="nome_localU" id="nome_localU">
                <option value="nulo" selected="">Selecione Local</option>
                <?php while ($mostra = mysqli_fetch_row($nome_loc)):?>
                  <option value="<?php echo $mostra[0] ?>"><?php echo $mostra[1]." - ".utf8_encode($mostra[2])?></option>
                <?php endwhile; ?>  
              </select>
              <label>Data</label>
              <input type="date" class="form-control input-sm" id="dataU" name="dataU">
              <label>Assunto</label>
              <input type="text" class="form-control input-sm" id="assuntoU" name="assuntoU">
              <label>Justificativa</label>
              <textarea class="form-control input-sm" id="justificativaU" name="justificativaU">
              </textarea>
            </form>
          </div>
          <div class="modal-footer">
            <button id="btnAdicionarClienteU" type="button" class="btn btn-primary" data-dismiss="modal">Atualizar</button>
          </div>
        </div>
      </div>
</div>
</body>
</html>
<script type="text/javascript">
    function getDadosMemorando(id_memorando){
      $.ajax({
        type:"POST",
        data:"id_memorando=" + id_memorando,
        url:"../controle/memorando/getmemorando.cont.php",
        success:function(r){
          
          dado=jQuery.parseJSON(r);

          $('#idMemorandoU').val(dado['idmemorando']);
          $('#nome_localU').val(dado['nome_local']);
          $('#dataU').val(dado['data']);
          $('#assuntoU').val(dado['assunto']);
          $('#justificativaU').val(dado['justificativa']);        
          
        }
      });
    }
    $(document).ready(function(){
      $('#btnAtualizarItemModal').click(function(){
        dados=$('#frmAtualizarItemCozinhaModal').serialize();

        $.ajax({
          type:"POST",
          data:dados,
          url:"../../procedimentos/itenscozinha/atualizarItemModal.php",
          success:function(r){

            if(r==1){
              alertify.success("Item Cozinha atualizado com sucesso!");
              window.location.reload();
            }else{
              alertify.error("Não foi possível atualizar Item Cozinha");
            }
          }
        });
      })
    })
</script>

