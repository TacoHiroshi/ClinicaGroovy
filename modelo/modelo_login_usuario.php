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
        public function listar_usuario(){
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_LISTAR_USUARIO()";
            $arreglo = array();
            $query = $c->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado as $resp){
                    $arreglo["data"][] = $resp;
            }

            return $arreglo;

            conexionBD::cerrar_conexion();
        }
        public function listar_rol(){
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_LISTAR_ROL()";
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

        public function registrarusuario($usuario,$contra,$email,$rol,$ap_paterno,$ap_materno,$dni,$celular){
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_REGISTRAR_USUARIO(?,?,?,?,?,?,?,?)";
            $arreglo = array();
            $query = $c->prepare($sql);
            $query->bindParam(1,$usuario);
            $query->bindParam(2,$contra);
            $query->bindParam(3,$email);
            $query->bindParam(4,$rol);
            $query->bindParam(5,$ap_paterno);
            $query->bindParam(6,$ap_materno);
            $query->bindParam(7,$dni);
            $query->bindParam(8,$celular);
            
            $resultado = $query->execute();
            if($row = $query->fetchColumn()){
                return $row;
            }
            
            /*if($resultado){
                return 1;
            }else{
                return 0;
            }
            return $arreglo;
*/
            conexionBD::cerrar_conexion();
        }

        public function modificar_usuario($id,$email,$rol){
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_MODIFICAR_USUARIO(?,?,?)";
            $arreglo = array();
            $query = $c->prepare($sql);
            $query->bindParam(1,$id);
            $query->bindParam(2,$email);
            $query->bindParam(3,$rol);
            $resultado = $query->execute();
                     
            if($resultado){
                return 1;
            }else{
                return 0;
            }
            

            conexionBD::cerrar_conexion();
        }

        public function modificar_usuario_estatus($id,$estatus){
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_MODIFICAR_USUARIO_ESTATUS(?,?)";
            $arreglo = array();
            $query = $c->prepare($sql);
            $query->bindParam(1,$id);
            $query->bindParam(2,$estatus);
            $resultado = $query->execute();
                     
            if($resultado){
                return 1;
            }else{
                return 0;
            }
            

            conexionBD::cerrar_conexion();
        }
        
        public function modificar_usuario_contra($id,$contra){
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_MODIFICAR_USUARIO_CONTRA(?,?)";
            $arreglo = array();
            $query = $c->prepare($sql);
            $query->bindParam(1,$id);
            $query->bindParam(2,$contra);
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