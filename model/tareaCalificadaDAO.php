<?php
session_start();
class TareaCalificadaDAO extends Model implements CRUD {
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
  {     $id_grupo = $_SESSION['id_grupo'];
  require_once 'tareaCalificadaDTO.php';
  $query = "SELECT tarea_entregada.*, tarea_alumno.*, grupo.*, materia.* FROM tarea_entregada tarea_entregada, tarea_alumno tarea_alumno, grupo grupo, materia materia where tarea_alumno.id_grupo = grupo.id_grupo AND tarea_alumno.id_materia = materia.id_materia AND tarea_entregada.id_tarea_alumno = tarea_alumno.id_tarea_alumno AND tarea_alumno.id_grupo = '".$id_grupo."' ";


  $objrTareasCalificada = array();
  if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
    foreach ($this->db->consultar($query) as $key => $value) {
     $tareaCalificada = new tareaCalificadaDTO();
     $tareaCalificada->id_tarea_entregada = $value['id_tarea_entregada'];
     $tareaCalificada->id_tarea_alumno = $value['id_tarea_alumno'];
     $tareaCalificada->id_grupo = $value['id_grupo'];
     $tareaCalificada->id_materia = $value['id_materia'];
     $tareaCalificada->archivo_tarea_entregada = $value['archivo_tarea_entregada'];
     $tareaCalificada->comentarios_tarea = $value['comentarios_tarea'];
     $tareaCalificada->calificacion_tarea = $value['calificacion_tarea'];

     $tareaCalificada->nombre_grupo = $value['nombre_grupo'];
     $tareaCalificada->nombre_materia = $value['nombre_materia'];
     $tareaCalificada->nombre_tarea = $value['nombre_tarea'];

     array_push($objrTareasCalificada, $tareaCalificada);
   }
 } else {
  $objrTareasCalificada = null;
}

return $objrTareasCalificada;
}
}
?>
