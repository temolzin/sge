<?php
class Calificacion extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('calificacion/index');
    }

    function showCalificacionTutor()
    {
        $this->view->render('calificacion/califcacionDetalleTutor');
    }

    function showCalificacionAlumno()
    {
        $this->view->render('calificacion/calificacionDetalleAlumno');
    }

    function insert()
    {
        $id_profesor = $_POST['id_profesor'];
        $id_alumno = $_POST['id_alumno'];
        $id_parcial = $_POST['id_parcial'];
        $id_materia  = $_POST['id_materia'];
        $calificacion = $_POST['calificacion'];
        $observacion_calificacion = $_POST['observacion_calificacion'];
        $fecha_calificacion = $_POST['fecha_calificacion'];

        $data = array(
            'id_profesor' => $id_profesor,
            'id_alumno' => $id_alumno,
            'id_parcial' =>  $id_parcial,
            'id_materia' =>  $id_materia,
            'calificacion' => $calificacion,
            'observacion_calificacion' => $observacion_calificacion,
            'fecha_calificacion' => $fecha_calificacion
        );

        require 'model/calificacionDAO.php';
        $this->loadModel('CalificacionDAO');
        $calificacionDAO = new CalificacionDAO();
        $calificacionDAO->insert($data);
    }

    function update()
    {
        $id_calificacion = $_POST['id_calificacionActualizar'];
        $id_profesor = $_POST['id_profesorActualizar'];
        $id_alumno = $_POST['id_alumnoActualizar'];
        $id_parcial  = $_POST['id_parcialActualizar'];
        $id_materia  = $_POST['id_materiaActualizar'];
        $calificacion = $_POST['calificacionActualizar'];
        $observacion_calificacion = $_POST['observacion_calificacionActualizar'];
        $fecha_calificacion = $_POST['fecha_calificacionActualizar'];


        $data = array(
            'id_calificacion' => $id_calificacion,
            'id_profesor' => $id_profesor,
            'id_alumno' => $id_alumno,
            'id_parcial' => $id_parcial,
            'id_materia' => $id_materia,
            'calificacion' => $calificacion,
            'observacion_calificacion' => $observacion_calificacion,
            'fecha_calificacion' => $fecha_calificacion

        );

        require 'model/calificacionDAO.php';
        $this->loadModel('CalificacionDAO');
        $calificacionDAO = new CalificacionDAO();
        $calificacionDAO->update($data);
    }

    function delete()
    {
        $id_calificacion  = $_POST['idEliminarCalificacion'];

        require 'model/calificacionDAO.php';
        $this->loadModel('CalificacionDAO');
        $calificacionDAO = new CalificacionDAO();
        $calificacionDAO->delete($id_calificacion);
    }

    function read()
    {
        require 'model/calificacionDAO.php';
        $this->loadModel('CalificacionDAO');
        $calificacionDAO = new CalificacionDAO();
        $calificacionDAO = $calificacionDAO->read();
        echo json_encode($calificacionDAO);
    }

    function readTable()
    {
        require 'model/calificacionDAO.php';
        $this->loadModel('CalificacionDAO');
        $calificacionDAO = new CalificacionDAO();
        $calificacionDAO = $calificacionDAO->read();


        $obj = null;
        if (is_array($calificacionDAO) || is_object($calificacionDAO)) {
            foreach ($calificacionDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    function readByIdEscuela()
    {
        $id_escuela = $_POST['id_escuela'];
        require 'model/calificacionDAO.php';
        $this->loadModel('CalificacionDAO');
        $calificacionDAO = new CalificacionDAO();
        $calificacionDAO = $calificacionDAO->readByIdEscuela($id_escuela);

        $obj = null;
        if (is_array($calificacionDAO) || is_object($calificacionDAO)) {
            foreach ($calificacionDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //********************************************************************************* CALIFICACION TUTOR *********************************************

    function readCalificacionByIdTutor()
    {
        $id_tutor = $_POST['id_tutor'];
        require 'model/calificacionDAO.php';
        $this->loadModel('CalificacionDAO');
        $calificacion_tutor_consultaDAO = new CalificacionDAO();
        $calificacion_tutor_consultaDAO = $calificacion_tutor_consultaDAO->readCalificacionByIdTutor($id_tutor);

        $obj = null;
        if (is_array($calificacion_tutor_consultaDAO) || is_object($calificacion_tutor_consultaDAO)) {
            foreach ($calificacion_tutor_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //************************************************************* CALIFICACION ALUMNO ***************************************
    function readCalificacionByIdAlumno()
    {
        $id_alumno = $_POST['id_alumno'];
        require 'model/calificacionDAO.php';
        $this->loadModel('CalificacionDAO');
        $calificacion_consultaDAO = new CalificacionDAO();
        $calificacion_consultaDAO = $calificacion_consultaDAO->readCalificacionByIdAlumno($id_alumno);

        $obj = null;
        if (is_array($calificacion_consultaDAO) || is_object($calificacion_consultaDAO)) {
            foreach ($calificacion_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //************************************************************* CALIFICACION PROFESOR ***************************************

    function readCalificacionByIdProfesor()
    {
        $id_profesor = $_POST['id_profesor'];
        require 'model/calificacionDAO.php';
        $this->loadModel('CalificacionDAO');
        $calificacionDAO = new CalificacionDAO();
        $calificacionDAO = $calificacionDAO->readCalificacionByIdProfesor($id_profesor);

        $obj = null;
        if (is_array($calificacionDAO) || is_object($calificacionDAO)) {
            foreach ($calificacionDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }   
}
