<?php 
  session_start();
  if(isset($_SESSION['usuario'])){

  require_once "menu.php";
  require_once "../../classes/conexao.class.php";
  require_once "../../classes/usuario.class.php";
  $nome = $_POST['nome_pesquisa'];

  $obj_usuario = new Usuario();

  $result = $obj_usuario->list_usuario($nome);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id="container">
  <div id="voltar">
   <span class="btn btn-primary" id="btnNovaPesquisa"><span class="glyphicon glyphicon-arrow-left">&nbsp;Nova Pesquisa</span></span>
  </div><br>
<table class="table">
  <thead class="thead-dark">
    <?php if(mysqli_num_rows($result) > 0){ ?>
    <tr>
      <th scope="col">Nome Funcionário</th>
      <th scope="col">Captura</th>
      <th scope="col">Nome Usuario</th>
      <th scope="col">Senha Usuario</th>
      <th scope="col">Nível de Acesso</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($mostra = mysqli_fetch_row($result)): ?>
    <tr id="corpo">
      <td><?php echo utf8_encode($mostra[1]) ?></td>
      <td><?php echo $mostra[2] ?></td>
      <td><?php echo $mostra[3] ?></td>
      <td>######</td>
      <?php if( $mostra[5] == 3): ?>
      <td>Alto</td>
      <?php endif ?>
      <?php if( $mostra[5] == 2): ?>
      	<td>Medio</td>
      <?php endif ?>
      <?php if( $mostra[5] == 1): ?>
      	<td>Baixo</td>
      <?php endif ?>
    <?php if( $_SESSION['nivel'] == 3): ?>
  	  <td>
  		<span  data-toggle="modal" data-target="#abremodalUsuarioUpdate" class="btn btn-primary btn-xs" onclick="getDadosUsuario('<?php echo $mostra[0] ?>')">
  			<span class="glyphicon glyphicon-pencil"></span>
  		</span>
      </td>
    <?php endif ?>
    <?php if($_SESSION['nivel'] < 3): ?>
       <td>
      <span  data-toggle="modal" class="btn btn-primary btn-xs" onclick="mensagem('<?php echo $mostra[1] ?>')">
        <span class="glyphicon glyphicon-pencil"></span>
      </span>
      </td>
    <?php endif ?>
	</tr>
</tbody>
<?php endwhile; ?>
<?php }else{ ?>
  <div id="result_zero">
    <span id="mensagem">Nenhum registro encontrado com esse valor. Pesquise novamente.</span>
  </div>
<?php } ?>
</table>
</div>
<div class="modal fade" id="abremodalUsuarioUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Atualizar Usuário</h4>
          </div>
          <div class="modal-body">
            <form id="frmUsuarioU">
              <input type="text" hidden="" id="id_usuario" name="id_usuario">
              <label>Nome Usuario</label>
              <input type="text" class="form-control input-sm" id="nome_usuario" name="nome_usuario">
              <label>Nova Senha</label>
              <input type="password" class="form-control input-sm" id="senhaU" name="senhaU">
              <label>Confirmar Senha</label>
              <input type="password" maxlength="10" class="form-control input-sm" id="senhaU2" name="senhaU2">
              <label>Nivel de Acesso</label>
              <select class="form-control input-sm" name="nivel_acesso" id="nivel_acesso">
                  <option value="nulo" selected="">Selecione Nivel</option>
                  <option value="1">Baixo</option>
                  <option value="2">Medio</option>
                  <option value="3">Alto</option>
              </select>
            </form>
          </div>
          <div class="modal-footer">
            <button id="btnAtualizarUsuarioU" type="button" class="btn btn-primary" data-dismiss="modal">Atualizar</button>
          </div>
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
    function getDadosUsuario(id_usuario){

      $.ajax({
        type:"POST",
        data:"id_usuario=" + id_usuario,
        url:"../../controle/usuario/getusuario.cont.php",
        success:function(r){
        
          dado=jQuery.parseJSON(r);

          $('#id_usuario').val(dado['id_usuario']);
          $('#nome_usuario').val(dado['nome_usuario']);
          $('#senhaU').val(dado['senha_usuario']);
          $('#nivel_acesso').val(dado['nivel_acesso']);
          document.getElementById("nome_usuario").disabled = true;
          
          
        }
      });
    }
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#btnAtualizarUsuarioU').click(function(){

        if(verifica() == true){

        dados=$('#frmUsuarioU').serialize();

        alert(dados);
        
        $.ajax({
          type:"POST",
          data:dados,
          url:"../../controle/usuario/updusuario.cont.php",
          success:function(r){

            if(r==1){
              alert("Atualizado com sucesso!");
              window.location.reload();
            }else{
              alert("Não foi possível Atualizar");
            }
          }
        });
      }else{

        alert("Senha de confirmação não correspondente.");
      }
    })
 })
</script>
<script type="text/javascript">
  function verifica(){
    var senha1 = document.getElementById("senhaU").value;
    var senha2 = document.getElementById("senhaU2").value;

    if(senha1 != ""){

      if(senha1 == senha2){

          return true;

      }else{

          return false;

      }

    }else{

      return false;
    }
  }
</script>

<script type="text/javascript">
  $(document).ready(function(){

      $('#btnNovaPesquisa').click(function(){
        window.location = "../listusuario.php";
      });
  });
</script>