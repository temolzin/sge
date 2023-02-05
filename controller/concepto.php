<?php
class Concepto extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('concepto/index');
    }

    function insert()
    {
        $nombre_concepto = $_POST['nombre_concepto'];
        $descripcion_concepto = $_POST['descripcion_concepto'];

        $data = array(
            'nombre_concepto' => $nombre_concepto,
            'descripcion_concepto' => $descripcion_concepto,
        );

        require 'model/conceptoDAO.php';
        $this->loadModel('ConceptoDAO');
        $conceptoDAO = new ConceptoDAO();
        $conceptoDAO->insert($data);
    }

    function update()
    {
        $id_concepto = $_POST['id_conceptoActualizar'];
        $nombre_concepto = $_POST['nombre_conceptoActualizar'];
        $descripcion_concepto = $_POST['descripcion_conceptoActualizar'];

        $data = array(
            'id_concepto' => $id_concepto,
            'nombre_concepto' => $nombre_concepto,
            'descripcion_concepto' => $descripcion_concepto,
        );

        require 'model/conceptoDAO.php';
        $this->loadModel('ConceptoDAO');
        $conceptoDAO = new ConceptoDAO();
        $conceptoDAO->update($data);
    }

    function delete()
    {
        $id_concepto  = $_POST['idEliminarConcepto'];

        require 'model/conceptoDAO.php';
        $this->loadModel('ConceptoDAO');
        $conceptoDAO = new ConceptoDAO();
        $conceptoDAO->delete($id_concepto);
    }

    function read()
    {
        require 'model/conceptoDAO.php';
        $this->loadModel('ConceptoDAO');
        $conceptoDAO = new ConceptoDAO();
        $conceptoDAO = $conceptoDAO->read();
        echo json_encode($conceptoDAO);
    }
    function readTable()
    {
        require 'model/conceptoDAO.php';
        $this->loadModel('ConceptoDAO');
        $conceptoDAO = new ConceptoDAO();
        $conceptoDAO = $conceptoDAO->read();

        $obj = null;
        if (is_array($conceptoDAO) || is_object($conceptoDAO)) {
            foreach ($conceptoDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        }else{
            $obj=array();
        }

        echo json_encode($obj);
    }
}