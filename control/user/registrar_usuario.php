<?php
    require '../../modelo/modelo_login_usuario.php';
    $MU = new Modelo_Usuario();
    $usuario = htmlspecialchars($_POST['u'],ENT_QUOTES,'UTF-8');
    $contra = password_hash($_POST['c'],PASSWORD_DEFAULT,['cost'=>12]);
    $email = htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');
    $rol = htmlspecialchars($_POST['r'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->registrarusuario($usuario,$contra,$email,$rol);
    echo json_encode($consulta);
    
?>