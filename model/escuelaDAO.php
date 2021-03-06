<?php
    session_start();
   
 
    class EscuelaDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO escuela values (NULL, 
            :foto_escuela,
            :nombre_escuela,  
            :rfc_escuela,
            :cct_escuela,
            :calle_escuela,
            :numxterior_escuela,
            :numinterior_escuela,
            :cp_escuela,
            :estado_escuela,
            :municipio_escuela,
            :colonia_escuela,
            :telefono_escuela,
            :email_escuela,
            :observacion_escuela)');
            $query->execute([':foto_escuela' => $data['foto_escuela'],
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
            ':telefono_escuela' => $data['telefono_escuela'],
            ':email_escuela' => $data['email_escuela'],
            ':observacion_escuela' => $data['observacion_escuela']]);
            echo 'ok';
        }

        public function update($data)
        {

            $imagen = '';

            $arrayActualizar = [];

            if(isset($data['foto_escuela'])){

                $imagen = 'foto_escuela = :foto_escuela,';

                $arrayActualizar = [
                             ':id_escuela' => $data['id_escuela'],
                             ':foto_escuela' => $data['foto_escuela'],
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
                             ':observacion_escuela' => $data['observacion_escuela']
                ];
            }else{
                $arrayActualizar = [
                    ':id_escuela' => $data['id_escuela'],
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
                    ':observacion_escuela' => $data['observacion_escuela']
                ];  
            }

            $query = $this->db->conectar()->prepare('UPDATE escuela SET 
            ' . $imagen . '
            nombre_escuela = :nombre_escuela,  
            rfc_escuela = :rfc_escuela,
            cct_escuela = :cct_escuela,
            calle_escuela = :calle_escuela,
            numxterior_escuela = :numxterior_escuela,
            numinterior_escuela= :numinterior_escuela,
            cp_escuela = :cp_escuela,
            estado_escuela = :estado_escuela,
            municipio_escuela = :municipio_escuela, 
            colonia_escuela = :colonia_escuela, 
            telefono_escuela = :telefono_escuela,
            email_escuela = :email_escuela,
            observacion_escuela = :observacion_escuela 
            WHERE id_escuela = :id_escuela');

            $query->execute($arrayActualizar);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM escuela where id_escuela = :id_escuela');
            $query->execute([':id_escuela' => $id]);
            echo 'ok';
        }
        
        public function contar(){
            
            $query = $this->db->consultar("SELECT * FROM escuela");
            $rows = count($query);
            
            return $rows;

        }
        
       

        public function read()
        {
            
            $tipo = $_SESSION['tipo'];
            
            require_once 'escuelaDTO.php';
            
            if($tipo == 'administrador'){
                
                $query = "SELECT * FROM escuela";
                $objEscuela = array();
                foreach ($this->db->consultar($query) as $key => $value) {
                $escuela= new EscuelaDTO();
                $escuela->id_escuela = $value['id_escuela'];
                $escuela->foto_escuela = $value['foto_escuela'];
                $escuela->nombre_escuela = $value['nombre_escuela'];
                $escuela->rfc_escuela = $value['rfc_escuela'];
                $escuela->cct_escuela = $value['cct_escuela'];
                $escuela->calle_escuela = $value['calle_escuela'];
                $escuela->numxterior_escuela = $value['numxterior_escuela'];
                $escuela->numinterior_escuela = $value['numinterior_escuela'];
                $escuela->cp_escuela = $value['cp_escuela'];
                $escuela->estado_escuela = $value['estado_escuela'];
                $escuela->municipio_escuela = $value['municipio_escuela'];
                $escuela->colonia_escuela = $value['colonia_escuela'];
                $escuela->telefono_escuela = $value['telefono_escuela'];
                $escuela->email_escuela = $value['email_escuela'];
                $escuela->observacion_escuela = $value['observacion_escuela'];
                
               
                array_push($objEscuela, $escuela);
            }
                
            }else if($tipo != 'administrador'){
                
                $id_escuela = $_SESSION['id_escuela'];
                $query = "SELECT * FROM escuela where id_escuela = '".$id_escuela."'";
                $objEscuela = array();
                foreach ($this->db->consultar($query) as $key => $value) {
                $escuela= new EscuelaDTO();
                $escuela->id_escuela = $value['id_escuela'];
                $escuela->foto_escuela = $value['foto_escuela'];
                $escuela->nombre_escuela = $value['nombre_escuela'];
                $escuela->rfc_escuela = $value['rfc_escuela'];
                $escuela->cct_escuela = $value['cct_escuela'];
                $escuela->calle_escuela = $value['calle_escuela'];
                $escuela->numxterior_escuela = $value['numxterior_escuela'];
                $escuela->numinterior_escuela = $value['numinterior_escuela'];
                $escuela->cp_escuela = $value['cp_escuela'];
                $escuela->estado_escuela = $value['estado_escuela'];
                $escuela->municipio_escuela = $value['municipio_escuela'];
                $escuela->colonia_escuela = $value['colonia_escuela'];
                $escuela->telefono_escuela = $value['telefono_escuela'];
                $escuela->email_escuela = $value['email_escuela'];
                $escuela->observacion_escuela = $value['observacion_escuela'];
                
               
                array_push($objEscuela, $escuela);
            }
    
            
            }
            return $objEscuela;
        }

        
  
    }
