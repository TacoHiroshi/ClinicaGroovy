const   dni_input = document.getElementById('paciente_dni'),
        n_input = document.getElementById('paciente_nombres'),
        ap_input = document.getElementById('paciente_apepaterno'),
        am_input = document.getElementById('paciente_apematerno'),
        s_input = document.getElementById('paciente_sexo'),
        e_input = document.getElementById('paciente_edad'),
        te_input = document.getElementById('f_tipoedad'),
        em_input = document.getElementById('f_correo'),
        c_input = document.getElementById('f_numero'),
        ubigeo_input = document.getElementById('f_distrito');
        // desplegable
        // de_input = document.getElementById('f_departamento'),
        // pr_input = document.getElementById('f_provincia'),
        // di_input = document.getElementById('f_distrito');
function revisa_edad(){
  let tipo_edad = document.getElementById('f_tipoedad').value;
  var numero_edad = $("#paciente_edad").val();
  if(tipo_edad == "2" || tipo_edad == "3"){
    return 1;
  }
  if(numero_edad.length!= 0 && numero_edad < 18 && tipo_edad == "1"){
    return 1;
  }
  return 0;
}

function cargar_apoderado(){
  if($('.row-parents').children().length == 0) {
    agrega_apoderado();
    $('#agregar-apo').prop("disabled", true);
  }
}
function nocargar_apoderado(){
  
  if(!revisa_edad()){
    $('#row-parents-label').remove();
    $('#row-parents').remove();
    $('#agregar-apo').prop("disabled", false);  
  }
}
function agrega_apoderado(){
  $('.row-parents').append(
    '<div class="row" id="row-parents-label">'
      +'<div class="col-lg-2 col-md-3 col-sm-4">'
        +'<b>Datos del Apoderado:</b>'
      +'</div>'
    +'</div>'
    // formulario
    +'<div class="form-row" id="row-parents">'
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
            +'<button id="borrar-apo" class="btn btn-danger" onclick="nocargar_apoderado();"><i class="fa fa-minus-circle"></i></button>'
          +'</div>'
        +'</div>'
      +'</div>'
    +'</div>'

    );
};
function c_datos(){
    
dni_input.value = localStorage.dni;
n_input.value = localStorage.nombre;
ap_input.value = localStorage.apepaterno;
am_input.value = localStorage.apematerno;
s_input.value = localStorage.sexo;
e_input.value = localStorage.edad;
te_input.value = localStorage.tipodedad;
em_input.value = localStorage.email;
c_input.value = localStorage.celular;
ubigeo_input.value = localStorage.ubigeo;

$("#f_tipoedad").val("1").trigger("change");


// desplegable
// de_input.value = localStorage.departamento;
// pr_input.value = localStorage.provincia;
// di_input.value = localStorage.distrito;
}

function revisa(){
    if (dni_input.value.length!=8){
        return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertencia',
            text: 'Debe ingresar los campos requeridos DNI',
            heightAuto: false
          });
    }

    if ( /\d/.test($("#paciente_apepaterno").val().trim()) ) {
        return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertencia',
            text: 'No se permiten números en el campo Apellido paterno',
            heightAuto: false
          });
    }

    if ( /\d/.test($("#paciente_apematerno").val().trim()) ) {
        return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertencia',
            text: 'No se permiten números en el campo Apellido materno',
            heightAuto: false
          });
    }

    if ( /\d/.test($("#paciente_nombres").val().trim()) ) {
        return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertencia',
            text: 'No se permiten números en el campo Nombres',
            heightAuto: false
          });
    }

    if (s_input.value.length==0){
        return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertencia',
            text: 'Debe ingresar el sexo del paciente',
            heightAuto: false
          });
    }

    if (e_input.value.length==0){
        return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertencia',
            text: 'Debe ingresar la edad del paciente',
            heightAuto: false
          });
    }
    // para obtener el valor del Tipo de Edad
    let texto_edad = document.getElementById('f_tipoedad').value;

    if(texto_edad == "1"){
      if(e_input.value < 18){
        let apoda_input = document.getElementById('apoderado_datos');
        let aponu_input = document.getElementById('apoderado_num');

        if(apoda_input.value.length==0 || aponu_input.value.length==0){
          return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertencia',
            text: 'Debe ingresar los campos requeridos del apoderado',
            heightAuto: false
          });
        }
      }
      // AGREGAR VARIABLE AL "AGREGAR APODERADO PARA EL >= 18 XDDDD TYPU"

    }

    if(texto_edad == "2"){
      let apoda_input = document.getElementById('apoderado_datos');
      let aponu_input = document.getElementById('apoderado_num');
      if(e_input.value > 12){
        return Swal.fire({
          icon: 'warning',
          title: 'Meses ingresados incorrecto',
          text: 'Valor de meses ingresados no válido',
          heightAuto: false
        });
      }
      if(apoda_input.value.length==0 || aponu_input.value.length==0){
          return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertencia',
            text: 'Debe ingresar los campos requeridos del apoderado',
            heightAuto: false
          });
        }
    }

    if(texto_edad == "3"){
      let apoda_input = document.getElementById('apoderado_datos');
      let aponu_input = document.getElementById('apoderado_num');
      if(e_input.value > 31){
        return Swal.fire({
          icon: 'warning',
          title: 'Días ingresados incorrecto',
          text: 'Valor de días ingresados no válidos',
          heightAuto: false
        });
      }
      if(apoda_input.value.length==0 || aponu_input.value.length==0){
          return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertencia',
            text: 'Debe ingresar los campos requeridos del apoderado',
            heightAuto: false
          });
        }
    }
    
    
    mail_ve=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
    if (document.getElementById('f_requierecontacto').checked) {
      if (em_input.value.length > 1 || c_input.value.length > 1) {
        if(em_input.value.length >= 1){
          if(!mail_ve.exec(document.getElementById('f_correo').value)){
            return Swal.fire({
              icon: 'warning',
              title: 'Error',
              text: 'Datos de contacto Incorrectos: Correo',
              heightAuto: false
            });
          }
          r_datos();
        }
        
        if(c_input.value.length >= 1){
          if(c_input.value.length != 9){
            return Swal.fire({
              icon: 'warning',
              title: 'Error',
              text: 'Datos de contacto Incorrectos: Teléfono',
              heightAuto: false
            });
          }
          r_datos();
        }
        
        } else {
          return Swal.fire({
            icon: "warning",
            title: "Mensaje de Advertencia",
            text: "Debe ingresar el correo o número del paciente",
            heightAuto: false
          });
        }
    }
  r_datos();
}

