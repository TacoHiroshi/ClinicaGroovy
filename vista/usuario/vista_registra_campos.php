<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" id="hola">Recuento de Plaquetas</h1>
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
                    <div class="col-7" id="columna_campos_examen">
                    </div>
                </div>
                <div class="row p-3 justify-content-md-left">
                    <div class="col-7" id="form_agregar_campos">
                      <h5 class="m-0">Agregar campos adicionales:</h5>
                      <div class="dropdown-divider"></div>
                    </div>
                </div>
                <div class="row ml-3">
                  <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="form-group">
                      <label>Analisis: </label>
                      <select class="js-example-basic-single" name="state" style="width: 100%;" id="f_analisis">
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-5 col-sm-6">
                    <div class="form-group">
                      <label>Examen: </label>
                      <select class="js-example-basic-single" name="state" style="width: 100%;"  id="f_examen">
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-3 align-self-end mb-3">
                    <button type="button" class="btn btn-success" id="agregar"onclick="agregar_campos();"><i class="fa fa-plus-circle mr-1"></i>Agregar</button>
                  </div>
                </div>
                <div class="row p-3 justify-content-md-center">
                    <div class="col-7" id="columna_agregar_campos_examen">
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-3">
                    <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
                  </div>
                  <div class="col-md-6 col-sm-3">
                    <button id="liveAlertBtn" type="submit" class="btn btn-primary text-white text-bold" onclick="rellenado();">Continuar <i class="fas fa-arrow-right"></i></button>
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
    
  <script src="../js/campos_examen.js?rev=<?php echo time(); ?>"></script>
  <script>
    
  function cargar_contenido(id, vista){
    $("#"+id).load(vista);
  }
  $(document).ready(function() {
    buscar_campos(localStorage.examen_id);
    $('.js-example-basic-single').select2();
    $(".js-example-tags").select2({ tags: true});
    listar_analisis();
  });
  
  $("#f_analisis").change(function(){
    var id_analisis = $("#f_analisis").val();
    listar_examen(id_analisis);
  })
</script>