<?php
class Parcial extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('parcial/index');
    }

    function insert()
    {
        $id_parcial  = $_POST['id_parcial'];
        $id_escuela = $_POST['id_escuela'];
        $nombre_parcial = $_POST['nombre_parcial'];
        $fechainicio_parcial = $_POST['fechainicio_parcial'];
        $fechafin_parcial = $_POST['fechafin_parcial'];



        $data = array(
            'id_parcial' =>  $id_parcial,
            'id_escuela' => $id_escuela,
            'nombre_parcial' => $nombre_parcial,
            'fechainicio_parcial' => $fechainicio_parcial,
            'fechafin_parcial' => $fechafin_parcial
        );

        require 'model/parcialDAO.php';
        $this->loadModel('ParcialDAO');
        $parcialDAO = new ParcialDAO();
        $parcialDAO->insert($data);
    }

    function update()
    {
        $id_parcial  = $_POST['id_parcialActualizar'];
        $id_escuela = $_POST['id_escuelaActualizar'];
        $nombre_parcial = $_POST['nombre_parcialActualizar'];
        $fechainicio_parcial = $_POST['fechainicio_parcialActualizar'];
        $fechafin_parcial = $_POST['fechafin_parcialActualizar'];

        $data = array(
            'id_parcial' => $id_parcial,
            'id_escuela' => $id_escuela,

            'nombre_parcial' => $nombre_parcial,
            'fechainicio_parcial' => $fechainicio_parcial,
            'fechafin_parcial' => $fechafin_parcial
        );

        require 'model/parcialDAO.php';
        $this->loadModel('ParcialDAO');
        $parcialDAO = new ParcialDAO();
        $parcialDAO->update($data);
    }

    function delete()
    {
        $id_parcial  = $_POST['idEliminarParcial'];

        require 'model/parcialDAO.php';
        $this->loadModel('ParcialDAO');
        $parcialDAO = new ParcialDAO();
        $parcialDAO->delete($id_parcial);
    }

    function read()
    {
        require 'model/parcialDAO.php';
        $this->loadModel('ParcialDAO');
        $parcialDAO = new ParcialDAO();
        $parcialDAO = $parcialDAO->read();
        echo json_encode($parcialDAO);
    }
    function readTable()
    {
        require 'model/parcialDAO.php';
        $this->loadModel('ParcialDAO');
        $parcialDAO = new ParcialDAO();
        $parcialDAO = $parcialDAO->read();

        $obj = null;
        if (is_array($parcialDAO) || is_object($parcialDAO)) {
            foreach ($parcialDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        }else{
            $obj=array();
        }

        echo json_encode($obj);
    }
}
