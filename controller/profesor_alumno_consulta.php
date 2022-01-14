<?php
class Profesor_alumno_consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('profesor_alumno_consulta/index');
    }


    function read() {
        require 'model/profesor_alumno_consultaDAO.php';
        $this->loadModel('Profesor_alumno_consultaDAO');
        $profesor_alumno_consultaDAO = new Profesor_alumno_consultaDAO();
        $profesor_alumno_consultaDAO = $profesor_alumno_consultaDAO->read();
        echo json_encode($profesor_alumno_consultaDAO);
    }

    function readTable() {
        require 'model/profesor_alumno_consultaDAO.php';
        $this->loadModel('Profesor_alumno_consultaDAO');
        $profesor_alumno_consultaDAO = new Profesor_alumno_consultaDAO();
        $profesor_alumno_consultaDAO = $profesor_alumno_consultaDAO->read();

        $obj = null;
        if (is_array($profesor_alumno_consultaDAO) || is_object($profesor_alumno_consultaDAO))
        {
            foreach ($profesor_alumno_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }
}