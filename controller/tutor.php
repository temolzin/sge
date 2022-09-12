<?php
class Tutor extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('tutor/index');
    }

    function insert()
    {
        $id_alumno = $_POST['id_alumno'];
        $id_escuela = $_POST['id_escuela'];
        $id_usuario = $_POST['id_usuario'];
        $nombre_tutor = $_POST['nombre_tutor'];
        $appaterno_tutor = $_POST['appaterno_tutor'];
        $apmaterno_tutor = $_POST['apmaterno_tutor'];
        $fechanacimiento_tutor = $_POST['fechanacimiento_tutor'];
        $telefono_tutor = $_POST['telefono_tutor'];
        $email_tutor = $_POST['email_tutor'];
        $calle_tutor = $_POST['calle_tutor'];
        $noexterior_tutor = $_POST['noexterior_tutor'];
        $nointerior_tutor = $_POST['nointerior_tutor'];
        $cp_tutor = $_POST['codigoPostal'];
        $estado_tutor = $_POST['selectEstado'];
        $municipio_tutor = $_POST['selectMunicipio'];
        $colonia_tutor = $_POST['selectColonia'];
        //$id_tipo_usuario = 5;
        $nombreImagen = "";
        if ($_FILES["foto_tutor"]["name"] != null) {
            $imagen = $_FILES["foto_tutor"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];
            $fullname = $appaterno_tutor . "_" . $apmaterno_tutor . "_" . $nombre_tutor;
            $carpeta = constant('URL') . "public/tutor/" . $fullname . "/";
            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta . $nombreImagen);
                $data = array('id_alumno' => $id_alumno, 'id_escuela' => $id_escuela, 'id_usuario' => $id_usuario, 'foto_tutor' => $nombreImagen, 'nombre_tutor' => $nombre_tutor, 'appaterno_tutor' => $appaterno_tutor, 'apmaterno_tutor' => $apmaterno_tutor, 'fechanacimiento_tutor' => $fechanacimiento_tutor, 'telefono_tutor' => $telefono_tutor, 'email_tutor' => $email_tutor, 'calle_tutor' => $calle_tutor, 'noexterior_tutor' => $noexterior_tutor, 'nointerior_tutor' => $nointerior_tutor, 'cp_tutor' => $cp_tutor, 'estado_tutor' => $estado_tutor, 'municipio_tutor' => $municipio_tutor, 'colonia_tutor' => $colonia_tutor);
                require 'model/tutorDAO.php';
                $this->loadModel('TutorDAO');
                $tutorDAO = new TutorDAO();
                $tutorDAO->insert($data);
            }
        }
    }

    function update()
    {
        $id_tutor = $_POST['id_tutorActualizar'];
        $id_alumno = $_POST['id_alumnoActualizar'];
        $id_escuela = $_POST['id_escuelaActualizar'];
        $id_usuario = $_POST['id_usuarioActualizar'];
        $nombre_tutor = $_POST['nombre_tutorActualizar'];
        $appaterno_tutor = $_POST['appaterno_tutorActualizar'];
        $apmaterno_tutor = $_POST['apmaterno_tutorActualizar'];
        $fechanacimiento_tutor = $_POST['fechanacimiento_tutorActualizar'];
        $telefono_tutor = $_POST['telefono_tutorActualizar'];
        $email_tutor = $_POST['email_tutorActualizar'];
        $calle_tutor = $_POST['calle_tutorActualizar'];
        $noexterior_tutor = $_POST['noexterior_tutorActualizar'];
        $nointerior_tutor = $_POST['nointerior_tutorActualizar'];
        $cp_tutor = $_POST['codigoPostalActualizar'];
        $estado_tutor = $_POST['selectEstadoActualizar'];
        $municipio_tutor = $_POST['selectMunicipioActualizar'];
        $colonia_tutor = $_POST['selectColoniaActualizar'];
        $nombreImagen = "";
        if ($_FILES["imgTutorActualizar"]["name"] != null) {
            $imagen = $_FILES["imgTutorActualizar"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];

            $fullname = $appaterno_tutor . "_" . $apmaterno_tutor . "_" . $nombre_tutor;
            $carpeta = constant('URL') . "public/tutor/" . $fullname . "/";

            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta . $nombreImagen);
                $data = array(
                    'id_tutor' => $id_tutor,
                    'id_alumno' => $id_alumno,
                    'id_escuela' => $id_escuela,
                    'id_usuario' => $id_usuario,
                    'foto_tutor' => $nombreImagen,
                    'nombre_tutor' => $nombre_tutor,
                    'appaterno_tutor' => $appaterno_tutor,
                    'apmaterno_tutor' => $apmaterno_tutor,
                    'fechanacimiento_tutor' => $fechanacimiento_tutor,
                    'telefono_tutor' => $telefono_tutor,
                    'email_tutor' => $email_tutor,
                    'calle_tutor' => $calle_tutor,
                    'noexterior_tutor' => $noexterior_tutor,
                    'nointerior_tutor' => $nointerior_tutor,
                    'cp_tutor' => $cp_tutor,
                    'estado_tutor' => $estado_tutor,
                    'municipio_tutor' => $municipio_tutor,
                    'colonia_tutor' => $colonia_tutor
                );

                require 'model/tutorDAO.php';
                $this->loadModel('TutorDAO');
                $tutorDAO = new TutorDAO();
                $tutorDAO->update($data);
            }
        }
    }

    function delete()
    {
        $id_tutor = $_POST['idEliminarTutor'];

        require 'model/tutorDAO.php';
        $this->loadModel('TutorDAO');
        $tutorDAO = new TutorDAO();
        $tutorDAO->delete($id_tutor);
    }

    function read()
    {
        require 'model/tutorDAO.php';
        $this->loadModel('TutorDAO');
        $tutorDAO = new TutorDAO();
        $tutorDAO = $tutorDAO->read();

        echo json_encode($tutorDAO);
    }

    function readTable()
    {
        require 'model/tutorDAO.php';
        $this->loadModel('TutorDAO');
        $tutorDAO = new TutorDAO();
        $tutorDAO = $tutorDAO->read();

        $obj = null;
        if (is_array($tutorDAO) || is_object($tutorDAO)) {
            foreach ($tutorDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }
}
