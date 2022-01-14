<?php
session_start();
class Incidencias_consultaDAO extends Model implements CRUD {
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
       require_once 'incidencias_consultaDTO.php'; 
       $query = "SELECT incidencias.*, alumno.*, grupo.*, profesor.*, tutor.* FROM incidencias incidencias, alumno alumno, profesor profesor, grupo grupo, tutor tutor WHERE incidencias.id_alumno = alumno.id_alumno AND incidencias.id_grupo = alumno.id_grupo AND incidencias.id_profesor = profesor.id_profesor AND incidencias.id_grupo = grupo.id_grupo AND tutor.id_alumno = alumno.id_alumno and tutor.id_tutor =  '".$id_tutor."' ";
       $objAlumnoIncidencias = array();

       if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
           foreach ($this->db->consultar($query) as $key => $value) {
            $incidencia = new Incidencias_consultaDTO();
            $incidencia->id_incidencia = $value['id_incidencia'];
            $incidencia->id_profesor = $value['id_profesor'];
            $incidencia->id_grupo = $value['id_grupo'];
            $incidencia->fechaincidencia_incidencia = $value['fechaincidencia_incidencia'];
            $incidencia->horaincidencia_incidencia = $value['horaincidencia_incidencia'];
            $incidencia->descripcion_incidencia = $value['descripcion_incidencia'];
            $incidencia->nombre_profesor = $value['nombre_profesor'];
            $incidencia->appaterno_profesor = $value['appaterno_profesor'];
            $incidencia->apmaterno_profesor = $value['apmaterno_profesor'];
            $incidencia->nombre_alumno = $value['nombre_alumno'];
            $incidencia->appaterno_alumno = $value['appaterno_alumno'];
            $incidencia->apmaterno_alumno = $value['apmaterno_alumno'];
            $incidencia->nombre_grupo = $value['nombre_grupo'];
            
            //$objAlumnoIncidencias['data'][] = $incidencia;
            array_push($objAlumnoIncidencias, $incidencia);
        }
    } else {
        $objAlumnoIncidencias = null;
    }

    return $objAlumnoIncidencias;
}
}
?>
