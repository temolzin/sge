<?php
<<<<<<< HEAD
=======
//uwu
>>>>>>> 07b195396864c9f40a48de12bf7228b3e95d487d
    class Llenarescuela extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('llenarescuela/index');
        }

        function insert() {
            
            $id_escuela = $_POST['id_escuela'];
            $nombre_grupo = $_POST['nombre_grupo'];
            $turno_grupo = $_POST['turno_grupo']];

            $data = array('id_escuela' => $id_escuela,
            'nombre_grupo' => $nombre_grupo,
            'turno_grupo' => $turno_grupo);

            require 'model/grupoDAO.php';
            $this->loadModel('LlenarescuelaDAO');
            $grupoDAO = new LlenarescuelaDAO();
            $grupoDAO->insert($data);
        }

        function update() {
            $id_escuela = $_POST['id_escuelaActualizar'];
            $nombre_escuela = $_POST['nombre_escuelaActualizar'];
            $rfc_escuela = $_POST['rfc_escuelaActualizar'];
            $cct_escuela = $_POST['cct_escuelaActualizar'];
            $calle_escuela = $_POST['calle_escuelaActualizar'];
            $numxterior_escuela = $_POST['numxterior_escuelaActualizar'];
            $numinterior_escuela = $_POST['numinterior_escuelaActualizar'];
            $cp_escuela = $_POST['codigoPostalActualizar'];
            $estado_escuela= $_POST['selectEstadoActualizar'];
            $municipio_escuela = $_POST['selectMunicipioActualizar'];
            $colonia_escuela = $_POST['selectColoniaActualizar'];
            $telefono_escuela = $_POST['telefono_escuelaActualizar'];
            $email_escuela = $_POST['email_escuelaActualizar'];
            $observacion_escuela = $_POST['observacion_escuelaActualizar'];

            $data = array(
            'id_escuela' => $id_escuela,
            'nombre_escuela' => $nombre_escuela,
            'rfc_escuela' => $rfc_escuela,
            'cct_escuela' => $cct_escuela,
            'calle_escuela'=> $calle_escuela,
            'numxterior_escuela'=> $numxterior_escuela,
            'numinterior_escuela'=> $numinterior_escuela,
            'cp_escuela' => $cp_escuela,
            'estado_escuela' => $estado_escuela,
            'municipio_escuela' => $municipio_escuela,
            'colonia_escuela' => $colonia_escuela,
            'telefono_escuela'=> $telefono_escuela,
            'email_escuela'=> $email_escuela,
            'observacion_escuela'=> $observacion_escuela);

            require 'model/escuelaDAO.php';
            $this->loadModel('EscuelaDAO');
            $escuelaDAO = new EscuelaDAO();
            $escuelaDAO->update($data);
        }

        function delete(){
            $escuela_matricula = $_POST['idEliminarEscuela'];

            require 'model/escuelaDAO.php';
            $this->loadModel('EscuelaDAO');
            $escuelaDAO = new EscuelaDAO();
            $escuelaDAO->delete($escuela_matricula);
        }

        function read() {
            require 'model/llenarescuelaDAO.php';
            $this->loadModel('LlenarescuelaDAO');
            $llenarescuelaDAO = new LlenarescuelaDAO();
            $llenarescuelaDAO = $llenarescuelaDAO->read();
            echo json_decode ($llenarescuelaDAO);
        }
        function readtable() {
            require 'model/grupoDAO.php';
            $this->loadModel('GrupoDAO');
            $grupoDAO = new GrupoDAO();
            $grupoDAO = $grupoDAO->read();
            $obj = null;
            foreach ($grupoDAO as $key => $value) {
                $obj["data"][] = $value;
            }

            echo json_encode($obj);
        }
    }
