<?php
class ConceptoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO concepto (
            nombre_concepto,
            descripcion_concepto) VALUES (
            :nombre_concepto,
            :descripcion_concepto)');
$query->execute([

        ':nombre_concepto' => $data['nombre_concepto'],
        ':descripcion_concepto' => $data['descripcion_concepto']
    ]);

        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE concepto SET   
        nombre_concepto = :nombre_concepto,  
        descripcion_concepto = :descripcion_concepto WHERE 
        id_concepto = :id_concepto');
        $query->execute([
            ':id_concepto' => $data['id_concepto'],
            ':nombre_concepto' => $data['nombre_concepto'],
            ':descripcion_concepto' => $data['descripcion_concepto']
        ]);

        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM concepto where id_concepto = :id_concepto');
        $query->execute([':id_concepto' => $id]);
        echo 'ok';
    }

    public function read()
    {
        require_once 'conceptoDTO.php';
        $query = "SELECT * FROM concepto";
        $objConcepto = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $concepto = new ConceptoDTO();
                $concepto->id_concepto = $value['id_concepto'];
                $concepto->nombre_concepto = $value['nombre_concepto'];
                $concepto->descripcion_concepto = $value['descripcion_concepto'];
                array_push($objConcepto, $concepto);
            }   
        }else{
            $objConcepto=null;
        }
        return $objConcepto;
    }
}
