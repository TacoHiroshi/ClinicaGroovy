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
                <div class="col-lg col-md-3 col-sm-4 col-xs-3 display">
                    <label for="exampleInputFile">Nro. de DNI</label>
                    <div class="input-group">
                        <input type="number" id="paciente_dni" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        <span class="input-group-append">
                        <button type="button" id="botondni"class="btn btn-success"><i class="nav-icon fas fa-search"></i></button>
                            </span>
                    </div>
                </div>
                <div class="col-lg col-md-3 col-sm-4 col-xs-3 display">
                    <label for="exampleInputFile">Apellidos o Nombres</label>
                    <div class="input-group">
                        <input type="text" id="apono" >
                            <span class="input-group-append">
                        <button type="button" id="boton"class="btn btn-success"><i class="nav-icon fas fa-search"></i></button>
                            </span>
                    </div>
                </div>
                <div class="col-lg col-md-3 col-sm-4 col-xs-3 display">
                    <label for="exampleInputFile">Encargado</label>
                    <div class="input-group">
                        <input type="text" id="encargado" >
                            <span class="input-group-append">
                        <button type="button" id="botonE"class="btn btn-success"><i class="nav-icon fas fa-search"></i></button>
                            </span>
                    </div>
                </div>
            
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

                    <div class="container" style="max-width: 250px;">
                            <div class="form-group m-1">
                                <label class="font-weight-bold" for="dob">
                                    Fecha:
                                </label>
                    
                                <!-- Input field along with 
                                    calendar icon and -->
                                <div class="input-group date">
                                    <!-- Sets the calendar icon -->
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar" 
                                                onclick="setDatepicker(this)">
                                            </i>
                                        </span>
                                    </span>
                                    
                    
                                    <!-- Accepts the input from calendar -->
                                    <input class="form-control" type="text" 
                                        name="dob" id="dob" value="" data-date-format="yyyy-mm-dd">
                                        <span class="input-group-append">
                                    <button type="button" id="botonF" class="btn btn-success"><i class="nav-icon fas fa-search"></i></button>
                                    </span>
                                </div>
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
                                <th>Encargado</th>
                                <th>Analisis</th>
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



  
    <!-- JavaScript to control the actions
         of the date picker -->

<script>


$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
listar_pacienteJ_serverside();



$(document).ready(function() {
    
    var table = $('#tabla_usuario').DataTable();

    var inputd = $('#paciente_dni');
    var inputf = $('#dob');
    var inpute = $('#encargado');
    $searchButtondni = $('#botondni').click(function(){
        table.search(inputd.val()).draw();
    })
    var input = $('#apono');
    $searchButton = $('#boton').click(function(){
        table.search(input.val()).draw();
    })
    $searchButtonF = $('#botonF').click(function(){
        table.search(inputf.val()).draw();
    })
    $searchButtonE = $('#botonE').click(function(){
        table.search(inpute.val()).draw();
    })
    $clearButton = $('#borrar').click(function() {
        input.val('');
        inputd.val('');
        inputf.val('');
        inpute.val('');
        $searchButtonE.click();
        $searchButtondni.click();
        $searchButton.click();
        $searchButtonF.click();
    })

    $('#paciente_dni').on( 'keyup', function () {

        table.search( this.value ).draw();

    } );


    $('#apono').on( 'keyup', function () {

        table.search( this.value ).draw();

    } );

    $('#dob').on( 'keyup', function () {

    table.search( this.value ).draw();

    } );
    $('#encargado').on( 'keyup', function () {

    table.search( this.value ).draw();

    } );
});

function setDatepicker(_this) {
  
  /* Get the parent class name so we 
      can show date picker */
  let className = $(_this).parent()
      .parent().parent().attr('class');

  // Remove space and add '.'
  let removeSpace = className.replace(' ', '.');

  // jQuery class selector
  $("." + removeSpace).datepicker({
      format: "yyyy-mm-dd",

      // Positioning where the calendar is placed
      orientation: "bottom auto",
      // Calendar closes when cursor is 
      // clicked outside the calendar
      autoclose: true,
      showOnFocus: "false"
  });
}

</script>