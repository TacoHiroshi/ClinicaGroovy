<?php
    require_once 'modelo_conexion.php';

    class Modelo_Buscador_Paciente extends conexionBD{

        public function BuscaPaciente($dni){
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_BUSCAR_PACIENTE(?)";
            $arreglo = array();
            $query = $c->prepare($sql);
            $query->bindParam(1,$dni);
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