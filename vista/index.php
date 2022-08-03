<?php
session_start();
if(!isset($_SESSION['S_IDUSUARIO'])){
  header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laboratorio| Groovy</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="../resources/DataTables/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="../resources/select2.min.css"/>
  <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../resources/styles.css">
  <link rel="icon" href="../resources/test.png">
  <style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0; 
    }
  </style>
</head>
<body class="hold-transition sidebar-mini" >
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
      </li>
      <!-- CERRAR SESION  -->
      <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
          <?php echo $_SESSION['S_ROL']; ?>
          <?php echo $_SESSION['S_USUARIO']; ?>
          <i class="fas fa-caret-down "></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          <button type="button" class="btn btn-block btn-outline-danger"onclick="destruir_sesion()"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión</button>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <!-- CERRAR SESION -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <img src="..\resources\logo5.png"  alt="AdminLTE Logo" class="relative img-fluid brand-image img-circle " style="padding: 1.9em; opacity: .8;">
    <a href="index.php" class="brand-link text-center text-bold">
      <span class=" brand-text font-weight-light">Clinica "El Lago"</span>
      <div class="dropdown-divider"></div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../resources/form.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $_SESSION['S_USUARIO']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Registros</li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="cargar_contenido('contenido_principal','usuario/listar_resultados.php')">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Registrar Analisis
              </p>
            </a>
          </li>
          <div class="dropdown-divider"></div>
          <?php if($_SESSION['S_NROL']=="1"||$_SESSION['S_NROL']=="2"){?>
          <li class="nav-header">Consultas</li>
          <li class="nav-item">
            <a href="#" class="nav-link "onclick="cargar_contenido('contenido_principal','usuario/vista_registrar_examen.php')">
              <i class="nav-icon fas fa-search-plus"></i>
              <p>
                Consultar Registros
              </p>
            </a>
          </li> 
          <?php }?>     
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Consultar Paciente
              </p>
            </a>
          </li>
          <div class="dropdown-divider"></div>
          <?php if($_SESSION['S_NROL']=="1"){?>
            <li class="nav-header">Administración</li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="cargar_contenido('contenido_principal','usuario/listar_usuario.php')">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestion de Usuarios
              </p>
            </a>
          </li> 
          <?php }?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="contenido_principal">
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer no-print">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      2022
    </div>
    <!-- Default to the left -->
    <strong>Groovy Ingenieria y Sistemas</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plantilla/plugins/jquery/jquery.min.js"></script>

  
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="../resources/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="../resources/select2.min.js"></script>
<script src="../plantilla/dist/js/adminlte.min.js"></script>
<script src="../js/cerrar_sesion.js?rev=<?php echo time(); ?>"></script>
<script src="../resources/sweetalert.js"></script>

<script>
  function cargar_contenido(id, vista){
    $("#"+id).load(vista);
  }
  
  $(function(){
      var menues = $(".nav-link");
      menues.click(function(){
      menues.removeClass("active");
      $(this).addClass("active");
      });
  });
</script>
<!-- ./Registro Storage -->
</body>
</html>