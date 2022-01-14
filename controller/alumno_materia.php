<?php
class Alumno_materia extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function index(){
    $this->view->render('alumno_materia/index');
  }

  function read() {
    require 'model/alumno_materiaDAO.php';
    $this->loadModel('Alumno_materiaDAO');
    $alumno_materiaDAO = new Alumno_materiaDAO();
    $alumno_materiaDAO = $alumno_materiaDAO->read();
    echo json_encode($alumno_materiaDAO);
  } 

  function readTable() {
    require 'model/alumno_materiaDAO.php';
    $this->loadModel('Alumno_materiaDAO');
    $alumno_materiaDAO = new Alumno_materiaDAO();
    $alumno_materiaDAO = $alumno_materiaDAO->read();

    $obj = null;
    if (is_array($alumno_materiaDAO) || is_object($alumno_materiaDAO))
    {
      foreach ($alumno_materiaDAO as $key => $value) {
        $obj["data"][] = $value;
      }
    } else {
      $obj = array();
    }
    echo json_encode($obj);
    
  }



}
