<?php
session_start();
class MateriaDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO materia values (null, :id_escuela, :id_horario, :nombre_materia)');
        $query->execute([':id_escuela' => $data['id_escuela'], ':id_horario' => $data['id_horario'], ':nombre_materia' => $data['nombre_materia']]);
        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE materia SET  id_escuela = :id_escuela, id_horario = :id_horario, nombre_materia = :nombre_materia WHERE id_materia = :id_materia');
        $query->execute([':id_materia' => $data['id_materia'], ':id_escuela' => $data['id_escuela'], ':id_horario' => $data['id_horario'], ':nombre_materia' => $data['nombre_materia']]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM materia where id_materia = :id_materia');
        $query->execute([':id_materia' => $id]);
        echo 'ok';
    }

    public function read()
    {
        $id_escuela = $_SESSION['id_escuela'];
        require_once 'materiaDTO.php';
        $query = "SELECT materia.*, grupo.*, profesor.*, escuela.*, horario_materia.* from escuela escuela, profesor profesor, grupo grupo, horario_materia horario_materia, materia materia, director director WHERE profesor.id_escuela = escuela.id_escuela AND grupo.id_escuela = escuela.id_escuela AND materia.id_escuela = escuela.id_escuela AND materia.id_horario=horario_materia.id_horario AND director.id_escuela = escuela.id_escuela AND materia.id_escuela = director.id_escuela and director.id_escuela =  '" . $id_escuela . "' ";
        
        $objMaterias = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $materia = new MateriaDTO();
                $materia->id_materia = $value['id_materia'];
                $materia->id_escuela = $value['id_escuela'];
                $materia->id_horario = $value['id_horario'];
                $materia->id_profesor = $value['id_profesor'];
                $materia->id_grupo = $value['id_grupo'];
                
                $materia->nombre_profesor = $value['nombre_profesor'];
                $materia->appaterno_profesor = $value['appaterno_profesor'];
                $materia->apmaterno_profesor = $value['apmaterno_profesor'];
                $materia->nombre_grupo = $value['nombre_grupo'];
                $materia->nombre_materia = $value['nombre_materia'];
                $materia->nombre_escuela = $value['nombre_escuela'];
                $materia->materia_fecha_horario = $value['materia_fecha_horario'];
                array_push($objMaterias, $materia);
            }
        } else {
            $objMaterias = null;
        }

        return $objMaterias;
    }

    //********************************* MATERIA PROFESOR **********************************************

    public function readMateriaProfesor()
    {
        $id_profesor = $_SESSION['id'];
        require_once 'materiaDTO.php';
        $query = "SELECT materia_profesor.* , profesor.*, grupo.*, materia.* 
                  from materia_profesor materia_profesor, profesor profesor, grupo grupo, materia materia
                  where materia_profesor.id_grupo=grupo.id_grupo 
                  AND materia_profesor.id_profesor=profesor.id_profesor 
                  AND materia_profesor.id_materia=materia.id_materia 
                  AND profesor.id_profesor = '" . $id_profesor . "' ";

        $objProfesorMateria = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $materia = new MateriaDTO();
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

    //********************************************************************************** MATERIA TUTOR **************************************************

    public function readMateriaTutor()
    {
        $id_tutor = $_SESSION['id'];
        require_once 'materiaDTO.php';
        $query = "SELECT materia.*, horario_materia.*, escuela.*, tutor.nombre_tutor, alumno.nombre_alumno FROM materia materia, horario_materia horario_materia, alumno alumno , escuela escuela, tutor tutor WHERE materia.id_escuela = alumno.id_escuela AND materia.id_horario = horario_materia.id_horario AND escuela.id_escuela = alumno.id_escuela AND escuela.id_escuela = materia.id_escuela AND tutor.id_alumno = alumno.id_alumno and tutor.id_tutor = '" . $id_tutor . "'  ";
        $objAlumnoMaterias = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $alumnomateria = new MateriaDTO();
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

    //**************************************************************************** MATERIA ALUMNO ************************************************************

    public function readMateriaAlumno()
    {

        $id_alumno = $_SESSION['id'];
        require_once 'materiaDTO.php';
        $query = "SELECT materia.*, horario_materia.*, escuela.* FROM materia materia, horario_materia horario_materia, alumno alumno , escuela escuela WHERE materia.id_escuela = alumno.id_escuela AND materia.id_horario = horario_materia.id_horario AND escuela.id_escuela = alumno.id_escuela AND escuela.id_escuela = materia.id_escuela AND alumno.id_alumno = '" . $id_alumno . "'   ";
        $objAlumnoMaterias = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $alumnomateria = new MateriaDTO();
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

    //*************************************************************** MATERIA DETALLE PROFESOR **********************************************************

    public function insertDetalleProfesor($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO materia_profesor values (null,  
            :id_profesor,
            :id_grupo,
            :id_materia)');
        $query->execute([

            ':id_profesor' => $data['id_profesor'],
            ':id_grupo' => $data['id_grupo'],
            ':id_materia' => $data['id_materia']
        ]);
        echo 'ok';
    }


    public function updateDetalleProfesor($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE materia_profesor SET  
            id_profesor = :id_profesor, 
            id_grupo = :id_grupo, 
            id_materia = :id_materia 
            WHERE id_materia_profesor = :id_materia_profesor');
        $query->execute([
            ':id_materia_profesor' => $data['id_materia_profesor'],
            ':id_profesor' => $data['id_profesor'],
            ':id_grupo' => $data['id_grupo'],
            ':id_materia' => $data['id_materia']
        ]);
        echo 'ok';
    }

    public function deleteDetalleProfesor($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM materia_profesor where id_materia_profesor = :id_materia_profesor');
        $query->execute([':id_materia_profesor' => $id]);
        echo 'ok';
    }

    public function readDetalleProfesor()
    {
        $id_escuela = $_SESSION['id_escuela'];
        require_once 'materiaDTO.php';
        $query = "SELECT * FROM materia_profesor INNER JOIN grupo on materia_profesor.id_grupo=grupo.id_grupo INNER JOIN profesor on materia_profesor.id_profesor=profesor.id_profesor INNER JOIN materia on materia_profesor.id_materia=materia.id_materia INNER JOIN escuela on grupo.id_escuela=escuela.id_escuela INNER JOIN horario_materia on materia.id_horario=horario_materia.id_horario WHERE escuela.id_escuela = '" . $id_escuela . "'";
        $objProfesorMateria = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {

            foreach ($this->db->consultar($query) as $key => $value) {
                $materia = new MateriaDTO();
                $materia->id_materia_profesor = $value['id_materia_profesor'];
                $materia->id_profesor = $value['id_profesor'];
                $materia->id_grupo = $value['id_grupo'];
                $materia->id_materia = $value['id_materia'];
                $materia->id_escuela = $value['id_escuela'];
                $materia->id_horario = $value['id_horario'];

                
                $materia->materia_fecha_horario = $value['materia_fecha_horario'];
                $materia->nombre_escuela = $value['nombre_escuela'];
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
