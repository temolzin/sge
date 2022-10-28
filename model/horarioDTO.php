<?php
class HorarioDTO implements JsonSerializable
{
    private $id_horario;
    private $materia_fecha_horario;
    private $materia_horainicio_horario;
    private $materia_horafin_horario;

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
