<?php
class Incidencias_consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('incidencias_consulta/index');
    }

    function read() {
        require 'model/incidencias_consultaDAO.php';
        $this->loadModel('Incidencias_consultaDAO');
        $incidencias_consultaDAO = new Incidencias_consultaDAO();
        $incidencias_consultaDAO = $incidencias_consultaDAO->read();
        echo json_encode($incidencias_consultaDAO);
    } 

    function readTable() {
        require 'model/incidencias_consultaDAO.php';
        $this->loadModel('Incidencias_consultaDAO');
        $incidencias_consultaDAO = new Incidencias_consultaDAO();
        $incidencias_consultaDAO = $incidencias_consultaDAO->read();

        $obj = null;
        if (is_array($incidencias_consultaDAO) || is_object($incidencias_consultaDAO))
        {
            foreach ($incidencias_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }

        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

    
}