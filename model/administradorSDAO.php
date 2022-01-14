<?php
    class AdministradorSDAO extends Model implements CRUD {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($data)
        {
            $query = $this->db->conectar()->prepare('INSERT INTO admins values (NULL, :escuela_clave,
            :escuela_nombre,
            :escuela_localidad,
            :escuela_turno,
            :nombre_director)');
            $query->execute([':escuela_clave' => $data['escuela_clave'],
                             ':escuela_nombre' => $data['escuela_nombre'],
                             ':escuela_localidad' => $data['escuela_localidad'],
                             ':escuela_turno' => $data['escuela_turno'],
                             ':nombre_director' => $data['nombre_director']]);
            echo 'ok';
        }

       
            
       public function update($data)
        {
            $query = $this->db->conectar()->prepare('UPDATE admins SET  escuela_clave = :escuela_clave, escuela_nombre = :escuela_nombre, escuela_localidad = :escuela_localidad, escuela_turno = :escuela_turno, nombre_director = :nombre_director WHERE matricula_admin = :matricula_admin');
            $query->execute([':matricula_admin' => $data['matricula_admin'],
                             ':escuela_clave' => $data['escuela_clave'],
                             ':escuela_nombre' => $data['escuela_nombre'],
                             ':escuela_localidad' => $data['escuela_localidad'],
                             ':escuela_turno' => $data['escuela_turno'],
                             ':nombre_director' => $data['nombre_director']]);
            echo 'ok';
        }

        public function delete($id)
        {
            $query = $this->db->conectar()->prepare('DELETE FROM admins where matricula_admin = :matricula_admin');
            $query->execute([':matricula_admin' => $id]);
            echo 'ok';
        }

        public function read()
        {
            require_once 'administradorSDTO.php';
            $query = "SELECT * FROM admins";
            $objAdministradorSs = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $administradorS = new AdministradorSDTO();
                $administradorS->matricula_admin = $value['matricula_admin'];
                $administradorS->escuela_clave = $value['escuela_clave'];
                $administradorS->escuela_nombre = $value['escuela_nombre'];
                $administradorS->escuela_localidad = $value['escuela_localidad'];
                $administradorS->escuela_turno = $value['escuela_turno'];
                $administradorS->nombre_director = $value['nombre_director'];
                /*
                $administradorS->director_apaterno = $value['director_apaterno'];
                $administradorS->director_amaterno = $value['director_amaterno'];
               */
                
                $objAdministradorSs['data'][] = $administradorS;
            }
            echo json_encode($objAdministradorSs, JSON_UNESCAPED_UNICODE);
        }
    }
?>
