<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        
        <div class="col-sm-6">
            <button type="button" class="btn btn-danger mt-1" onclick="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')">Volver</button>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Registrar Paciente</a></li>
            <li class="breadcrumb-item active">Registrar Examen</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->

    <!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-danger">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-6">
                            <p class="h4 text-white font-weight-bold mb-0">HEMATOLOGIA</p>
                        </div>
                        <div class="card-tools col-6 mt-2">
                            <button type="button" class="btn btn-tool float-sm-right align-middle" data-card-widget="collapse">
                                <i class=" fas fa-minus"></i>
                            </button>
                        </div>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                            <div class="row ">
                            <div class="col-md-9 mx-auto text-center">
                                <button type="button" class="btn btn-danger  btn-lg mt-1">Constantes Corpusculares</button>
                                <button type="button" class="btn btn-danger  btn-lg mt-1">Vel. de Sedimentacion</button>
                                <button type="button" class="btn btn-danger  btn-lg mt-1">Hematocrito</button>
                                <button type="button" class="btn btn-danger  btn-lg mt-1">Recuento de Plaquetas</button>
                                <button type="button" class="btn btn-danger  btn-lg mt-1" onclick="cargar_contenido('contenido_principal','../vista/examenes/ex_hemograma_completo.php')">Hemograma Completo</button>
                                <button type="button" class="btn btn-danger  btn-lg mt-1">Hemoglobina</button>
                                <button type="button" class="btn btn-danger  btn-lg mt-1">Grupo Sanguineo y Rh</button>
                                <button type="button" class="btn btn-danger  btn-lg mt-1">Celulad LE</button>
                                <button type="button" class="btn btn-danger  btn-lg mt-1">Test de Coombs</button>
                            </div>
                        <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-success">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-6">
                            <p class="h4 text-white font-weight-bold mb-0">MICROBIOLOGIA</p>
                        </div>
                        <div class="card-tools col-6 mt-2">
                            <button type="button" class="btn btn-tool float-sm-right align-middle" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                            <div class="row ">
                            <div class="col-md-9 mx-auto text-center">
                                <button type="button" class="btn btn-success  btn-lg mt-1">BK</button>
                                <button type="button" class="btn btn-success  btn-lg mt-1">Reaccion Inflamatoria</button>
                                <button type="button" class="btn btn-success  btn-lg mt-1">Parasitologico Seriado</button>
                                <button type="button" class="btn btn-success  btn-lg mt-1">Cultivos</button>
                                <button type="button" class="btn btn-success  btn-lg mt-1">Antibiogramas</button>
                            </div>
                        <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card card-orange">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-6">
                            <p class="h4 text-white font-weight-bold mb-0">INMUNOLOGIA</p>
                        </div>
                        <div class="card-tools col-6 mt-2">
                            <button type="button" class="btn btn-tool float-sm-right align-middle" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                            <div class="row ">
                            <div class="col-md-9 mx-auto text-center">
                                <button type="button" class="btn btn-orange  btn-lg mt-1">Reaccion de Widal</button>
                                <button type="button" class="btn btn-orange  btn-lg mt-1">ASO - Antiestreptolisina</button>
                                <button type="button" class="btn btn-orange  btn-lg mt-1">Proteina C. Reactiva</button>
                                <button type="button" class="btn btn-orange  btn-lg mt-1">Factor Reumatoideo</button>
                                <button type="button" class="btn btn-orange  btn-lg mt-1">RPR</button>
                                <button type="button" class="btn btn-orange  btn-lg mt-1">HIV 1-2</button>
                                <button type="button" class="btn btn-orange  btn-lg mt-1">Hormona T3</button>
                                <button type="button" class="btn btn-orange  btn-lg mt-1">Hormona T4</button>
                                <button type="button" class="btn btn-orange  btn-lg mt-1">Hormona TSH</button>
                            </div>
                        <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div class="card-header btn-saphire ">
                        <div class="row">
                        <div class="col-6">
                            <p class="h4 text-white font-weight-bold mb-0">PERFIL ONCOLOGICO</p>
                        </div>
                        <div class="card-tools col-6 mt-2">
                            <button type="button" class="btn btn-tool float-sm-right align-middle" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                            <div class="row ">
                            <div class="col-md-9 mx-auto text-center">
                                <button type="button" class="btn btn-saphire  btn-lg mt-1">CA - 125</button>
                                <button type="button" class="btn btn-saphire  btn-lg mt-1">CA 15 - 3</button>
                                <button type="button" class="btn btn-saphire  btn-lg mt-1">CA 19 - 9</button>
                                <button type="button" class="btn btn-saphire  btn-lg mt-1">CEA</button>
                                <button type="button" class="btn btn-saphire  btn-lg mt-1">PSA Total</button>
                                <button type="button" class="btn btn-saphire  btn-lg mt-1">PSA Libre</button>
                            </div>
                        <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->