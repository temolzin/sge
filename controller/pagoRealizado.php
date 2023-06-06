<?php
    class PagoRealizado extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index(){
            $this->view->render('pago/pagoRealizado');
        }
    }
