<?php
class Directivo extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('directivo/index');
    }

    function showDirectivoMostrar()
    {
        $this->view->render('directivo/DirectivoDetalle');
    }

    function directivo()
    {
        $this->view->render('directivo/directivo');
    }

    function insert()
    {

        $id_escuela = $_POST['id_escuela'];
        $id_grado_academico = $_POST['id_grado_academico'];
        $id_usuario = $_POST['id_usuario'];

        $nombre_director = $_POST['nombre_director'];
        $appaterno_director = $_POST['appaterno_director'];
        $apmaterno_director = $_POST['apmaterno_director'];
        $rfc_director = $_POST['rfc_director'];
        $curp_director = $_POST['curp_director'];
        $calle_director = $_POST['calle_director'];
        $numexterior_director = $_POST['numexterior_director'];
        $numinterior_director = $_POST['numinterior_director'];
        $cp_director = $_POST['codigoPostal'];
        $estado_director = $_POST['selectEstado'];
        $municipio_director = $_POST['selectMunicipio'];
        $colonia_director = $_POST['selectColonia'];
        $telefono_director = $_POST['telefono_director'];
        $email_director = $_POST['email_director'];
        $cedulaprofesional_director = $_POST['cedulaprofesional_director'];
        $fechanacimiento_director = $_POST['fechanacimiento_director'];
        $nombreImagen = "";
        if ($_FILES["foto_director"]["name"] != null) {
            $imagen = $_FILES["foto_director"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];

            $fullname = $appaterno_director . "_" . $apmaterno_director . "_" . $nombre_director;
            $carpeta = constant('URL') . "public/director/" . $fullname . "/";
            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta . $nombreImagen);

                $data = array(
                    'id_escuela' => $id_escuela,
                    'id_grado_academico' => $id_grado_academico,
                    'id_usuario' => $id_usuario,
                    'foto_director' => $nombreImagen,
                    'nombre_director' => $nombre_director,
                    'appaterno_director' => $appaterno_director,
                    'apmaterno_director' => $apmaterno_director,
                    'rfc_director' => $rfc_director,
                    'curp_director' => $curp_director,
                    'calle_director' => $calle_director,
                    'numexterior_director' => $numexterior_director,
                    'numinterior_director' => $numinterior_director,
                    'cp_director' => $cp_director,
                    'estado_director' => $estado_director,
                    'municipio_director' => $municipio_director,
                    'colonia_director' => $colonia_director,
                    'telefono_director' => $telefono_director,
                    'email_director' => $email_director,
                    'cedulaprofesional_director' => $cedulaprofesional_director,
                    'fechanacimiento_director' => $fechanacimiento_director
                );

                require 'model/directivoDAO.php';
                $this->loadModel('DirectivoDAO');
                $directivoDAO = new DirectivoDAO();
                $directivoDAO->insert($data);
            }
        }
    }

    function update()
    {
        $id_director = $_POST['id_directorActualizar'];
        $id_escuela = $_POST['id_escuelaActualizar'];
        $id_grado_academico = $_POST['id_grado_academicoActualizar'];
        $id_usuario = $_POST['id_usuarioActualizar'];
        $nombre_director = $_POST['nombre_directorActualizar'];
        $appaterno_director = $_POST['appaterno_directorActualizar'];
        $apmaterno_director = $_POST['apmaterno_directorActualizar'];
        $rfc_director = $_POST['rfc_directorActualizar'];
        $curp_director = $_POST['curp_directorActualizar'];
        $calle_director = $_POST['calle_directorActualizar'];
        $numexterior_director = $_POST['numexterior_directorActualizar'];
        $numinterior_director = $_POST['numinterior_directorActualizar'];
        $cp_director = $_POST['codigoPostalActualizar'];
        $estado_director = $_POST['selectEstadoActualizar'];
        $municipio_director = $_POST['selectMunicipioActualizar'];
        $colonia_director = $_POST['selectColoniaActualizar'];
        $telefono_director = $_POST['telefono_directorActualizar'];
        $email_director = $_POST['email_directorActualizar'];
        $cedulaprofesional_director = $_POST['cedulaprofesional_directorActualizar'];
        $fechanacimiento_director = $_POST['fechanacimiento_directorActualizar'];

        $nombreImagen = "";
        $arrayActualizar = array(
            'id_director' => $id_director,
            'id_escuela' => $id_escuela,
            'id_grado_academico' => $id_grado_academico,
            'id_usuario' => $id_usuario,
            'nombre_director' => $nombre_director,
            'appaterno_director' => $appaterno_director,
            'apmaterno_director' => $apmaterno_director,
            'rfc_director' => $rfc_director,
            'curp_director' => $curp_director,
            'calle_director' => $calle_director,
            'numexterior_director' => $numexterior_director,
            'numinterior_director' => $numinterior_director,
            'cp_director' => $cp_director,
            'estado_director' => $estado_director,
            'municipio_director' => $municipio_director,
            'colonia_director' => $colonia_director,
            'telefono_director' => $telefono_director,
            'email_director' => $email_director,
            'cedulaprofesional_director' => $cedulaprofesional_director,
            'fechanacimiento_director' => $fechanacimiento_director
        );

        if (isset($_FILES["imgdirectorActualizar"])) {

            if ($_FILES["imgdirectorActualizar"]["name"] != null) {

                $imagen = $_FILES["imgdirectorActualizar"];
                $nombreImagen = $imagen["name"];
                $tipoImagen = $imagen["type"];
                $ruta_provisional = $imagen["tmp_name"];

                $fullname = $appaterno_director . "_" . $apmaterno_director . "_" . $nombre_director;
                $carpeta = "public/director/" . $fullname . "/";

                if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                    echo 'errorimagen';
                } else {
                    if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                    }
                    copy($ruta_provisional, $carpeta . $nombreImagen);
                    $arrayActualizar['foto_director'] = $nombreImagen;
                }
            }
        }

        require 'model/directivoDAO.php';
        $this->loadModel('DirectivoDAO');
        $directivoDAO = new DirectivoDAO();
        $directivoDAO->update($arrayActualizar);
    }

    function delete()
    {
        $id_director = $_POST['idEliminardirector'];

        require 'model/directivoDAO.php';
        $this->loadModel('DirectivoDAO');
        $directivoDAO = new DirectivoDAO();
        $directivoDAO->delete($id_director);
    }

    function read()
    {
        require 'model/directivoDAO.php';
        $this->loadModel('DirectivoDAO');
        $directivoDAO = new DirectivoDAO();
        $directivoDAO = $directivoDAO->read();
        echo json_encode($directivoDAO);
    }

    function readTable()
    {
        require 'model/directivoDAO.php';
        $this->loadModel('DirectivoDAO');
        $directivoDAO = new DirectivoDAO();
        $directivoDAO = $directivoDAO->read();

        $obj = null;
        if (is_array($directivoDAO) || is_object($directivoDAO)) {
            foreach ($directivoDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //********************************************************************** DIRECTIVO MOSTRAR *********************************************

    function readDirectivoMostrar()
    {
        require 'model/directivoDAO.php';
        $this->loadModel('DirectivoDAO');
        $directivo_mostrarDAO = new DirectivoDAO();
        $directivo_mostrarDAO = $directivo_mostrarDAO->readDirectivoMostrar();

        echo json_encode($directivo_mostrarDAO);
    }

    function readTableDirectivoMostrar()
    {
        require 'model/directivoDAO.php';
        $this->loadModel('DirectivoDAO');
        $directivo_mostrarDAO = new DirectivoDAO();
        $directivo_mostrarDAO = $directivo_mostrarDAO->readDirectivoMostrar();

        $obj = null;
        foreach ($directivo_mostrarDAO as $key => $value) {
            $obj["data"][] = $value;
        }

        echo json_encode($obj);
    }
}
