<?php
    require '../../modelo/modelo_login_usuario.php';
    $MU = new Modelo_Usuario();

    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $contra = password_hash($_POST['contranueva'],PASSWORD_DEFAULT,['cost'=>12]);
    
    $consulta = $MU->modificar_usuario_contra($id,$contra);

    echo json_encode($consulta);
    
?>