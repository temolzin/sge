<?php
class PagoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO pago (`id_pago`, `id_cobro`, `id_alumno`, `cantidad_pago`, `descripcion_pago`, `monto_cobro_pago`, `restante_pago`) 
           values (null, 
           :id_cobro,
           :id_alumno,
           :cantidad_pago, 
           :descripcion_pago, 
           :monto_cobro_pago,
           :restante_pago
       )');
        $query->execute([
            ':id_cobro' => $data['id_cobro'],
            ':id_alumno' => $data['id_alumno'],
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
            id_alumno = :id_alumno,
            cantidad_pago = :cantidad_pago, 
            descripcion_pago = :descripcion_pago, 
            monto_cobro_pago = :monto_cobro_pago, 
            restante_pago = :restante_pago 
            WHERE id_pago = :id_pago');
        $query->execute([
            ':id_pago' => $data['id_pago'],
            ':id_cobro' => $data['id_cobro'],
            'id_alumno' => $data['id_alumno'],
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
        require_once 'pagoDTO.php';
        $query = "SELECT * FROM pago
        INNER JOIN cobro on pago.id_cobro=cobro.id_cobro
        INNER JOIN alumno on cobro.id_alumno=alumno.id_alumno
        INNER JOIN escuela on alumno.id_escuela=escuela.id_escuela
        INNER JOIN director on escuela.id_escuela=director.id_escuela 
        INNER JOIN alumno on pago.id_alumno=alumno.id_alumno 
        WHERE pago.id_cobro=cobro.id_cobro 
        and cobro.id_alumno=alumno.id_alumno 
        and alumno.id_escuela = escuela.id_escuela 
        and director.id_escuela = escuela.id_escuela
        and director.id_escuela = '" . $id_escuela . "'";

        $objPagos = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $pago = new PagoDTO();
                $pago->id_pago = $value['id_pago'];
                $pago->id_cobro = $value['id_cobro'];
                $pago->id_alumno = $value['id_alumno'];
                $pago->cantidad_pago = '$' . number_format($value['cantidad_pago'], 2, '.', ',');
                $pago->descripcion_pago = $value['descripcion_pago'];
                $pago->hora_pago = $value['hora_pago'];
                $pago->monto_cobro_pago = '$' . number_format($value['monto_cobro_pago'], 2, '.', ',');
                $pago->restante_pago = '$' . number_format($value['restante_pago'], 2, '.', ',');
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

    public function readByIdEscuela($id_escuela)
    {
        require_once 'pagoDTO.php';
        $query = "SELECT * FROM pago 
        INNER JOIN cobro 
        on pago.id_cobro=cobro.id_cobro 
        INNER JOIN alumno 
        on cobro.id_alumno=alumno.id_alumno 
        INNER JOIN escuela 
        on alumno.id_escuela=escuela.id_escuela 
        WHERE pago.id_cobro=cobro.id_cobro 
        and cobro.id_alumno=alumno.id_alumno 
        and alumno.id_escuela = escuela.id_escuela 
        and escuela.id_escuela = '" . $id_escuela . "'";
        $objPagos = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $pago = new PagoDTO();
                $pago->id_pago = $value['id_pago'];
                $pago->id_cobro = $value['id_cobro'];
                $pago->cantidad_pago = '$' . number_format($value['cantidad_pago'], 2, '.', ',');
                $pago->descripcion_pago = $value['descripcion_pago'];
                $pago->hora_pago = $value['hora_pago'];
                $pago->monto_cobro_pago = '$' . number_format($value['monto_cobro_pago'], 2, '.', ',');
                $pago->restante_pago = '$' . number_format($value['restante_pago'], 2, '.', ',');
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

    public function readPagosRealizadosByIdAlumno($id_alumno)
    {
        require_once 'pagoDTO.php';
        $query = " SELECT pago.*, alumno.*
            FROM pago pago, alumno alumno
            WHERE pago.id_pago = pago.id_pago
            AND pago.id_alumno = alumno.id_alumno
            AND alumno.id_alumno = '" . $id_alumno . "'
            ORDER BY hora_pago DESC";
        $objPagos = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $pago = new PagoDTO();
                $pago->id_pago = $value['id_pago'];
                $pago->id_cobro = $value['id_cobro'];
                $pago->id_alumno = $value['id_alumno'];
                $pago->cantidad_pago = '$' . number_format($value['cantidad_pago'], 2, '.', ',');
                $pago->descripcion_pago = $value['descripcion_pago'];
                $pago->hora_pago = $value['hora_pago'];
                $pago->monto_cobro_pago = '$' . number_format($value['monto_cobro_pago'], 2, '.', ',');
                $pago->restante_pago = '$' . number_format($value['restante_pago'], 2, '.', ',');
                $pago->nombre_alumno = $value['nombre_alumno'];
                $pago->appaterno_alumno = $value['appaterno_alumno'];
                $pago->apmaterno_alumno = $value['apmaterno_alumno'];
                $_SESSION['id_pago'] = $value['id_pago'];
                $_SESSION['cantidad_pago'] = $value['cantidad_pago'];
                $_SESSION['descripcion_pago'] = $value['descripcion_pago'];
                $_SESSION['hora_pago'] = $value['hora_pago'];
                $_SESSION['monto_cobro_pago'] = $value['monto_cobro_pago'];
                $_SESSION['restante_pago'] = $value['restante_pago'];
                array_push($objPagos, $pago);
            }
        } else {
            $objPagos = null;
        }

        return $objPagos;
        
    }
}
