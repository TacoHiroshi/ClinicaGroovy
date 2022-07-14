
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registrar Paciente</h1>
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
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">A continuación, ingrese los datos del paciente:</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Nro. de DNI</label>
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" id="paciente_dni" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                          <span class="input-group-append">
                          <button onclick="buscar_paciente()" type="button" class="btn btn-success ml-3"><i class="nav-icon fas fa-search"></i> Buscar</button>
                          </span>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-2 col-md-3 col-sm-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Apellido paterno: </label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" id="paciente_apepaterno" onkeypress="return soloLetras(event)" onpaste="return false">
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Apellido materno: </label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" id="paciente_apematerno" onkeypress="return soloLetras(event)" onpaste="return false">
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Nombres: </label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" id="paciente_nombres" onkeypress="return soloLetras(event)" onpaste="return false">
                        </div>
                      </div>
                  </div>
                </div>
                
                <div id="liveAlertPlaceholder"></div>
                <div class="row">
                  <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="form-group">
                      <label>Sexo: </label>
                      <select class="form-control" id="paciente_sexo">
                        <option>Masculino</option>
                        <option>Femenino</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-1 col-md-1 col-sm-2">
                    <div class="form-group">
                      <label>Edad: </label>
                      <div class="input-group mb-3">
                        <input type="number" min="1" max="99" class="form-control" id="paciente_edad" >
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2">
                    <div id="menor_e" class="tooltip tooltip-main bs-tooltip-top" role="presentation" style="margin-left: -90px; margin-top: -20px "><div class="arrow"></div><div class="tooltip-inner">Menor de edad</div></div>
                    <div class="form-group">
                      <label>Tipo de Edad: </label>
                      <div class="input-group mb-3">
                        <select class="js-example-basic-single"  name="state" id="f_tipoedad" style="width: 100%;">
                        <option value="1">Años</option>
                        <option value="2">Meses</option>
                        <option value="3">Dias</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="form-group">
                      <label>Apoderado</label>
                      <div><button id="agregar-apo" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Asignar apoderado</button></div>
                    </div>
                  </div>
                </div>
                <!-- para agregar a los padres -->
                <div class="row-parents"></div>
                <!-- para agregar a los padres -->
                <div class="row">
                  <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="form-group">
                      <label>Departamento: </label>
                      <select class="js-example-basic-single" name="state" style="width: 100%;" id="f_departamento">
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="form-group">
                      <label>Provincia: </label>
                      <select class="js-example-basic-single" name="state" style="width: 100%;"  id="f_provincia">
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4">
                      <label>Distrito: </label>
                      <select class="js-example-basic-single" name="state" style="width: 100%;" id="f_distrito">
                      </select>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-lg-6 col-md-3 col-sm-4">
                    <div class="form-group">
                      <label>Departamento/Provincia/Distrito: </label>
                      <select class="js-example-basic-single" name="state" style="width: 100%;" id="f_ubigeo">
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-auto my-1">
                    <div class="icheck-primary">
                      <label for="f_requierecontacto">
                          <input type="checkbox" id="f_requierecontacto">
                          El paciente requiere informacion de contacto
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputFile">Correo electronico: </label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" id="f_correo"disabled="disabled">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-3">
                    <div class="form-group">
                      <label for="exampleInputFile">Nro de Telefono: </label>
                      <div class="input-group mb-3">
                        <input type="number" class="form-control" id="f_numero" disabled="disabled" maxlength="9" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-3">
                    <button type="button" class="btn btn-danger" id="cancelar" onclick="c_cancelar()">Cancelar</button>
                  </div>
                  <div class="col-md-6 col-sm-3">
                    <button id="liveAlertBtn" type="submit" class="btn btn-primary text-white text-bold" onclick="revisa()">Continuar <i class="fas fa-arrow-right"></i></button>
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
    <script src="../js/ubigeo.js?rev=<?php echo time(); ?>"></script>
<!-- Registro Storage -->
<script src="../js/form_guardado.js?rev=<?php echo time(); ?>"></script>

  <script>
  function cargar_contenido(id, vista){
    $("#"+id).load(vista);
  }
  
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
    $(".js-example-tags").select2({ tags: true});
    
  $("#f_tipoedad").val("1").trigger("change");
    listar_ubigeo();
    listar_departamentos();
  });
  $("#f_departamento").change(function(){
    var id_departamento = $("#f_departamento").val();
    listar_provincia(id_departamento,"vacio");
  })
  $("#f_provincia").change(function(){
    var id_provincia = $("#f_provincia").val();
    listar_distrito(id_provincia,"vacio");
  })
  $(function(){
      var menues = $(".nav-link");
      menues.click(function(){
      menues.removeClass("active");
      $(this).addClass("active");
      });
  });
</script>

<script>
  var input=  document.getElementById('paciente_edad');
  input.addEventListener('input',function(){
  if (this.value.length > 2) 
     this.value = this.value.slice(0,2); 
  })
</script>

<script>
  let texto_edad = document.getElementById('f_tipoedad');
  let texto_edad_inpu = texto_edad.options[texto_edad.selectedIndex].text;

  if(texto_edad_inpu === "Meses"){
    alert("gaaaaaaaaaaaaaaaaaaaaaa meses")
  }

  $("#paciente_edad").change(function(){
    var paciente_edad = $("#paciente_edad").val();
    if(paciente_edad < 18 || texto_edad_inpu == "Meses" || texto_edad_inpu == "Dias"){
      var show = $("#menor_e");
      show.addClass(" show");
    }
    if(paciente_edad >= 18){
      var show = $("#menor_e");
      show.removeClass(" show");
    }
  })
</script>

<script type="text/javascript">
  $(function() {
    var i = 0;
    $('#agregar-apo').click(function (e) {
      e.preventDefault();
        i++;

      if(i<=1){
        $('.row-parents').append(
        '<div class="row" id="row-parents-label'+i+'">'
          +'<div class="col-lg-2 col-md-3 col-sm-4">'
            +'<b>Datos del Apoderado:</b>'
          +'</div>'
        +'</div>'
        // formulario
        +'<div class="form-row" id="row-parents'+i+'">'
          +'<div class="col-lg-4 col-md-4 col-sm-4">'
            +'<div id="apoderado" class="form-group">'
              +'<label for="exampleInputFile">Apellido y Nombres del Apoderado: </label>'
              +'<div class="input-group mb-3">'
                +'<input type="text" class="form-control" id="apoderado_datos" onkeypress="return soloLetras(event)" onpaste="return false">'
              +'</div>'
            +'</div>'
          +'</div>'

          +'<div class="col-lg-2 col-md-2 col-sm-2">'
            +'<div id="apoderado" class="form-group">'
              +'<label for="exampleInputFile">DNI del Apoderado: </label>'
              +'<div class="input-group mb-3">'
                +'<input type="number" class="form-control" id="apoderado_num" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">'
              +'</div>'
            +'</div>'
          +'</div>'
          // boton para borrar
          +'<div class="col-lg-2 col-md-3 col-sm-4">'
            +'<div class="form-group">'
              +'<label>Borrar</label>'
              +'<div id="apoderado" class="form-group">'
                +'<button id="'+i+'" class="btn borrar-apo btn-danger"><i class="fa fa-minus-circle"></i></button>'
              +'</div>'
            +'</div>'
          +'</div>'

        +'</div>'

        );
      }else{ return;}
      

      $(document).on('click','.borrar-apo', function(e){
        e.preventDefault();

        let id = $(this).attr("id");
        $('#row-parents'+id+'').remove();
        $('#row-parents-label'+id+'').remove();
        i=0;
      });

    });
});

</script>