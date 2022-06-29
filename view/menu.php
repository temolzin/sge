<?php

class Menu
{

      function header($title)

      {
            $tipo = $_SESSION['tipo'];


            $nombre = $_SESSION['nombre'];
            $foto = $_SESSION['foto'];
            $appaterno = $_SESSION['appaterno'];
            $apmaterno = $_SESSION['apmaterno'];
            // $nombre_completo = $nombre . " " . $appaterno . " " . $apmaterno;

            $fotoruta = constant('URL').'public/' . $tipo . '/' . $appaterno . '_' . $apmaterno . '_' . $nombre . '/' . $foto;


            //$tutor = 'tutor';


            $menu = '';

            if ($tipo == 'tutor') {

                  $menu = '
      <li class="nav-item">
      <a id="main" name="main" href="' . constant('URL') . 'main" class="nav-link">
      <i class="nav-icon fa fa-home"></i> 
      <p>
      Inicio
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showEscuela" name="showEscuela" href="' . constant('URL') . 'escuela/showEscuela" class="nav-link">
      <i class="nav-icon fa fa-school"></i> 
      <p>
      Información Escolar 
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showAlumnoTutor" name="showAlumnoTutor" href="' . constant('URL') . 'alumno/showAlumnoTutor" class="nav-link">
      <i class="nav-icon fas fa-user-graduate"></i>
      <p>
      Información Alumno      
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showIncidencia" name="showIncidencia" href="' . constant('URL') . 'incidencia/showIncidencia" class="nav-link">
      <i class="nav-icon fas fa-clipboard "></i>
      <p>
      Incidencias
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showTareaTutor" name="showTareaTutor" href="' . constant('URL') . 'tarea/showTareaTutor" class="nav-link">
      <i class="nav-icon fas fa-edit"></i>
      <p>
      Tareas
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="showMateriaTutor" name="showMateriaTutor" href="' . constant('URL') . 'materia/showMateriaTutor" class="nav-link">
      <i class="nav-icon fas fa-book-open"></i>
      <p>
      Materias
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showCalificacionTutor" name="showCalificacionTutor" href="' . constant('URL') . 'calificacion/showCalificacionTutor" class="nav-link">
      <i class="nav-icon fas fa-chart-bar"></i>
      <p>
      Calificaciones
      </p>
      </a>
      </li>
   ';
            } else if ($tipo == 'alumno') {

                  $menu = '
      <li class="nav-item">
      <a id="main" name="main" href="' . constant('URL') . 'main" class="nav-link">
      <i class="nav-icon fa fa-home"></i> 
      <p>
      Inicio
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showTareaAlumno" name="showTareaAlumno" href="' . constant('URL') . 'tarea/showTareaAlumno" class="nav-link">
      <i class="nav-icon fas fa-edit"></i>
      <p>
      Tareas
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showEscuela" name="showEscuela" href="' . constant('URL') . 'escuela/showEscuela" class="nav-link">
      <i class="nav-icon fas fa-school"></i>
      <p>
      Escuela
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showIncidenciaAlumno" name="showIncidenciaAlumno" href="' . constant('URL') . 'incidencia/showIncidenciaAlumno" class="nav-link">
      <i class="nav-icon fas fa-clipboard"></i>
      <p>
      Incidencias
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showMateriaAlumno" name="showMateriaAlumno" href="' . constant('URL') . 'materia/showMateriaAlumno" class="nav-link">
      <i class="nav-icon fas fa-book-open"></i>
      <p>
      Materias
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showCalificacionAlumno" name="showCalificacionAlumno" href="' . constant('URL') . 'calificacion/showCalificacionAlumno" class="nav-link">
      <i class="nav-icon fas fa-chart-bar"></i>
      <p>
      Calificaciones
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showTareaCalificada" name="showTareaCalificada" href="' . constant('URL') . 'tarea/showTareaCalificada" class="nav-link">
      <i class="nav-icon fas fa-check-square"></i>
      <p>
      Tareas Calificadas
      </p>
      </a>
      </li>
     ';
            } else if ($tipo == 'director') {

                  $menu = ' 
     <li class="nav-item">
      <a id="main" name="main" href="' . constant('URL') . 'main" class="nav-link">
      <i class="nav-icon fa fa-home"></i> 
      <p>
      Inicio
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="directivo" name="directivo" href="' . constant('URL') . 'directivo" class="nav-link">
      <i class="nav-icon fas fa-users-cog"></i>
      <p>
      Directivo (s)
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="showEscuela" name="showEscuela" href="' . constant('URL') . 'escuela/showEscuela" class="nav-link">
      <i class="nav-icon fas fa-school"></i>
      <p>
      Escuela
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="alumno" name="alumno" href="' . constant('URL') . 'alumno" class="nav-link">
      <i class="nav-icon fas fa-user-graduate"></i>
      <p>
      Alumnos
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="tutor" name="tutor" href="' . constant('URL') . 'tutor" class="nav-link">
      <i class="nav-icon fas fa-user-tie"></i>
      <p>
      Tutores
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="profesor" name="profesor" href="' . constant('URL') . 'profesor" class="nav-link">
      <i class="nav-icon fas fa-chalkboard-teacher"></i>
      <p>
      Profesores
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="materia" name="materia" href="' . constant('URL') . 'materia" class="nav-link">
      <i class="nav-icon fas fa-book"></i>
      <p>
      Materias
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="showMateria" name="showMateria" href="' . constant('URL') . 'materia/showMateria" class="nav-link">
      <i class="nav-icon fas fa-book-open"></i>
      <p>
      Materias y profesores
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="index" name="index" href="' . constant('URL') . 'gradoAcademico/index" class="nav-link">
      <i class="nav-icon fas fa-graduation-cap"></i>
      <p>
      Grados Académicos
      </p>
      </a>
      </li> 

      <li class="nav-item">
      <a id="index" name="index" href="' . constant('URL') . 'calificacion/index" class="nav-link">
      <i class="nav-icon fas fa-chart-bar"></i>
      <p>
      Calificaciones
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="cobro" name="cobro" href="' . constant('URL') . 'cobro" class="nav-link">
      <i class="nav-icon fas fa-hand-holding-usd"></i>
      <p>
      Cobros
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="index" name="index" href="' . constant('URL') . 'grupo/index" class="nav-link">
      <i class="nav-icon fas fa-chalkboard-teacher"></i>
      <p>
      Grupos
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="horario" name="horario" href="' . constant('URL') . 'horario" class="nav-link">
      <i class="nav-icon fas fa-calendar-alt"></i>
      <p>
      Horarios
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="pago" name="pago" href="' . constant('URL') . 'pago" class="nav-link">
      <i class="nav-icon fas fa-money-check-alt"></i>
      <p>
      Pagos
      </p>
      </a>
      </li>

      ';
            } else if ($tipo == 'profesor') {

                  $menu = '
      <li class="nav-item">
      <a id="main" name="main" href="' . constant('URL') . 'main" class="nav-link">
      <i class="nav-icon fa fa-home"></i> 
      <p>
      Inicio
      </p>
      </a>
      </li>
      
      <li class="nav-item">
      <a id="index" name="index" href="' . constant('URL') . 'tarea/index" class="nav-link">
      <i class="nav-icon fas fa fa-paper-plane"></i>
      <p>
      Tareas
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="incidencia" name="incidencia" href="' . constant('URL') . 'incidencia" class="nav-link">
      <i class="nav-icon fas fa-paste"></i>
      <p>
      Incidencias
      </p>
      </a>
      </li>
      
      <li class="nav-item">
      <a id="parcial" name="parcial" href="' . constant('URL') . 'parcial" class="nav-link">
      <i class="nav-icon fas fa-chalkboard"></i>
      <p>
      Parcial
      </p>
      </a>
      </li>


      <li class="nav-item">
      <a id="showTareaEntregada" name="showTareaEntregada" href="' . constant('URL') . 'tarea/showTareaEntregada" class="nav-link">
      <i class="nav-icon fas fa-book-reader"></i>
      <p>
      Tareas Entregadas
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showEscuela" name="showEscuela" href="' . constant('URL') . 'escuela/showEscuela" class="nav-link">
      <i class="nav-icon fas fa-school"></i>
      <p>
      Escuela 
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showAlumnoProfesor" name="showAlumnoProfesor" href="' . constant('URL') . 'alumno/showAlumnoProfesor" class="nav-link">
      <i class="nav-icon fas fa-user-graduate"></i>
      <p>
      Alumnos
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="showMateriaProfesor" name="showMateriaProfesor" href="' . constant('URL') . 'materia/showMateriaProfesor" class="nav-link">
      <i class="nav-icon fas fa-book"></i>
      <p>
      Materias
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="calificacion" name="calificacion" href="' . constant('URL') . 'calificacion" class="nav-link">
      <i class="nav-icon fas fa-chart-bar"></i>
      <p>
      Calificaciones
      </p>
      </a>
      </li>

';
            } else if ($tipo == 'administrador') {

                  $menu = '
      <li class="nav-item">
      <a id="main" name="main" href="' . constant('URL') . 'main" class="nav-link">
      <i class="nav-icon fa fa-home"></i> 
      <p>
      Inicio
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="escuela" name="escuela" href="' . constant('URL') . 'escuela" class="nav-link">
      <i class="nav-icon fas fa-school"></i>
      <p>
      Escuelas
      </p>
      </a>
      </li>
      <li class="nav-item">
      <a id="administrador" name="administrador" href="' . constant('URL') . 'administrador" class="nav-link">
      <i class="nav-icon fas fa-user-secret"></i>
      <p>
      Administrador
      </p>
      </a>
      </li>

      <li class="nav-item">
      <a id="directivo" name="directivo" href="' . constant('URL') . 'directivo" class="nav-link">
      <i class="nav-icon fas fa-users-cog"></i>
      <p>
      Directores
      </p>
      </a>
      </li>


      <li class="nav-item">
      <a id="gradoAcademico" name="gradoAcademico" href="' . constant('URL') . 'gradoAcademico" class="nav-link">
      <i class="nav-icon fas fa-graduation-cap"></i>
      <p>
      Grados Académicos
      </p>
      </a>
      </li>

';
            } else {

                  echo $menu;
            }

            echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SGE | Root Heim</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DATATABLES -->
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="' . constant('URL') . 'favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/datatables-responsive/css/responsive.bootstrap4.css">
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="' . constant('URL') . 'public/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/summernote/summernote-bs4.min.css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="' . constant('URL') . 'public/plugins/sweetalert2/sweetalert2.css">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
    <a href="'. constant('URL') .'" class="nav-link">Inicio</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
    <a href="'. constant('URL') .'perfil" class="nav-link">Ver Perfil</a>
    </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
    
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
    

    <i class="far fa-user" <p>  ' . $nombre . '</p>
    

    </i>

    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

    <div class="dropdown-divider"></div>
    <a href="' . constant('URL') . 'logout.php" class="dropdown-item">
    <i class="fas fa-times-circle mr-2"></i>Cerrar Sesión 

    </a>


    </li>
    <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
    <i class="fas fa-expand-arrows-alt"></i>
    </a>
    </li>
   <!-- <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
    <i class="fas fa-th-large"></i>
    </a>
    </li> -->
    </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="'. constant('URL') .'" class="brand-link">
    <center><span class="brand-text font-weight-light">Bienvenido ' . $tipo . '</span></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
    <img src="' . $fotoruta . '" class="img-circle elevation-2" alt="User Image" height="50px" width="50px">
    </div>
    <div class="info">
    <a href="'. constant('URL') .'perfil" class="d-block">' . $nombre . '</a>
    
    </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
    with font-awesome or any other icon font library -->
    

    ' . $menu . '
    
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">

    </div>
    </div>
    </div><!-- /.container-fluid -->
    </section>';
      }

