<?php
    require_once 'modelo_conexion.php';

    class Modelo_Registrar_Analisis extends conexionBD{

        public function Registrar_Analisis($ls_paciente_id,$ss_id_usuario,$resultado_fregistro,$ls_examen_id,
        $ls_resultado_valores,$ls_resultado_adicionales,$ls_resultado_fhora,$ls_resultados_examen_adicionales){
            
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_REGISTRAR_ANALISIS(?,?,?,?,?,?,?,?)";
            $query = $c->prepare($sql);
            $query->bindParam(1,$ls_paciente_id);
            $query->bindParam(2,$ss_id_usuario);
            $query->bindParam(3,$resultado_fregistro);
            $query->bindParam(4,$ls_examen_id);
            $query->bindParam(5,$ls_resultado_valores);
            $query->bindParam(6,$ls_resultado_adicionales);
            $query->bindParam(7,$ls_resultado_fhora);
            $query->bindParam(8,$ls_resultados_examen_adicionales);
            $resultado = $query->execute();
                     
            if($resultado){
                return 1;
            }else{
                return 0;
            }

            conexionBD::cerrar_conexion();
        }
    }
?>