<?php
session_start();
class Alumno_materia_consultaDAO extends Model implements CRUD {
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
        require_once 'alumno_materia_consultaDTO.php';
        $query = "SELECT materia.*, horario_materia.*, escuela.*, tutor.nombre_tutor, alumno.nombre_alumno FROM materia materia, horario_materia horario_materia, alumno alumno , escuela escuela, tutor tutor WHERE materia.id_escuela = alumno.id_escuela AND materia.id_horario = horario_materia.id_horario AND escuela.id_escuela = alumno.id_escuela AND escuela.id_escuela = materia.id_escuela AND tutor.id_alumno = alumno.id_alumno and tutor.id_tutor = '".$id_tutor."'  ";
        $objAlumnoMaterias = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $alumnomateria = new Alumno_materia_consultaDTO();
                $alumnomateria->id_materia = $value['id_materia'];
                $alumnomateria->id_escuela = $value['id_escuela'];
                $alumnomateria->id_horario = $value['id_horario'];
                $alumnomateria->nombre_materia = $value['nombre_materia'];
                $alumnomateria->nombre_escuela = $value['nombre_escuela'];
                $alumnomateria->materia_fecha_horario = $value['materia_fecha_horario'];
                $alumnomateria->materia_horainicio_horario = $value['materia_horainicio_horario'];
                array_push($objAlumnoMaterias, $alumnomateria);
            }
        } else {
            $objAlumnoMaterias = null;
        }

        return $objAlumnoMaterias;
    }

    
}
?>
