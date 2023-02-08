<?php
class CobroDTO implements JsonSerializable
{
    private $id_cobro;
    private $id_alumno;
    private $id_concepto;
    private $cantidad_cobro;
    private $iva_cobro;
    private $fecha_cobro;
    private $fechalimite_cobro;
    private $activo_cobro;

    private $nombre_alumno;
    private $appaterno_alumno;
    private $apmaterno_alumno;
    private $nombre_concepto;

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}
