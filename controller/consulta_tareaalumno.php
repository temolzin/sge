<?php
class Consulta_tareaalumno extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('consulta_tareaalumno/index');
    }

    function read() {
        require 'model/consulta_tareaalumnoDAO.php';
        $this->loadModel('Consulta_tareaalumnoDAO');
        $consulta_tareaalumnoDAO = new Consulta_tareaalumnoDAO();
        $consulta_tareaalumnoDAO = $consulta_tareaalumnoDAO->read();
        echo json_encode($consulta_tareaalumnoDAO);
    } 

    function readTable() {
        require 'model/consulta_tareaalumnoDAO.php';
        $this->loadModel('Consulta_tareaalumnoDAO');
        $consulta_tareaalumnoDAO = new Consulta_tareaalumnoDAO();
        $consulta_tareaalumnoDAO = $consulta_tareaalumnoDAO->read();

        $obj = null;
        if (is_array($consulta_tareaalumnoDAO) || is_object($consulta_tareaalumnoDAO))
        {
            foreach ($consulta_tareaalumnoDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

    
}