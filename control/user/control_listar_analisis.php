<?php
    require_once '../../modelo/modelo_listar_analisis.php';
    $MU = new Modelo_listar_Analisis();
    
    $consulta = $MU->listar_analisis();
    echo json_encode($consulta);

?>