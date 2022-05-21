<?php
class Administrador extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('administrador/index');
    }

    function insert()
    {

        $id_usuario =  $_POST['id_usuario'];
        $nombre_administrador = $_POST['nombre_administrador'];
        $appaterno_administrador = $_POST['appaterno_administrador'];
        $apmaterno_administrador = $_POST['apmaterno_administrador'];
        $telefono_administrador = $_POST['telefono_administrador'];
        $email_administrador = $_POST['email_administrador'];
        $fechanacimiento_administrador = $_POST['fechanacimiento_administrador'];
        $nombreImagen = "";
        if ($_FILES["foto_administrador"]["name"] != null) {
            $imagen = $_FILES["foto_administrador"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];
            $fullname = $appaterno_administrador . "_" . $apmaterno_administrador . "_" . $nombre_administrador;
            $carpeta = "public/administrador/" . $fullname . "/";

            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta . $nombreImagen);

                $data = array(

                    'id_usuario' => $id_usuario,
                    'foto_administrador' => $nombreImagen,
                    'nombre_administrador' => $nombre_administrador,
                    'appaterno_administrador' => $appaterno_administrador,
                    'apmaterno_administrador' => $apmaterno_administrador,
                    'telefono_administrador' => $telefono_administrador,
                    'email_administrador' => $email_administrador,
                    'fechanacimiento_administrador' => $fechanacimiento_administrador,
                    'nombreImagen'  => $nombreImagen

                );

                require 'model/administradorDAO.php';
                $this->loadModel('AdministradorDAO');
                $administradorDAO = new AdministradorDAO();
                $administradorDAO->insert($data);
            }
        }
    }

    function update()
    {
        $id_administrador = $_POST['id_administradorActualizar'];
        $id_usuario = $_POST['id_usuarioActualizar'];
        $nombre_administrador = $_POST['nombre_administradorActualizar'];
        $appaterno_administrador = $_POST['appaterno_administradorActualizar'];
        $apmaterno_administrador = $_POST['apmaterno_administradorActualizar'];
        $telefono_administrador = $_POST['telefono_administradorActualizar'];
        $email_administrador = $_POST['email_administradorActualizar'];
        $fechanacimiento_administrador = $_POST['fechanacimiento_administradorActualizar'];

        $nombreImagen = "";

        $arrayAcualizar = array();

        if (isset($_FILES["foto_administradorActualizar"])) {

            if ($_FILES["foto_administradorActualizar"]["name"] != null) {

                $imagen = $_FILES["foto_administradorActualizar"];
                $nombreImagen = $imagen["name"];
                $tipoImagen = $imagen["type"];
                $ruta_provisional = $imagen["tmp_name"];

                $fullname = $appaterno_administrador . "_" . $apmaterno_administrador . "_" . $nombre_administrador;
                $carpeta = "public/administrador/" . $fullname . "/";

                if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif') {
                    echo 'errorimagen';
                } else {
                    if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                    }
                    copy($ruta_provisional, $carpeta . $nombreImagen);

                    $arrayAcualizar = array(
                        'id_administrador' => $id_administrador,
                        'id_usuario' => $id_usuario,
                        'foto_administrador' => $nombreImagen,
                        'nombre_administrador' => $nombre_administrador,
                        'appaterno_administrador' => $appaterno_administrador,
                        'apmaterno_administrador' => $apmaterno_administrador,
                        'telefono_administrador' => $telefono_administrador,
                        'email_administrador' => $email_administrador,
                        'fechanacimiento_administrador' => $fechanacimiento_administrador
                    );
                }
            }
        } else {
            $arrayAcualizar = array(
                'id_administrador' => $id_administrador,
                'id_usuario' => $id_usuario,
                'nombre_administrador' => $nombre_administrador,
                'appaterno_administrador' => $appaterno_administrador,
                'apmaterno_administrador' => $apmaterno_administrador,
                'telefono_administrador' => $telefono_administrador,
                'email_administrador' => $email_administrador,
                'fechanacimiento_administrador' => $fechanacimiento_administrador
            );
        }

        require 'model/administradorDAO.php';
        $this->loadModel('administradorDAO');
        $administradorDAO = new AdministradorDAO();
        $administradorDAO->update($arrayAcualizar);
    }

    function delete()
    {
        $id_administrador = $_POST['idEliminarAdministrador'];

        require 'model/administradorDAO.php';
        $this->loadModel('AdministradorDAO');
        $administradorDAO = new AdministradorDAO();
        $administradorDAO->delete($id_administrador);
    }

    function read()
    {
        require 'model/administradorDAO.php';
        $this->loadModel('AdministradorDAO');
        $administradorDAO = new AdministradorDAO();
        $administradorDAO = $administradorDAO->read();
        echo json_encode($administradorDAO);
    }

    function readTable()
    {
        require 'model/administradorDAO.php';
        $this->loadModel('AdministradorDAO');
        $administradorDAO = new AdministradorDAO();
        $administradorDAO = $administradorDAO->read();

        $obj = null;
        if (is_array($administradorDAO) || is_object($administradorDAO)) {
            foreach ($administradorDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }
}
