function buscar_campos(){
    //let dni = document.getElementById('paciente_dni').value;
    let id_examen = localStorage.examen_id;
    $.ajax({
        url:'../control/user/control_buscar_campos.php',
        type:'POST',
        data:{
            id_examen:id_examen
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        if(data.length > 0){
            if ($('#columna_campos_examen').children().length == 0) {
                
            for (var i = 0; i < data.length; i++) { 
                $('#columna_campos_examen').append(
                    '<div class="row mt-1"><label for="inputEmail3" class="col-sm-5 col-form-label text-right">'+data[i][0]+'</label>'+
                        '<div class="col-sm-4">'+
                            '<input type="text" class="form-control" id="campos_de_examen"></div><div class="col-sm-3"><p>'+data[i][1]+'</p></div></div'
                );
             }
            }

        }else{
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Examen no Encontrado',
                heightAuto: false
              });
        }
    })
}
function agregar_campos(){
    let id_examen = document.getElementById('f_examen').value;
    var carga_localstorage = JSON.parse(localStorage.getItem('examenes_agregados'));
    $.ajax({
        url:'../control/user/control_buscar_campos.php',
        type:'POST',
        data:{
            id_examen:id_examen
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        if(data.length > 0){
            if ($('#columna_agregar_campos_examen').children().length < 7) {
                carga_localstorage.push(id_examen);
                localStorage.setItem('examenes_agregados',JSON.stringify(carga_localstorage));    
            for (var i = 0; i < data.length; i++) { 
                $('#columna_agregar_campos_examen').append(
                    '<div class="row mt-1"><label for="inputEmail3" class="col-sm-5 col-form-label text-right">'+data[i][0]+'</label>'+
                        '<div class="col-sm-4">'+
                            '<input type="text" class="form-control" id="campos_de_examen"></div><div class="col-sm-3"><p>'+data[i][1]+'</p></div></div'
                );
             }
            }
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Examen no Encontrado',
                heightAuto: false
              });
        }
    })
}
function listar_analisis(){
    $.ajax({
        url:'../control/user/control_listar_analisis.php',
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena = "";
        if(data.length > 0){
            for(var i = 0; i < data.length; i++){
                cadena +="<option value='" + data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#f_analisis").html(cadena);
            $("#f_analisis").val("0").trigger("change");
            var id_analisis = $("#f_analisis").val();
            listar_examen(id_analisis);
        }else{
            cadena +="<option value='NO HAY REGISTROS'></option>"
            $("#f_analisis").html(cadena);
        }
    })
}
function listar_examen(id_analisis){
    $.ajax({
        url:'../control/user/control_listar_examenes.php',
        type:'POST',
        data:{
            id_analisis:id_analisis
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena = "";
        if(data.length > 0){
            for(var i = 0; i < data.length; i++){
                cadena +="<option value='" + data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#f_examen").html(cadena);
        }else{
            cadena +="<option value='NO HAY REGISTROS'></option>"
            $("#f_examen").html(cadena);
        }
    })
    
}
function rellenado(){
    let inputs_examen  = document.querySelectorAll("#campos_de_examen");
    let resultadosjuntitos= [];
    for (var i = 0; i < inputs_examen.length; i++) { 
        resultadosjuntitos.push(inputs_examen[i].value);
     }
     localStorage.setItem('resultadosarray',JSON.stringify(resultadosjuntitos));

    cargar_contenido('contenido_principal','../vista/examenes/ex_impresion.php');
}
function rellenar_datos_pdf(){
    
    let resultadosjuntos= JSON.parse(localStorage.getItem('resultadosarray'));
    // Instanciamos el objeto Date, usando la palabra reservada new, en la constante date.
    const date = new Date();
    // Asignamos los valores que obtenemos de cada método en constantes.
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const fullYear = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const seconds = date.getSeconds();

    $("#re_paciente").text(localStorage.apepaterno+" "+localStorage.apematerno+", "+localStorage.nombre);
    $("#re_sexo").text(localStorage.sexo);
    $("#re_dni").text(localStorage.dni);
    $("#re_fecha").text(day+"/"+month+"/"+fullYear);
    $("#re_hora").text(hours+":"+minutes+":"+seconds);
    var tipo_edad_letras = "Años";
    if(localStorage.tipodedad == "2"){
        var tipo_edad_letras = "Meses";
    }
    if(localStorage.tipodedad == "3"){
        var tipo_edad_letras = "Dias";
    }
    $("#re_edad").text(localStorage.edad+' '+tipo_edad_letras);


    let id_examen = localStorage.examen_id;
    let descarga_localstorage = JSON.parse(localStorage.getItem('examenes_agregados'));
    $.ajax({
        url:'../control/user/control_buscar_campos.php',
        type:'POST',
        data:{
            id_examen:id_examen
        }
    }).done(function(resp){
        var data = JSON.parse(resp);
        if(data.length > 0){
            for (var i = 0; i < data.length; i++) { 
                if(resultadosjuntos[i].length>0){
                    $('#resultados').append(
                        '<tr>'+'<td>'+data[i][0]+'</td>'+
                        '<td>'+resultadosjuntos[i]+'</td>'+
                        '<td>'+data[i][1]+'</td>'+
                        '<td>'+data[i][2]+'</td>'+'</tr>'
                    );
                }
             }
             if(descarga_localstorage.length>0){
                rellenar_datos_agregados_pdf(data.length);
            }
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Datos no capturados',
                heightAuto: false
              });
        }
    })
}
function rellenar_datos_agregados_pdf(indice){
    
    let resultadosjuntos= JSON.parse(localStorage.getItem('resultadosarray'));
    let descarga_localstorage = JSON.parse(localStorage.getItem('examenes_agregados'));
    
    for (var j = 0; j < descarga_localstorage.length; j++) { 
        
    let id_examen = descarga_localstorage[j];
        $.ajax({
            url:'../control/user/control_buscar_campos.php',
            type:'POST',
            data:{
                id_examen:id_examen
            }
        }).done(function(resp){
            var data = JSON.parse(resp);
            if(data.length > 0){
                for (var i = 0; i < data.length; i++) { 
                    if(resultadosjuntos[indice].length>0){
                        $('#resultados').append(
                            '<tr>'+'<td>'+data[i][0]+'</td>'+
                            '<td>'+resultadosjuntos[indice]+'</td>'+
                            '<td>'+data[i][1]+'</td>'+
                            '<td>'+data[i][2]+'</td>'+'</tr>'
                        );
                    }
                    indice++;
                 }
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Datos no capturados',
                    heightAuto: false
                  });
            }
        })
    }   
}