<?php
class PagoDTO implements JsonSerializable {
    private $id_pago;
    private $id_cobro;
    private $cantidad_pago;
    private $descripcion_pago;
    private $fecha_pago;
    private $hora_pago;
    private $monto_cobro_pago;
    private $restante_pago;

    private $nombre_alumno;
    private $appaterno_alumno;
    private $apmaterno_alumno;

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
