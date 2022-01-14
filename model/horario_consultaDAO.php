<?php
    class Horario_consultaDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM horario_materia where id_horario = :id_horario');
            $query->execute([':id_horario' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'horario_consultaDTO.php';
            $query = "SELECT * FROM horario_materia";
            $objHorarios = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $horario = new Horario_consultaDTO();
                $horario->id_horario = $value['id_horario'];
                $horario->materia_fecha_horario = $value['materia_fecha_horario'];
                $horario->materia_horainicio_horario = $value['materia_horainicio_horario'];
                $horario->materia_horafin_horario = $value['materia_horafin_horario'];
                array_push($objHorarios, $horario);
            }
            return $objHorarios;
        }
    }
?>
