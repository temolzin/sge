<?php
class AlumnoDTO implements JsonSerializable {
    private $id_alumno;
    private $id_grupo;
    private $id_escuela;
    private $id_usuario;
    private $foto_alumno;
    private $nombre_alumno;
    private $appaterno_alumno;
    private $apmaterno_alumno;
    private $calle_alumno;
    private $noexterior_alumno;
    private $nointerior_alumno;
    private $cp_alumno;
    private $estado_alumno;
    private $municipio_alumno;
    private $colonia_alumno;
    private $telefono_alumno;
    private $email_alumno;
    private $fechanacimiento_alumno;
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
