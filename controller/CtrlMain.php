<?php 

    session_start();
    if (isset($_SESSION["password"]) && isset($_SESSION["password"])) {
        
        require_once("model/Validar.php");
        $validar = new Validar();
        $validar->validarDatos();

        include_once("vista/principal.php");
        
    } else {

        if (isset($_SESSION["error"])) {
        
            echo "<p>Usuario y/o contraseña incorrecto</p>";
            unset($_SESSION["error"]);
    
        }

        include_once("view/login/login.php");
    }
?>s