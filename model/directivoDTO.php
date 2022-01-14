<?php
class DirectivoDTO implements JsonSerializable {
    private $id_director;
    private $id_escuela;
    private $id_grado_academico;
    private $id_usuario;
    private $foto_director;
    private $nombre_director;
    private $appaterno_director;
    private $apmaterno_director;
    private $rfc_director;
    private $curp_director;
    private $calle_director;
    private $numexterior_director;
    private $numinterior_director;
    private $cp_director;
    private $estado_director;
    private $municipio_director;
    private $colonia_director;
    private $telefono_director;
    private $email_director;
    private $cedulaprofesional_director;
    private $fechanacimiento_director;

    private $nombre_escuela;

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
