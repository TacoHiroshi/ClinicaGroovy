<?php
session_start();
if(isset($_SESSION['S_IDUSUARIO'])){
  header('Location: vista/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Labo | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">
  
  <link rel="icon" href="resources/test.png">
  <style>
      body {
          /* Ruta relativa o completa a la imagen */
          background-image: url(resources/fondo.jpg);
          /* Centramos el fondo horizontal y verticalmente */
          background-position: center center;
          /* El fonde no se repite */
          background-repeat: no-repeat;
          /* Fijamos la imagen a la ventana para que no supere el alto de la ventana */
          background-attachment: fixed;
          /* Color de fondo si la imagen no se encuentra o mientras se está cargando */
          background-color: #FFF;
      }
      .card, .card-body {
        border-radius: 15px;
        box-shadow: 0 5px 10px rgba(0,0,0,.5);
      }
 </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    
    <div class="card-body login-card-body">
      
    <div class="login-logo" style="color:black">
      <a><i class="fas fa-dna"></i><b>Labo</b>SisGroovy</a>
    </div>
      <p class="login-box-msg">Ingrese sus datos para iniciar sesion</p>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="correo@electronico.com" id="text_usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" id="text_contrasena">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye" id="ojo"></span>
            </div>
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="rememberMe">
              <label for="rememberMe">
                Recordarme
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" onclick="Iniciar_Sesion()">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Olvide mi contrasena</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plantilla/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plantilla/dist/js/adminlte.min.js"></script>
<script src="js/usuario.js?rev=<?php echo time(); ?>"></script>
<script src="resources/sweetalert.js"></script>
<script src="resources/m_contra.js"></script>
<script>
  const rmcheck = document.getElementById('rememberMe'),
        usuarioinput = document.getElementById('text_usuario'),
        passinput = document.getElementById('text_contrasena');
  if(localStorage.checkbox && localStorage.checkbox !==""){
    rmcheck.setAttribute("checked","checked");
    usuarioinput.value= localStorage.usuario;
    passinput.value   = localStorage.pass;
  }else{
    rmcheck.removeAttribute("checked");
    usuarioinput.value= "";
    passinput.value   = "";
  }
</script>
</body>
</html>
