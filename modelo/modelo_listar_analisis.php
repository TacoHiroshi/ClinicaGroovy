<?php
    require_once 'modelo_conexion.php';
    class Modelo_listar_Analisis extends conexionBD{
        public function listar_analisis(){
            $c = conexionBD::conexionPDO();

            $sql = "call SP_LISTAR_ANALISIS";
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
         public function listar_examenes($id_analisis){
            $c = conexionBD::conexionPDO();

            $sql = "call SP_LISTAR_EXAMENES('$id_analisis')";
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