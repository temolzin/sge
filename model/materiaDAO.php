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
        $query = "SELECT materia.*, escuela.*, horario_materia.* from escuela escuela, horario_materia horario_materia, materia materia, director director WHERE materia.id_escuela = escuela.id_escuela AND materia.id_horario=horario_materia.id_horario AND director.id_escuela = escuela.id_escuela AND materia.id_escuela = director.id_escuela and director.id_escuela =  '" . $id_escuela . "' ";
        $objMaterias = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $materia = new MateriaDTO();
                $materia->id_materia = $value['id_materia'];
                $materia->id_escuela = $value['id_escuela'];
                $materia->id_horario = $value['id_horario'];
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
}
