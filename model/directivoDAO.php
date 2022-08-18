<?php
session_start();


class DirectivoDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO director values (null, :id_escuela, :id_grado_academico, :id_usuario, :foto_director, :nombre_director, :appaterno_director, :apmaterno_director, :rfc_director, :curp_director, :calle_director, :numexterior_director, :numinterior_director, :cp_director, :estado_director, :municipio_director, :colonia_director, :telefono_director, :email_director, :cedulaprofesional_director, :fechanacimiento_director)');


        $query->execute([
            ':id_escuela' => $data['id_escuela'],
            ':id_grado_academico' => $data['id_grado_academico'],
            ':id_usuario' => $data['id_usuario'],
            ':foto_director' => $data['foto_director'],
            ':nombre_director' => $data['nombre_director'],
            ':appaterno_director' => $data['appaterno_director'],
            ':apmaterno_director' => $data['apmaterno_director'],
            ':rfc_director' => $data['rfc_director'],
            ':curp_director' => $data['curp_director'],
            ':calle_director' => $data['calle_director'],
            ':numexterior_director' => $data['numexterior_director'],
            ':numinterior_director' => $data['numinterior_director'],
            ':cp_director' => $data['cp_director'],
            ':estado_director' => $data['estado_director'],
            ':municipio_director' => $data['municipio_director'],
            ':colonia_director' => $data['colonia_director'],
            ':telefono_director' => $data['telefono_director'],
            ':email_director' => $data['email_director'],
            ':cedulaprofesional_director' => $data['cedulaprofesional_director'],
            ':fechanacimiento_director' => $data['fechanacimiento_director']
        ]);

        echo 'ok';
    }

    public function update($data)
    {
        //add
        $imagen = '';

        // $banderafoto = 0;

        //add
        $arrayActualizar = [];

        if (isset($data['foto_director'])) {
            // $banderafoto = 1;
            //add
            $imagen = 'foto_director = :foto_director,';

            $arrayActualizar = [
                ':id_director' => $data['id_director'],
                ':id_escuela' => $data['id_escuela'],
                ':id_grado_academico' => $data['id_grado_academico'],
                ':id_usuario' => $data['id_usuario'],
                ':foto_director' => $data['foto_director'],
                ':nombre_director' => $data['nombre_director'],
                ':appaterno_director' => $data['appaterno_director'],
                ':apmaterno_director' => $data['apmaterno_director'],
                ':rfc_director' => $data['rfc_director'],
                ':curp_director' => $data['curp_director'],
                ':calle_director' => $data['calle_director'],
                ':numexterior_director' => $data['numexterior_director'],
                ':numinterior_director' => $data['numinterior_director'],
                ':cp_director' => $data['cp_director'],
                ':estado_director' => $data['estado_director'],
                ':municipio_director' => $data['municipio_director'],
                ':colonia_director' => $data['colonia_director'],
                ':telefono_director' => $data['telefono_director'],
                ':email_director' => $data['email_director'],
                ':cedulaprofesional_director' => $data['cedulaprofesional_director'],
                ':fechanacimiento_director' => $data['fechanacimiento_director']
            ];
        } else {
            $arrayActualizar = [
                ':id_director' => $data['id_director'],
                ':id_escuela' => $data['id_escuela'],
                ':id_grado_academico' => $data['id_grado_academico'],
                ':id_usuario' => $data['id_usuario'],
                ':nombre_director' => $data['nombre_director'],
                ':appaterno_director' => $data['appaterno_director'],
                ':apmaterno_director' => $data['apmaterno_director'],
                ':rfc_director' => $data['rfc_director'],
                ':curp_director' => $data['curp_director'],
                ':calle_director' => $data['calle_director'],
                ':numexterior_director' => $data['numexterior_director'],
                ':numinterior_director' => $data['numinterior_director'],
                ':cp_director' => $data['cp_director'],
                ':estado_director' => $data['estado_director'],
                ':municipio_director' => $data['municipio_director'],
                ':colonia_director' => $data['colonia_director'],
                ':telefono_director' => $data['telefono_director'],
                ':email_director' => $data['email_director'],
                ':cedulaprofesional_director' => $data['cedulaprofesional_director'],
                ':fechanacimiento_director' => $data['fechanacimiento_director']
            ];
        }

        $query = $this->db->conectar()->prepare('UPDATE director SET 
            
            id_escuela = :id_escuela,
            id_grado_academico = :id_grado_academico, 
            id_usuario = :id_usuario,
            ' . $imagen . ' 
            nombre_director = :nombre_director, 
            appaterno_director = :appaterno_director, 
            apmaterno_director = :apmaterno_director, 
            rfc_director = :rfc_director, 
            curp_director = :curp_director, 
            calle_director = :calle_director, 
            numexterior_director = :numexterior_director, 
            numinterior_director = :numinterior_director, 
            cp_director = :cp_director, 
            estado_director = :estado_director, 
            municipio_director = :municipio_director, 
            colonia_director = :colonia_director,
            telefono_director = :telefono_director,
            email_director = :email_director,
            cedulaprofesional_director = :cedulaprofesional_director,
            fechanacimiento_director = :fechanacimiento_director  
            WHERE id_director = :id_director');

            $query->execute($arrayActualizar);
            echo 'ok';

        // if($query->execute($arrayActualizar)){
        //     if($banderafoto == 1){
        //         $_SESSION['foto']=$data['foto_director'];
        //     }
        //     echo 'ok';
        // }else{
        //     echo 'Error al Actualizar';
        // }
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM director where id_director = :id_director');
        $query->execute([':id_director' => $id]);
        echo 'ok';
    }

    public function read()
    {
        $tipo = $_SESSION['tipo'];


        if ($tipo == 'administrador') {

            require_once 'directivoDTO.php';
            $query = "SELECT * FROM director INNER JOIN escuela on director.id_escuela =escuela.id_escuela INNER JOIN usuario on director.id_usuario=usuario.id_usuario order by id_director desc";
            $objdirectores = array();

            if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
                foreach ($this->db->consultar($query) as $key => $value) {
                    $director = new DirectivoDTO();
                    $director->id_director = $value['id_director'];
                    $director->id_escuela = $value['id_escuela'];
                    $director->id_grado_academico = $value['id_grado_academico'];
                    $director->id_usuario = $value['id_usuario'];
                    $director->id_tipo_usuario = $value['id_tipo_usuario'];
                    $director->foto_director = $value['foto_director'];
                    $director->nombre_director = $value['nombre_director'];
                    $director->appaterno_director = $value['appaterno_director'];
                    $director->apmaterno_director = $value['apmaterno_director'];
                    $director->rfc_director = $value['rfc_director'];
                    $director->curp_director = $value['curp_director'];
                    $director->calle_director = $value['calle_director'];
                    $director->numexterior_director = $value['numexterior_director'];
                    $director->numinterior_director = $value['numinterior_director'];
                    $director->cp_director = $value['cp_director'];
                    $director->estado_director = $value['estado_director'];
                    $director->municipio_director = $value['municipio_director'];
                    $director->colonia_director = $value['colonia_director'];
                    $director->telefono_director = $value['telefono_director'];
                    $director->email_director = $value['email_director'];
                    $director->cedulaprofesional_director = $value['cedulaprofesional_director'];
                    $director->fechanacimiento_director = $value['fechanacimiento_director'];

                    $director->nombre_escuela = $value['nombre_escuela'];
                    $director->username_usuario = $value['username_usuario'];
                    $director->password_usuario = $value['password_usuario'];

                    array_push($objdirectores, $director);
                }
            } else {
                $objdirectores = null;
            }
            return $objdirectores;
        } else {

            $id_escuela = $_SESSION['id_escuela'];

            require_once 'directivoDTO.php';
            $query = "SELECT * FROM director INNER JOIN usuario on director.id_usuario=usuario.id_usuario INNER JOIN escuela on director.id_escuela=escuela.id_escuela WHERE escuela.id_escuela = '" . $id_escuela . "'";
            $objdirectores = array();

            if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
                foreach ($this->db->consultar($query) as $key => $value) {
                    $director = new DirectivoDTO();
                    $director->id_director = $value['id_director'];
                    $director->id_escuela = $value['id_escuela'];
                    $director->id_grado_academico = $value['id_grado_academico'];
                    $director->id_usuario = $value['id_usuario'];
                    $director->id_tipo_usuario = $value['id_tipo_usuario'];
                    $director->foto_director = $value['foto_director'];
                    $director->nombre_director = $value['nombre_director'];
                    $director->nombre_escuela = $value['nombre_escuela'];
                    $director->appaterno_director = $value['appaterno_director'];
                    $director->apmaterno_director = $value['apmaterno_director'];
                    $director->rfc_director = $value['rfc_director'];
                    $director->curp_director = $value['curp_director'];
                    $director->calle_director = $value['calle_director'];
                    $director->numexterior_director = $value['numexterior_director'];
                    $director->numinterior_director = $value['numinterior_director'];
                    $director->cp_director = $value['cp_director'];
                    $director->estado_director = $value['estado_director'];
                    $director->municipio_director = $value['municipio_director'];
                    $director->colonia_director = $value['colonia_director'];
                    $director->telefono_director = $value['telefono_director'];
                    $director->email_director = $value['email_director'];
                    $director->cedulaprofesional_director = $value['cedulaprofesional_director'];
                    $director->fechanacimiento_director = $value['fechanacimiento_director'];
                    $director->username_usuario = $value['username_usuario'];
                    $director->password_usuario = $value['password_usuario'];

                    array_push($objdirectores, $director);
                }
            } else {
                $objdirectores = null;
            }
            return $objdirectores;
        }
    }

    //******************************************* DIRECTIVO MOSTRAR *********************************

    public function readDirectivoMostrar()
    {
        require_once 'directivoDTO.php';
        $query = "SELECT * FROM director INNER JOIN escuela on director.id_escuela =escuela.id_escuela INNER JOIN usuario on director.id_usuario=usuario.id_usuario WHERE id_director =2";
        $objdirectores = array();
        foreach ($this->db->consultar($query) as $key => $value) {
            $director = new DirectivoDTO();
            $director->id_director = $value['id_director'];
            $director->id_escuela = $value['id_escuela'];
            $director->id_grado_academico = $value['id_grado_academico'];
            $director->id_usuario = $value['id_usuario'];
            $director->foto_director = $value['foto_director'];
            $director->nombre_director = $value['nombre_director'];
            $director->appaterno_director = $value['appaterno_director'];
            $director->apmaterno_director = $value['apmaterno_director'];
            $director->rfc_director = $value['rfc_director'];
            $director->curp_director = $value['curp_director'];
            $director->calle_director = $value['calle_director'];
            $director->numexterior_director = $value['numexterior_director'];
            $director->numinterior_director = $value['numinterior_director'];
            $director->cp_director = $value['cp_director'];
            $director->estado_director = $value['estado_director'];
            $director->municipio_director = $value['municipio_director'];
            $director->colonia_director = $value['colonia_director'];
            $director->telefono_director = $value['telefono_director'];
            $director->email_director = $value['email_director'];
            $director->cedulaprofesional_director = $value['cedulaprofesional_director'];
            $director->fechanacimiento_director = $value['fechanacimiento_director'];

            $director->nombre_escuela = $value['nombre_escuela'];
            $director->username_usuario = $value['username_usuario'];
            $director->password_usuario = $value['password_usuario'];

            array_push($objdirectores, $director);
        }
        return $objdirectores;
    }
}
