
<?php
class CalificacionDTO implements JsonSerializable
{
    private $id_calificacion;
    private $id_profesor;
    private $id_alumno;
    private $id_parcial;
    private $id_materia;
    private $calificacion;
    private $observacion_calificacion;
    private $fecha_calificacion;
    private $nombre_parcial;
    private $nombre_materia;

    private $nombre_alumno;
    private $appaterno_alumno;
    private $apmaterno_alumno;

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
?>
