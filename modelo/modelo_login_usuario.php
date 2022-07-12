<?php
    require_once 'modelo_conexion.php';

    class Modelo_Usuario extends conexionBD{

        public function VerificarUsuario($usuario,$password){
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_VERIFICAR_USUARIO(?)";
            $arreglo = array();
            $query = $c->prepare($sql);
            $query->bindParam(1,$usuario);
            $query->execute();
            $resultado = $query->fetchAll();

            foreach($resultado as $resp){
                if(password_verify($password,$resp['usu_contrasena'])){
                    $arreglo[] = $resp;
                }
            }

            return $arreglo;

            conexionBD::cerrar_conexion();
        }
    }
?>