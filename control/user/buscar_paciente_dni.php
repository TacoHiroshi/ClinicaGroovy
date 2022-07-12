<?php
    require_once '../../modelo/buscador_paciente.php';
    $MU = new Modelo_Buscador_Paciente();
    $dni = htmlspecialchars($_POST['dni'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->BuscaPaciente($dni);
     echo json_encode($consulta);
?>