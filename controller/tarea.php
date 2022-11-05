<?php
class Tarea extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('tarea/index');
    }

    function showTareaEntregada()
    {
        $this->view->render('tarea/tareaEntregada');
    }

    function showTareaTutor()
    {
        $this->view->render('tarea/tareaDetalleTutor');
    }

    function showTareaAlumno()
    {
        $this->view->render('tarea/tareaDetalleAlumno');
    }

    function showTareaCalificada()
    {
        $this->view->render('tarea/tareaCalificada');
    }

    function insert()
    {
        $id_grupo = $_POST['id_grupo'];
        $id_materia = $_POST['id_materia'];
        $nombre_tarea = $_POST['nombre_tarea'];
        $fecha_entrega = $_POST['fecha_entrega'];
        $descripcion_tarea = $_POST['descripcion_tarea'];

        $archivo_tarea = "";
        if ($_FILES["archivo_tarea"]["name"] != null) {
            $archivo = $_FILES["archivo_tarea"];
            $archivo_tarea = $archivo["name"];
            $tipoImagen = $archivo["type"];
            $ruta_provisional = $archivo["tmp_name"];


            $carpeta = constant('URL') . "public/tareas/" . $nombre_tarea . "/";

            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }

            copy($ruta_provisional, $carpeta . $archivo_tarea);

            $data = array(
                'id_grupo' => $id_grupo,
                'id_materia' => $id_materia,
                'nombre_tarea' => $nombre_tarea,
                'fecha_entrega' => $fecha_entrega,
                'descripcion_tarea' => $descripcion_tarea,
                'archivo_tarea' => $archivo_tarea
            );
            require 'model/tareaDAO.php';
            $this->loadModel('TareaDAO');
            $tareaDAO = new TareaDAO();
            $tareaDAO->insert($data);
        }
    }

    function update()
    {
        $id_tarea_alumno = $_POST['id_tarea_alumnoActualizar'];
        $id_grupo = $_POST['id_grupoActualizar'];
        $id_materia = $_POST['id_materiaActualizar'];
        $nombre_tarea = $_POST['nombre_tareaActualizar'];
        $fecha_entrega = $_POST['fecha_entregaActualizar'];
        $descripcion_tarea = $_POST['descripcion_tareaActualizar'];
        $archivo_tarea = "";
        if ($_FILES["archivo_tareaActualizar"]["name"] != null) {
            $archivo = $_FILES["archivo_tareaActualizar"];
            $archivo_tarea = $archivo["name"];
            $tipoImagen = $archivo["type"];
            $ruta_provisional = $archivo["tmp_name"];


            $carpeta = constant('URL') . "public/tareas/" . $nombre_tarea . "/";

            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }

            copy($ruta_provisional, $carpeta . $archivo_tarea);



            $data = array(
                'id_tarea_alumno' => $id_tarea_alumno,
                'id_grupo' => $id_grupo,
                'id_materia' => $id_materia,
                'nombre_tarea' => $nombre_tarea,
                'fecha_entrega' => $fecha_entrega,
                'descripcion_tarea' => $descripcion_tarea,
                'archivo_tarea' => $archivo_tarea
            );

            require 'model/tareaDAO.php';
            $this->loadModel('TareaDAO');
            $tareaDAO = new TareaDAO();
            $tareaDAO->update($data);
        }
    }

    function delete()
    {
        $id_tarea_alumno = $_POST['idEliminarTarea'];
        require 'model/tareaDAO.php';
        $this->loadModel('TareaDAO');
        $tareaDAO = new TareaDAO();
        $tareaDAO->delete($id_tarea_alumno);
    }
    
    function readByIdProfesor()
    {
        $id_profesor = $_POST['id_profesor'];
        require 'model/tareaDAO.php';
        $this->loadModel('TareaDAO');
        $tareaDAO = new TareaDAO();
        $tareaDAO = $tareaDAO->readByIdProfesor($id_profesor);

        $obj = null;
        if (is_array($tareaDAO) || is_object($tareaDAO)) {
            foreach ($tareaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //************************************************************** TAREA ENTREGADA ***********************************************************

    function updateTareaEntregada()
    {
        $id_tarea_entregada  = $_POST['id_tarea_entregadaActualizar'];
        $calificacion_tarea = $_POST['calificacion_tareaActualizar'];


        $data = array(
            'id_tarea_entregada' => $id_tarea_entregada,
            'calificacion_tarea' => $calificacion_tarea
        );

        require 'model/tareaDAO.php';
        $this->loadModel('TareaDAO');
        $tareaEntregadaDAO = new TareaDAO();
        $tareaEntregadaDAO->updateTareaEntregada($data);
    }

    function readTareaEntregadaByIdProfesor()
    {
        $id_profesor = $_POST['id_profesor'];
        require 'model/tareaDAO.php';
        $this->loadModel('TareaDAO');
        $tareaEntregadaDAO = new TareaDAO();
        $tareaEntregadaDAO = $tareaEntregadaDAO->readTareaEntregadaByIdProfesor($id_profesor);

        $obj = null;
        if (is_array($tareaEntregadaDAO) || is_object($tareaEntregadaDAO)) {
            foreach ($tareaEntregadaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //**************************************************** TAREA MOSTRAR TUTOR **********************************************

    function readTareaTutorByIdGrupo()
    {
        $id_grupo = $_POST['id_grupo'];
        require 'model/tareaDAO.php';
        $this->loadModel('TareaDAO');
        $tareaalumno_consultaDAO = new TareaDAO();
        $tareaalumno_consultaDAO = $tareaalumno_consultaDAO->readTareaTutorByIdGrupo($id_grupo);

        $obj = null;
        if (is_array($tareaalumno_consultaDAO) || is_object($tareaalumno_consultaDAO)) {
            foreach ($tareaalumno_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //******************************************************** TAREA MOSTRAR ALUMNO **********************************************

    function insertTareaAlumno()
    {

        $id_tarea_alumnoDetalle = $_POST['id_tarea_alumnoDetalle'];
        $comentarios_tarea = $_POST['comentarios_tarea'];
        $calificacion_tarea = $_POST['calificacion_tarea'];
        $archivo_tarea_entregada = "";
        if ($_FILES["archivo_tarea_entregada"]["name"] != null) {
            $archivo = $_FILES["archivo_tarea_entregada"];
            $archivo_tarea_entregada = $archivo["name"];
            $tipoImagen = $archivo["type"];
            $ruta_provisional = $archivo["tmp_name"];
            $fullname = $id_tarea_alumnoDetalle . "_" . $archivo_tarea_entregada;

            $carpeta = constant('URL') . "public/tareas_entregadas/" . $fullname . "/";

            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }

            copy($ruta_provisional, $carpeta . $archivo_tarea_entregada);


            $data = array(
                'id_tarea_alumnoDetalle' => $id_tarea_alumnoDetalle,
                'archivo_tarea_entregada' => $archivo_tarea_entregada,
                'comentarios_tarea' => $comentarios_tarea,
                'calificacion_tarea' => $calificacion_tarea
            );

            require 'model/tareaDAO.php';
            $this->loadModel('TareaDAO');
            $tareaalumnoDAO = new TareaDAO();
            $tareaalumnoDAO->insertTareaAlumno($data);
        }
    }

    function readTareaAlumnoByIdGrupo()
    {
        $id_grupo = $_POST['id_grupo'];
        require 'model/tareaDAO.php';
        $this->loadModel('TareaDAO');
        $tareaalumnoDAO = new TareaDAO();
        $tareaalumnoDAO = $tareaalumnoDAO->readTareaAlumnoByIdGrupo($id_grupo);
        $obj = null;
        if (is_array($tareaalumnoDAO) || is_object($tareaalumnoDAO)) {
            foreach ($tareaalumnoDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    //******************************************************** TAREA CALIFICADA ************************************************

    function readTareaCalificadaByIdGrupo()
    {
        $id_grupo = $_POST['id_grupo'];
        require 'model/tareaDAO.php';
        $this->loadModel('TareaDAO');
        $tareaCalificadaDAO = new TareaDAO();
        $tareaCalificadaDAO = $tareaCalificadaDAO->readTareaCalificadaByIdGrupo($id_grupo);

        $obj = null;
        if (is_array($tareaCalificadaDAO) || is_object($tareaCalificadaDAO)) {
            foreach ($tareaCalificadaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }
}
