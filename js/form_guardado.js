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
            text: 'Debe ingresar los campos requeridos',
            heightAuto: false
          });
    }
    
    r_datos();
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
        localStorage.chrequiere = "";
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
localStorage.setItem('chrequiere', "");
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

$("#tipo_edad").val("1").trigger("change");
// de_input.value = "";
// pr_input.value = "";
// di_input.value = "";


}