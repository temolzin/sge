
<?php
class IncidenciaDTO implements JsonSerializable
{
    private $id_incidencia;
    private $id_alumno;
    private $id_profesor;
    private $id_grupo;
    private $fechaincidencia_incidencia;
    private $horaincidencia_incidencia;
    private $descripcion_incidencia;

    private $nombre_grupo;
    private $nombre_profesor;
    private $appaterno_profesor;
    private $apmaterno_profesor;
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
