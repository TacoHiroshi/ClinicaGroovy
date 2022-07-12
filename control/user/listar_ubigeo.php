<?php
    require_once '../../modelo/modelo_nuevo_ubigeo.php';
    $MU = new Modelo_nuevo_Ubigeo();
    
    $consulta = $MU->listar_ubigeo();
    echo json_encode($consulta);

?>