<?php
session_start();
class CobroDAO extends Model implements CRUD {
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO cobro (`id_cobro`, `id_alumno`, `cantidad_cobro`, `iva_cobro`, `concepto_cobro`, `fechalimite_cobro`, `activo_cobro`) 
            values (null, 
            :id_alumno, 
            :cantidad_cobro, 
            :iva_cobro , 
            :concepto_cobro , 
            :fechalimite_cobro, 
            :activo_cobro)');
        $query->execute([':id_alumno' => $data['id_alumno'],
            ':cantidad_cobro' => $data['cantidad_cobro'], 
            ':iva_cobro' => $data['iva_cobro'], 
            ':concepto_cobro' => $data['concepto_cobro'], 
            ':fechalimite_cobro' => $data['fechalimite_cobro'], 
            ':activo_cobro' => 1]); 
        echo 'ok'; 
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE cobro SET  
            id_alumno = :id_alumno, 
            cantidad_cobro = :cantidad_cobro, 
            iva_cobro = :iva_cobro, 
            concepto_cobro = :concepto_cobro, 
            fechalimite_cobro = :fechalimite_cobro 
            WHERE id_cobro = :id_cobro');
        $query->execute([':id_cobro' => $data['id_cobro'], 
            ':id_alumno' => $data['id_alumno'], 
            ':cantidad_cobro' => $data['cantidad_cobro'], 
            ':iva_cobro' => $data['iva_cobro'], 
            ':concepto_cobro' => $data['concepto_cobro'], 
            ':fechalimite_cobro' => $data['fechalimite_cobro']]); 
        echo 'ok'; 
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM cobro where id_cobro = :id_cobro');
        $query->execute([':id_cobro' => $id]);
        echo 'ok';
    }

    public function read()
    {
        $id_escuela = $_SESSION['id_escuela'];
        require_once 'cobroDTO.php';
        $query = "SELECT * FROM cobro 
        INNER JOIN alumno on cobro.id_alumno=alumno.id_alumno
        INNER JOIN escuela on alumno.id_escuela=escuela.id_escuela
        INNER JOIN director on escuela.id_escuela=director.id_escuela 
        WHERE cobro.id_alumno=alumno.id_alumno and alumno.id_escuela = escuela.id_escuela and director.id_escuela = escuela.id_escuela and director.id_escuela and director.id_escuela = '".$id_escuela."'";
        $objCobros = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $cobro = new CobroDTO();
                $cobro->id_cobro = $value['id_cobro'];
                $cobro->id_alumno = $value['id_alumno'];
                $cobro->cantidad_cobro = $value['cantidad_cobro'];
                $cobro->iva_cobro = $value['iva_cobro'];
                $cobro->concepto_cobro = $value['concepto_cobro'];
                $cobro->fecha_cobro = $value['fecha_cobro'];
                $cobro->fechalimite_cobro = $value['fechalimite_cobro'];
                $cobro->activo_cobro = $value['activo_cobro']; 

                $cobro->nombre_alumno = $value['nombre_alumno'];
                $cobro->appaterno_alumno = $value['appaterno_alumno'];
                $cobro->apmaterno_alumno = $value['apmaterno_alumno'];

                array_push($objCobros, $cobro);
            }
        } else {
            $objCobros = null;
        }

        return $objCobros;
    }
}
?>
