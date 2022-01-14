<?php
session_start();
class Tareaalumno_consultaDAO extends Model implements CRUD {
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
        $id_grupo = $_SESSION['id_grupo'];
        require_once 'tareaalumno_consultaDTO.php';
        $query = "
       SELECT tarea_alumno.*,grupo.*,materia.*, tutor.* 
            FROM grupo grupo, materia materia, tarea_alumno tarea_alumno, tutor tutor, escuela escuela, alumno alumno 
            WHERE tarea_alumno.id_grupo = grupo.id_grupo AND 
            materia.id_materia = tarea_alumno.id_materia AND 
            escuela.id_escuela= alumno.id_escuela AND 
            materia.id_escuela = alumno.id_escuela AND 
            escuela.id_escuela = materia.id_escuela AND 
            tutor.id_escuela = escuela.id_escuela AND 
            tutor.id_alumno = alumno.id_alumno AND 
            grupo.id_grupo = alumno.id_grupo AND 
            tarea_alumno.id_grupo = alumno.id_grupo AND  
            tarea_alumno.id_grupo  =  '".$id_grupo."' ";
        $objTareaAlumno = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $tareaalumno= new Tareaalumno_consultaDTO();
                $tareaalumno->id_tarea_alumno = $value['id_tarea_alumno'];
                $tareaalumno->id_grupo = $value['nombre_grupo'];
                $tareaalumno->id_materia = $value['nombre_materia'];
                $tareaalumno->nombre_tarea = $value['nombre_tarea'];
                $tareaalumno->descripcion_tarea = $value['descripcion_tarea'];
                $tareaalumno->archivo_tarea = $value['archivo_tarea'];
                $tareaalumno->fecha_entrega = $value['fecha_entrega'];
                
                //$objTareaAlumno['data'][] = $tareaalumno;
                array_push($objTareaAlumno, $tareaalumno);
            }
        } else {
            $objTareaAlumno = null;
        }

        return $objTareaAlumno;
    }
}
?>
