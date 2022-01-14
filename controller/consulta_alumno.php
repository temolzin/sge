<?php
    class Consulta_alumno extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('consulta_alumno/index');
        }

      
    }
