<?php 
  session_start();
  if(isset($_SESSION['usuario'])){

    require_once "menu.php";
    require_once "../classes/conexao.class.php";
    require_once "../classes/funcionario.class.php";

    $obj_funcionario = new Funcionario();

    $result = $obj_funcionario->listaFuncionario();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Funcionários</title>
	<link rel="stylesheet" type="text/css" href="../css/listagem.min.css">
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/ajustes.css">
  <script src="../lib/jquery-3.2.1.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.js"></script>
  <script src="../js/jquery.mask.min.js"></script>
  <script type="text/javascript">
    window.onload = function(){

          focus();

    }
  </script>

  <style type="text/css">
    h2{
      position: relative;
      margin-left: 25px;
    }
  </style>
</head>
<body>
<div id="container">
  <h2>Buscar Funcinário</h2>
  <div id="pesquisa">
    <form id="frmBuscar" action="list/listfuncionario.php" method="POST">
      <input type="text" class="form-control input-sm" id="nome_pesquisa" name="nome_pesquisa" placeholder="Digite o nome ...">
      <button type="submit" class="btn btn-primary" id="btnPesquisa"><span class="glyphicon glyphicon-search">&nbsp;Buscar
      </span></button>
    </form>
  </div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Tel 01</th>
      <th scope="col">Tel 02</th>
      <th scope="col">Cargo</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
  	<?php while ($mostra = mysqli_fetch_row($result)): ?>
    <tr id="corpo">
      <td><?php echo utf8_encode($mostra[1]) ?></td>
      <td><?php echo $mostra[2] ?></td>
      <td><?php echo $mostra[3] ?></td>
      <td><?php echo utf8_encode($mostra[4]) ?></td>
    <?php if( $_SESSION['nivel'] == 3): ?>
  	  <td>
  		<span  data-toggle="modal" data-target="#abremodalFuncionarioUpdate" class="btn btn-primary btn-xs" onclick="getDadosFuncionario('<?php echo $mostra[0] ?>')">
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
</table>
</div>
<div class="modal fade" id="abremodalFuncionarioUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Atualizar Funcionário</h4>
          </div>
          <div class="modal-body">
            <form id="frmFuncionarioU">
              <input type="text" hidden="" id="idfuncionarioU" name="idfuncionarioU">
              <label>Nome</label>
              <input type="text" class="form-control input-sm" id="nomeU" name="nomeU">
              <label>Tel 01</label>
              <input type="text" class="form-control input-sm" id="tel01U" name="tel01U">
              <label>Tel 02</label>
              <input type="text" class="form-control input-sm" id="tel02U" name="tel02U">
              <label>Cargo</label>
              <input type="text" class="form-control input-sm" id="cargoU" name="cargoU">
              <label>CPF</label>
              <input type="text" class="form-control input-sm" id="cpfU" name="cpfU">
            </form>
          </div>
          <div class="modal-footer">
            <button id="btnAtualizarFuncionarioU" type="button" class="btn btn-primary" onclick="teste()" data-dismiss="modal">Atualizar</button>
          </div>
        </div>
      </div>
    </div>

<!--####################          Testando Modal de Vereficação          #############################-->

<div class="modal fade" id="abremodalConfimar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Confirme suas Credenciais</h4>
          </div>
          <div class="modal-body">
            <form id="frmConfimar">
              <input type="text" hidden="" id="idfuncionarioU" name="idfuncionarioU">
              <label>Usuario</label>
              <input type="text" class="form-control input-sm" id="UsuarioConfirme" name="UsuarioConfirme">
              <label>Senha</label>
               <input type="password" class="form-control input-sm" id="SenhaConfirme" name="SenhaConfirme">
            </form>
          </div>
          <div class="modal-footer">
            <button id="btnAdicionarClienteU" type="button" class="btn btn-primary" onclick="teste()" data-dismiss="modal">Confirmar</button>
          </div>
        </div>
      </div>
    </div>
<!--#######################################################-->

</body>
</html>

<?php 

} else{
  
  header("location:../index.php");
}

?>
<script type="text/javascript">
  $("#cpfU").mask("000.000.000-00")
  $("#tel01U").mask("(00) 00000-0000")
  $("#tel02U").mask("(00) 00000-0000")
  
</script>
<script type="text/javascript">
    function getDadosFuncionario(id_funcionario){

      $.ajax({
        type:"POST",
        data:"id_funcionario=" + id_funcionario,
        url:"../controle/funcionario/getfuncionario.cont.php",
        success:function(r){
         
          dado=jQuery.parseJSON(r);

          $('#idfuncionarioU').val(dado['idfuncionario']);
          $('#nomeU').val(dado['nome']);
          $('#tel01U').val(dado['tel01']);
          $('#tel02U').val(dado['tel02']);
          $('#cargoU').val(dado['cargo']);        
          $('#cpfU').val(dado['cpf']);
          
        }
      });
    }
    $(document).ready(function(){
      $('#btnAtualizarFuncionarioU').click(function(){
        dados=$('#frmFuncionarioU').serialize();

        $.ajax({
          type:"POST",
          data:dados,
          url:"../controle/funcionario/updfuncionario.cont.php",
          success:function(r){

            if(r==1){
              alert("Atualizado com sucesso!");
              window.location.reload();
            }else{
              alert("Não foi possível Atualizar");
            }
          }
        });
      })
    })
</script>
<script type="text/javascript">
  function mensagem(nome){

    alert('Acesso Negado, nivel de acesso não correspondente!');

  }
</script>
<script type="text/javascript">

  function focus(){
    
    document.getElementById("nome_pesquisa").focus();

  }

</script>


