

<?php
session_start();
class PagoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO pago (`id_pago`, `id_cobro`, `cantidad_pago`, `descripcion_pago`, `monto_cobro_pago`, `restante_pago`) 
           values (null, 
           :id_cobro, 
           :cantidad_pago, 
           :descripcion_pago, 
           :monto_cobro_pago,
           :restante_pago
       )');
        $query->execute([
            ':id_cobro' => $data['id_cobro'],
            ':cantidad_pago' => $data['cantidad_pago'],
            ':descripcion_pago' => $data['descripcion_pago'],
            ':monto_cobro_pago' => $data['monto_cobro_pago'],
            ':restante_pago' => $data['restante_pago']
        ]);
        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE pago SET  
            id_cobro = :id_cobro, 
            cantidad_pago = :cantidad_pago, 
            descripcion_pago = :descripcion_pago, 
            monto_cobro_pago = :monto_cobro_pago, 
            restante_pago = :restante_pago 
            WHERE id_pago = :id_pago');
        $query->execute([
            ':id_pago' => $data['id_pago'],
            ':id_cobro' => $data['id_cobro'],
            ':cantidad_pago' => $data['cantidad_pago'],
            ':descripcion_pago' => $data['descripcion_pago'],
            ':monto_cobro_pago' => $data['monto_cobro_pago'],
            ':restante_pago' => $data['restante_pago']
        ]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM pago where id_pago = :id_pago');
        $query->execute([':id_pago' => $id]);
        echo 'ok';
    }

    public function read()
    {
        $id_escuela = $_SESSION['id_escuela'];
        require_once 'pagoDTO.php';
        $query = "SELECT * FROM pago
        INNER JOIN cobro on pago.id_cobro=cobro.id_cobro
        INNER JOIN alumno on cobro.id_alumno=alumno.id_alumno
        INNER JOIN escuela on alumno.id_escuela=escuela.id_escuela
        INNER JOIN director on escuela.id_escuela=director.id_escuela 
        WHERE pago.id_cobro=cobro.id_cobro and cobro.id_alumno=alumno.id_alumno and alumno.id_escuela = escuela.id_escuela 
        and director.id_escuela = escuela.id_escuela and director.id_escuela and director.id_escuela = '" . $id_escuela . "'";
        $objPagos = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $pago = new PagoDTO();
                $pago->id_pago = $value['id_pago'];
                $pago->id_cobro = $value['id_cobro'];
                $pago->cantidad_pago = $value['cantidad_pago'];
                $pago->descripcion_pago = $value['descripcion_pago'];
                $pago->fecha_pago = $value['fecha_pago'];
                $pago->hora_pago = $value['hora_pago'];
                $pago->monto_cobro_pago = $value['monto_cobro_pago'];
                $pago->restante_pago = $value['restante_pago'];
                $pago->nombre_alumno = $value['nombre_alumno'];
                $pago->appaterno_alumno = $value['appaterno_alumno'];
                $pago->apmaterno_alumno = $value['apmaterno_alumno'];
                array_push($objPagos, $pago);
            }
        } else {
            $objPagos = null;
        }

        return $objPagos;
    }
}
?>
