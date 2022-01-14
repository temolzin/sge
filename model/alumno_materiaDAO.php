<?php
session_start();
class Alumno_materiaDAO extends Model implements CRUD {
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
       
        $id_alumno = $_SESSION['id'];
        require_once 'alumno_materiaDTO.php';
        $query = "SELECT materia.*, horario_materia.*, escuela.* FROM materia materia, horario_materia horario_materia, alumno alumno , escuela escuela WHERE materia.id_escuela = alumno.id_escuela AND materia.id_horario = horario_materia.id_horario AND escuela.id_escuela = alumno.id_escuela AND escuela.id_escuela = materia.id_escuela AND alumno.id_alumno = '".$id_alumno."'   ";
        $objAlumnoMaterias = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $alumnomateria = new Alumno_materiaDTO();
                $alumnomateria->id_materia = $value['id_materia'];
                $alumnomateria->id_escuela = $value['id_escuela'];
                $alumnomateria->id_horario = $value['id_horario'];
                $alumnomateria->nombre_materia = $value['nombre_materia'];
                $alumnomateria->nombre_escuela = $value['nombre_escuela'];
                $alumnomateria->materia_fecha_horario = $value['materia_fecha_horario'];
                $alumnomateria->materia_horainicio_horario = $value['materia_horainicio_horario'];

                //$objAlumnoMaterias['data'][] = $alumnomateria;

                array_push($objAlumnoMaterias, $alumnomateria);
            }
        } else {
            $objAlumnoMaterias = null;
        }

        return $objAlumnoMaterias;
    }
}
?>
