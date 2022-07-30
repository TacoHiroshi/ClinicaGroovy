<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Recuento de Plaquetas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Principal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">A continuación, ingrese los resultados del paciente:</h5>
              </div>
              <div class="card-body">
                <div class="row p-3 justify-content-md-center">
                    <div class="col-4">
                        <div class="row">
                            <label for="inputEmail3" class="col-sm-5 col-form-label text-right">Plaquetas:</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="inputEmail3">
                            </div>
                            <div class="col-sm-3">
                                
                            <p>/mm3</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6 col-sm-3">
                    <button type="button" class="btn btn-danger" id="cancelar" onclick="c_cancelar()">Cancelar</button>
                  </div>
                  <div class="col-md-6 col-sm-3">
                    <button id="liveAlertBtn" type="submit" class="btn btn-primary text-white text-bold" onclick="cargar_contenido('contenido_principal','../vista/examenes/ex_impresion.php');">Continuar <i class="fas fa-arrow-right"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <script src="../js/rellena_imp_examen.js?rev=<?php echo time(); ?>"></script>
  <script>
    
  function cargar_contenido(id, vista){
    $("#"+id).load(vista);
  }
  </script>