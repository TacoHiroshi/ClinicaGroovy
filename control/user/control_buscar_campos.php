<?php
    require_once '../../modelo/modelo_examenes.php';
    $MU = new Modelo_Buscador_Examenes();
    $id_examen = htmlspecialchars($_POST['id_examen'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->BuscaCampos($id_examen);
     echo json_encode($consulta);
?>