<?php
    require_once 'modelo_conexion.php';

    class Modelo_Buscador_Examenes extends conexionBD{

        public function BuscaCampos($id_examen){
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_BUSCAR_CAMPOS(?)";
            $arreglo = array();
            $query = $c->prepare($sql);
            $query->bindParam(1,$id_examen);
            $query->execute();
            $resultado = $query->fetchAll();

            foreach($resultado as $resp){
                $arreglo[] = $resp;
            }

            return $arreglo;

            conexionBD::cerrar_conexion();
        }
    }
?>