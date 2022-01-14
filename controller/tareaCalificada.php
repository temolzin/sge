<?php
class TareaCalificada extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('tareaCalificada/index');
    }

    function read() {
        require 'model/tareaCalificadaDAO.php';
        $this->loadModel('TareaCalificadaDAO');
        $tareaCalificadaDAO = new TareaCalificadaDAO();
        $tareaCalificadaDAO = $tareaCalificadaDAO->read();
        echo json_encode($tareaCalificadaDAO);
    } 

    function readTable() {
        require 'model/tareaCalificadaDAO.php';
        $this->loadModel('TareaCalificadaDAO');
        $tareaCalificadaDAO = new TareaCalificadaDAO();
        $tareaCalificadaDAO = $tareaCalificadaDAO->read();

        $obj = null;
        if (is_array($tareaCalificadaDAO) || is_object($tareaCalificadaDAO))
        {
            foreach ($tareaCalificadaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
        
    }

    
}










