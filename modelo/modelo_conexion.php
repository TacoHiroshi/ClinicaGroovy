<?php
    class conexionBD{
    public function conexionPDO(){
            $host       ='127.0.0.1';
            $usuario    ='root';
            $contrasena = '';
            $dbName     = 'bd_clinica';
        
            try{
                $pdo = new PDO("mysql:host=$host;dbname=$dbName", $usuario,$contrasena);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("set names utf8");
                return $pdo;
            }catch(Exception $e){
                echo "la conexion ha fallado";
            }
        }
        function cerrar_conexion(){
            $this->$pdo=null;
        }
    }
?>