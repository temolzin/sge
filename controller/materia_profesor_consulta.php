<?php
class Materia_profesor_consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('materia_profesor_consulta/index');
    }


    function read() {
        require 'model/materia_profesor_consultaDAO.php';
        $this->loadModel('Materia_profesor_consultaDAO');
        $materia_profesor_consultaDAO = new Materia_profesor_consultaDAO();
        $materia_profesor_consultaDAO = $materia_profesor_consultaDAO->read();
        echo json_encode($materia_profesor_consultaDAO);
    } 

    function readTable() {
        require 'model/materia_profesor_consultaDAO.php';
        $this->loadModel('Materia_profesor_consultaDAO');
        $materia_profesor_consultaDAO = new Materia_profesor_consultaDAO();
        $materia_profesor_consultaDAO = $materia_profesor_consultaDAO->read();

        $obj = null;
        if (is_array($materia_profesor_consultaDAO) || is_object($materia_profesor_consultaDAO))
        {
            foreach ($materia_profesor_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

}
