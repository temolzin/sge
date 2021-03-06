<?php
class Horario extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('horario/index');
    }

    function showHorarioConsulta()
    {
        $this->view->render('horario/horarioConsulta');
    }

    function insert()
    {
        $materia_fecha_horario = $_POST['materia_fecha_horario'];
        $materia_horainicio_horario = $_POST['materia_horainicio_horario'];
        $materia_horafin_horario = $_POST['materia_horafin_horario'];
        $data = array('materia_fecha_horario' => $materia_fecha_horario, 'materia_horainicio_horario' => $materia_horainicio_horario, 'materia_horafin_horario' => $materia_horafin_horario);

        require 'model/horarioDAO.php';
        $this->loadModel('HorarioDAO');
        $horarioDAO = new HorarioDAO();
        $horarioDAO->insert($data);
    }

    function update()
    {
        $id_horario = $_POST['id_horarioActualizar'];
        $materia_fecha_horario = $_POST['materia_fecha_horarioActualizar'];
        $materia_horainicio_horario = $_POST['materia_horainicio_horarioActualizar'];
        $materia_horafin_horario = $_POST['materia_horafin_horarioActualizar'];
        $data = array('id_horario' => $id_horario, 'materia_fecha_horario' => $materia_fecha_horario, 'materia_horainicio_horario' => $materia_horainicio_horario, 'materia_horafin_horario' => $materia_horafin_horario);

        require 'model/horarioDAO.php';
        $this->loadModel('HorarioDAO');
        $horarioDAO = new HorarioDAO();
        $horarioDAO->update($data);
    }

    function delete()
    {
        $id_horario = $_POST['idEliminarHorario'];

        require 'model/horarioDAO.php';
        $this->loadModel('HorarioDAO');
        $horarioDAO = new HorarioDAO();
        $horarioDAO->delete($id_horario);
    }


    function read()
    {
        require 'model/horarioDAO.php';
        $this->loadModel('HorarioDAO');
        $horarioDAO = new HorarioDAO();
        $horarioDAO = $horarioDAO->read();

        echo json_encode($horarioDAO);
    }

    function readTable()
    {
        require 'model/horarioDAO.php';
        $this->loadModel('HorarioDAO');
        $horarioDAO = new HorarioDAO();
        $horarioDAO = $horarioDAO->readHorarioConsulta();

        $obj = null;
        if (is_array($horarioDAO) || is_object($horarioDAO)) {
            foreach ($horarioDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo "hola ", json_encode($obj);
    }

    //***************************************************************************** HORARIO CONSULTA ************************************

    function insertHorarioConsulta()
    {
        $materia_fecha_horario = $_POST['materia_fecha_horario'];
        $materia_horainicio_horario = $_POST['materia_horainicio_horario'];
        $materia_horafin_horario = $_POST['materia_horafin_horario'];
        $data = array('materia_fecha_horario' => $materia_fecha_horario, 'materia_horainicio_horario' => $materia_horainicio_horario, 'materia_horafin_horario' => $materia_horafin_horario);

        require 'model/horarioDAO.php';
        $this->loadModel('HorarioDAO');
        $horarioDAO = new HorarioDAO();
        $horarioDAO->insert($data);
    }

    function updateHorarioConsulta()
    {
        $id_horario = $_POST['id_horarioActualizar'];
        $materia_fecha_horario = $_POST['materia_fecha_horarioActualizar'];
        $materia_horainicio_horario = $_POST['materia_horainicio_horarioActualizar'];
        $materia_horafin_horario = $_POST['materia_horafin_horarioActualizar'];
        $data = array('id_horario' => $id_horario, 'materia_fecha_horario' => $materia_fecha_horario, 'materia_horainicio_horario' => $materia_horainicio_horario, 'materia_horafin_horario' => $materia_horafin_horario);

        require 'model/horarioDAO.php';
        $this->loadModel('HorarioDAO');
        $horarioDAO = new HorarioDAO();
        $horarioDAO->update($data);
    }

    function deleteHorarioConsulta()
    {
        $id_horario = $_POST['idEliminarHorario'];

        require 'model/horarioDAO.php';
        $this->loadModel('HorarioDAO');
        $horarioDAO = new HorarioDAO();
        $horarioDAO->deleteHorarioConsulta($id_horario);
    }


    function readHorarioConsulta()
    {
        require 'model/horarioDAO.php';
        $this->loadModel('HorarioDAO');
        $horarioDAO = new HorarioDAO();
        $horarioDAO = $horarioDAO->readHorarioConsulta();

        echo json_encode($horarioDAO);
    }

    function readTableHorarioConsulta()
    {
        require 'model/horarioDAO.php';
        $this->loadModel('HorarioDAO');
        $horarioDAO = new HorarioDAO();
        $horarioDAO = $horarioDAO->readHorarioConsulta();

        $obj = null;
        foreach ($horarioDAO as $key => $value) {
            $obj["data"][] = $value;
        }

        echo json_encode($obj);
    }
}
