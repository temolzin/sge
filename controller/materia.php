<?php
class Materia extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('materia/index');
    }

    function showMateriaProfesor()
    {
        $this->view->render('materia/materiaDetalle');
    }

    function showMateriaTutor()
    {
        $this->view->render('materia/materiaDetalleTutor');
    }

    function showMateriaAlumno()
    {
        $this->view->render('materia/materiaDetalleAlumno');
    }

    function showMateria()
    {
        $this->view->render('materia/materiaDetalleProfesor');
    }

    function insert()
    {
        $id_escuela = $_POST['id_escuela'];
        $id_horario = $_POST['id_horario'];
        $nombre_materia = $_POST['nombre_materia'];
        $data = array('id_escuela' => $id_escuela, 'id_horario' => $id_horario, 'nombre_materia' => $nombre_materia);

        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materiaDAO = new MateriaDAO();
        $materiaDAO->insert($data);
    }

    function update()
    {
        $id_escuela = $_POST['id_escuelaActualizar'];
        $id_horario = $_POST['id_horarioActualizar'];
        $nombre_materia = $_POST['nombre_materiaActualizar'];
        $id_materia = $_POST['id_materiaActualizar'];
        $data = array('id_escuela' => $id_escuela, 'id_horario' => $id_horario, 'nombre_materia' => $nombre_materia, 'id_materia' => $id_materia);

        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materiaDAO = new MateriaDAO();
        $materiaDAO->update($data);
    }

    function delete()
    {
        $id_materia = $_POST['idEliminarMateria'];

        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materiaDAO = new MateriaDAO();
        $materiaDAO->delete($id_materia);
    }

    function read()
    {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materiaDAO = new MateriaDAO();
        $materiaDAO = $materiaDAO->read();

        echo json_encode($materiaDAO);
    }

    function readTable()
    {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materiaDAO = new MateriaDAO();
        $materiaDAO = $materiaDAO->read();

        $obj = null;
        if (is_array($materiaDAO) || is_object($materiaDAO)) {
            foreach ($materiaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //************************************* MATERIA PROFESOR ******************************************

    function readMateriaProfesor()
    {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materia_profesor_consultaDAO = new MateriaDAO();
        $materia_profesor_consultaDAO = $materia_profesor_consultaDAO->readMateriaProfesor();
        echo json_encode($materia_profesor_consultaDAO);
    }

    function readTableMateriaProfesor()
    {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materia_profesor_consultaDAO = new MateriaDAO();
        $materia_profesor_consultaDAO = $materia_profesor_consultaDAO->readMateriaProfesor();

        $obj = null;
        if (is_array($materia_profesor_consultaDAO) || is_object($materia_profesor_consultaDAO)) {
            foreach ($materia_profesor_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //************************************************************************** MATERIA TUTOR ************************************************

    function readMateriaTutor()
    {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $alumno_materia_consultaDAO = new MateriaDAO();
        $alumno_materia_consultaDAO = $alumno_materia_consultaDAO->readMateriaTutor();
        echo json_encode($alumno_materia_consultaDAO);
    }

    function readTableMateriaTutor()
    {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $alumno_materia_consultaDAO = new MateriaDAO();
        $alumno_materia_consultaDAO = $alumno_materia_consultaDAO->readMateriaTutor();

        $obj = null;
        if (is_array($alumno_materia_consultaDAO) || is_object($alumno_materia_consultaDAO)) {
            foreach ($alumno_materia_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //************************************************************** MATERIA ALUMNO ***********************************************

    function readMateriaAlumno()
    {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $alumno_materiaDAO = new MateriaDAO();
        $alumno_materiaDAO = $alumno_materiaDAO->readMateriaAlumno();
        echo json_encode($alumno_materiaDAO);
    }

    function readTableMateriaAlumno()
    {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $alumno_materiaDAO = new MateriaDAO();
        $alumno_materiaDAO = $alumno_materiaDAO->readMateriaAlumno();

        $obj = null;
        if (is_array($alumno_materiaDAO) || is_object($alumno_materiaDAO)) {
            foreach ($alumno_materiaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //****************************************************************** MATERIA DETALLE PROFESOR ******************************************

    function insertDetalleProfesor()
    {
        $id_materia_profesor  = $_POST['id_materia_profesor'];
        $id_profesor = $_POST['id_profesor'];
        $id_grupo = $_POST['id_grupo'];
        $id_materia = $_POST['id_materia'];



        $data = array(
            'id_materia_profesor' =>  $id_materia_profesor,
            'id_profesor' => $id_profesor,
            'id_grupo' => $id_grupo,
            'id_materia' => $id_materia
        );

        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materia_profesorDAO = new MateriaDAO();
        $materia_profesorDAO->insertDetalleProfesor($data);
    }

    function updateDetalleProfesor()
    {
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

        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materia_profesorDAO = new MateriaDAO();
        $materia_profesorDAO->updateDetalleProfesor($data);
    }

    function deleteDetalleProfesor()
    {
        $id_materia_profesor  = $_POST['idEliminarMateriaProfesor'];

        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materia_profesorDAO = new MateriaDAO();
        $materia_profesorDAO->deleteDetalleProfesor($id_materia_profesor);
    }



    function readDetalleProfesor()
    {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materia_profesorDAO = new MateriaDAO();
        $materia_profesorDAO = $materia_profesorDAO->readDetalleProfesor();
        echo json_encode($materia_profesorDAO);
    }

    function readTableDetalleProfesor()
    {
        require 'model/materiaDAO.php';
        $this->loadModel('MateriaDAO');
        $materia_profesorDAO = new MateriaDAO();
        $materia_profesorDAO = $materia_profesorDAO->readDetalleProfesor();
        $obj = null;
        if (is_array($materia_profesorDAO) || is_object($materia_profesorDAO)) {
            foreach ($materia_profesorDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }
}
