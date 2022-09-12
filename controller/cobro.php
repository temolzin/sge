<?php
class Cobro extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('cobro/index');
    }

    function insert()
    {
        $id_alumno = $_POST['id_alumno'];
        $cantidad_cobro = $_POST['cantidad_cobro'];
        $iva_cobro =  $_POST['iva_cobro'];
        $concepto_cobro = $_POST['concepto_cobro'];
        $fechalimite_cobro = $_POST['fechalimite_cobro'];

        $data = array(
            'id_alumno' => $id_alumno,
            'cantidad_cobro' => $cantidad_cobro,
            'iva_cobro' => $iva_cobro,
            'concepto_cobro' => $concepto_cobro,
            'fechalimite_cobro' => $fechalimite_cobro
        );

        require 'model/cobroDAO.php';
        $this->loadModel('CobroDAO');
        $cobroDAO = new CobroDAO();
        $cobroDAO->insert($data);
    }


    function update()
    {
        $id_cobro = $_POST['id_cobroActualizar'];
        $id_alumno = $_POST['id_alumnoActualizar'];
        $cantidad_cobro = $_POST['cantidad_cobroActualizar'];
        $iva_cobro =  $_POST['iva_cobroActualizar'];
        $concepto_cobro = $_POST['concepto_cobroActualizar'];
        $fechalimite_cobro = $_POST['fechalimite_cobroActualizar'];

        $data = array(
            'id_cobro' => $id_cobro,
            'id_alumno' => $id_alumno,
            'cantidad_cobro' => $cantidad_cobro,
            'iva_cobro' => $iva_cobro,
            'concepto_cobro' => $concepto_cobro,
            'fechalimite_cobro' => $fechalimite_cobro
        );

        require 'model/cobroDAO.php';
        $this->loadModel('CobroDAO');
        $cobroDAO = new CobroDAO();
        $cobroDAO->update($data);
    }

    function delete()
    {
        $id_cobro = $_POST['idEliminarCobro'];

        require 'model/cobroDAO.php';
        $this->loadModel('CobroDAO');
        $cobroDAO = new CobroDAO();
        $cobroDAO->delete($id_cobro);
    }

    function read()
    {
        require 'model/cobroDAO.php';
        $this->loadModel('CobroDAO');
        $cobroDAO = new CobroDAO();
        $cobroDAO = $cobroDAO->read();
        echo json_encode($cobroDAO);
    }

    function readTable()
    {
        require 'model/cobroDAO.php';
        $this->loadModel('CobroDAO');
        $cobroDAO = new CobroDAO();
        $cobroDAO = $cobroDAO->read();

        $obj = null;
        if (is_array($cobroDAO) || is_object($cobroDAO)) {
            foreach ($cobroDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }
}
