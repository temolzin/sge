<?php
class GradoAcademicoDAO extends Model implements CRUD {
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO grado_academico values (null, 
           :nombre_grado_academico,
           :observacion_gradoacademico)');
        $query->execute([':nombre_grado_academico' => $data['nombre_grado_academico'],
            ':observacion_gradoacademico' => $data['observacion_gradoacademico']]);
        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE grado_academico SET  
          nombre_grado_academico = :nombre_grado_academico,
          observacion_gradoacademico = :observacion_gradoacademico
          WHERE id_grado_academico = :id_grado_academico');
        $query->execute([':id_grado_academico' => $data['id_grado_academico'],
            ':nombre_grado_academico' => $data['nombre_grado_academico'],
            ':observacion_gradoacademico' => $data['observacion_gradoacademico']]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM grado_academico where id_grado_academico = :id_grado_academico');
        $query->execute([':id_grado_academico' => $id]);
        echo 'ok';
    }

    public function read()
    {
        require_once 'gradoAcademicoDTO.php';
        $query = "SELECT * FROM grado_academico";
        $objGrados = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $grado = new GradoAcademicoDTO();
                $grado->id_grado_academico = $value['id_grado_academico'];
                $grado->nombre_grado_academico = $value['nombre_grado_academico'];
                $grado->observacion_gradoacademico = $value['observacion_gradoacademico'];
                array_push($objGrados, $grado);
            }
        } else {
            $objGrados = null;
        }

        return $objGrados;
    }
}
?>
