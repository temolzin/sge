<?php
class Consulta_incidencias extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('consulta_incidencias/index');
    }

    function read() {
        require 'model/consulta_incidenciasDAO.php';
        $this->loadModel('Consulta_incidenciasDAO');
        $consulta_incidenciasDAO = new Consulta_incidenciasDAO();
        $consulta_incidenciasDAO = $consulta_incidenciasDAO->read();
        echo json_encode($consulta_incidenciasDAO);
    } 

    function readTable() {
        require 'model/consulta_incidenciasDAO.php';
        $this->loadModel('Consulta_incidenciasDAO');
        $consulta_incidenciasDAO = new Consulta_incidenciasDAO();
        $consulta_incidenciasDAO = $consulta_incidenciasDAO->read();

        $obj = null;
        if (is_array($consulta_incidenciasDAO) || is_object($consulta_incidenciasDAO))
        {
            foreach ($consulta_incidenciasDAO as $key => $value) {
                $obj["data"][] = $value;
            }

        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

    
}