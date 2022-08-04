function rellenar_datos_guardados_pdf(){
    
    let resultadosjuntos= JSON.parse(localStorage.getItem('resultadosarray'));
    $("#re_paciente").text(localStorage.apepaterno+" "+localStorage.apematerno+", "+localStorage.nombre);
    $("#re_sexo").text(localStorage.sexo);
    $("#re_dni").text(localStorage.dni);
    $("#re_fecha").text(localStorage.fecha_examen);
    $("#re_hora").text(localStorage.hora_examen);
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
                rellenar_guardados_agregados_pdf(data.length);
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
function rellenar_guardados_agregados_pdf(indice){
    
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