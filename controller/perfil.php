<?php
class Perfil extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('perfil/index');
    }
}
