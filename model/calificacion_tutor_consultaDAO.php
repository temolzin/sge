<?php
session_start();
class Calificacion_tutor_consultaDAO extends Model implements CRUD {
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
    {     
      $id_tutor = $_SESSION['id'];
      require_once 'calificacion_tutor_consultaDTO.php'; 
      $query = "SELECT calificacion.*, profesor.*, alumno.*, parcial.*, materia.*, tutor.* FROM calificacion calificacion, profesor profesor, alumno alumno, parcial parcial, materia materia, tutor tutor WHERE calificacion.id_profesor = profesor.id_profesor AND calificacion.id_alumno = alumno.id_alumno AND calificacion.id_parcial = parcial.id_parcial AND calificacion.id_materia = materia.id_materia AND parcial.id_escuela = alumno.id_escuela AND materia.id_escuela = parcial.id_escuela AND materia.id_escuela = alumno.id_escuela AND tutor.id_alumno = alumno.id_alumno AND  
      tutor.id_tutor = '".$id_tutor."'   ";
      $objCalificaciones = array();

      if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {

          foreach ($this->db->consultar($query) as $key => $value) {
            $calificacion = new Calificacion_tutor_consultaDTO();
            $calificacion->id_calificacion = $value['id_calificacion'];
            $calificacion->id_profesor = $value['id_profesor'];
            $calificacion->id_alumno = $value['id_alumno'];
            $calificacion->id_parcial = $value['id_parcial'];
            $calificacion->id_materia = $value['id_materia'];
            $calificacion->calificacion = $value['calificacion'];
            $calificacion->observacion_calificacion = $value['observacion_calificacion'];
            $calificacion->fecha_calificacion = $value['fecha_calificacion'];


            $calificacion->nombre_profesor = $value['nombre_profesor'];
            $calificacion->appaterno_profesor = $value['appaterno_profesor'];
            $calificacion->apmaterno_profesor = $value['apmaterno_profesor'];

            $calificacion->nombre_alumno = $value['nombre_alumno'];
            $calificacion->appaterno_alumno = $value['appaterno_alumno'];
            $calificacion->apmaterno_alumno = $value['apmaterno_alumno'];
            $calificacion->nombre_parcial = $value['nombre_parcial'];
            $calificacion->nombre_materia = $value['nombre_materia'];

            $_SESSION['id_calificacion'] = $value['id_calificacion'];
            $_SESSION['calificacion'] = $value['calificacion'];
            $_SESSION['observacion_calificacion'] = $value['observacion_calificacion'];
            $_SESSION['nombre_materia'] = $value['nombre_materia'];
            array_push($objCalificaciones, $calificacion);
        }
    } else {
        $objCalificaciones = null;
    }

    return $objCalificaciones;
}

}
?>
