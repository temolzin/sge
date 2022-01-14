<?php
class Consulta_materia_profesor extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('consulta_materia_profesor/index');
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

        require 'model/consulta_materia_profesorDAO.php';
        $this->loadModel('Consulta_materia_profesorDAO');
        $consulta_materia_profesorDAO = new Consulta_materia_profesorDAO();
        $consulta_materia_profesorDAO->insert($data);

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

        require 'model/consulta_materia_profesorDAO.php';
        $this->loadModel('Consulta_materia_profesorDAO');
        $consulta_materia_profesorDAO = new Consulta_materia_profesorDAO();
        $consulta_materia_profesorDAO->update($data);
    }

    function delete(){
        $id_materia_profesor  = $_POST['idEliminarMateriaProfesor'];

        require 'model/consulta_materia_profesorDAO.php';
        $this->loadModel('GrupoDAO');
        $consulta_materia_profesorDAO = new Consulta_materia_profesorDAO();
        $consulta_materia_profesorDAO->delete($id_materia_profesor);
    }



    function read() {
        require 'model/consulta_materia_profesorDAO.php';
        $this->loadModel('Consulta_materia_profesorDAO');
        $consulta_materia_profesorDAO = new Consulta_materia_profesorDAO();
        $consulta_materia_profesorDAO = $consulta_materia_profesorDAO->read();
        echo json_encode($consulta_materia_profesorDAO);
    } 

    function readTable() {
        require 'model/consulta_materia_profesorDAO.php';
        $this->loadModel('Consulta_materia_profesorDAO');
        $consulta_materia_profesorDAO = new Consulta_materia_profesorDAO();
        $consulta_materia_profesorDAO = $consulta_materia_profesorDAO->read();

         $obj = null;
                if (is_array($consulta_materia_profesorDAO) || is_object($consulta_materia_profesorDAO))
                {
                    foreach ($consulta_materia_profesorDAO as $key => $value) {
                        $obj["data"][] = $value;
                    }
                } else {
                    $obj = array();
                }
                echo json_encode($obj);
                
    }

}
