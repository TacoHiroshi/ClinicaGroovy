<?php
    require '../../modelo/modelo_login_usuario.php';
    $MU = new Modelo_Usuario();

    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->modificar_usuario_estatus($id,$estatus);

    echo json_encode($consulta);
    
?>