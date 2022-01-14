<?php
class Tareaalumno_consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('tareaalumno_consulta/index');
    }

    function read() {
        require 'model/tareaalumno_consultaDAO.php';
        $this->loadModel('Tareaalumno_consultaDAO');
        $tareaalumno_consultaDAO = new Tareaalumno_consultaDAO();
        $tareaalumno_consultaDAO = $tareaalumno_consultaDAO->read();
        echo json_encode($tareaalumno_consultaDAO);
    } 

    function readTable() {
        require 'model/tareaalumno_consultaDAO.php';
        $this->loadModel('Tareaalumno_consultaDAO');
        $tareaalumno_consultaDAO = new Tareaalumno_consultaDAO();
        $tareaalumno_consultaDAO = $tareaalumno_consultaDAO->read();

        $obj = null;
        if (is_array($tareaalumno_consultaDAO) || is_object($tareaalumno_consultaDAO))
        {
            foreach ($tareaalumno_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

    
}