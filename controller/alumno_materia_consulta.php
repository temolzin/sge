<?php
class Alumno_materia_consulta extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function index(){
    $this->view->render('alumno_materia_consulta/index');
  }

  function read() {
    require 'model/alumno_materia_consultaDAO.php';
    $this->loadModel('Alumno_materia_consultaDAO');
    $alumno_materia_consultaDAO = new Alumno_materia_consultaDAO();
    $alumno_materia_consultaDAO = $alumno_materia_consultaDAO->read();
    echo json_encode($alumno_materia_consultaDAO);
  } 

  function readTable() {
    require 'model/alumno_materia_consultaDAO.php';
    $this->loadModel('Alumno_materia_consultaDAO');
    $alumno_materia_consultaDAO = new Alumno_materia_consultaDAO();
    $alumno_materia_consultaDAO = $alumno_materia_consultaDAO->read();

    $obj = null;
    if (is_array($alumno_materia_consultaDAO) || is_object($alumno_materia_consultaDAO))
    {
      foreach ($alumno_materia_consultaDAO as $key => $value) {
        $obj["data"][] = $value;
      }
    } else {
      $obj = array();
    }
    echo json_encode($obj);

  }


}