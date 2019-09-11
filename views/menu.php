<?php 

  if(isset($_SESSION['usuario'])){

 ?>


<?php 
require_once "../classes/rotas.php";

$rt = new Rotas();

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Sistema-Memorando</title>
        <link rel="shortcut icon" href="../img/IconeEmpresa.ico" type="image/x-icon" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../lib/bootstrap/js/jquery-2.2.1.min.js" type="text/javascript">
        </script>
        <script src="../lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- meu aquivo pessoal de CSS-->
        <link href="../lib/bootstrap/css/tema.css" rel="stylesheet" type="text/css"/>
        <link href="../css/ajustes.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="../css/ajustes.css">
</head>
<body>
        
        <!-- começa  o container geral -->
        <div class="container-fluid">
            
            <!-- começa a div topo -->
            <div class="row" id="topo">
                 
                
                <div class="container">
                <img src="../img/LogoNeuroCentro.png" alt=""> 
                <span id="span_usuario">Usuario: <span id="usuario"><?php echo $_SESSION['usuario'] ?></span> </span>
                       
                </div>    
            
            </div><!-- fim da div topo -->
            
        <!-- começa a barra MENU-->
        <div class="row" id="barra-menu">
                
                <!--começa navBAR-->
                <nav class="navbar navbar-collapse">
                    
                    <!-- container navBAr-->
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?php echo $rt->get_inicio(); ?>"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list"></span> Gestão Inicial <span class="caret"></span></a>
            <ul class="dropdown-menu">
             <?php  if($_SESSION['nivel'] == 3): ?>
                <li><a href="cadfuncionario.php">Cadastro Funcionário</a></li>
                <li><a href="cadusuario.php">Cadastro Usuario</a></li>
                <li><a href="cadlocal.php">Cadastro Local</a></li>
                <li><a href="cadanotacao.php">Cadastro Anotação</a></li> 
                <li><a href="listusuario.php">Listagem Usuarios</a></li>
                <li><a href="listanotacao.php">Listagem Anotação</a></li>
                <li><a href="listfuncionario.php">Listagem Funcionários</a></li> 
                <li><a href="listlocal.php">Listagem Locais</a></li> 
                <li><a href="teste.php">Teste</a></li>
            <?php endif ?>
            <?php  if($_SESSION['nivel'] == 2): ?>
                <li><a href="cadlocal.php">Cadastro Local</a></li>
                <li><a href="listfuncionario.php">Listagem Funcionários</a></li> 
                <li><a href="listlocal.php">Listagem Locais</a></li> 
            <?php endif ?>
            <?php  if($_SESSION['nivel'] == 1): ?>
                <li><a href="listfuncionario.php">Listagem Funcionários</a></li> 
                <li><a href="listlocal.php">Listagem Locais</a></li> 
            <?php endif ?>

      
            </ul>
          </li>  
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Memorando <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="cadmemorando.php">Novo Memorando</a></li>
                <li><a href="listmemorando.php">Listagem Memorandos</a></li>    
            </ul>
          </li>   

          <li class="dropdown" id="divsair"> 
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario:<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a style="color: red" href="../controle/usuario/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              
            </ul>
          </li>
        </ul>     
            </div> <!-- fim barra menu--> 
        </div>
<?php 

} else{
  
  header("location:../index.php");
}

 ?>