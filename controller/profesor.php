<?php
class Profesor extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('profesor/index');
    }

    function insert()
    {
        $id_grado_academico = $_POST['id_grado_academico'];
        $id_escuela = $_POST['id_escuela'];
        $id_usuario =  $_POST['id_usuario'];
        $nombre_profesor = $_POST['nombre_profesor'];
        $appaterno_profesor = $_POST['appaterno_profesor'];
        $apmaterno_profesor = $_POST['apmaterno_profesor'];
        $cedula_profesor = $_POST['cedula_profesor'];
        $calle_profesor = $_POST['calle_profesor'];
        $numexterior_profesor = $_POST['numexterior_profesor'];
        $numinterior_profesor = $_POST['numinterior_profesor'];
        $cp_profesor = $_POST['codigoPostal'];
        $estado_profesor = $_POST['selectEstado'];
        $municipio_profesor = $_POST['selectMunicipio'];
        $colonia_profesor = $_POST['selectColonia'];
        $telefono_profesor = $_POST['telefono_profesor'];
        $email_profesor = $_POST['email_profesor'];
        $fechanacimiento_profesor = $_POST['fechanacimiento_profesor'];
        $nombreImagen = "";
        if ($_FILES["foto_profesor"]["name"] != null) {
            $imagen = $_FILES["foto_profesor"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];

            $fullname = $appaterno_profesor . "_" . $apmaterno_profesor . "_" . $nombre_profesor;
            $carpeta = constant('URL') . "public/profesor/" . $fullname . "/";

            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta . $nombreImagen);

                $data = array(
                    'id_grado_academico' => $id_grado_academico,
                    'id_escuela' => $id_escuela,
                    'id_usuario' => $id_usuario,
                    'foto_profesor' => $nombreImagen,
                    'nombre_profesor' => $nombre_profesor,
                    'appaterno_profesor' => $appaterno_profesor,
                    'apmaterno_profesor' => $apmaterno_profesor,
                    'cedula_profesor' => $cedula_profesor,
                    'calle_profesor' => $calle_profesor,
                    'calle_profesor' => $calle_profesor,
                    'numexterior_profesor' => $numexterior_profesor,
                    'numinterior_profesor' => $numinterior_profesor,
                    'cp_profesor' => $cp_profesor,
                    'estado_profesor' => $estado_profesor,
                    'municipio_profesor' => $municipio_profesor,
                    'colonia_profesor' => $colonia_profesor,
                    'telefono_profesor' => $telefono_profesor,
                    'email_profesor' => $email_profesor,
                    'fechanacimiento_profesor' => $fechanacimiento_profesor
                );

                require 'model/profesorDAO.php';
                $this->loadModel('ProfesorDAO');
                $profesorDAO = new ProfesorDAO();
                $profesorDAO->insert($data);
            }
        }
    }

    function update()
    {
        $id_profesor = $_POST['id_profesorActualizar'];
        $id_grado_academico = $_POST['id_grado_academicoActualizar'];
        $id_escuela = $_POST['id_escuelaActualizar'];
        $id_usuario = $_POST['id_usuarioActualizar'];
        /**$foto_profesor = $_POST['foto_profesorActualizar'];**/
        $nombre_profesor = $_POST['nombre_profesorActualizar'];
        $appaterno_profesor = $_POST['appaterno_profesorActualizar'];
        $apmaterno_profesor = $_POST['apmaterno_profesorActualizar'];
        $cedula_profesor = $_POST['cedula_profesorActualizar'];
        $calle_profesor = $_POST['calle_profesorActualizar'];
        $numexterior_profesor = $_POST['numexterior_profesorActualizar'];
        $numinterior_profesor = $_POST['numinterior_profesorActualizar'];
        $cp_profesor = $_POST['codigoPostalActualizar'];
        $estado_profesor = $_POST['selectEstadoActualizar'];
        $municipio_profesor = $_POST['selectMunicipioActualizar'];
        $colonia_profesor = $_POST['selectColoniaActualizar'];
        $telefono_profesor = $_POST['telefono_profesorActualizar'];
        $email_profesor = $_POST['email_profesorActualizar'];
        $fechanacimiento_profesor = $_POST['fechanacimiento_profesorActualizar'];
        $nombreImagen = "";
        if ($_FILES["foto_profesorActualizar"]["name"] != null) {
            $imagen = $_FILES["foto_profesorActualizar"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];
            $fullname = $appaterno_profesor . "_" . $apmaterno_profesor . "_" . $nombre_profesor;
            $carpeta = constant('URL') . "public/profesor/" . $fullname . "/";

            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta . $nombreImagen);
                $data = array(
                    'id_profesor' => $id_profesor,
                    'id_grado_academico' => $id_grado_academico,
                    'id_escuela' => $id_escuela,
                    'id_usuario' => $id_usuario,
                    'foto_profesor' => $nombreImagen,
                    'nombre_profesor' => $nombre_profesor,
                    'appaterno_profesor' => $appaterno_profesor,
                    'apmaterno_profesor' => $apmaterno_profesor,
                    'cedula_profesor' => $cedula_profesor,
                    'calle_profesor' => $calle_profesor,
                    'numexterior_profesor' => $numexterior_profesor,
                    'numinterior_profesor' => $numinterior_profesor,
                    'cp_profesor' => $cp_profesor,
                    'estado_profesor' => $estado_profesor,
                    'municipio_profesor' => $municipio_profesor,
                    'colonia_profesor' => $colonia_profesor,
                    'telefono_profesor' => $telefono_profesor,
                    'email_profesor' => $email_profesor,
                    'fechanacimiento_profesor' => $fechanacimiento_profesor
                );

                require 'model/profesorDAO.php';
                $this->loadModel('ProfesorDAO');
                $profesorDAO = new ProfesorDAO();
                $profesorDAO->update($data);
            }
        }
    }
    function delete()
    {
        $id_profesor = $_POST['idEliminarProfe'];

        require 'model/profesorDAO.php';
        $this->loadModel('profesorDAO');
        $profesorDAO = new ProfesorDAO();
        $profesorDAO->delete($id_profesor);
    }


    function read()
    {
        require 'model/profesorDAO.php';
        $this->loadModel('ProfesorDAO');
        $profesorDAO = new ProfesorDAO();
        $profesorDAO = $profesorDAO->read();
        echo json_encode($profesorDAO);
    }



    function readTable()
    {
        require 'model/profesorDAO.php';
        $this->loadModel('ProfesorDAO');
        $profesorDAO = new ProfesorDAO();
        $profesorDAO = $profesorDAO->read();

        $obj = null;
        if (is_array($profesorDAO) || is_object($profesorDAO)) {
            foreach ($profesorDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }
}
