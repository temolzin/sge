<?php
class Consulta_calificacion_tutor extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('consulta_calificacion_tutor/index');
    }

    function read() {
        require 'model/consulta_calificacion_tutorDAO.php';
        $this->loadModel('Consulta_calificacion_tutorDAO');
        $consulta_calificacion_tutorDAO = new Consulta_calificacion_tutorDAO();
        $consulta_calificacion_tutorDAO = $consulta_calificacion_tutorDAO->read();
        echo json_encode($consulta_calificacion_tutorDAO);
    } 

    function readTable() {
        require 'model/consulta_calificacion_tutorDAO.php';
        $this->loadModel('Consulta_calificacion_tutorDAO');
        $consulta_calificacion_tutorDAO = new Consulta_calificacion_tutorDAO();
        $consulta_calificacion_tutorDAO = $consulta_calificacion_tutorDAO->read();

        $obj = null;
         if (is_array($consulta_calificacion_tutorDAO) || is_object($consulta_calificacion_tutorDAO))
        {
            foreach ($consulta_calificacion_tutorDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

    
}
