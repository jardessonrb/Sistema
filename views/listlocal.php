<?php 
  session_start();
  if(isset($_SESSION['usuario'])){

 ?>

<?php require_once "menu.php" ?>
<?php 
require_once "../classes/conexao.class.php";

$c = new Conectar();
$conexao = $c->conexao();

$sql = "SELECT id_local, nome_predio, setor_local FROM tab_local";

$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>listagem de locais</title>
  <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/listagem.min.css">
  <link rel="stylesheet" type="text/css" href="../css/pesquisa.min.css">
  
  <script type="text/javascript">
    window.onload = function(){

          focus();

    }
  </script>
</head>
<body>
<div id="container">
  <div id="pesquisa">
    <form id="frmBuscar" action="list/listlocal.php" method="POST">
      <input type="text" class="form-control input-sm" id="nome_pesquisa" name="nome_pesquisa" placeholder="Digite o nome ..." required="">
      <button type="submit" class="btn btn-primary" id="btnPesquisa"><span class="glyphicon glyphicon-search">&nbsp;Buscar
      </span></button>
    </form>
  </div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome Prédio</th>
      <th scope="col">Setor</th>
      <th scope="col" id="editar">Editar</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($mostra = mysqli_fetch_row($result)): ?>
    <tr id="corpo">
      <td><?php echo $mostra[1] ?></td>
      <td><?php echo $mostra[2] ?></td>
	  <td>
		<span  data-toggle="modal" data-target="#abremodalAtualizarLocal" class="btn btn-primary btn-xs" onclick="getDadosMemorando('<?php echo $mostra[0] ?>')">
			<span class="glyphicon glyphicon-pencil"></span>
		</span>
      </td>
	</tr>
</tbody>
<?php endwhile; ?>
</table>
</div>
<div class="modal fade" id="abremodalAtualizarLocal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Atualizar Local</h4>
          </div>
          <div class="modal-body">
            <form id="frmAtualizarLocal">
              <input type="text" hidden="" id="idlocalU" name="idlocalU">
              <label>Nome Predio</label>
              <select class="form-control input-sm" name="nome_predioU" id="nome_predioU">
                <option value="nulo" selected="">Selecione Prédio</option>
                <option value="Principal">Prédio Principal</option>
                <option value="Anexo">Prédio Anexo</option>
                <option value="Luma">Prédio Luma</option>
              </select>
              <label>Setor Local</label>
               <input type="text" class="form-control input-sm" id="setor_localU" name="setor_localU">
            </form>
          </div>
          <div class="modal-footer">
            <button id="btnAtualizarLocalU" type="button" class="btn btn-primary" onclick="teste()" data-dismiss="modal">Atualizar</button>
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
    function getDadosMemorando(id_local){
      document.getElementById("nome_predioU").disabled = true;

      $.ajax({
        type:"POST",
        data:"id_local=" + id_local,
        url:"../controle/local/getlocal.cont.php",
        success:function(r){
          
          dado=jQuery.parseJSON(r);

          $('#idlocalU').val(dado['get_id_local']);
          $('#nome_predioU').val(dado['get_nome_predio']);
          $('#setor_localU').val(dado['get_setor_local']);
          
        }
      });
    }
    $(document).ready(function(){
      $('#btnAtualizarLocalU').click(function(){

        dados=$('#frmAtualizarLocal').serialize();

        $.ajax({
          type:"POST",
          data:dados,
          url:"../controle/local/updlocal.cont.php",
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
<script type="text/javascript">

  function focus(){
    
    document.getElementById("nome_pesquisa").focus();

  }

</script>