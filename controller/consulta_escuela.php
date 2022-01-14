<?php
    class Consulta_escuela extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('consulta_escuela/index');
        }

      
    }
