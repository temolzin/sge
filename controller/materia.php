<?php
class Materia extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('materia/index');
    }

    function insert() {
        $id_escuela = $_POST['id_escuela'];
        $id_horario = $_POST['id_horario'];
        $nombre_materia = $_POST['nombre_materia'];
        $data = array('id_escuela' => $id_escuela, 'id_horario' => $id_horario, 'nombre_materia' => $nombre_materia);

        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materiaDAO = new MateriaDAO();
        $materiaDAO->insert($data);
    }

    function update() {
        $id_escuela = $_POST['id_escuelaActualizar'];
        $id_horario = $_POST['id_horarioActualizar'];
        $nombre_materia = $_POST['nombre_materiaActualizar'];
        $id_materia = $_POST['id_materiaActualizar'];
        $data = array('id_escuela' => $id_escuela, 'id_horario' => $id_horario, 'nombre_materia' => $nombre_materia, 'id_materia'=>$id_materia);

        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materiaDAO = new MateriaDAO();
        $materiaDAO->update($data);
    }

    function delete(){
        $id_materia = $_POST['idEliminarMateria'];

        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materiaDAO = new MateriaDAO();
        $materiaDAO->delete($id_materia);
    }

    function read() {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materiaDAO = new MateriaDAO();
        $materiaDAO = $materiaDAO->read();

        echo json_encode($materiaDAO);
    }

    function readTable() {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materiaDAO = new MateriaDAO();
        $materiaDAO = $materiaDAO->read();

        $obj = null;
        if (is_array($materiaDAO) || is_object($materiaDAO))
        {
            foreach ($materiaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

}
