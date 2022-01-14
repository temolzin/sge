<?php
    class AdministradorS extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('administradorS/index');
        }

        function insert() {
            $escuela_clave = $_POST['escuela_clave'];
            $escuela_nombre = $_POST['escuela_nombre'];
            $escuela_localidad = $_POST['escuela_localidad'];
            $escuela_turno = $_POST['escuela_turno'];
            $nombre_director = $_POST['nombre_director'];
            
            $data = array('escuela_clave' => $escuela_clave,
                          'escuela_nombre' => $escuela_nombre, 'escuela_localidad'=>$escuela_localidad,
                          'escuela_turno' => $escuela_turno,
                          'nombre_director' => $nombre_director);

            require 'model/administradorSDAO.php';
            $this->loadModel('AdministradorSDAO');
            $administradorSDAO = new AdministradorSDAO();
            $administradorSDAO->insert($data);
        }

        function update() {
            
            $matricula_admin = $_POST['matriculaAdminActualizar'];
            $escuela_clave = $_POST['escuelaclaveActualizar'];
            $escuela_nombre = $_POST['escuelanombreActualizar'];
            $escuela_localidad = $_POST['escuelalocalidadActualizar'];
            $escuela_turno = $_POST['escuelaturnoActualizar'];
            $nombre_director = $_POST['nombredirectorActualizar'];
            
            $data = array(
                          'matricula_admin' => $matricula_admin,
                          'escuela_clave' => $escuela_clave,
                          'escuela_nombre' => $escuela_nombre, 'escuela_localidad'=>$escuela_localidad,
                          'escuela_turno' => $escuela_turno,
                          'nombre_director' => $nombre_director);

            require 'model/administradorSDAO.php';
            $this->loadModel('AdministradorSDAO');
            $administradorSDAO = new AdministradorSDAO();
            $administradorSDAO->update($data);
        }
        

        function delete(){
            $matricula_admin = $_POST['idEliminarAdministradorS'];

            require 'model/administradorSDAO.php';
            $this->loadModel('AdministradorSDAO');
            $administradorSDAO = new AdministradorSDAO();
            $administradorSDAO->delete($matricula_admin);
        }

        function read() {
            require 'model/administradorSDAO.php';
            $this->loadModel('AdministradorSDAO');
            $administradorSDAO = new AdministradorSDAO();
            $administradorSDAO = $administradorSDAO->read();
            echo $administradorSDAO;
        }
    }
