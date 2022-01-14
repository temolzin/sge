<?php
class Calificacion_tutor_consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('calificacion_tutor_consulta/index');
    }

    function read() {
        require 'model/calificacion_tutor_consultaDAO.php';
        $this->loadModel('Calificacion_tutor_consultaDAO');
        $calificacion_tutor_consultaDAO = new Calificacion_tutor_consultaDAO();
        $calificacion_tutor_consultaDAO = $calificacion_tutor_consultaDAO->read();
        echo json_encode($calificacion_tutor_consultaDAO);
    } 

    function readTable() {
        require 'model/calificacion_tutor_consultaDAO.php';
        $this->loadModel('Calificacion_tutor_consultaDAO');
        $calificacion_tutor_consultaDAO = new Calificacion_tutor_consultaDAO();
        $calificacion_tutor_consultaDAO = $calificacion_tutor_consultaDAO->read();

        $obj = null;
         if (is_array($calificacion_tutor_consultaDAO) || is_object($calificacion_tutor_consultaDAO))
        {
            foreach ($calificacion_tutor_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

    
}
