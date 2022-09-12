<?php
session_start();
class CalificacionDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO calificacion values (null,  
            :id_profesor,
            :id_alumno,
            :id_parcial,
            :id_materia,
            :calificacion,
            :observacion_calificacion,
            :fecha_calificacion
        )');
        $query->execute([
            ':id_profesor' => $data['id_profesor'],
            ':id_alumno' => $data['id_alumno'],
            ':id_parcial' => $data['id_parcial'],
            ':id_materia' => $data['id_materia'],
            ':calificacion' => $data['calificacion'],
            ':observacion_calificacion' => $data['observacion_calificacion'],
            ':fecha_calificacion' => $data['fecha_calificacion']
        ]);
        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE calificacion SET 
            id_profesor = :id_profesor,
            id_alumno = :id_alumno, 
            id_parcial = :id_parcial, 
            id_materia = :id_materia, 
            calificacion = :calificacion,
            observacion_calificacion = :observacion_calificacion,
            fecha_calificacion = :fecha_calificacion
            WHERE id_calificacion = :id_calificacion');
        $query->execute([
            ':id_calificacion' => $data['id_calificacion'],
            ':id_profesor' => $data['id_profesor'],
            ':id_alumno' => $data['id_alumno'],
            ':id_parcial' => $data['id_parcial'],
            ':id_materia' => $data['id_materia'],
            ':calificacion' => $data['calificacion'],
            ':observacion_calificacion' => $data['observacion_calificacion'],
            ':fecha_calificacion' => $data['fecha_calificacion']
        ]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM calificacion where id_calificacion = :id_calificacion');
        $query->execute([':id_calificacion' => $id]);
        echo 'ok';
    }
    public function read()
    {
        $tipo = $_SESSION['tipo'];
        if ($tipo == 'director') {
            $id_escuela = $_SESSION['id_escuela'];
            require_once 'calificacionDTO.php';
            $query = "SELECT calificacion.*, profesor.*, alumno.*, parcial.*, materia.*, grupo.nombre_grupo from calificacion calificacion, profesor profesor, alumno alumno, parcial parcial, materia materia, grupo grupo, director director, escuela escuela where calificacion.id_profesor = profesor.id_profesor and calificacion.id_alumno=alumno.id_alumno and calificacion.id_parcial=parcial.id_parcial and calificacion.id_materia=materia.id_materia and grupo.id_grupo = alumno.id_grupo and director.id_escuela = escuela.id_escuela and profesor.id_escuela = escuela.id_escuela and director.id_escuela = '" . $id_escuela . "'";
            $objCalificaciones = array();
            if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {

                foreach ($this->db->consultar($query) as $key => $value) {
                    $calificacion = new CalificacionDTO();
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
                    $calificacion->nombre_grupo = $value['nombre_grupo'];

                    array_push($objCalificaciones, $calificacion);
                }
            } else {
                $objCalificaciones = null;
            }

            return $objCalificaciones;
        } else {

            $id_profesor = $_SESSION['id'];
            require_once 'calificacionDTO.php';
            $query = "SELECT calificacion.*, profesor.*, alumno.*, parcial.*, materia.*, grupo.nombre_grupo
             from calificacion calificacion, profesor profesor, alumno alumno, parcial parcial, materia materia, grupo grupo 
            where calificacion.id_profesor = profesor.id_profesor and 
            calificacion.id_alumno=alumno.id_alumno and 
            calificacion.id_parcial=parcial.id_parcial and 
            calificacion.id_materia=materia.id_materia and 
            grupo.id_grupo = alumno.id_grupo  and 
            profesor.id_profesor =  '" . $id_profesor . "' ";
            $objCalificaciones = array();

            if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
                foreach ($this->db->consultar($query) as $key => $value) {
                    $calificacion = new CalificacionDTO();
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
                    $calificacion->nombre_grupo = $value['nombre_grupo'];
                    array_push($objCalificaciones, $calificacion);
                }
            } else {
                $objCalificaciones = null;
            }

            return $objCalificaciones;
        }
    }

    //******************************************************************************* CALIFICACION TUTOR *****************************************************

    public function readCalificacionTutor()
    {
        $id_tutor = $_SESSION['id'];
        require_once 'calificacionDTO.php';
        $query = "SELECT calificacion.*, profesor.*, alumno.*, parcial.*, materia.*, tutor.* FROM calificacion calificacion, profesor profesor, alumno alumno, parcial parcial, materia materia, tutor tutor WHERE calificacion.id_profesor = profesor.id_profesor AND calificacion.id_alumno = alumno.id_alumno AND calificacion.id_parcial = parcial.id_parcial AND calificacion.id_materia = materia.id_materia AND parcial.id_escuela = alumno.id_escuela AND materia.id_escuela = parcial.id_escuela AND materia.id_escuela = alumno.id_escuela AND tutor.id_alumno = alumno.id_alumno AND  
      tutor.id_tutor = '" . $id_tutor . "'   ";
        $objCalificaciones = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $calificacion = new CalificacionDTO();
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

    //********************************************************************* CALIFICACION ALUMNO ************************************************************

    public function readCalificacionAlumno()
    {
        $id_alumno = $_SESSION['id'];
        require_once 'calificacionDTO.php';
        $query = " SELECT calificacion.*, profesor.*, alumno.*, parcial.*, materia.* FROM calificacion calificacion, profesor profesor, alumno alumno, parcial parcial, materia materia WHERE calificacion.id_profesor = profesor.id_profesor AND calificacion.id_alumno = alumno.id_alumno AND calificacion.id_parcial = parcial.id_parcial AND calificacion.id_materia = materia.id_materia AND alumno.id_alumno = '" . $id_alumno . "'";
        $objCalificaciones = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $calificacion = new CalificacionDTO();
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
