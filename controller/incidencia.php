<?php
class Incidencia extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('incidencia/index');
    }

    function showIncidencia()
    {
        $this->view->render('incidencia/incidenciaDetalle');
    }

    function showIncidenciaAlumno()
    {
        $this->view->render('incidencia/incidenciaDetalleAlumno');
    }

    function insert()
    {
        $id_alumno = $_POST['id_alumno'];
        $id_profesor = $_POST['id_profesor'];
        $id_grupo  = $_POST['id_grupo'];
        $fechaincidencia_incidencia = $_POST['fechaincidencia_incidencia'];
        $horaincidencia_incidencia = $_POST['horaincidencia_incidencia'];
        $descripcion_incidencia = $_POST['descripcion_incidencia'];

        $data = array(
            'id_alumno' => $id_alumno,
            'id_profesor' => $id_profesor,
            'id_grupo' =>  $id_grupo,
            'fechaincidencia_incidencia' => $fechaincidencia_incidencia,
            'horaincidencia_incidencia' => $horaincidencia_incidencia,
            'descripcion_incidencia' => $descripcion_incidencia
        );

        require 'model/incidenciaDAO.php';
        $this->loadModel('IncidenciaDAO');
        $incidenciaDAO = new IncidenciaDAO();
        $incidenciaDAO->insert($data);
    }

    function update()
    {
        $id_incidencia = $_POST['id_incidenciaActualizar'];
        $id_alumno = $_POST['id_alumnoActualizar'];
        $id_profesor = $_POST['id_profesorActualizar'];
        $id_grupo  = $_POST['id_grupoActualizar'];
        $fechaincidencia_incidencia = $_POST['fechaincidencia_incidenciaActualizar'];
        $horaincidencia_incidencia = $_POST['horaincidencia_incidenciaActualizar'];
        $descripcion_incidencia = $_POST['descripcion_incidenciaActualizar'];

        $data = array(
            'id_incidencia' => $id_incidencia,
            'id_alumno' => $id_alumno,
            'id_profesor' => $id_profesor,
            'id_grupo' => $id_grupo,
            'fechaincidencia_incidencia' => $fechaincidencia_incidencia,
            'horaincidencia_incidencia' => $horaincidencia_incidencia,
            'descripcion_incidencia' => $descripcion_incidencia
        );

        require 'model/incidenciaDAO.php';
        $this->loadModel('IncidenciaDAO');
        $incidenciaDAO = new IncidenciaDAO();
        $incidenciaDAO->update($data);
    }

    function delete()
    {
        $id_incidencia  = $_POST['idEliminarIncidencia'];

        require 'model/incidenciaDAO.php';
        $this->loadModel('IncidenciaDAO');
        $incidenciaDAO = new IncidenciaDAO();
        $incidenciaDAO->delete($id_incidencia);
    }

    function read()
    {
        require 'model/incidenciaDAO.php';
        $this->loadModel('IncidenciaDAO');
        $incidenciaDAO = new IncidenciaDAO();
        $incidenciaDAO = $incidenciaDAO->read();
        echo json_encode($incidenciaDAO);
    }
    function readTable()
    {
        require 'model/incidenciaDAO.php';
        $this->loadModel('IncidenciaDAO');
        $incidenciaDAO = new IncidenciaDAO();
        $incidenciaDAO = $incidenciaDAO->read();

        $obj = null;
        if (is_array($incidenciaDAO) || is_object($incidenciaDAO)) {
            foreach ($incidenciaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //********************************************************************* INCIDENCIA CONSULTAR **********************************************

    function readIncidenciaConsulta()
    {
        require 'model/incidenciaDAO.php';
        $this->loadModel('IncidenciaDAO');
        $incidencias_consultaDAO = new IncidenciaDAO();
        $incidencias_consultaDAO = $incidencias_consultaDAO->readIncidenciaConsulta();
        echo json_encode($incidencias_consultaDAO);
    }

    function readTableIncidenciaConsulta()
    {
        require 'model/incidenciaDAO.php';
        $this->loadModel('IncidenciaDAO');
        $incidencias_consultaDAO = new IncidenciaDAO();
        $incidencias_consultaDAO = $incidencias_consultaDAO->readIncidenciaConsulta();

        $obj = null;
        if (is_array($incidencias_consultaDAO) || is_object($incidencias_consultaDAO)) {
            foreach ($incidencias_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //************************************************************************* INCIDENCIA ALUMNO **************************************

    function readIncidenciaAlumno()
    {
        require 'model/incidenciaDAO.php';
        $this->loadModel('IncidenciaDAO');
        $alumno_incidenciaDAO = new IncidenciaDAO();
        $alumno_incidenciaDAO = $alumno_incidenciaDAO->readIncidenciaAlumno();
        echo json_encode($alumno_incidenciaDAO);
    }

    function readTableIncidenciaAlumno()
    {
        require 'model/incidenciaDAO.php';
        $this->loadModel('IncidenciaDAO');
        $alumno_incidenciaDAO = new IncidenciaDAO();
        $alumno_incidenciaDAO = $alumno_incidenciaDAO->readIncidenciaAlumno();

        $obj = null;
        if (is_array($alumno_incidenciaDAO) || is_object($alumno_incidenciaDAO)) {
            foreach ($alumno_incidenciaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }

        echo json_encode($obj);
    }
}
