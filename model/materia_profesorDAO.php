<?php
session_start();
class Materia_profesorDAO extends Model implements CRUD {
    public function __construct()
    {
        parent::__construct();
    }

    
    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO materia_profesor values (null,  
            :id_profesor,
            :id_grupo,
            :id_materia)');
        $query->execute([
          
           ':id_profesor' => $data['id_profesor'],
           ':id_grupo' => $data['id_grupo'],
           ':id_materia' => $data['id_materia']]);
        echo 'ok';
    }


    public function update($data)
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

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM materia_profesor where id_materia_profesor = :id_materia_profesor');
        $query->execute([':id_materia_profesor' => $id]);
        echo 'ok';
    }

    public function read()
    {
        $id_escuela = $_SESSION['id_escuela'];
        require_once 'materia_profesorDTO.php'; 
        $query = "SELECT * FROM materia_profesor INNER JOIN grupo on materia_profesor.id_grupo=grupo.id_grupo INNER JOIN profesor on materia_profesor.id_profesor=profesor.id_profesor INNER JOIN materia on materia_profesor.id_materia=materia.id_materia WHERE grupo.id_escuela = '".$id_escuela."'";
        $objProfesorMateria = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {

            foreach ($this->db->consultar($query) as $key => $value) {
                $materia = new Materia_profesorDTO();
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
?>
