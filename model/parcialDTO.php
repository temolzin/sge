<?php
class ParcialDTO implements JsonSerializable
{
    private $id_parcial;
    private $id_grupo;
    private $id_escuela;
    private $nombre_parcial;
    private $fechainicio_parcial;
    private $fechafin_parcial;

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
