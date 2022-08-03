<?php
    require_once '../../modelo/modelo_listar_analisis.php';
    $MU = new Modelo_listar_Analisis();
    $id_analisis= $_POST['id_analisis'];
    $consulta = $MU->listar_examenes($id_analisis);
    echo json_encode($consulta);
?>