<?php
    require_once 'modelo_conexion.php';
    class Modelo_nuevo_Ubigeo extends conexionBD{
        public function listar_ubigeo(){
            $c = conexionBD::conexionPDO();

            $sql = "call SP_LISTAR_UBIGEO";
            $arreglo = array();
            $query = $c->prepare($sql);
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