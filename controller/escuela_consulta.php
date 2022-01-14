<?php
    class Escuela_consulta extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('escuela_consulta/index');
        }

      
    }
