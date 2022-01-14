<?php
<<<<<<< HEAD
=======
//uwu
>>>>>>> 07b195396864c9f40a48de12bf7228b3e95d487d
    class LlenarescuelaDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO grupo values (NULL, 
            :id_escuela, 
            :nombre_grupo, 
            :turno_grupo)');
            $query->execute([':id_escuela' => $data['id_escuela'],
            ':nombre_grupo' => $data['nombre_grupo'],
            ':turno_grupo' => $data['turno_grupo']]);
            echo 'ok';
        }

        public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE escuela SET nombre_escuela = :nombre_escuela,rfc_escuela = :rfc_escuela,cct_escuela = :cct_escuela,calle_escuela = :calle_escuela,numxterior_escuela = :numxterior_escuela,numinterior_escuela= :numinterior_escuela,cp_escuela = :cp_escuela,estado_escuela = :estado_escuela,municipio_escuela = :municipio_escuela, colonia_escuela = :colonia_escuela, telefono_escuela = :telefono_escuela,email_escuela = :email_escuela,observacion_escuela = :observacion_escuela WHERE id_escuela = :id_escuela');

            $query->execute([':id_escuela' => $data['id_escuela'],
                             ':nombre_escuela' => $data['nombre_escuela'],
                             ':rfc_escuela' => $data['rfc_escuela'],
                             ':cct_escuela' => $data['cct_escuela'],
                             ':calle_escuela' => $data['calle_escuela'],
                             ':numxterior_escuela' => $data['numxterior_escuela'],
                             ':numinterior_escuela' => $data['numinterior_escuela'],
                             ':cp_escuela' => $data['cp_escuela'],
                             ':estado_escuela' => $data['estado_escuela'],
                             ':municipio_escuela' => $data['municipio_escuela'],
                             ':colonia_escuela' => $data['colonia_escuela'],
                             ':numinterior_escuela' => $data['numinterior_escuela'],
                             ':telefono_escuela' => $data['telefono_escuela'],
                             ':email_escuela' => $data['email_escuela'],
                             ':observacion_escuela' => $data['observacion_escuela']]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM escuela where id_escuela = :id_escuela');
            $query->execute([':id_escuela' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'llenarescuelaDTO.php';
            $query = "SELECT * FROM escuela";
            $objLlenarescuela = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $llenarescuela= new LlenarescuelaDTO();
                $llenarescuela -> id_escuela = $value['id_escuela'];
                $llenarescuela -> nombre_escuela = $value['nombre_escuela'];
                array_push($objLlenarescuela, $llenarescuela);
            }
            return $objLlenarescuela;   
        }
    }
?>
