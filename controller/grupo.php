<?php
class Grupo extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('grupo/index');
    }

    function insert()
    {
        $id_grupo  = $_POST['id_grupo'];
        $id_escuela = $_POST['id_escuela'];
        $nombre_grupo = $_POST['nombre_grupo'];
        $turno_grupo = $_POST['turno_grupo'];



        $data = array(
            'id_grupo' =>  $id_grupo,
            'id_escuela' => $id_escuela,
            'nombre_grupo' => $nombre_grupo,
            'turno_grupo' => $turno_grupo
        );

        require 'model/grupoDAO.php';
        $this->loadModel('GrupoDAO');
        $grupoDAO = new GrupoDAO();
        $grupoDAO->insert($data);
    }

    function update()
    {
        $id_grupo  = $_POST['id_grupoActualizar'];
        $id_escuela = $_POST['id_escuelaActualizar'];
        $nombre_grupo = $_POST['nombre_grupoActualizar'];
        $turno_grupo = $_POST['turno_grupoActualizar'];

        $data = array(
            'id_grupo' => $id_grupo,
            'id_escuela' => $id_escuela,
            'nombre_grupo' => $nombre_grupo,
            'turno_grupo' => $turno_grupo
        );

        require 'model/grupoDAO.php';
        $this->loadModel('GrupoDAO');
        $grupoDAO = new GrupoDAO();
        $grupoDAO->update($data);
    }

    function delete()
    {
        $id_grupo  = $_POST['idEliminarGrupo'];

        require 'model/grupoDAO.php';
        $this->loadModel('GrupoDAO');
        $grupoDAO = new GrupoDAO();
        $grupoDAO->delete($id_grupo);
    }

    function read()
    {
        require 'model/grupoDAO.php';
        $this->loadModel('GrupoDAO');
        $grupoDAO = new GrupoDAO();
        $grupoDAO = $grupoDAO->read();
        echo json_encode($grupoDAO);
    }

    function readTable()
    {
        require 'model/grupoDAO.php';
        $this->loadModel('GrupoDAO');
        $grupoDAO = new GrupoDAO();
        $grupoDAO = $grupoDAO->read();

        $obj = null;
        if (is_array($grupoDAO) || is_object($grupoDAO)) {
            foreach ($grupoDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }
}
