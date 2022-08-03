<?php
    require_once '../../modelo/modelo_paciente.php';
    $MPA = new Modelo_Paciente_Completo();
    $ls_dni = strtoupper(htmlspecialchars($_POST['ls_dni'],ENT_QUOTES, 'UTF-8'));
    $ls_nombre = strtoupper(htmlspecialchars($_POST['ls_nombre'],ENT_QUOTES, 'UTF-8'));
    $ls_apepaterno = strtoupper(htmlspecialchars($_POST['ls_apepaterno'],ENT_QUOTES, 'UTF-8'));
    $ls_apematerno = strtoupper(htmlspecialchars($_POST['ls_apematerno'],ENT_QUOTES, 'UTF-8'));
    $ls_sexo = strtoupper(htmlspecialchars($_POST['ls_sexo'],ENT_QUOTES, 'UTF-8'));
    $ls_edad = strtoupper(htmlspecialchars($_POST['ls_edad'],ENT_QUOTES, 'UTF-8'));
    $ls_tipo_edad = strtoupper(htmlspecialchars($_POST['ls_tipo_edad'],ENT_QUOTES, 'UTF-8'));
    $ls_requiere_apoderado = strtoupper(htmlspecialchars($_POST['ls_requiere_apoderado'],ENT_QUOTES, 'UTF-8'));
    $ls_nombre_apoderado = strtoupper(htmlspecialchars($_POST['ls_nombre_apoderado'],ENT_QUOTES, 'UTF-8'));
    $ls_dni_apoderado = strtoupper(htmlspecialchars($_POST['ls_dni_apoderado'],ENT_QUOTES, 'UTF-8'));
    $ls_ubigeo = strtoupper(htmlspecialchars($_POST['ls_ubigeo'],ENT_QUOTES, 'UTF-8'));
    $ls_paciente_contacto = strtoupper(htmlspecialchars($_POST['ls_paciente_contacto'],ENT_QUOTES, 'UTF-8'));
    $ls_email = strtoupper(htmlspecialchars($_POST['ls_email'],ENT_QUOTES, 'UTF-8'));
    $ls_celular = strtoupper(htmlspecialchars($_POST['ls_celular'],ENT_QUOTES, 'UTF-8'));
    $ls_examen_id = strtoupper(htmlspecialchars($_POST['ls_examen_id'],ENT_QUOTES, 'UTF-8'));
    $ls_resultadosarray = strtoupper(htmlspecialchars($_POST['ls_resultadosarray'],ENT_QUOTES, 'UTF-8'));

    $consulta = $MPA->mandarDatos($ls_dni,$ls_nombre,$ls_apepaterno,$ls_apematerno,$ls_sexo,$ls_edad,$ls_tipo_edad,
    $ls_requiere_apoderado,$ls_nombre_apoderado,$ls_dni_apoderado,$ls_ubigeo,$ls_paciente_contacto,$ls_email,$ls_celular,
    $ls_examen_id, $ls_resultadosarray);
    echo $consulta;
?>