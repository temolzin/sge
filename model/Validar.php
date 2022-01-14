<?php 

    require_once("Conexion.php");

    class Validar {

        public function validarDatos() {

            try {
                $con = null;
                $sql = null;
                $resultado = null;
                $cantidad_resultado = null;

                // Recuperamos la conexión
                $con = Conexion::getConection();

                // Validación de error
                if ($con == "ERROR") {
                    header("location:CtrlSalir.php");
                }

                // Consulta
                $sql = "SELECT * FROM usuarios WHERE usuario = :USU AND pass = :PASS";

                $resultado = $con->prepare($sql);
                $resultado->execute(array(":USU"=>$_SESSION["username"], ":PASS"=>$_SESSION["password"]));

                $cantidad_resultado = $resultado->rowCount();

                if ($cantidad_resultado == 0) {

                   header("location:controlador/CtrlSalir.php");

                } 

                
            } catch (Exception $e) {


            } finally {
                $con = null;
                $sql = null;
                $resultado = null;
                $cantidad_resultado = null;
            }
        }

    }
?>