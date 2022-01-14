<?php
    class Consulyta_horario extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('consulta_horario/index');
        }

        function insert() {
            $materia_fecha_horario = $_POST['materia_fecha_horario'];
            $materia_horainicio_horario = $_POST['materia_horainicio_horario'];
            $materia_horafin_horario = $_POST['materia_horafin_horario'];
            $data = array('materia_fecha_horario' => $materia_fecha_horario, 'materia_horainicio_horario' => $materia_horainicio_horario, 'materia_horafin_horario' => $materia_horafin_horario);

            require 'model/horarioDAO.php';
            $this->loadModel('HorarioDAO');
            $horarioDAO = new HorarioDAO();
            $horarioDAO->insert($data);
        }

        function update() {
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

        function delete(){
            $id_horario = $_POST['idEliminarHorario'];

            require 'model/horarioDAO.php';
            $this->loadModel('HorarioDAO');
            $horarioDAO = new HorarioDAO();
            $horarioDAO->delete($id_horario);
        }


        function read() {
            require 'model/horarioDAO.php';
            $this->loadModel('HorarioDAO');
            $horarioDAO = new HorarioDAO();
            $horarioDAO = $horarioDAO->read();

            echo json_encode($horarioDAO);
        }

        function readTable() {
            require 'model/horarioDAO.php';
            $this->loadModel('HorarioDAO');
            $horarioDAO = new HorarioDAO();
            $horarioDAO = $horarioDAO->read();

            $obj = null;
            foreach ($horarioDAO as $key => $value) {
                $obj["data"][] = $value;
            }

            echo json_encode($obj);
        }
    }
