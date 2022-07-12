<?php
    require_once '../../modelo/modelo_ubigeo.php';
    $MU = new Modelo_Ubigeo();
    
    $consulta = $MU->listar_departamentos();
    echo json_encode($consulta);

?>