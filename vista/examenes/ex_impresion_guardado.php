<!-- Content Header (Page header) -->
<div class="content-header" onload="rellenar_datos_pdf();">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registro de Examen Completado!</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
                <div class="container mb-5 mt-3">

                <div class="container">
                    <div class="row p-3 justify-content-md-center">
                        <div class="col-md-2">
                            <div class="text-right">
                            <img src="..\resources\logo5.png"  alt="AdminLTE Logo" class="relative img-fluid brand-image img-circle " style=" opacity: .8;">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="text-center">
                                <h1 class="mt-2">LABORATORIO DE ANALISIS CLINICO EL LAGO</h1>
                                <p class="mb-0">Jr.El lago 243, Puno</p>
                                <p>Telefono:938742324 Correo: labo@mail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="row invoice-info border border-2 border-dark">
                        <div class="col-sm-6 invoice-col mt-2">
                            <ul class="list-unstyled align-middle">
                            <li class="text-muted">Paciente: <span  id="re_paciente" style="color:#5d9fc5 ;"></span></li>
                            <li class="text-muted">Edad: <span id="re_edad" style="color:#5d9fc5 ;"></span></li>
                            <li class="text-muted">Sexo: <span  id="re_sexo" style="color:#5d9fc5 ;"></span></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 invoice-col mt-2">
                            <ul class="list-unstyled">
                            <li class="text-muted">DNI: <span  id="re_dni" style="color:#5d9fc5 ;"></span></li>
                            <li class="text-muted">Fecha: <span id="re_fecha"  style="color:#5d9fc5 ;"></span></li>
                            <li class="text-muted">Hora: <span id="re_hora"  style="color:#5d9fc5 ;"></span></li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Analisis</th>
                                    <th>Resultado</th>
                                    <th>Medida</th>
                                    <th>Valor Referencial</th>
                                </tr>
                            </thead>
                            <tbody id="resultados">
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-xl-10">
                        <p>AQUI VA LA CLAVE DE ACCESO</p>
                    </div>
                    </div>

                </div>
                </div>
            </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <div class="row no-print">
            <div class="col-12">
            <a href="" rel="noopener" class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Imprimir</a>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <script src="../js/rellena_imp_examen.js?rev=<?php echo time(); ?>"></script>
    <script>
        $(document).ready(function() {
            rellenar_datos_guardados_pdf();
        });
    </script>