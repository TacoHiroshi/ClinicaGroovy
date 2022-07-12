<?php
    require_once '../../modelo/modelo_ubigeo.php';
    $MU = new Modelo_Ubigeo();
    $id_departamento= $_POST['id_departamento'];
    $consulta = $MU->listar_provincias($id_departamento);
    echo json_encode($consulta);
?>