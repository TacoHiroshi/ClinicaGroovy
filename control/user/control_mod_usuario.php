<?php
    require '../../modelo/modelo_login_usuario.php';
    $MU = new Modelo_Usuario();
    $id = htmlspecialchars($_POST['u'],ENT_QUOTES,'UTF-8');
    $email = htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');
    $rol = htmlspecialchars($_POST['r'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->modificar_usuario($id,$email,$rol);
    echo json_encode($consulta);
    
?>