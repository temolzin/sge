<?php
class Consulta_calificacion extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('consulta_calificacion/index');
    }

    function read() {
        require 'model/consulta_calificacionDAO.php';
        $this->loadModel('Consulta_calificacionDAO');
        $consulta_calificacionDAO = new Consulta_calificacionDAO();
        $consulta_calificacionDAO = $consulta_calificacionDAO->read();
        echo json_encode($consulta_calificacionDAO);
    } 

    function readTable() {
        require 'model/consulta_calificacionDAO.php';
        $this->loadModel('Consulta_calificacionDAO');
        $consulta_calificacionDAO = new Consulta_calificacionDAO();
        $consulta_calificacionDAO = $consulta_calificacionDAO->read();

        $obj = null;
        if (is_array($consulta_calificacionDAO) || is_object($consulta_calificacionDAO))
        {
            foreach ($consulta_calificacionDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

    
}
