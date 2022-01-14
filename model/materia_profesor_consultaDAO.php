<?php
session_start();
class Materia_profesor_consultaDAO extends Model implements CRUD {
  public function __construct()
  {
    parent::__construct();
  }

  
  public function insert($data)
  {
   
  }


  public function update($data)
  {
    
  }

  public function delete($id)
  {
   
  }

  public function read()
  {   $id_profesor = $_SESSION['id'];
  require_once 'materia_profesor_consultaDTO.php'; 
  $query = "SELECT materia_profesor.* , profesor.*, grupo.*, materia.* from materia_profesor materia_profesor, profesor profesor, grupo grupo, materia materia where materia_profesor.id_grupo=grupo.id_grupo AND materia_profesor.id_profesor=profesor.id_profesor AND materia_profesor.id_materia=materia.id_materia AND profesor.id_profesor = '".$id_profesor."' ";
  $objProfesorMateria = array();
  if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
    foreach ($this->db->consultar($query) as $key => $value) {
      $materia = new Materia_profesor_consultaDTO();
      $materia->id_materia_profesor = $value['id_materia_profesor'];
      $materia->id_profesor = $value['id_profesor'];
      $materia->id_grupo = $value['id_grupo'];
      $materia->id_materia = $value['id_materia'];

      $materia->nombre_grupo = $value['nombre_grupo'];
      $materia->nombre_profesor = $value['nombre_profesor'];
      $materia->appaterno_profesor = $value['appaterno_profesor'];
      $materia->apmaterno_profesor = $value['apmaterno_profesor'];
      $materia->id_materia = $value['id_materia'];
      $materia->nombre_materia = $value['nombre_materia'];
      array_push($objProfesorMateria, $materia);
    }
  } else {
    $objProfesorMateria = null;
  }

  return $objProfesorMateria;
}
}
?>
