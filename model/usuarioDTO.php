<?php
class UsuarioDTO implements JsonSerializable
{
    private $nombre_tipo_usuario;
    private $id_usuario;
    private $username_usuario;
    private $password_usuario;
    private $activo_usuario;

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
