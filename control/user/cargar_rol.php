<?php
    require '../../modelo/modelo_login_usuario.php';
    $MU = new Modelo_Usuario();
    $consulta = $MU->listar_rol();
    echo json_encode($consulta);
    
?>