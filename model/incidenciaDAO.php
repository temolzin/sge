<?php
session_start();
class IncidenciaDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO incidencias values (null,  
            :id_alumno,
            :id_profesor,
            :id_grupo,

            :fechaincidencia_incidencia,
            :horaincidencia_incidencia,
            :descripcion_incidencia )');
        $query->execute([

            ':id_alumno' => $data['id_alumno'],
            ':id_profesor' => $data['id_profesor'],
            ':id_grupo' => $data['id_grupo'],
            ':fechaincidencia_incidencia' => $data['fechaincidencia_incidencia'],
            ':horaincidencia_incidencia' => $data['horaincidencia_incidencia'],
            ':descripcion_incidencia' => $data['descripcion_incidencia']
        ]);
        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE incidencias SET   
            id_alumno = :id_alumno, 
            id_profesor = :id_profesor,
            id_grupo = :id_grupo, 
            fechaincidencia_incidencia = :fechaincidencia_incidencia, 
            horaincidencia_incidencia = :horaincidencia_incidencia,  
            descripcion_incidencia = :descripcion_incidencia WHERE id_incidencia = :id_incidencia');
        $query->execute([
            ':id_incidencia' => $data['id_incidencia'],
            ':id_alumno' => $data['id_alumno'],
            ':id_profesor' => $data['id_profesor'],
            ':id_grupo' => $data['id_grupo'],
            ':fechaincidencia_incidencia' => $data['fechaincidencia_incidencia'],
            ':horaincidencia_incidencia' => $data['horaincidencia_incidencia'],
            ':descripcion_incidencia' => $data['descripcion_incidencia']


        ]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM incidencias where id_incidencia = :id_incidencia');
        $query->execute([':id_incidencia' => $id]);
        echo 'ok';
    }


    public function read()
    {
        $id_profesor = $_SESSION['id'];
        require_once 'incidenciaDTO.php';
        $query = "SELECT incidencias.*, alumno.*, profesor.*, grupo.* FROM incidencias incidencias, alumno alumno, profesor profesor, grupo grupo where incidencias.id_alumno=alumno.id_alumno and incidencias.id_profesor=profesor.id_profesor and incidencias.id_grupo=grupo.id_grupo and profesor.id_profesor =   '" . $id_profesor . "'
        ";
        $objIncidencias = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $incidencia = new IncidenciaDTO();
                $incidencia->id_incidencia = $value['id_incidencia'];
                $incidencia->id_alumno = $value['id_alumno'];

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


                array_push($objIncidencias, $incidencia);
            }
        } else {
            $objIncidencias = null;
        }

        return $objIncidencias;
    }

    //******************************************************************* INCIDENCIA CONSULTAR ***************************************

    public function readIncidenciaConsulta()
    {
        $id_tutor = $_SESSION['id'];
        require_once 'incidenciaDTO.php';
        $query = "SELECT incidencias.*, alumno.*, grupo.*, profesor.*, tutor.* FROM incidencias incidencias, alumno alumno, profesor profesor, grupo grupo, tutor tutor WHERE incidencias.id_alumno = alumno.id_alumno AND incidencias.id_grupo = alumno.id_grupo AND incidencias.id_profesor = profesor.id_profesor AND incidencias.id_grupo = grupo.id_grupo AND tutor.id_alumno = alumno.id_alumno and tutor.id_tutor =  '" . $id_tutor . "' ";
        $objAlumnoIncidencias = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $incidencia = new IncidenciaDTO();
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

    //************************************************************* INCIDENCIA ALUMNO ***************************************************************

    public function readIncidenciaAlumno()
    {
        $id_alumno = $_SESSION['id'];
        require_once 'incidenciaDTO.php';
        $query = "SELECT incidencias.*, alumno.*, grupo.*, profesor.* FROM incidencias incidencias, alumno alumno, profesor profesor, grupo grupo WHERE incidencias.id_alumno = alumno.id_alumno AND incidencias.id_grupo = alumno.id_grupo AND incidencias.id_profesor = profesor.id_profesor AND incidencias.id_grupo = grupo.id_grupo AND alumno.id_alumno = incidencias.id_alumno AND alumno.id_alumno = '" . $id_alumno . "' ";
        $objAlumnoIncidencias = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $incidencia = new IncidenciaDTO();
                $incidencia->id_incidencia = $value['id_incidencia'];
                $incidencia->id_alumno = $value['id_alumno'];

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
