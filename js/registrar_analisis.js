function borrar_examenes(){
    localStorage.setItem("examenes_agregados", "[]");
}
function Registrar_Analisis(){
    const   ls_examen_id = localStorage.examen_id,
            ls_resultado_valores = JSON.stringify(localStorage.getItem('resultadosarray')),
            ls_resultado_adicionales = JSON.stringify(localStorage.getItem('examenes_agregados')),
            ls_paciente_id = localStorage.usuario_existe,
            ss_id_usuario = sessionStorage.id_usuario;

    const date = new Date();
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const fullYear = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const seconds = date.getSeconds();

    let campos = document.getElementById("campos_de_examen").value;
    if(campos.length != 0){
        $.ajax({
                url: '../control/user/control_registrar_analisis.php',
                type: 'POST',
                data: {
                    ls_paciente_id: ls_paciente_id,
                    ss_id_usuario: ss_id_usuario,
                    resultado_fregistro: fullYear+'-'+month+'-'+day,
                    ls_examen_id: ls_examen_id,
                    ls_resultado_valores: ls_resultado_valores,
                    ls_resultado_adicionales: ls_resultado_adicionales,
                    ls_resultado_fhora: hours+':'+minutes+':'+seconds,
                    ls_resultados_examen_adicionales: ls_resultado_valores,
                }
            }).done(function(resp){
                if(resp>0){
                    return Swal.fire("Mensaje de Confirmacion","Análisis registrado correctamente","success");

                }else{
                    Swal.fire("Mensaje de Error", "No se pudo registrar el análisis","error")
                }
            })

    }
}