function soloLetras(e) {
    var key = e.keyCode || e.which,
      tecla = String.fromCharCode(key).toLowerCase(),
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
      especiales = [8, 37, 39, 46],
      tecla_especial = false;

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }

function r_datos(){ 
    localStorage.setItem('dni', dni_input.value);
    localStorage.setItem('nombre', n_input.value);
    localStorage.setItem('apepaterno', ap_input.value);
    localStorage.setItem('apematerno', am_input.value);
    localStorage.setItem('sexo', s_input.value);
    localStorage.setItem('edad', e_input.value);
    localStorage.setItem('tipodedad', te_input.value);
    localStorage.setItem('email', em_input.value);
    localStorage.setItem('celular', c_input.value);
    localStorage.setItem('ubigeo', ubigeo_input.value);
    if(f_requierecontacto.checked){
        localStorage.chrequiere = f_requierecontacto.value;
    }else{
        localStorage.chrequiere = "0";
    }

    if($('.row-parents').children().length != 0){
      localStorage.setItem('requiere_apoderado', 1);
      localStorage.setItem('nombre_apoderado', document.getElementById('apoderado_datos').value);
      localStorage.setItem('dni_apoderado', document.getElementById('apoderado_num').value);
    }
    else{
      localStorage.setItem('requiere_apoderado', 0);
    }
    
    $("#contenido_principal").load('usuario/vista_registrar_examen.php');

    // desplegable
    // localStorage.setItem('departamento', de_input.value);
    // localStorage.setItem('provincia', pr_input.value);
    // localStorage.setItem('distrito', di_input.value);
}
function c_cancelar(){
localStorage.setItem('dni', "");
localStorage.setItem('nombre', "");
localStorage.setItem('apepaterno', "");
localStorage.setItem('apematerno', "");
localStorage.setItem('sexo', "");
localStorage.setItem('edad', "");
localStorage.setItem('tipodedad', "");
localStorage.setItem('email', "");
localStorage.setItem('celular', "");
localStorage.setItem('chrequiere', "0");
localStorage.setItem('ubigeo', "");
$( "#f_requierecontacto" ).prop( "checked", false );
$("#f_numero").attr("disabled", "disabled");
$("#f_correo").attr("disabled", "disabled");
// localStorage.setItem('departamento', "");
// localStorage.setItem('provincia', "");
// localStorage.setItem('distrito', "");


dni_input.value = "";
n_input.value = "";
ap_input.value = "";
am_input.value = "";
s_input.value = "";
e_input.value = "";
te_input.value = "";
em_input.value = "";
c_input.value = "";
rellenar_ubigeo("210101");
$("#f_tipoedad").val("1").trigger("change");
nocargar_apoderado();
// de_input.value = "";
// pr_input.value = "";
// di_input.value = "";


}

function almacena_paciente(){
  alert(
    localStorage.nombre+
    localStorage.apepaterno+
    localStorage.apematerno+
    localStorage.dni+
    localStorage.edad+
    localStorage.sexo+
    localStorage.chrequiere+
    localStorage.ubigeo+
    localStorage.tipodedad+
    localStorage.email+
    localStorage.celular
  );
}