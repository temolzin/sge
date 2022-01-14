<?php
class Alumno_incidencia extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('alumno_incidencia/index');
    }

    function read() {
        require 'model/alumno_incidenciaDAO.php';
        $this->loadModel('Alumno_IncidenciaDAO');
        $alumno_incidenciaDAO = new Alumno_IncidenciaDAO();
        $alumno_incidenciaDAO = $alumno_incidenciaDAO->read();
        echo json_encode($alumno_incidenciaDAO);
    } 
    
    function readTable() {
        require 'model/alumno_incidenciaDAO.php';
        $this->loadModel('Alumno_IncidenciaDAO');
        $alumno_incidenciaDAO = new Alumno_IncidenciaDAO();
        $alumno_incidenciaDAO = $alumno_incidenciaDAO->read();

        $obj = null;
        if (is_array($alumno_incidenciaDAO) || is_object($alumno_incidenciaDAO))
        {
            foreach ($alumno_incidenciaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }

        echo json_encode($obj);
    }


}
