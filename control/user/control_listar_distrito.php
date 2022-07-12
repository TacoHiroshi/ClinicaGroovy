<?php
    require_once '../../modelo/modelo_ubigeo.php';
    $MU = new Modelo_Ubigeo();
    $id_provincia= $_POST['id_provincia'];
    $consulta = $MU->listar_distritos($id_provincia);
    echo json_encode($consulta);
?>