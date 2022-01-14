<?php
class Alumno extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('alumno/index');
    }

    function insert() {
        $id_grupo = $_POST['id_grupo'];
        $id_escuela = $_POST['id_escuela'];
        $id_usuario =  $_POST['id_usuario'];
        $nombre_alumno = $_POST['nombre_alumno'];
        $appaterno_alumno = $_POST['appaterno_alumno'];
        $apmaterno_alumno = $_POST['apmaterno_alumno'];
        $calle_alumno = $_POST['calle_alumno'];
        $noexterior_alumno = $_POST['noexterior_alumno'];
        $nointerior_alumno = $_POST['nointerior_alumno'];
        $cp_alumno = $_POST['codigoPostal'];
        $estado_alumno = $_POST['selectEstado'];
        $municipio_alumno = $_POST['selectMunicipio'];
        $colonia_alumno = $_POST['selectColonia'];
        $telefono_alumno = $_POST['telefono_alumno'];
        $email_alumno= $_POST['email_alumno'];
        $fechanacimiento_alumno = $_POST['fechanacimiento_alumno'];
        $nombreImagen = "";
        if($_FILES["foto_alumno"]["name"] != null) {
            $imagen = $_FILES["foto_alumno"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];
            $fullname = $appaterno_alumno ."_" . $apmaterno_alumno . "_" . $nombre_alumno;
            $carpeta = "public/alumno/" .$fullname. "/";

            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif')       {
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta.$nombreImagen);

                $data = array(

                    'id_grupo' => $id_grupo,
                    'id_escuela' => $id_escuela,
                    'id_usuario' => $id_usuario,
                    'foto_alumno' => $nombreImagen,
                    'nombre_alumno' => $nombre_alumno,
                    'appaterno_alumno' => $appaterno_alumno,
                    'apmaterno_alumno'=> $apmaterno_alumno,
                    'calle_alumno' => $calle_alumno,
                    'noexterior_alumno' => $noexterior_alumno,
                    'nointerior_alumno' => $nointerior_alumno,
                    'cp_alumno' => $cp_alumno,
                    'estado_alumno' => $estado_alumno,
                    'municipio_alumno' => $municipio_alumno,
                    'colonia_alumno' => $colonia_alumno,
                    'telefono_alumno' => $telefono_alumno,
                    'email_alumno' => $email_alumno,
                    'fechanacimiento_alumno' => $fechanacimiento_alumno,
                    'nombreImagen'  => $nombreImagen

                );

                require 'model/alumnoDAO.php';
                $this->loadModel('AlumnoDAO');
                $alumnoDAO = new AlumnoDAO();
                $alumnoDAO->insert($data);
            }
        }
    }

    function update() {
        $id_alumno = $_POST['id_alumnoActualizar'];
        $id_grupo = $_POST['id_grupoActualizar'];
        $id_escuela = $_POST['id_escuelaActualizar'];
        $id_usuario = $_POST['id_usuarioActualizar'];
        //$foto_alumno = $_POST['foto_alumnoActualizar'];
        $nombre_alumno = $_POST['nombre_alumnoActualizar'];
        $appaterno_alumno= $_POST['appaterno_alumnoActualizar'];
        $apmaterno_alumno = $_POST['apmaterno_alumnoActualizar'];
        $calle_alumno = $_POST['calle_alumnoActualizar'];
        $noexterior_alumno = $_POST['noexterior_alumnoActualizar'];
        $nointerior_alumno = $_POST['nointerior_alumnoActualizar'];
        $cp_alumno = $_POST['codigoPostalActualizar'];
        $estado_alumno = $_POST['selectEstadoActualizar'];
        $municipio_alumno = $_POST['selectMunicipioActualizar'];
        $colonia_alumno = $_POST['selectColoniaActualizar'];
        $telefono_alumno = $_POST['telefono_alumnoActualizar'];
        $email_alumno= $_POST['email_alumnoActualizar'];
        $fechanacimiento_alumno = $_POST['fechanacimiento_alumnoActualizar'];
        $nombreImagen = "";
        if($_FILES["foto_alumnoActualizar"]["name"] != null) {
            $imagen = $_FILES["foto_alumnoActualizar"];
            $nombreImagen = $imagen["name"];
            $tipoImagen = $imagen["type"];
            $ruta_provisional = $imagen["tmp_name"];
            $fullname = $appaterno_alumno ."_" . $apmaterno_alumno . "_" . $nombre_alumno;
            $carpeta = "public/alumno/" .$fullname. "/";

            if ($tipoImagen != 'image/jpg' && $tipoImagen != 'image/jpeg' && $tipoImagen != 'image/png' && $tipoImagen != 'image/gif')       {
                echo 'errorimagen';
            } else {
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                copy($ruta_provisional, $carpeta.$nombreImagen);
                $data = array(
                 'id_alumno'=>$id_alumno,
                 'id_grupo' => $id_grupo, 
                 'id_escuela' => $id_escuela, 
                 'id_usuario' => $id_usuario,
                 'foto_alumno' => $nombreImagen,
                 'nombre_alumno' => $nombre_alumno, 
                 'appaterno_alumno' => $appaterno_alumno, 
                 'apmaterno_alumno' => $apmaterno_alumno,
                 'calle_alumno' => $calle_alumno, 
                 'noexterior_alumno' => $noexterior_alumno,
                 'nointerior_alumno' => $nointerior_alumno,
                 'cp_alumno' => $cp_alumno,
                 'estado_alumno' => $estado_alumno,
                 'municipio_alumno' => $municipio_alumno,
                 'colonia_alumno' => $colonia_alumno,
                 'telefono_alumno' => $telefono_alumno, 
                 'email_alumno' => $email_alumno, 
                 'fechanacimiento_alumno' => $fechanacimiento_alumno);

                require 'model/alumnoDAO.php';
                $this->loadModel('AlumnoDAO');
                $alumnoDAO = new AlumnoDAO();
                $alumnoDAO->update($data);
            } } }

            function delete(){
                $id_alumno = $_POST['idEliminarAlumno'];

                require 'model/alumnoDAO.php';
                $this->loadModel('AlumnoDAO');
                $alumnoDAO = new AlumnoDAO();
                $alumnoDAO->delete($id_alumno);
            }

            function read() {
                require 'model/alumnoDAO.php';
                $this->loadModel('AlumnoDAO');
                $alumnoDAO = new AlumnoDAO();
                $alumnoDAO = $alumnoDAO->read();
                echo json_encode($alumnoDAO);
            }
            function  readDashDirectivo() {
                require 'model/alumnoDAO.php';
                $this->loadModel('AlumnoDAO');
                $alumnoDAO = new AlumnoDAO();
                $alumnoDAO = $alumnoDAO->read();
                echo json_encode($alumnoDAO);
            }

            function readTable() {
                require 'model/alumnoDAO.php';
                $this->loadModel('AlumnoDAO');
                $alumnoDAO = new AlumnoDAO();
                $alumnoDAO = $alumnoDAO->read();

                $obj = null;
                if (is_array($alumnoDAO) || is_object($alumnoDAO))
                {
                    foreach ($alumnoDAO as $key => $value) {
                        $obj["data"][] = $value;
                    }
                } else {
                    $obj = array();
                }
                echo json_encode($obj);
            }
            
            
        }