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
            $query->execute([':nombre_escuela' => $data['nombre_escuela'],
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
            $id_escuela = $_SESSION['id_escuela'];
            
            require_once 'escuelaDTO.php';
            $query = "SELECT * FROM escuela where id_escuela = '".$id_escuela."'";
            $objEscuela = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $escuela= new EscuelaDTO();
                $escuela->id_escuela = $value['id_escuela'];
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
            return $objEscuela;
        }

        
  // public function readById()
  //   {
      
  //       $query = $this->db->consultar("SELECT calificacion.*, profesor.id_profesor, alumno.id_alumno 
  //           FROM calificacion calificacion, profesor profesor, alumno alumno, parcial parcial, materia materia 
  //           WHERE calificacion.id_profesor = profesor.id_profesor AND calificacion.id_alumno = alumno.id_alumno AND calificacion.id_parcial = parcial.id_parcial AND calificacion.id_materia = materia.id_materia"); 

  //       foreach (($query) as $key => $value){

  //          $_SESSION['id_calificacion'] = $value['id_calificacion'];
  //          $_SESSION['id_profesor'] = $value['id_profesor'];
  //          $_SESSION['id_alumno'] = $value['id_alumno'];
  //          $_SESSION['id_parcial'] = $value['id_parcial'];
  //          $_SESSION['id_materia'] = $value['id_materia'];
  //          $_SESSION['calificacion'] = $value['calificacion'];
  //          $_SESSION['observacion_calificacion'] = $value['observacion_calificacion'];
  //          $_SESSION['fecha_calificacion'] = $value['fecha_calificacion'];
  //      }
  //   }
    }
?>
