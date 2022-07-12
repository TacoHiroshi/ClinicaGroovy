<?php
    require_once 'modelo_conexion.php';
    class Modelo_Ubigeo extends conexionBD{
        public function listar_departamentos(){
            $c = conexionBD::conexionPDO();

            $sql = "call SP_LISTAR_DEPARTAMENTO";
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
         public function listar_provincias($id_departamento){
            $c = conexionBD::conexionPDO();

            $sql = "call SP_LISTAR_PROVINCIA('$id_departamento')";
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
         
         public function listar_distritos($id_provincia){
            $c = conexionBD::conexionPDO();

            $sql = "call SP_LISTAR_DISTRITO('$id_provincia')";
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