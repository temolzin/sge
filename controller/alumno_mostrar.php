<?php
    class Alumno_mostrar extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('alumno_mostrar/index');
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
            $fullname = $id_tarea_alumnoDetalle." " . $archivo_tarea_entregada. "";
                
             $carpeta = "public/tareas/" .$fullname. "/";

                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                
                copy($ruta_provisional, $carpeta.$archivo_tarea_entregada);
                
                
            $data = array(
                'id_tarea_alumnoDetalle' => $id_tarea_alumnoDetalle,
            'archivo_tarea_entregada' => $archivo_tarea_entregada,
            'comentarios_tarea' => $comentarios_tarea,
            'calificacion_tarea' => $calificacion_tarea);

            require 'model/alumno_mostrarDAO.php';
            $this->loadModel('Alumno_mostrarDAO');
            $alumno_mostrarDAO = new TareaAlumnoDAO();
            $alumno_mostrarDAO->insert($data);
        }
        }
        


        function read() {
            require 'model/alumno_mostrarDAO.php';
            $this->loadModel('Alumno_mostrarDAO');
            $alumno_mostrarDAO = new Alumno_mostrarDAO();
            $alumno_mostrarDAO = $alumno_mostrarDAO->read();
            echo json_encode($alumno_mostrarDAO);
        }

    function readTable() {
    require 'model/alumno_mostrarDAO.php';
    $this->loadModel('Alumno_mostrarDAO');
    $alumno_mostrarDAO = new Alumno_mostrarDAO();
    $alumno_mostrarDAO = $alumno_mostrarDAO->read();

    $obj = null;
    foreach ($alumno_mostrarDAO as $key => $value) {
      $obj["data"][] = $value;
    }

    echo json_encode($obj);
  }
    }
