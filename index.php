<?php
session_start(); 
 if(isset($_SESSION['usuario'])) 
 { 
        
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>INIEES </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    
    <!-- Theme style -->
    <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <link href="css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="js/alertify.js"></script>
    <link rel="stylesheet" href="css/alertify.core.css" />
    <link rel="stylesheet" href="css/alertify.default.css" />
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
        <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.html" class="logo"><b>INIEES</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            
             
            
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="img/profile.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $_SESSION['usuario'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="img/profile.jpg" class="img-circle" alt="User Image" />
                    <p>
                     Usuario INIEES
                    </p>

                      <a href="#" id="cambiarContrasena">Cambiar Contrasena</a>
                    
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right" >
                      <a href="#" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>



      <!-- Menu horizontal -->
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="img/profile.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><h4><?php echo $_SESSION['usuario'];?></h4></p>

              <a href="#"><i class="fa fa-circle text-success"></i></a>
            </div>
          </div>
        
          <ul class="sidebar-menu">
            <li class="header">Menú de Navegación</li>

            <li class="treeview" id="administracion">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Administracion</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
                    <ul class="treeview-menu">
                      <li class="treeview">
                        <a href="#">
                          <i class="fa fa-dashboard"></i> <span>Entidad</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                       <ul class="treeview-menu">
                         <li class="active" id="cargarEntidad"><a href="#"><i class="fa fa-circle-o"></i>Registrar Entidad</a></li>
                         <li class="active" id="regionEntidad"><a href="#"><i class="fa fa-circle-o"></i>Region Entidad</a></li>
                         
                       </ul>
                      </li>
                    <li class="active" id="entPatrocinadora"><a href="#"><i class="fa fa-circle-o"></i>Entidades Patrocinadoras</a></li>
                    <li class="active" id="lineaInves"><a href="#"><i class="fa fa-circle-o"></i>Linea de Investigacion</a></li>
                    <li class="active" id="carrera"><a href="#"><i class="fa fa-circle-o"></i>Carrera</a></li>
                    <!--
                    <li class="active" id="unidadAca"><a href="#"><i class="fa fa-circle-o"></i>Unidad Academica</a></li>
                    -->
                    <li class="treeview">
                        <a href="#">
                          <i class="fa fa-dashboard"></i> <span>Unidad Academica</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                       <ul class="treeview-menu">
                         <li class="active" id="unidadAca"><a href="#"><i class="fa fa-circle-o"></i>Registrar Unidad Academica</a></li>
                         <li class="active" id="entidadUni"><a href="#"><i class="fa fa-circle-o"></i>Entidad de Unidad Academica</a></li>
                         
                       </ul>
                      </li>
                    <li class="active" id="registrUsuario"><a href="#"><i class="fa fa-circle-o"></i>Registro Usuario</a></li>
                    </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Agregar Documentos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
             <ul class="treeview-menu">
              <!--
              <li class="active" id="CargarTipoCliente"><a href="#"><i class="fa fa-circle-o"></i>Tipo de cliente</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Tipo de Provedor</a></li>
               -->
               <li class="active" id="docPregrado"><a href="#"><i class="fa fa-circle-o"></i>Trabajo de Pregrado</a></li>
               <li class="active" id="docPostgrado"><a href="#"><i class="fa fa-circle-o"></i>Tesis Postgrado</a></li>
               <li class="active" id="docInves"><a href="#"><i class="fa fa-circle-o"></i>Investigacion Institucional</a></li>
               <li class="active" id="docInter"><a href="#"><i class="fa fa-circle-o"></i>Investigacion Interinstitucional</a></li>
             </ul>
            </li>
        
          </ul>
        </section>
      </aside>

      <!--fin menu lateral-->
    
    <!--Todos los formularios-->
    <div class="content-wrapper">
        <section class="content">
          <div class="row" id="cargarPaginas">
           

     
          </div>   
        </section>
      </div>
    <!--todos los formularios-->


 <!--Inicio pie de pagina-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>INIEES</strong>
      </footer>
  <!--fin pie de pagina-->

    </div>

    <!-- jQuery 2.1.3 -->
    <script src="js/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
	-->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>    

    <script src="js/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>

    <script src="js/app.min.js" type="text/javascript"></script>
     <script src="js/Main.js" type="text/javascript"></script>
     <script src="app/formularios/FormUsuario/login.js" type="text/javascript"></script
  </body>
</html>

<?php
}else{
  echo '<script> location.href= "error.html" </script>';
}
?>