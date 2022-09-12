<?php
class AdministradorDTO implements JsonSerializable
{
    private $id_administrador;
    private $id_usuario;
    private $foto_administrador;
    private $nombre_administrador;
    private $appaterno_administrador;
    private $apmaterno_administrador;
    private $telefono_administrador;
    private $email_administrador;
    private $fechanacimiento_administrador;
    private $id_tipo_usuario;
    private $username_usuario;
    private $password_usuario;


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
