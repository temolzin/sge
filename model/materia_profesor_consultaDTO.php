<?php
    class Materia_profesor_consultaDTO implements JsonSerializable {
        private $id_materia_profesor;
        private $id_profesor;
        private $id_grupo;
        private $id_materia;
        private $nombre_grupo;
        private $nombre_profesor;
        private $appaterno_profesor;
        private $apmaterno_profesor;

        private $nombre_materia;
       
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
