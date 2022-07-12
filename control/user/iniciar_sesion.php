<?php
    require '../../modelo/modelo_login_usuario.php';

    $Model_usu = new Modelo_Usuario();
    $usu = htmlspecialchars($_POST['u'],ENT_QUOTES,'UTF-8');
    $pass = htmlspecialchars($_POST['p'],ENT_QUOTES,'UTF-8');
    $consulta = $Model_usu->VerificarUsuario($usu,$pass);
   
    if(count($consulta) > 0){
        echo json_encode($consulta);
    }else{
        echo 0;
    }
?>