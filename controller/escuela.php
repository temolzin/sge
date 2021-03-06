<?php
class Escuela extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('escuela/index');
    }

    function showEscuela()
    {
        $this->view->render('escuela/escuelaDetalle');
    }

    function insert()
    {
        $nombre_escuela = $_POST['nombre_escuela'];
        $rfc_escuela = $_POST['rfc_escuela'];
        $cct_escuela = $_POST['cct_escuela'];
        $calle_escuela = $_POST['calle_escuela'];
        $numxterior_escuela = $_POST['numxterior_escuela'];
        $numinterior_escuela = $_POST['numinterior_escuela'];
        $cp_escuela = $_POST['codigoPostal'];
        $estado_escuela = $_POST['selectEstado'];
        $municipio_escuela = $_POST['selectMunicipio'];
        $colonia_escuela = $_POST['selectColonia'];
        $telefono_escuela = $_POST['telefono_escuela'];
        $email_escuela = $_POST['email_escuela'];
        $observacion_escuela = $_POST['observacion_escuela'];
        $nombreImagen = "";
        if($_FILES["foto_escuela"]["name"] != null) {
            $imagen = $_FILES["foto_escuela"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];

        $fullname = $cct_escuela ."_" . $rfc_escuela . "_" . $nombre_escuela;
            $carpeta = constant('URL')."public/escuela/" .$fullname. "/";

            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif')       {
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta.$nombreImagen);
        
        $data = array(
            'nombre_escuela' => $nombre_escuela,
            'rfc_escuela' => $rfc_escuela,
            'cct_escuela' => $cct_escuela, 
            'calle_escuela' => $calle_escuela,
            'numxterior_escuela' => $numxterior_escuela,
            'numinterior_escuela' => $numinterior_escuela,
            'cp_escuela' => $cp_escuela,
            'estado_escuela' => $estado_escuela,
            'municipio_escuela' => $municipio_escuela,
            'colonia_escuela' => $colonia_escuela,
            'telefono_escuela' => $telefono_escuela,
            'email_escuela' => $email_escuela,
            'observacion_escuela' => $observacion_escuela,
            'foto_escuela' => $nombreImagen
            
        );

        require 'model/escuelaDAO.php';
        $this->loadModel('EscuelaDAO');
        $escuelaDAO = new EscuelaDAO();
        $escuelaDAO->insert($data);
        }
    }
}
               
    function update()
    {
        $id_escuela = $_POST['id_escuelaActualizar'];
        $nombre_escuela = $_POST['nombre_escuelaActualizar'];        
        $rfc_escuela = $_POST['rfc_escuelaActualizar'];
        $cct_escuela = $_POST['cct_escuelaActualizar'];
        $calle_escuela = $_POST['calle_escuelaActualizar'];
        $numxterior_escuela = $_POST['numxterior_escuelaActualizar'];
        $numinterior_escuela = $_POST['numinterior_escuelaActualizar'];
        $cp_escuela = $_POST['codigoPostalActualizar'];
        $estado_escuela = $_POST['selectEstadoActualizar'];
        $municipio_escuela = $_POST['selectMunicipioActualizar'];
        $colonia_escuela = $_POST['selectColoniaActualizar'];
        $telefono_escuela = $_POST['telefono_escuelaActualizar'];
        $email_escuela = $_POST['email_escuelaActualizar'];
        $observacion_escuela = $_POST['observacion_escuelaActualizar'];

        $nombreImagen = "";

        $arrayAcualizar = array();

        if (isset($_FILES["foto_escuelaActualizar"])) {

            if ($_FILES["foto_escuelaActualizar"]["name"] != null) {

                $imagen = $_FILES["foto_escuelaActualizar"];
                $nombreImagen = $imagen["name"];
                $tipoImagen = $imagen["type"];
                $ruta_provisional = $imagen["tmp_name"];

                $fullname = $cct_escuela . "_" . $rfc_escuela . "_" . $nombre_escuela;
                $carpeta = constant('URL')."public/escuela/" . $fullname . "/";

                if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                    echo 'errorimagen';
                } else {
                    if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                    }
                    copy($ruta_provisional, $carpeta . $nombreImagen);

                    $arrayAcualizar = array(
                        'id_escuela' => $id_escuela,
                        'foto_escuela' => $nombreImagen,
                        'nombre_escuela' => $nombre_escuela,
                        'rfc_escuela' => $rfc_escuela,
                        'cct_escuela' => $cct_escuela,
                        'calle_escuela' => $calle_escuela,
                        'numxterior_escuela' => $numxterior_escuela,
                        'numinterior_escuela' => $numinterior_escuela,
                        'cp_escuela' => $cp_escuela,
                        'estado_escuela' => $estado_escuela,
                        'municipio_escuela' => $municipio_escuela,
                        'colonia_escuela' => $colonia_escuela,
                        'telefono_escuela' => $telefono_escuela,
                        'email_escuela' => $email_escuela,
                        'observacion_escuela' => $observacion_escuela,
                    );
                }
            }
        } else {
            $arrayAcualizar = array(
                        'id_escuela' => $id_escuela,
                        'nombre_escuela' => $nombre_escuela,
                        'rfc_escuela' => $rfc_escuela,
                        'cct_escuela' => $cct_escuela,
                        'calle_escuela' => $calle_escuela,
                        'numxterior_escuela' => $numxterior_escuela,
                        'numinterior_escuela' => $numinterior_escuela,
                        'cp_escuela' => $cp_escuela,
                        'estado_escuela' => $estado_escuela,
                        'municipio_escuela' => $municipio_escuela,
                        'colonia_escuela' => $colonia_escuela,
                        'telefono_escuela' => $telefono_escuela,
                        'email_escuela' => $email_escuela,
                        'observacion_escuela' => $observacion_escuela,
            );
        }

        require 'model/escuelaDAO.php';
        $this->loadModel('EscuelaDAO');
        $escuelaDAO = new EscuelaDAO();
        $escuelaDAO->update($arrayAcualizar);
        }

    function delete()
    {
        $escuela_matricula = $_POST['idEliminarEscuela'];

        require 'model/escuelaDAO.php';
        $this->loadModel('EscuelaDAO');
        $escuelaDAO = new EscuelaDAO();
        $escuelaDAO->delete($escuela_matricula);
    }

    function read()
    {
        require 'model/escuelaDAO.php';
        $this->loadModel('EscuelaDAO');
        $escuelaDAO = new EscuelaDAO();
        $escuelaDAO = $escuelaDAO->read();
        echo json_encode($escuelaDAO);
    }

    function readTable()
    {
        require 'model/escuelaDAO.php';
        $this->loadModel('EscuelaDAO');
        $escuelaDAO = new EscuelaDAO();
        $escuelaDAO = $escuelaDAO->read();

        $obj = null;
        if (is_array($escuelaDAO) || is_object($escuelaDAO)) {
            foreach ($escuelaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }
}
