$(function () {
    $("#f_requierecontacto").change(function () {
        if ($(this).is(":checked")) {
            $("#f_numero").removeAttr("disabled");
            $("#f_correo").removeAttr("disabled");
            $("#f_numero").focus();
            $("#f_correo").focus();
        } else {
            $("#f_numero").attr("disabled", "disabled");
            $("#f_correo").attr("disabled", "disabled");
        }
    });
});

function listar_ubigeo(){
    $.ajax({
        url:'../control/user/listar_ubigeo.php',
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena = "";
        if(data.length > 0){
            for(var i = 0; i < data.length; i++){
                cadena +="<option value='" + data[i][0]+"'>"+data[i][3]+", "+data[i][2]+", "+data[i][1]+"</option>";
            }
            $("#f_ubigeo").html(cadena);
            $("#f_ubigeo").val("210101").trigger("change"); 
            var id_ubigeo = $("#f_ubigeo").val();
        }else{
            cadena +="<option value='NO HAY REGISTROS'></option>"
            $("#f_ubigeo").html(cadena);
        }
    })
}

function listar_departamentos(){
    $.ajax({
        url:'../control/user/control_listar_departamento.php',
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena = "";
        if(data.length > 0){
            for(var i = 0; i < data.length; i++){
                cadena +="<option value='" + data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#f_departamento").html(cadena);
            $("#f_departamento").val("21").trigger("change"); 
            var id_departamento = $("#f_departamento").val();
            listar_provincia(id_departamento,"vacio");
        }else{
            cadena +="<option value='NO HAY REGISTROS'></option>"
            $("#f_departamento").html(cadena);
        }
    })
}


function listar_provincia(id_departamento,id_busqueda,dds){
    $.ajax({
        url:'../control/user/control_listar_provincia.php',
        type:'POST',
        data:{
            id_departamento:id_departamento
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena = "";
        if(data.length > 0){
            for(var i = 0; i < data.length; i++){
                cadena +="<option value='" + data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#f_provincia").html(cadena);
            if(id_busqueda != "vacio"){
                $("#f_provincia").val(id_busqueda).trigger("change");
                listar_distrito(id_busqueda,dds);
            }else{
                var id_provincia = $("#f_provincia").val();
                listar_distrito(id_provincia,"vacio");
            }
        }else{
            cadena +="<option value='NO HAY REGISTROS'></option>"
            $("#f_provincia").html(cadena);
        }
    })
    
}
function listar_distrito(id_provincia,id_busquedad){
    $.ajax({
        url:'../control/user/control_listar_distrito.php',
        type:'POST',
        data:{
            id_provincia:id_provincia
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena = "";
        if(data.length > 0){
            for(var i = 0; i < data.length; i++){
                cadena +="<option value='" + data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#f_distrito").html(cadena);
            if(id_busquedad != "vacio"){
                $("#f_distrito").val(id_busquedad).trigger("change");
            }
        }else{
            cadena +="<option value='NO HAY REGISTROS'></option>"
            $("#f_distrito").html(cadena);
        }
    })
}
function buscar_paciente(){
    let dni = document.getElementById('paciente_dni').value;
    if (dni.length ==0 || dni.length !=8){
        return Swal.fire({
            icon: 'warning',
            title: 'Mensaje de Advertencia',
            text: 'Debe ingresar el DNI del paciente a buscar',
            heightAuto: false
          });
    }
    $.ajax({
        url:'../control/user/buscar_paciente_dni.php',
        type:'POST',
        data:{
            dni:dni
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        if(data.length > 0){
            Swal.fire({
                icon: 'success',
                title: 'Paciente Encontrado',
                heightAuto: false
            });
            document.getElementById("paciente_apepaterno").value = data[0][2];
            document.getElementById("paciente_apematerno").value = data[0][3];
            document.getElementById("paciente_nombres").value = data[0][1];
            document.getElementById("paciente_sexo").value = data[0][6];
            document.getElementById("paciente_edad").value = data[0][5];
            ubigeo=data[0][8];
            $("#f_tipoedad").val(data[0][11]).trigger("change");
            $("#f_requierecontacto").prop("checked", data[0][7]);
            document.getElementById("f_correo").value = data[0][9];
            document.getElementById("f_numero").value = data[0][10];
            rellenar_ubigeo(ubigeo);
            localStorage.setItem("usuario_existe", data[0][0]);

        }else{
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Paciente no Encontrado',
                heightAuto: false
              });
            localStorage.setItem("usuario_existe", "no");
        }
    })
}
function rellenar_ubigeo(cod_ubigeo){
    rellenar_ubigeo_separados(cod_ubigeo);
    rellenar_ubigeo_por_busqueda(cod_ubigeo);
}
function rellenar_ubigeo_separados(cod_ubigeo){
    dd= cod_ubigeo.slice(0,2);
    dp= cod_ubigeo.slice(0,4);
    $("#f_departamento").val(dd).trigger("change");
    listar_provincia(dd,dp,cod_ubigeo);
}
function rellenar_ubigeo_por_busqueda(cod_ubigeo){
    $("#f_ubigeo").val(cod_ubigeo).trigger("change");
}
