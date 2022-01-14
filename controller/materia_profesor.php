<?php
class Materia_profesor extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('materia_profesor/index');
    }

    function insert() {
        $id_materia_profesor  = $_POST['id_materia_profesor'];
        $id_profesor = $_POST['id_profesor'];
        $id_grupo = $_POST['id_grupo'];
        $id_materia = $_POST['id_materia'];
        
        

        $data = array(
            'id_materia_profesor' =>  $id_materia_profesor,
            'id_profesor' => $id_profesor,
            'id_grupo' => $id_grupo,
            'id_materia' => $id_materia);

        require 'model/materia_profesorDAO.php';
        $this->loadModel('Materia_profesorDAO');
        $materia_profesorDAO = new Materia_profesorDAO();
        $materia_profesorDAO->insert($data);

    }
//     function insert() {
//      // $base = $_POST['id_materia_profesor'];
//      // $id_profesor = $_POST['id_profesor'];
//      // $id_grupo = $_POST['id_grupo'];
//      // $id_materia = $_POST['id_materia'];

//      $data = count($_POST['id_materia_profesor']);


//      for ($i=0;$i<$data;$i++) {

//     $query = "INSERT INTO materia_profesor values (null,  id_profesor, id_grupo, id_materia)";
//      $query-> $this->db->conectar()->prepare($query);
//   }




// }

    function update() {
        $id_materia_profesor  = $_POST['id_MateriaProfesorActualizar'];
        $id_profesor  = $_POST['id_profesorActualizar'];
        $id_grupo = $_POST['id_grupoActualizar'];
        $id_materia = $_POST['id_materiaActualizar'];

        $data = array(
           'id_materia_profesor' => $id_materia_profesor,
           'id_profesor' => $id_profesor,
           'id_grupo' => $id_grupo, 
           'id_materia' => $id_materia
       );

        require 'model/materia_profesorDAO.php';
        $this->loadModel('Materia_profesorDAO');
        $materia_profesorDAO = new Materia_profesorDAO();
        $materia_profesorDAO->update($data);
    }

    function delete(){
        $id_materia_profesor  = $_POST['idEliminarMateriaProfesor'];

        require 'model/materia_profesorDAO.php';
        $this->loadModel('GrupoDAO');
        $materia_profesorDAO = new Materia_profesorDAO();
        $materia_profesorDAO->delete($id_materia_profesor);
    }



    function read() {
        require 'model/materia_profesorDAO.php';
        $this->loadModel('Materia_profesorDAO');
        $materia_profesorDAO = new Materia_profesorDAO();
        $materia_profesorDAO = $materia_profesorDAO->read();
        echo json_encode($materia_profesorDAO);
    } 

    function readTable() {
        require 'model/materia_profesorDAO.php';
        $this->loadModel('Materia_profesorDAO');
        $materia_profesorDAO = new Materia_profesorDAO();
        $materia_profesorDAO = $materia_profesorDAO->read();
        $obj = null;
        if (is_array($materia_profesorDAO) || is_object($materia_profesorDAO))
        {
            foreach ($materia_profesorDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

}
