<?php
class TareaDTO implements JsonSerializable
{
    private $id_tarea_alumno;
    private $id_grupo;
    private $id_materia;
    private $nombre_tarea;
    private $fecha_entrega;
    private $descripcion_tarea;
    private $archivo_tarea;
    private $nombre_materia;
    private $nombre_grupo;
    private $id_tarea_entregada;
    private $archivo_tarea_entregada;
    private $comentarios_tarea;
    private $calificacion_tarea;
    private $id_tarea_alumnoDetalle;

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