      function footer()
      {
            echo '    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
    <strong>Copyright &copy; <a href="https://www.rootheim.com/">Root Heim Company</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.1.0-rc
    </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="' . constant('URL') . 'public/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="' . constant('URL') . 'public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge(\'uibutton\', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="' . constant('URL') . 'public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="' . constant('URL') . 'public/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="' . constant('URL') . 'public/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="' . constant('URL') . 'public/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="' . constant('URL') . 'public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="' . constant('URL') . 'public/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="' . constant('URL') . 'public/plugins/moment/moment.min.js"></script>
    <script src="' . constant('URL') . 'public/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="' . constant('URL') . 'public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="' . constant('URL') . 'public/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="' . constant('URL') . 'public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="' . constant('URL') . 'public/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="' . constant('URL') . 'public/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="' . constant('URL') . 'public/js/pages/dashboard.js"></script>
    <!-- Idioma DataTable-->
    <script>
    var idiomaDataTable = {
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",      
      "zeroRecords": "No se encontraron resultados",
      "emptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Registros del _START_ al _END_, Total de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "No hay registros",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          },
          "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
          }
        };
        </script>
        <!-- DataTables  & Plugins -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/fh-3.1.7/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>

        <!-- JQUERY VALIDATE -->
        <script src="' . constant('URL') . 'public/plugins/jquery-validation/jquery.validate.js"></script>
        <!-- SWEETALERT2 -->
        <script src="' . constant('URL') . 'public/plugins/sweetalert2/sweetalert2.js"></script>
        
        <!--SEPOMEX-->
        <script src="https://api.copomex.com/query/info_cp/09810?token=pruebas"></script>
        <script src="' . constant('URL') . 'public/plugins/select2/js/select2.full.min.js"></script>
        
        <!--CONTRSEÑA-->
        <script src="' . constant('URL') . 'public/js/jquery.min.js"></script>
        <script src="' . constant('URL') . 'public/js/strength.min.js"></script>

        <script>
        $(document).ready(function (){
         dataModuloActive();
         });
         const dataModuloActive = () => {
          var URLactual = window.location.href;
                        //****************************** Apartado para mostrar el item activo en el menú ***************************
          var modulo = URLactual.split("/")[4];
          var submodulo = URLactual.split("/")[5];
                        //console.log("modulo: "+modulo)
                        //console.log("submodulo: "+submodulo);
          $(".nav-link").removeClass("active");

          $("#" + modulo ).addClass("active");
          if(submodulo != ""){
            $("#" + submodulo ).addClass("active");
            $("#" + modulo + "" + submodulo).addClass("active");
          }

                        //**************************************************************************************************
          $("#modulo").val(URLactual);
          $("#modulo2").val(URLactual);
        }
        </script>
        </body>
        </html>';
      }
}
