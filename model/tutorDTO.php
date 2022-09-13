<?php
class TutorDTO implements JsonSerializable
{
    private $username_usuario;
    private $password_usuario;
    private $id_tipo_usuario;
    private $id_tutor;
    private $id_alumno;
    private $id_escuela;
    private $id_usuario;
    private $nombre_tutor;
    private $appaterno_tutor;
    private $apmaterno_tutor;
    private $fechanacimiento_tutor;
    private $telefono_tutor;
    private $email_tutor;
    private $calle_tutor;
    private $noexterior_tutor;
    private $nointerior_tutor;
    private $cp_tutor;
    private $estado_tutor;
    private $municipio_tutor;
    private $colonia_tutor;
    private $foto_tutor;
    private $nombre_escuela;
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
