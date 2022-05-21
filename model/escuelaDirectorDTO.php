<?php
    class EscuelaDTO implements JsonSerializable {
        private $id_escuela;
        private $nombre_escuela;
        private $foto_escuela;
        private $rfc_escuela;
        private $cct_escuela;
        private $calle_escuela;
        private $numxterior_escuela;
        private $numinterior_escuela;
        private $cp_escuela;
        private $estado_escuela;
        private $municipio_escuela;
        private $colonia_escuela;
        private $telefono_escuela;
        private $email_escuela;
        private $observacion_escuela;
        

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
