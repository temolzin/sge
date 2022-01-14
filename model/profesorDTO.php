<?php
class ProfesorDTO implements JsonSerializable {
    private $id_profesor;
    private $id_grado_academico;
    private $id_escuela;
    private $id_usuario;
    private $foto_profesor;
    private $nombre_profesor;
    private $appaterno_profesor;
    private $apmaterno_profesor;
    private $cedula_profesor;
    private $calle_profesor;
    private $numexterior_profesor;
    private $numinterior_profesor;
    private $cp_profesor;
    private $estado_profesor;
    private $municipio_profesor;
    private $colonia_profesor;
    private $telefono_profesor;
    private $email_profesor;
    private $fechanacimiento_profesor;  

    private $id_tipo_usuario;
    private $username_usuario;  
    private $password_usuario;

    public function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }
    public function __set($property, $value){
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

        /**
         * Specify data which should be serialized to JSON
         * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
         * @return mixed data which can be serialized by <b>json_encode</b>,
         * which is a value of any type other than a resource.
         * @since 5.4.0
         */
        public function jsonSerialize()
        {
            $vars = get_object_vars($this);
            return $vars;
        }
    }
    ?>
