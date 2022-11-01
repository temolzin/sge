<?php
session_start();
class TutorDAO extends Model implements CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {

        $query = $this->db->conectar()->prepare('INSERT INTO tutor values (null, :id_alumno, :id_escuela, :id_usuario, :foto_tutor, :nombre_tutor, :appaterno_tutor, :apmaterno_tutor, :fechanacimiento_tutor, :telefono_tutor, :email_tutor, :calle_tutor, :noexterior_tutor, :nointerior_tutor, :cp_tutor, :estado_tutor, :municipio_tutor, :colonia_tutor)');


        $query->execute([':id_alumno' => $data['id_alumno'], ':id_escuela' => $data['id_escuela'], ':id_usuario' => $data['id_usuario'], ':foto_tutor' => $data['foto_tutor'], ':nombre_tutor' => $data['nombre_tutor'], ':appaterno_tutor' => $data['appaterno_tutor'], ':apmaterno_tutor' => $data['apmaterno_tutor'], ':fechanacimiento_tutor' => $data['fechanacimiento_tutor'], ':telefono_tutor' => $data['telefono_tutor'], ':email_tutor' => $data['email_tutor'], ':calle_tutor' => $data['calle_tutor'], ':noexterior_tutor' => $data['noexterior_tutor'], ':nointerior_tutor' => $data['nointerior_tutor'], ':cp_tutor' => $data['cp_tutor'], ':estado_tutor' => $data['estado_tutor'], ':municipio_tutor' => $data['municipio_tutor'], ':colonia_tutor' => $data['colonia_tutor']]);

        echo 'ok';
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE tutor SET 
            id_alumno = :id_alumno, 
            id_escuela = :id_escuela, 
            id_usuario = :id_usuario, 
            foto_tutor = :foto_tutor,
            nombre_tutor = :nombre_tutor, 
            appaterno_tutor = :appaterno_tutor, 
            apmaterno_tutor = :apmaterno_tutor, 
            fechanacimiento_tutor = :fechanacimiento_tutor, 
            telefono_tutor = :telefono_tutor, 
            email_tutor = :email_tutor, 
            calle_tutor = :calle_tutor, 
            noexterior_tutor = :noexterior_tutor, 
            nointerior_tutor = :nointerior_tutor, 
            cp_tutor = :cp_tutor, 
            estado_tutor = :estado_tutor, 
            municipio_tutor = :municipio_tutor, 
            colonia_tutor = :colonia_tutor 
            WHERE id_tutor = :id_tutor');

        $query->execute([':id_tutor' => $data['id_tutor'], ':id_alumno' => $data['id_alumno'], ':id_escuela' => $data['id_escuela'], ':id_usuario' => $data['id_usuario'], ':foto_tutor' => $data['foto_tutor'], ':nombre_tutor' => $data['nombre_tutor'], ':appaterno_tutor' => $data['appaterno_tutor'], ':apmaterno_tutor' => $data['apmaterno_tutor'], ':fechanacimiento_tutor' => $data['fechanacimiento_tutor'], ':telefono_tutor' => $data['telefono_tutor'], ':email_tutor' => $data['email_tutor'], ':calle_tutor' => $data['calle_tutor'], ':noexterior_tutor' => $data['noexterior_tutor'], ':nointerior_tutor' => $data['nointerior_tutor'], ':cp_tutor' => $data['cp_tutor'], ':estado_tutor' => $data['estado_tutor'], ':municipio_tutor' => $data['municipio_tutor'], ':colonia_tutor' => $data['colonia_tutor']]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM tutor where id_tutor = :id_tutor');
        $query->execute([':id_tutor' => $id]);
        echo 'ok';
    }

    public function read()
    {
        $id_escuela = $_SESSION['id_escuela'];

        require_once 'tutorDTO.php';
        $query = "SELECT tutor.*, usuario.*, alumno.nombre_alumno, alumno.appaterno_alumno, alumno.apmaterno_alumno, escuela.nombre_escuela
        FROM escuela, alumno, tutor, usuario
        WHERE usuario.id_usuario = tutor.id_usuario 
        AND tutor.id_alumno = alumno.id_alumno 
        AND tutor.id_escuela = escuela.id_escuela
        AND alumno.id_escuela = tutor.id_escuela 
        AND alumno.id_escuela = '" . $id_escuela . "'";
        $objTutores = array();
        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
            foreach ($this->db->consultar($query) as $key => $value) {
                $tutor = new TutorDTO();
                $tutor->id_tutor = $value['id_tutor'];
                $tutor->nombre_tutor = $value['nombre_tutor'];
                $tutor->appaterno_tutor = $value['appaterno_tutor'];
                $tutor->apmaterno_tutor = $value['apmaterno_tutor'];
                $tutor->id_alumno = $value['id_alumno'];
                $tutor->id_escuela = $value['id_escuela'];
                $tutor->id_usuario = $value['id_usuario'];
                $tutor->foto_tutor = $value['foto_tutor'];
                $tutor->fechanacimiento_tutor = $value['fechanacimiento_tutor'];
                $tutor->telefono_tutor = $value['telefono_tutor'];
                $tutor->email_tutor = $value['email_tutor'];
                $tutor->calle_tutor = $value['calle_tutor'];
                $tutor->noexterior_tutor = $value['noexterior_tutor'];
                $tutor->nointerior_tutor = $value['nointerior_tutor'];
                $tutor->cp_tutor = $value['cp_tutor'];
                $tutor->id_tipo_usuario = $value['id_tipo_usuario'];
                $tutor->estado_tutor = $value['estado_tutor'];
                $tutor->municipio_tutor = $value['municipio_tutor'];
                $tutor->colonia_tutor = $value['colonia_tutor'];


                $tutor->nombre_escuela = $value['nombre_escuela'];
                $tutor->nombre_alumno = $value['nombre_alumno'];
                $tutor->appaterno_alumno = $value['appaterno_alumno'];
                $tutor->apmaterno_alumno = $value['apmaterno_alumno'];
                $tutor->username_usuario = $value['username_usuario'];
                $tutor->password_usuario = $value['password_usuario'];
                array_push($objTutores, $tutor);
            }
        } else {
            $objTutores = null;
        }

        return $objTutores;
    }
}
