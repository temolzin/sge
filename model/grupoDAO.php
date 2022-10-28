<?php
session_start();
class GrupoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO grupo values (null,  
            :id_escuela,
            :nombre_grupo,
            :turno_grupo)');
        $query->execute([

            ':id_escuela' => $data['id_escuela'],
            ':nombre_grupo' => $data['nombre_grupo'],
            ':turno_grupo' => $data['turno_grupo']
        ]);
        echo 'ok';
    }
    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE grupo SET id_escuela = :id_escuela, 
        nombre_grupo = :nombre_grupo , 
        turno_grupo = :turno_grupo WHERE id_grupo = :id_grupo');
        $query->execute([
            ':id_grupo' => $data['id_grupo'],
            ':id_escuela' => $data['id_escuela'],
            ':nombre_grupo' => $data['nombre_grupo'],
            ':turno_grupo' => $data['turno_grupo']
        ]);
        echo 'ok';
    }
    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM grupo where id_grupo = :id_grupo');
        $query->execute([':id_grupo' => $id]);
        echo 'ok';
    }

    public function read()
    {
        $id_escuela = $_SESSION['id_escuela'];
        require_once 'grupoDTO.php';
        $query = "SELECT * FROM grupo where id_escuela = '" . $id_escuela . "'";
        $objGrupo = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $grupo = new GrupoDTO();
                $grupo->id_grupo = $value['id_grupo'];
                $grupo->id_escuela = $value['id_escuela'];
                $grupo->nombre_grupo = $value['nombre_grupo'];
                $grupo->turno_grupo = $value['turno_grupo'];
                array_push($objGrupo, $grupo);
            }
        } else {
            $objGrupo = null;
        }

        return $objGrupo;
    }
}
