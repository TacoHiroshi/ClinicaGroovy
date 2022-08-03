function mandarDatos(){
    let ls_paciente_contacto;
    if (localStorage.chrequiere == 'on'){
        ls_paciente_contacto = 1;
    }else{
        ls_paciente_contacto = 0;
    }

    const       ls_dni                 = localStorage.dni,
                ls_nombre              = localStorage.nombre,
                ls_apepaterno          = localStorage.apepaterno,
                ls_apematerno          = localStorage.apematerno,
                ls_sexo                = localStorage.sexo,
                ls_edad                = localStorage.edad,
                ls_tipo_edad           = localStorage.tipodedad,
                ls_requiere_apoderado  = localStorage.requiere_apoderado,
                ls_nombre_apoderado    = localStorage.nombre_apoderado,
                ls_dni_apoderado       = localStorage.dni_apoderado,
                ls_ubigeo              = localStorage.ubigeo,
                ls_email               = localStorage.email,
                ls_celular             = localStorage.celular,
                // DATOS DEL EXAMEN 
                ls_examen_id           = localStorage.examen_id,
                ls_resultadosarray     = localStorage.resultadosarray;
                // PARA ACTUALIZAR
                ls_paciente_id         = localStorage.usuario_existe;

    // VERIFICAR SI EL USUARIO EXISTE EN LA BD
    if(localStorage.usuario_existe == "no"){
        
        // EN CASO SEA LA MINIMA INFORMACION SIN CONTACTO Y SIN APODERADO, SIN EXAMEN POR AHORA
        if(localStorage.chrequiere == '0' && localStorage.requiere_apoderado == '0'){
                $.ajax({
                url: '../control/user/control_reg_paciente_min.php',
                type: 'POST',
                data: {
                    ls_dni: ls_dni,
                    ls_nombre: ls_nombre,
                    ls_apepaterno: ls_apepaterno,
                    ls_apematerno: ls_apematerno,
                    ls_sexo: ls_sexo,
                    ls_edad: ls_edad,
                    ls_tipo_edad: ls_tipo_edad,
                    ls_requiere_apoderado: ls_requiere_apoderado,
                    // ls_nombre_apoderado: ls_nombre_apoderado,
                    // ls_dni_apoderado: ls_dni_apoderado,
                    ls_ubigeo: ls_ubigeo,
                    ls_paciente_contacto: ls_paciente_contacto,
                    // ls_email: ls_email,
                    // ls_celular: ls_celular,
                    // ls_examen_id: ls_examen_id,
                    // ls_resultadosarray: ls_resultadosarray,
                }
            }).done(function(resp){
                if(resp>0){
                    return Swal.fire("Mensaje de Confirmacion","Usuario registrado correctamente","success");

                }else{
                    Swal.fire("Mensaje de Error", "No se pudo registrar el usuario","error")
                }
            })
        // CUANDO SE REQUIERE SOLO EL CONTACTO
        }else if(localStorage.chrequiere == 'on' && localStorage.requiere_apoderado == '0'){
            $.ajax({
                url: '../control/user/control_reg_paciente_contacto.php',
                type: 'POST',
                data: {
                    ls_dni: ls_dni,
                    ls_nombre: ls_nombre,
                    ls_apepaterno: ls_apepaterno,
                    ls_apematerno: ls_apematerno,
                    ls_sexo: ls_sexo,
                    ls_edad: ls_edad,
                    ls_tipo_edad: ls_tipo_edad,
                    ls_requiere_apoderado: ls_requiere_apoderado,
                    // ls_nombre_apoderado: ls_nombre_apoderado,
                    // ls_dni_apoderado: ls_dni_apoderado,
                    ls_ubigeo: ls_ubigeo,
                    ls_paciente_contacto: ls_paciente_contacto,
                    ls_email: ls_email,
                    ls_celular: ls_celular,
                    // ls_examen_id: ls_examen_id,
                    // ls_resultadosarray: ls_resultadosarray,
                }
            }).done(function(resp){
                if(resp>0){
                    return Swal.fire("Mensaje de Confirmacion","Usuario registrado correctamente","success");

                }else{
                    Swal.fire("Mensaje de Error", "No se pudo registrar el usuario","error")
                }
            })
        // CUANDO SE REQUIERE SOLO EL APODERADO
        }else if(localStorage.requiere_apoderado == '1' && localStorage.chrequiere == '0'){
            $.ajax({
                url: '../control/user/control_reg_paciente_apoderado.php',
                type: 'POST',
                data: {
                    ls_dni: ls_dni,
                    ls_nombre: ls_nombre,
                    ls_apepaterno: ls_apepaterno,
                    ls_apematerno: ls_apematerno,
                    ls_sexo: ls_sexo,
                    ls_edad: ls_edad,
                    ls_tipo_edad: ls_tipo_edad,
                    ls_requiere_apoderado: ls_requiere_apoderado,
                    ls_nombre_apoderado: ls_nombre_apoderado,
                    ls_dni_apoderado: ls_dni_apoderado,
                    ls_ubigeo: ls_ubigeo,
                    ls_paciente_contacto: ls_paciente_contacto,
                    // ls_email: ls_email,
                    // ls_celular: ls_celular,
                    // ls_examen_id: ls_examen_id,
                    // ls_resultadosarray: ls_resultadosarray,
                }
            }).done(function(resp){
                if(resp>0){
                    return Swal.fire("Mensaje de Confirmacion","Usuario registrado correctamente","success");

                }else{
                    Swal.fire("Mensaje de Error", "No se pudo registrar el usuario","error")
                }
            })
        // CUANDO SE REQUIERE SOLO CONTACTO Y APODERADO
        }else if(localStorage.chrequiere == 'on' && localStorage.requiere_apoderado == '1'){
            $.ajax({
                url: '../control/user/control_reg_paciente_contayapo.php',
                type: 'POST',
                data: {
                    ls_dni: ls_dni,
                    ls_nombre: ls_nombre,
                    ls_apepaterno: ls_apepaterno,
                    ls_apematerno: ls_apematerno,
                    ls_sexo: ls_sexo,
                    ls_edad: ls_edad,
                    ls_tipo_edad: ls_tipo_edad,
                    ls_requiere_apoderado: ls_requiere_apoderado,
                    ls_nombre_apoderado: ls_nombre_apoderado,
                    ls_dni_apoderado: ls_dni_apoderado,
                    ls_ubigeo: ls_ubigeo,
                    ls_paciente_contacto: ls_paciente_contacto,
                    ls_email: ls_email,
                    ls_celular: ls_celular,
                    // ls_examen_id: ls_examen_id,
                    // ls_resultadosarray: ls_resultadosarray,
                }
            }).done(function(resp){
                if(resp>0){
                    return Swal.fire("Mensaje de Confirmacion","Usuario registrado correctamente","success");

                }else{
                    Swal.fire("Mensaje de Error", "No se pudo registrar el usuario","error")
                }
            })
        }

        /* $.ajax({
            url: '../control/user/control_reg_paciente_completo.php',
            type: 'POST',
            data: {
                ls_dni: ls_dni,
                ls_nombre: ls_nombre,
                ls_apepaterno: ls_apepaterno,
                ls_apematerno: ls_apematerno,
                ls_sexo: ls_sexo,
                ls_edad: ls_edad,
                ls_tipo_edad: ls_tipo_edad,
                ls_requiere_apoderado: ls_requiere_apoderado,
                ls_nombre_apoderado: ls_nombre_apoderado,
                ls_dni_apoderado: ls_dni_apoderado,
                ls_ubigeo: ls_ubigeo,
                ls_paciente_contacto: ls_paciente_contacto,
                ls_email: ls_email,
                ls_celular: ls_celular,
                ls_examen_id: ls_examen_id,
                ls_resultadosarray: ls_resultadosarray,
            }
        }).done(function(resp){
            if(resp>0){
                return Swal.fire("Mensaje de Confirmacion","Usuario registrado correctamente","success");

            }else{
                Swal.fire("Mensaje de Error", "No se pudo registrar el usuario","error")
            }
        }) */



// PARA ACTUALIZAR EL PACIENTE SI EL USUARIO NO EXISTE
    }else{
        // PARA ACTUALIZAR
        // EN CASO SEA LA MINIMA INFORMACION SIN CONTACTO Y SIN APODERADO, SIN EXAMEN POR AHORA
        if(localStorage.chrequiere == '0' && localStorage.requiere_apoderado == '0'){
                $.ajax({
                url: '../control/user/control_act_reg_paciente_min.php',
                type: 'POST',
                data: {
                    ls_paciente_id: ls_paciente_id,
                    ls_dni: ls_dni,
                    ls_nombre: ls_nombre,
                    ls_apepaterno: ls_apepaterno,
                    ls_apematerno: ls_apematerno,
                    ls_sexo: ls_sexo,
                    ls_edad: ls_edad,
                    ls_tipo_edad: ls_tipo_edad,
                    ls_requiere_apoderado: ls_requiere_apoderado,
                    // ls_nombre_apoderado: ls_nombre_apoderado,
                    // ls_dni_apoderado: ls_dni_apoderado,
                    ls_ubigeo: ls_ubigeo,
                    ls_paciente_contacto: ls_paciente_contacto,
                    // ls_email: ls_email,
                    // ls_celular: ls_celular,
                    // ls_examen_id: ls_examen_id,
                    // ls_resultadosarray: ls_resultadosarray,
                }
            }).done(function(resp){
                if(resp>0){
                    return Swal.fire("Mensaje de Confirmacion","Usuario Actualizado Correctamente","success");

                }else{
                    Swal.fire("Mensaje de Error", "No se pudo actualizar el usuario","error")
                }
            })
        // CUANDO SE REQUIERE SOLO EL CONTACTO
        }else if(localStorage.chrequiere == 'on' && localStorage.requiere_apoderado == '0'){
            $.ajax({
                url: '../control/user/control_act_reg_paciente_contacto.php',
                type: 'POST',
                data: {
                    ls_paciente_id: ls_paciente_id,
                    ls_dni: ls_dni,
                    ls_nombre: ls_nombre,
                    ls_apepaterno: ls_apepaterno,
                    ls_apematerno: ls_apematerno,
                    ls_sexo: ls_sexo,
                    ls_edad: ls_edad,
                    ls_tipo_edad: ls_tipo_edad,
                    ls_requiere_apoderado: ls_requiere_apoderado,
                    // ls_nombre_apoderado: ls_nombre_apoderado,
                    // ls_dni_apoderado: ls_dni_apoderado,
                    ls_ubigeo: ls_ubigeo,
                    ls_paciente_contacto: ls_paciente_contacto,
                    ls_email: ls_email,
                    ls_celular: ls_celular,
                    // ls_examen_id: ls_examen_id,
                    // ls_resultadosarray: ls_resultadosarray,
                }
            }).done(function(resp){
                if(resp>0){
                    return Swal.fire("Mensaje de Confirmacion","Usuario Actualizado Correctamente","success");

                }else{
                    Swal.fire("Mensaje de Error", "No se pudo actualizar el usuario","error")
                }
            })
        // CUANDO SE REQUIERE SOLO EL APODERADO
        }else if(localStorage.requiere_apoderado == '1' && localStorage.chrequiere == '0'){
            $.ajax({
                url: '../control/user/control_act_reg_paciente_apoderado.php',
                type: 'POST',
                data: {
                    ls_paciente_id: ls_paciente_id,
                    ls_dni: ls_dni,
                    ls_nombre: ls_nombre,
                    ls_apepaterno: ls_apepaterno,
                    ls_apematerno: ls_apematerno,
                    ls_sexo: ls_sexo,
                    ls_edad: ls_edad,
                    ls_tipo_edad: ls_tipo_edad,
                    ls_requiere_apoderado: ls_requiere_apoderado,
                    ls_nombre_apoderado: ls_nombre_apoderado,
                    ls_dni_apoderado: ls_dni_apoderado,
                    ls_ubigeo: ls_ubigeo,
                    ls_paciente_contacto: ls_paciente_contacto,
                    // ls_email: ls_email,
                    // ls_celular: ls_celular,
                    // ls_examen_id: ls_examen_id,
                    // ls_resultadosarray: ls_resultadosarray,
                }
            }).done(function(resp){
                if(resp>0){
                    return Swal.fire("Mensaje de Confirmacion","Usuario Actualizado Correctamente","success");

                }else{
                    Swal.fire("Mensaje de Error", "No se pudo actualizar el usuario","error")
                }
            })
        // CUANDO SE REQUIERE SOLO CONTACTO Y APODERADO
        }else if(localStorage.chrequiere == 'on' && localStorage.requiere_apoderado == '1'){
            $.ajax({
                url: '../control/user/control_act_reg_paciente_contayapo.php',
                type: 'POST',
                data: {
                    ls_paciente_id: ls_paciente_id,
                    ls_dni: ls_dni,
                    ls_nombre: ls_nombre,
                    ls_apepaterno: ls_apepaterno,
                    ls_apematerno: ls_apematerno,
                    ls_sexo: ls_sexo,
                    ls_edad: ls_edad,
                    ls_tipo_edad: ls_tipo_edad,
                    ls_requiere_apoderado: ls_requiere_apoderado,
                    ls_nombre_apoderado: ls_nombre_apoderado,
                    ls_dni_apoderado: ls_dni_apoderado,
                    ls_ubigeo: ls_ubigeo,
                    ls_paciente_contacto: ls_paciente_contacto,
                    ls_email: ls_email,
                    ls_celular: ls_celular,
                    // ls_examen_id: ls_examen_id,
                    // ls_resultadosarray: ls_resultadosarray,
                }
            }).done(function(resp){
                if(resp>0){
                    return Swal.fire("Mensaje de Confirmacion","Usuario Actualizado (Contacto y Apoderado) Correctamente","success");

                }else{
                    Swal.fire("Mensaje de Error", "No se pudo actualizar el usuario","error")
                }
            })
        }
    }
    
}
