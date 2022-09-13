<?php
class ParcialDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO parcial values (null,  
                :id_escuela,
                :nombre_parcial,
                 :fechainicio_parcial,
                  :fechafin_parcial)');
        $query->execute([

            ':id_escuela' => $data['id_escuela'],
            ':nombre_parcial' => $data['nombre_parcial'],
            ':fechainicio_parcial' => $data['fechainicio_parcial'],
            ':fechafin_parcial' => $data['fechafin_parcial']
        ]);
        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE parcial SET   id_escuela = :id_escuela, nombre_parcial = :nombre_parcial, fechainicio_parcial = :fechainicio_parcial , fechafin_parcial = :fechafin_parcial WHERE id_parcial = :id_parcial');
        $query->execute([
            ':id_parcial' => $data['id_parcial'],
            ':id_escuela' => $data['id_escuela'],
            ':nombre_parcial' => $data['nombre_parcial'],
            ':fechainicio_parcial' => $data['fechainicio_parcial'],
            ':fechafin_parcial' => $data['fechafin_parcial']
        ]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM parcial where id_parcial = :id_parcial');
        $query->execute([':id_parcial' => $id]);
        echo 'ok';
    }

    public function read()
    {
        require_once 'parcialDTO.php';
        $query = "SELECT * FROM parcial";
        $objParcial = array();
        foreach ($this->db->consultar($query) as $key => $value) {
            $parcial = new ParcialDTO();
            $parcial->id_parcial = $value['id_parcial'];
            $parcial->id_escuela = $value['id_escuela'];
            $parcial->nombre_parcial = $value['nombre_parcial'];
            $parcial->fechainicio_parcial = $value['fechainicio_parcial'];
            $parcial->fechafin_parcial = $value['fechafin_parcial'];
            array_push($objParcial, $parcial);
        }
        return $objParcial;
    }
}
