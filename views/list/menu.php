<!DOCTYPE html>

<html>
    <head>
        <title>NeuroMemorando</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="../../css/span_usuario.min.css">
        <script src="../../lib/bootstrap/js/jquery-2.2.1.min.js" type="text/javascript">
        </script>
        <script src="../../lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- meu aquivo pessoal de CSS-->
        <link href="../../lib/bootstrap/css/tema.css" rel="stylesheet" type="text/css"/>
     <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    </head>
    <body>
        
        <!-- começa  o container geral -->
        <div class="container-fluid">
            
            <!-- começa a div topo -->
            <div class="row" id="topo">
                 
                
                <div class="container">
                <img src="../../img/LogoNeuroCentro.png" alt=""> 
                <span id="span_usuario">Usuario: <span id="usuario"><?php echo $_SESSION['usuario'] ?></span> </span>
                       
                </div>    
            
            </div><!-- fim da div topo -->
            
            <!-- começa a barra MENU-->
            <div class="row" id="barra-menu">
                
                <!--começa navBAR-->
                <nav class="navbar navbar-inverse">
                    
                    <!-- container navBAr-->
                    <ul class="nav navbar-nav navbar-right">
            <!--<span id="mostra_usuario" style="color: #FFFF;">Usuario: <?php echo $_SESSION['usuario'] ?></span>-->
            

            <li class="active"><a href="../inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>


          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list"></span> Gestão Inicial <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../cadfuncionario.php">Cadastro Funcionário</a></li>
              <li><a href="../cadusuario.php">Cadastro Usuario</a></li>
              <li><a href="../cadlocal.php">Cadastro Local</a></li>
              <li><a href="../listusuario.php">Listagem Usuarios</a></li>
              <li><a href="../listfuncionario.php">Listagem Funcionários</a></li> 
              <li><a href="../listlocais.php">Listagem Locais</a></li> 
      
            </ul>
          </li>  
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Memorando <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="../cadmemorando.php">Novo Memorando</a></li>
                <li><a href="../listmemorando.php">Listagem Memorandos</a></li>    
            </ul>
          </li>   

          
          <li class="dropdown" style="margin-right: 20px;">
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario:<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a style="color: red" href="../../controle/usuario/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
            </ul>
          </li>
        </ul>     
        </div> <!-- fim barra menu--> 
        </div>
</nav>
</div>
</div>        
</body>
            