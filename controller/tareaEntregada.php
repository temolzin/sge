<?php
class TareaEntregada extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('tareaEntregada/index');
    }

    function update() {
        $id_tarea_entregada  = $_POST['id_tarea_entregadaActualizar'];
        $calificacion_tarea = $_POST['calificacion_tareaActualizar'];


        $data = array(
         'id_tarea_entregada' => $id_tarea_entregada ,
         'calificacion_tarea' => $calificacion_tarea);

        require 'model/tareaEntregadaDAO.php';
        $this->loadModel('tareaEnetregadaDAO');
        $tareaEntregadaDAO = new TareaEntregadaDAO();
        $tareaEntregadaDAO->update($data);
    }

    function read() {

        require 'model/tareaEntregadaDAO.php';
        $this->loadModel('TareaEntregadaDAO');
        $tareaEntregadaDAO = new TareaEntregadaDAO();
        $tareaEntregadaDAO = $tareaEntregadaDAO->read();
        echo json_encode($tareaEntregadaDAO);
    } 

    function readTable() {
        require 'model/tareaEntregadaDAO.php';
        $this->loadModel('TareaEntregadaDAO');
        $tareaEntregadaDAO = new TareaEntregadaDAO();
        $tareaEntregadaDAO = $tareaEntregadaDAO->read();

        $obj = null;
        if (is_array($tareaEntregadaDAO) || is_object($tareaEntregadaDAO))
        {
            foreach ($tareaEntregadaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

    
}









