<script src="../js/resultado.js?rev=<?php echo time(); ?>"></script>
<style>
.dataTables_filter {
display: none;
}
.dataTables_length {
display: none;
}
#borrar
{
    float:right;
}
</style>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lista de Resultados</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Principal</li>
            </ol>
          </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Listado de Usuarios</b></h5>
        </div>
        <div class="card-body">
        
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3 display">
                    <label for="exampleInputFile">Nro. de DNI</label>
                    <div class="input-group">
                        <input type="number" id="paciente_dni" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        <span class="input-group-append">
                        <button type="button" id="botondni"class="btn btn-success"><i class="nav-icon fas fa-search"></i></button>
                            </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3 display">
                    <label for="exampleInputFile">Apellidos o Nombres</label>
                    <div class="input-group">
                        <input type="text" id="apono" >
                            <span class="input-group-append">
                        <button type="button" id="boton"class="btn btn-success"><i class="nav-icon fas fa-search"></i></button>
                            </span>
                    </div>
                </div>
                <div class="col-lg">
                    <button type="button" id="borrar" class="btn btn-primary"><i class="nav-icon fas fa-retweet"></i> Recargar</button>
                </div>
            </div>
            
       
           
            <div class="row">
                <div class="col table-responsive">
                    <table id="tabla_usuario" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DNI</th>
                                <th>Ap. Paterno</th>
                                <th>Ap. Materno</th>
                                <th>Nombres</th>
                                <th>Fecha</th>
                                <th>Examen</th>
                                <th>Resultados</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
        
    </div>

</div>

<script>


$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
listar_paciente_serverside();



$(document).ready(function() {
    
    var table = $('#tabla_usuario').DataTable();

    var inputd = $('#paciente_dni');
    $searchButtondni = $('#botondni').click(function(){
        table.search(inputd.val()).draw();
    })
    var input = $('#apono');
    $searchButton = $('#boton').click(function(){
        table.search(input.val()).draw();
    })
    $clearButton = $('#borrar').click(function() {
        input.val('');
        inputd.val('');
        $searchButtondni.click();
        $searchButton.click();
    })
});

</script>