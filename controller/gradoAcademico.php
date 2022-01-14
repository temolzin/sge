<?php
class GradoAcademico extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('gradoAcademico/index');
    }

    function insert() {
        $id_grado_academico = $_POST['id_grado_academico'];
        $nombre_grado_academico = $_POST['nombre_grado_academico'];
        $observacion_gradoacademico = $_POST['observacion_gradoacademico'];
        $data = array('id_grado_academico' => $id_grado_academico, 'nombre_grado_academico' => $nombre_grado_academico, 'observacion_gradoacademico' => $observacion_gradoacademico);

        require 'model/gradoAcademicoDAO.php';
        $this->loadModel('GradoAcademicoDAO');
        $gradoAcademicoDAO = new GradoAcademicoDAO();
        $gradoAcademicoDAO->insert($data);
    }

    function update() {
        $id_grado_academico = $_POST['id_grado_academicoActualizar'];
        $nombre_grado_academico = $_POST['nombre_grado_academicoActualizar'];
        $observacion_gradoacademico = $_POST['observacion_gradoacademicoActualizar'];
        $data = array('id_grado_academico' => $id_grado_academico, 'nombre_grado_academico' => $nombre_grado_academico, 'observacion_gradoacademico' => $observacion_gradoacademico);

        require 'model/gradoAcademicoDAO.php';
        $this->loadModel('GradoAcademicoDAO');
        $gradoAcademicoDAO = new GradoAcademicoDAO();
        $gradoAcademicoDAO->update($data);
    }

    function delete(){
        $id_grado_academico = $_POST['idEliminarGradoAcademico'];

        require 'model/gradoAcademicoDAO.php';
        $this->loadModel('GradoAcademicoDAO');
        $gradoAcademicoDAO = new GradoAcademicoDAO();
        $gradoAcademicoDAO->delete($id_grado_academico);
    }


    function read() {
        require 'model/gradoAcademicoDAO.php';
        $this->loadModel('GradoAcademicoDAO');
        $gradoAcademicoDAO = new GradoAcademicoDAO();
        $gradoAcademicoDAO = $gradoAcademicoDAO->read();

        echo json_encode($gradoAcademicoDAO);
    }

    function readTable() {
     require 'model/gradoAcademicoDAO.php';
     $this->loadModel('GradoAcademicoDAO');
     $gradoAcademicoDAO = new GradoAcademicoDAO();
     $gradoAcademicoDAO = $gradoAcademicoDAO->read();

     $obj = null;
     if (is_array($gradoAcademicoDAO) || is_object($gradoAcademicoDAO))
     {
        foreach ($gradoAcademicoDAO as $key => $value) {
            $obj["data"][] = $value;
        }
    } else {
        $obj = array();
    }
    echo json_encode($obj);
    
}


}
