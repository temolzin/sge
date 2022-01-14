<?php
class Calificacion_consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('calificacion_consulta/index');
    }

    function read() {
        require 'model/calificacion_consultaDAO.php';
        $this->loadModel('Calificacion_consultaDAO');
        $calificacion_consultaDAO = new Calificacion_consultaDAO();
        $calificacion_consultaDAO = $calificacion_consultaDAO->read();
        echo json_encode($calificacion_consultaDAO);
    } 

    function readTable() {
        require 'model/calificacion_consultaDAO.php';
        $this->loadModel('Calificacion_consultaDAO');
        $calificacion_consultaDAO = new Calificacion_consultaDAO();
        $calificacion_consultaDAO = $calificacion_consultaDAO->read();

        $obj = null;
        if (is_array($calificacion_consultaDAO) || is_object($calificacion_consultaDAO))
        {
            foreach ($calificacion_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

    
}
