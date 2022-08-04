<?php
    require_once '../../modelo/modelo_registrar_analisis.php';
    $MRA = new Modelo_Registrar_Analisis();
    $ls_paciente_id = htmlspecialchars($_POST['ls_paciente_id'],ENT_QUOTES, 'UTF-8');
    $ss_id_usuario = htmlspecialchars($_POST['ss_id_usuario'],ENT_QUOTES, 'UTF-8');
    $resultado_fregistro = htmlspecialchars($_POST['resultado_fregistro'],ENT_QUOTES, 'UTF-8');
    $ls_examen_id = $_POST['ls_examen_id'];
    $ls_resultado_valores = $_POST['ls_resultado_valores'];
    $ls_resultado_adicionales = $_POST['ls_resultado_adicionales'];
    $ls_resultado_fhora = $_POST['ls_resultado_fhora'];
    $ls_resultados_examen_adicionales = $_POST['ls_resultados_examen_adicionales'];

    $consulta = $MRA->Registrar_Analisis($ls_paciente_id,$ss_id_usuario,$resultado_fregistro,$ls_examen_id,
    $ls_resultado_valores,$ls_resultado_adicionales,$ls_resultado_fhora,$ls_resultados_examen_adicionales);
    echo json_encode($consulta);
?>