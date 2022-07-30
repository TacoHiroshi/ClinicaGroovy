
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
            for (var i = 0; i < data.length; i++) { 
                $('#columna_campos_examen').append(
                    '<div class="row mt-1"><label for="inputEmail3" class="col-sm-5 col-form-label text-right">'+data[i][0]+'</label>'+
                        '<div class="col-sm-4">'+
                            '<input type="text" class="form-control" id="campos_de_examen"></div><div class="col-sm-3"><p>'+data[i][1]+'</p></div></div'
                );
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
let resultadosjuntos= [];
function rellenado(){
    let inputs_examen  = document.querySelectorAll("#campos_de_examen");
    alert(inputs_examen.length);
    for (var i = 0; i < inputs_examen.length; i++) { 
        resultadosjuntos.push(inputs_examen[i].value);
     }
    cargar_contenido('contenido_principal','../vista/examenes/ex_impresion.php');
}
function rellenar_datos_pdf(){
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
    $("#re_edad").text(localStorage.edad);


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
            for (var i = 0; i < data.length; i++) { 
                $('#resultados').append(
                    '<tr>'+'<td>'+data[i][0]+'</td>'+
                    '<td>'+resultadosjuntos[i]+'</td>'+
                    '<td>'+data[i][1]+'</td>'+
                    '<td>'+data[i][2]+'</td>'+'</tr>'
                );
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