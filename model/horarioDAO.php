<?php
session_start();
class HorarioDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO horario_materia values (null, :materia_fecha_horario, :materia_horainicio_horario, :materia_horafin_horario)');
        $query->execute([':materia_fecha_horario' => $data['materia_fecha_horario'], ':materia_horainicio_horario' => $data['materia_horainicio_horario'], ':materia_horafin_horario' => $data['materia_horafin_horario']]);
        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE horario_materia SET  materia_fecha_horario = :materia_fecha_horario, materia_horainicio_horario = :materia_horainicio_horario, materia_horafin_horario = :materia_horafin_horario WHERE id_horario = :id_horario');
        $query->execute([':id_horario' => $data['id_horario'], ':materia_fecha_horario' => $data['materia_fecha_horario'], ':materia_horainicio_horario' => $data['materia_horainicio_horario'], ':materia_horafin_horario' => $data['materia_horafin_horario']]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM horario_materia where id_horario = :id_horario');
        $query->execute([':id_horario' => $id]);
        echo 'ok';
    }





    public function read()
    {
        $tipo = $_SESSION['tipo'];


        if ($tipo == 'Director') {
            $id_escuela = $_SESSION['id_escuela'];
            require_once 'horarioDTO.php';
            $query = "SELECT materia.*, horario_materia.* from horario_materia horario_materia,  materia materia, escuela escuela, director director 
    where horario_materia.id_horario = materia.id_horario and 
    materia.id_escuela = escuela.id_escuela and 
    director.id_escuela = escuela.id_escuela 
    and  director.id_escuela  = materia.id_escuela and 
    director.id_escuela =   '" . $id_escuela . "'";
            $objHorarios = array();

            if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
                foreach ($this->db->consultar($query) as $key => $value) {
                    $horario = new HorarioDTO();
                    $horario->id_horario = $value['id_horario'];
                    $horario->materia_fecha_horario = $value['materia_fecha_horario'];
                    $horario->materia_horainicio_horario = $value['materia_horainicio_horario'];
                    $horario->materia_horafin_horario = $value['materia_horafin_horario'];
                    array_push($objHorarios, $horario);
                }
            } else {
                $objHorarios = null;
            }

            return $objHorarios;
        } else {

            require_once 'horarioDTO.php';
            $query = "SELECT * FROM horario_materia";
            $objHorarios = array();

            if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
                foreach ($this->db->consultar($query) as $key => $value) {
                    $horario = new HorarioDTO();
                    $horario->id_horario = $value['id_horario'];
                    $horario->materia_fecha_horario = $value['materia_fecha_horario'];
                    $horario->materia_horainicio_horario = $value['materia_horainicio_horario'];
                    $horario->materia_horafin_horario = $value['materia_horafin_horario'];
                    array_push($objHorarios, $horario);
                }
            } else {
                $objHorarios = null;
            }

            return $objHorarios;
        }
    }

    //************************************************************************* HORARIO CONSULTA **************************************************

    public function deleteHorarioConsulta($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM horario_materia where id_horario = :id_horario');
        $query->execute([':id_horario' => $id]);
        echo 'ok';
    }

    public function readHorarioConsulta()
    {
        require_once 'horarioDTO.php';
        $query = "SELECT * FROM horario_materia";
        $objHorarios = array();
        foreach ($this->db->consultar($query) as $key => $value) {
            $horario = new HorarioDTO();
            $horario->id_horario = $value['id_horario'];
            $horario->materia_fecha_horario = $value['materia_fecha_horario'];
            $horario->materia_horainicio_horario = $value['materia_horainicio_horario'];
            $horario->materia_horafin_horario = $value['materia_horafin_horario'];
            array_push($objHorarios, $horario);
        }
        return $objHorarios;
    }
}
