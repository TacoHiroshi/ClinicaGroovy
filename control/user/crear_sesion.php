<?php 
    $idusuario = htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
    $usuario = htmlspecialchars($_POST['usuario'],ENT_QUOTES,'UTF-8');
    $rol = htmlspecialchars($_POST['rol'],ENT_QUOTES,'UTF-8');
    $nrol = htmlspecialchars($_POST['nrol'],ENT_QUOTES,'UTF-8');
   
    session_start();
    $_SESSION['S_IDUSUARIO']=$idusuario;
    $_SESSION['S_USUARIO']=$usuario;
    $_SESSION['S_ROL']=$rol;
    $_SESSION['S_NROL']=$nrol;
    
?>