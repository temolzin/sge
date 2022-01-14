<?php
    class Alumno_consulta extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('alumno_consulta/index');
        }

      
    }
