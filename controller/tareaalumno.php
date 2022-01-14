<?php
class TareaAlumno extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('tareaalumno/index');
    }

    function insert() {

        $id_tarea_alumnoDetalle = $_POST['id_tarea_alumnoDetalle'];
        $comentarios_tarea = $_POST['comentarios_tarea'];
        $calificacion_tarea = $_POST['calificacion_tarea'];
        $archivo_tarea_entregada = "";
        if($_FILES["archivo_tarea_entregada"]["name"] != null) {
            $archivo = $_FILES["archivo_tarea_entregada"];
            $archivo_tarea_entregada = $archivo["name"];
            $tipoImagen = $archivo["type"];
            $ruta_provisional = $archivo["tmp_name"];
            $fullname = $id_tarea_alumnoDetalle."_" . $archivo_tarea_entregada;

            $carpeta = "public/tareas_entregadas/" .$fullname. "/";

            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }

            copy($ruta_provisional, $carpeta.$archivo_tarea_entregada);


            $data = array(
                'id_tarea_alumnoDetalle' => $id_tarea_alumnoDetalle,
                'archivo_tarea_entregada' => $archivo_tarea_entregada,
                'comentarios_tarea' => $comentarios_tarea,
                'calificacion_tarea' => $calificacion_tarea);

            require 'model/tareaalumnoDAO.php';
            $this->loadModel('TareaAlumnoDAO');
            $tareaalumnoDAO = new TareaAlumnoDAO();
            $tareaalumnoDAO->insert($data);
        }
    }


    function read() {
        require 'model/tareaalumnoDAO.php';
        $this->loadModel('TareaAlumnoDAO');
        $tareaalumnoDAO = new TareaAlumnoDAO();
        $tareaalumnoDAO = $tareaalumnoDAO->read();
        echo json_encode($tareaalumnoDAO);
    }

    function readTable() {
        require 'model/tareaalumnoDAO.php';
        $this->loadModel('TareaAlumnoDAO');
        $tareaalumnoDAO = new TareaAlumnoDAO();
        $tareaalumnoDAO = $tareaalumnoDAO->read();

        $obj = null;
        if (is_array($tareaalumnoDAO) || is_object($tareaalumnoDAO))
        {
            foreach ($tareaalumnoDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }
}
