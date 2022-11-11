<?php
class MateriaDTO implements JsonSerializable
{
    private $id_materia;
    private $id_escuela;
    private $id_horario;
    private $nombre_materia;
    private $nombre_escuela;
    private $materia_fecha_horario;
    private $materia_horainicio_horario;
    private $materia_horafin_horario;

    private $id_materia_profesor;
    private $id_profesor;
    private $id_grupo;
    private $nombre_grupo;
    private $nombre_profesor;
    private $appaterno_profesor;
    private $apmaterno_profesor;

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
