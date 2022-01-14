<?php
class Consulta_alumno_materia extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('consulta_alumno_materia/index');
    }

     function insert() {
    $id_alumno_materia  = $_POST['id_alumno_materia'];
    $id_profesor = $_POST['id_profesor'];
    $id_grupo = $_POST['id_grupo'];
    $id_materia = $_POST['id_materia'];
    
    

    $data = array(
        'id_alumno_materia' =>  $id_alumno_materia,
        'id_profesor' => $id_profesor,
        'id_grupo' => $id_grupo,
        'id_materia' => $id_materia);

      require 'model/consulta_alumno_materiaDAO.php';
      $this->loadModel('Consulta_alumno_materiaDAO');
      $consulta_alumno_materiaDAO = new Consulta_alumno_materiaDAO();
      $consulta_alumno_materiaDAO->insert($data);

  }

  function update() {
    $id_alumno_materia  = $_POST['id_MateriaProfesorActualizar'];
    $id_profesor  = $_POST['id_profesorActualizar'];
    $id_grupo = $_POST['id_grupoActualizar'];
    $id_materia = $_POST['id_materiaActualizar'];

    $data = array(
       'id_alumno_materia' => $id_alumno_materia,
       'id_profesor' => $id_profesor,
       'id_grupo' => $id_grupo, 
       'id_materia' => $id_materia
   );

    require 'model/consulta_alumno_materiaDAO.php';
    $this->loadModel('Consulta_alumno_materiaDAO');
    $consulta_alumno_materiaDAO = new Consulta_alumno_materiaDAO();
    $consulta_alumno_materiaDAO->update($data);
}

function delete(){
    $id_alumno_materia  = $_POST['idEliminarMateriaProfesor'];

    require 'model/consulta_alumno_materiaDAO.php';
    $this->loadModel('GrupoDAO');
    $consulta_alumno_materiaDAO = new Consulta_alumno_materiaDAO();
    $consulta_alumno_materiaDAO->delete($id_alumno_materia);
}



function read() {
    require 'model/consulta_alumno_materiaDAO.php';
    $this->loadModel('Consulta_alumno_materiaDAO');
    $consulta_alumno_materiaDAO = new Consulta_alumno_materiaDAO();
    $consulta_alumno_materiaDAO = $consulta_alumno_materiaDAO->read();
   $obj = null;
                if (is_array($consulta_alumno_materiaDAO) || is_object($consulta_alumno_materiaDAO))
                {
                    foreach ($consulta_alumno_materiaDAO as $key => $value) {
                        $obj["data"][] = $value;
                    }
                } else {
                    $obj = array();
                }
                echo json_encode($obj);
} 



}
