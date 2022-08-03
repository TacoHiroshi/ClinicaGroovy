<?php
    require_once 'modelo_conexion.php';

    // PACIENTE CON DATOS COMPLETOS
    class Modelo_Paciente_Completo extends conexionBD{

        public function mandarDatos($ls_dni,$ls_nombre,$ls_apepaterno,$ls_apematerno,$ls_sexo,$ls_edad,$ls_tipo_edad,
        $ls_requiere_apoderado,$ls_nombre_apoderado,$ls_dni_apoderado,$ls_ubigeo,$ls_paciente_contacto,$ls_email,$ls_celular,
        $ls_examen_id, $ls_resultadosarray){
            
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_REGISTRAR_PACIENTE_COMPLETO(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query = $c->prepare($sql);
            $query->bindParam(1,$ls_dni);
            $query->bindParam(2,$ls_nombre);
            $query->bindParam(3,$ls_apepaterno);
            $query->bindParam(4,$ls_apematerno);
            $query->bindParam(5,$ls_sexo);
            $query->bindParam(6,$ls_edad);
            $query->bindParam(7,$ls_tipo_edad);
            $query->bindParam(8,$ls_requiere_apoderado);
            $query->bindParam(9,$ls_nombre_apoderado);
            $query->bindParam(10,$ls_dni_apoderado);
            $query->bindParam(11,$ls_ubigeo);
            $query->bindParam(12,$ls_paciente_contacto);
            $query->bindParam(13,$ls_email);
            $query->bindParam(14,$ls_celular);
            $query->bindParam(15,$ls_examen_id);
            $query->bindParam(16,$ls_resultadosarray);
            $resultado = $query->execute();
                     
            if($resultado){
                return 1;
            }else{
                return 0;
            }

            conexionBD::cerrar_conexion();
        }
    }

    // PACIENTE CON LOS MINIMOS DATOS
    class Modelo_Paciente_Min_Actualizar extends conexionBD{

        public function mandarDatos($ls_paciente_id,$ls_dni,$ls_nombre,$ls_apepaterno,$ls_apematerno,$ls_sexo,$ls_edad,$ls_tipo_edad,
        $ls_requiere_apoderado,$ls_ubigeo,$ls_paciente_contacto){
            
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_REGISTRAR_PACIENTE_MIN_ACTUALIZAR(?,?,?,?,?,?,?,?,?,?,?)";
            $query = $c->prepare($sql);
            $query->bindParam(1,$ls_paciente_id);
            $query->bindParam(2,$ls_dni);
            $query->bindParam(3,$ls_nombre);
            $query->bindParam(4,$ls_apepaterno);
            $query->bindParam(5,$ls_apematerno);
            $query->bindParam(6,$ls_sexo);
            $query->bindParam(7,$ls_edad);
            $query->bindParam(8,$ls_tipo_edad);
            $query->bindParam(9,$ls_requiere_apoderado);
            $query->bindParam(10,$ls_ubigeo);
            $query->bindParam(11,$ls_paciente_contacto);
            // $query->bindParam(15,$ls_examen_id);
            // $query->bindParam(16,$ls_resultadosarray);
            $resultado = $query->execute();
                     
            if($resultado){
                return 1;
            }else{
                return 0;
            }

            conexionBD::cerrar_conexion();
        }
    }

    // PACIENTE CON SOLO CAMPO CONTACTO
    class Modelo_Paciente_Contacto_Actualizar extends conexionBD{

        public function mandarDatos($ls_paciente_id,$ls_dni,$ls_nombre,$ls_apepaterno,$ls_apematerno,$ls_sexo,$ls_edad,$ls_tipo_edad,
        $ls_requiere_apoderado,$ls_ubigeo,$ls_paciente_contacto,$ls_email,$ls_celular){
            
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_REGISTRAR_PACIENTE_CONTACTO_ACTUALIZAR(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query = $c->prepare($sql);
            $query->bindParam(1,$ls_paciente_id);
            $query->bindParam(2,$ls_dni);
            $query->bindParam(3,$ls_nombre);
            $query->bindParam(4,$ls_apepaterno);
            $query->bindParam(5,$ls_apematerno);
            $query->bindParam(6,$ls_sexo);
            $query->bindParam(7,$ls_edad);
            $query->bindParam(8,$ls_tipo_edad);
            $query->bindParam(9,$ls_requiere_apoderado);
            $query->bindParam(10,$ls_ubigeo);
            $query->bindParam(11,$ls_paciente_contacto);
            $query->bindParam(12,$ls_email);
            $query->bindParam(13,$ls_celular);
            // $query->bindParam(15,$ls_examen_id);
            // $query->bindParam(16,$ls_resultadosarray);
            $resultado = $query->execute();
                     
            if($resultado){
                return 1;
            }else{
                return 0;
            }

            conexionBD::cerrar_conexion();
        }
    }

    // PACIENTE CON SOLO CAMPO APODERADO
    class Modelo_Paciente_Apoderado_Actualizar extends conexionBD{

        public function mandarDatos($ls_paciente_id,$ls_dni,$ls_nombre,$ls_apepaterno,$ls_apematerno,$ls_sexo,$ls_edad,$ls_tipo_edad,
    $ls_requiere_apoderado,$ls_nombre_apoderado,$ls_dni_apoderado,$ls_ubigeo,$ls_paciente_contacto){
            
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_REGISTRAR_PACIENTE_APODERADO_ACTUALIZAR(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query = $c->prepare($sql);
            $query->bindParam(1,$ls_paciente_id);
            $query->bindParam(2,$ls_dni);
            $query->bindParam(3,$ls_nombre);
            $query->bindParam(4,$ls_apepaterno);
            $query->bindParam(5,$ls_apematerno);
            $query->bindParam(6,$ls_sexo);
            $query->bindParam(7,$ls_edad);
            $query->bindParam(8,$ls_tipo_edad);
            $query->bindParam(9,$ls_requiere_apoderado);
            $query->bindParam(10,$ls_nombre_apoderado);
            $query->bindParam(11,$ls_dni_apoderado);
            $query->bindParam(12,$ls_ubigeo);
            $query->bindParam(13,$ls_paciente_contacto);
            // $query->bindParam(15,$ls_examen_id);
            // $query->bindParam(16,$ls_resultadosarray);
            $resultado = $query->execute();
                     
            if($resultado){
                return 1;
            }else{
                return 0;
            }

            conexionBD::cerrar_conexion();
        }
    }

    class Modelo_Paciente_ContaYApo_Actualizar extends conexionBD{

        public function mandarDatos($ls_paciente_id,$ls_dni,$ls_nombre,$ls_apepaterno,$ls_apematerno,$ls_sexo,$ls_edad,$ls_tipo_edad,
    $ls_requiere_apoderado,$ls_nombre_apoderado,$ls_dni_apoderado,$ls_ubigeo,$ls_paciente_contacto,$ls_email,$ls_celular){
            
            $c = conexionBD::conexionPDO();

            $sql ="CALL SP_REGISTRAR_PACIENTE_CONTAYAPO_ACTUALIZAR(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query = $c->prepare($sql);
            $query->bindParam(1,$ls_paciente_id);
            $query->bindParam(2,$ls_dni);
            $query->bindParam(3,$ls_nombre);
            $query->bindParam(4,$ls_apepaterno);
            $query->bindParam(5,$ls_apematerno);
            $query->bindParam(6,$ls_sexo);
            $query->bindParam(7,$ls_edad);
            $query->bindParam(8,$ls_tipo_edad);
            $query->bindParam(9,$ls_requiere_apoderado);
            $query->bindParam(10,$ls_nombre_apoderado);
            $query->bindParam(11,$ls_dni_apoderado);
            $query->bindParam(12,$ls_ubigeo);
            $query->bindParam(13,$ls_paciente_contacto);
            $query->bindParam(14,$ls_email);
            $query->bindParam(15,$ls_celular);
            // $query->bindParam(15,$ls_examen_id);
            // $query->bindParam(16,$ls_resultadosarray);
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