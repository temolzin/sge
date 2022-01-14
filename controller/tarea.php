<?php
class Tarea extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('tarea/index');
    }

    function insert() {
       $id_grupo = $_POST['id_grupo'];
       $id_materia = $_POST['id_materia'];
       $nombre_tarea = $_POST['nombre_tarea'];
       $fecha_entrega = $_POST['fecha_entrega'];
       $descripcion_tarea = $_POST['descripcion_tarea'];

       $archivo_tarea = "";
       if($_FILES["archivo_tarea"]["name"] != null) {
        $archivo = $_FILES["archivo_tarea"];
        $archivo_tarea = $archivo["name"];
        $tipoImagen = $archivo["type"];
        $ruta_provisional = $archivo["tmp_name"];


        $carpeta = "public/tareas/" .$nombre_tarea. "/";

        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        copy($ruta_provisional, $carpeta.$archivo_tarea);

        $data = array('id_grupo' => $id_grupo, 
            'id_materia' => $id_materia, 
            'nombre_tarea' => $nombre_tarea, 
            'fecha_entrega' => $fecha_entrega, 
            'descripcion_tarea'=>$descripcion_tarea,
            'archivo_tarea'=>$archivo_tarea);
        require 'model/tareaDAO.php';
        $this->loadModel('TareaDAO');
        $tareaDAO = new TareaDAO();
        $tareaDAO->insert($data);
    }
}

function update() {
    $id_tarea_alumno = $_POST['id_tarea_alumnoActualizar'];
    $id_grupo = $_POST['id_grupoActualizar'];
    $id_materia = $_POST['id_materiaActualizar'];
    $nombre_tarea = $_POST['nombre_tareaActualizar'];
    $fecha_entrega = $_POST['fecha_entregaActualizar'];
    $descripcion_tarea = $_POST['descripcion_tareaActualizar'];
    $archivo_tarea = "";
    if($_FILES["archivo_tareaActualizar"]["name"] != null) {
        $archivo = $_FILES["archivo_tareaActualizar"];
        $archivo_tarea = $archivo["name"];
        $tipoImagen = $archivo["type"];
        $ruta_provisional = $archivo["tmp_name"];


        $carpeta = "public/tareas/" .$nombre_tarea. "/";

        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        copy($ruta_provisional, $carpeta.$archivo_tarea);



        $data = array('id_tarea_alumno' => $id_tarea_alumno,
            'id_grupo' => $id_grupo, 
            'id_materia' => $id_materia,
            'nombre_tarea' => $nombre_tarea,
            'fecha_entrega' => $fecha_entrega, 
            'descripcion_tarea'=>$descripcion_tarea,
            'archivo_tarea'=>$archivo_tarea);

        require 'model/tareaDAO.php';
        $this->loadModel('TareaDAO');
        $tareaDAO = new TareaDAO();
        $tareaDAO->update($data);
    }
}

function delete(){
    $id_tarea_alumno = $_POST['idEliminarTarea'];
    require 'model/tareaDAO.php';
    $this->loadModel('TareaDAO');
    $tareaDAO = new TareaDAO();
    $tareaDAO->delete($id_tarea_alumno);
}

function read() {
    require 'model/tareaDAO.php';
    $this->loadModel('TareaDAO');
    $tareaDAO = new TareaDAO();
    $tareaDAO = $tareaDAO->read();
    echo json_encode($tareaDAO);
} 

function readTable() {
    require 'model/tareaDAO.php';
    $this->loadModel('TareaDAO');
    $tareaDAO = new TareaDAO();
    $tareaDAO = $tareaDAO->read();

    $obj = null;
    if (is_array($tareaDAO) || is_object($tareaDAO))
    {
        foreach ($tareaDAO as $key => $value) {
            $obj["data"][] = $value;
        }
    } else {
        $obj = array();
    }
    echo json_encode($obj);
    
}


}
