<?php
class GradoAcademicoDTO implements JsonSerializable
{
    private $id_grado_academico;
    private $nombre_grado_academico;
    private $observacion_gradoacademico;

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
