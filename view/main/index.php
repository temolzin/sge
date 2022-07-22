<?php

session_start();

if (!isset($_SESSION['tipo'])) {
   header("Location:usuario");
}



$tipo = $_SESSION['tipo'];

if ($tipo == 'administrador') {

   $foto = $_SESSION['foto'];
   $nombre = $_SESSION['nombre'];
   $appaterno = $_SESSION['appaterno'];
   $apmaterno = $_SESSION['apmaterno'];
   $telefono = $_SESSION['telefono'];
   $email = $_SESSION['email'];
   $fecha_nacimiento = $_SESSION['fecha_nacimiento'];
   $nombre_completo = $nombre . " " . $appaterno . " " . $apmaterno;
   $fotoruta = constant('URL').'public/' . $tipo . '/' . $appaterno . '_' . $apmaterno . '_' . $nombre . '/' . $foto;
} else {
   $foto = $_SESSION['foto'];
   $nombre = $_SESSION['nombre'];
   $appaterno = $_SESSION['appaterno'];
   $apmaterno = $_SESSION['apmaterno'];
   $fecha_nacimiento = $_SESSION['fecha_nacimiento'];
   $telefono = $_SESSION['telefono'];
   $email = $_SESSION['email'];
   $calle = $_SESSION['calle'];
   $num_exterior = $_SESSION['num_exterior'];
   $num_interior = $_SESSION['num_interior'];
   $cp = $_SESSION['cp'];
   $estado = $_SESSION['estado'];
   $municipio = $_SESSION['municipio'];
   $colonia = $_SESSION['colonia'];
   $nombre_escuela = $_SESSION['nombre_escuela'];
   $id_escuela = $_SESSION['id_escuela'];
   $nombre_completo = $nombre . " " . $appaterno . " " . $apmaterno;
   $fotoruta = constant('URL').'public/' . $tipo . '/' . $appaterno . '_' . $apmaterno . '_' . $nombre . '/' . $foto;
}



require 'view/menu.php';
$menu = new Menu();
$menu->header('Tablero');





?>

<section class="content">
   <div class="container-fluid">
      <div class="card-box pd-20 height-100-p mb-30" style="background: #fff;">
         <div class="row align-items-center">
            <div class="col-md-2" style="margin: 8px 0px 8px 8px">
               <img src="<?php echo $fotoruta; ?>" alt="user-avatar" height="145px" width="145px" class="img-circle img-fluid">
            </div>
            <div class="col-md-8">
               <h4 class="font-45 weight-500 mb-10 text-capitalize" style="font-size: 30px">
                  Bienvenid@
                  <div class="weight-600 font-30 text-blue" style="font-size: 30px">
                     <?php echo $nombre_completo; ?>
                  </div>
               </h4>
            </div>
         </div>
      </div>
      <br><br>
      <div class="row">
         <!-- /.DASHBOARD ALUMNO -->
         <?php if ($tipo == 'alumno') {
            $nombre_grupo = isset($_SESSION['nombre_grupo'])? $_SESSION['nombre_grupo'] : 0;
            $turno_grupo = isset($_SESSION['turno_grupo'])? $_SESSION['turno_grupo'] : 0;

            //$id_calificacion = $_SESSION['id_calificacion'];




         ?>
            <div class="col-lg-3">
               <div class="small-box bg-warning">
                  <div class="inner">
                     <h3>Turno y Grupo </h3>
                     <p style="font-size: 20px"> <?php echo $nombre_grupo; ?> - <?php echo $turno_grupo; ?></p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-person-stalker"></i>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="small-box bg-danger">
                  <div class="inner">
                     <h3>Escuela</h3>
                     <p style="font-size: 20px"> <?php echo $nombre_escuela; ?></p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-university"></i>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="small-box bg-success">
                  <div class="inner">
                     <h3>Ver tareas<sup style="font-size: 20px"></sup></h3>
                  </div>
                  <div class="icon">
                     <i class=" fa fa-folder-open-o"></i>
                  </div>
                  <a href="<?php echo constant('URL')?>tarea/showTareaAlumno" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="small-box bg-success">
                  <div class="inner">
                     <h3>Ver Incidencias<sup style="font-size: 20px"></sup></h3>
                  </div>
                  <div class="icon">
                     <i class=" fa fa-folder-open-o"></i>
                  </div>
                  <a href="<?php echo constant('URL')?>incidencia/showIncidenciaAlumno" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
      </div>
      <div class="row">
         <div class="col-md-8">
            <div class="card card-success">
               <div class="card-header">
                  <h3 class="card-title">Calificaciones Recientes</h3>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                     </button>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="tableCalificacionAlumno" class="table m-0">
                        <thead>
                           <tr>
                              <th>Parcial</th>
                              <th>Materia</th>
                              <th>Calificación</th>
                           </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>
                  </div>
                  <!-- /.table-responsive -->
               </div>
               <div class="card-footer clearfix">
                  <a href="<?php echo constant('URL') ?>calificacion/showCalificacionAlumno" class="btn btn-sm btn-secondary float-right">Ver Todas Mis Calificaciones</a>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card card-info">
               <div class="card-header">
                  <h3 class="card-title">Calendario</h3>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                     </button>
                  </div>
               </div>
               <div class="card-body">
                  <div style="overflow:hidden;">
                     <div class="form-group">
                        <div id="datetimepicker12"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <?php } ?>
   <!-- /.DASHBOARD PROFESOR -->
   <?php if ($tipo == 'profesor') {
      $rfc_escuela = isset($_SESSION['rfc_escuela'])? $_SESSION['rfc_escuela'] : 0;
      $cct_escuela = isset($_SESSION['cct_escuela'])? $_SESSION['cct_escuela'] : 0;
      $cedula = isset($_SESSION['cedula'])? $_SESSION['cedula'] : 0;


   ?>
      <div class="col-lg-4 col-4">
         <!-- small box -->
         <div class="small-box bg-info">
            <div class="inner">
               <h3>Escuela</h3>
               <p>Informacion</p>
            </div>
            <div class="icon">
               <i class="ion ion-university"></i>
            </div>
            <a href="<?php echo constant('URL') ?>escuela/showEscuela" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-4">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
               <h3>Tareas</h3>
               <p>Asignar</p>
            </div>
            <div class="icon">
               <i class="ion ion-folder"></i>
            </div>
            <a href="<?php echo constant('URL') ?>tarea" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-5">
         <!-- small box -->
         <div class="small-box bg-warning">
            <div class="inner">
               <h3> Incidencias</h3>
               <p>Asignar</p>
            </div>
            <div class="icon">
               <i class="ion ion-clipboard"></i>
            </div>
            <a href="<?php echo constant('URL') ?>incidencia" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-md-7">
         <div class="card card-info">
            <div class="card-header">
               <h3 class="card-title">Informacion Escolar</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <br>
            <div class="col-md-12">
               <div class="card-body">
                  <div class="callout callout-info">
                     <p>Nombre Escuela: <?php echo  $nombre_escuela ?> </p>
                     <p>RFC: <?php echo  $rfc_escuela ?> </p>
                     <p>CCT: <?php echo  $cct_escuela ?></p>
                  </div>
               </div>
               <!-- /.card -->
            </div>
            <br>
         </div>
      </div>
      <div class="col-md-5">
         <div class="card card-success">
            <div class="card-header">
               <h3 class="card-title">Tus Datos Generales </h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="card-body">
               <table class="table table-hover">
                  <tbody>
                     <tr>
                        <td>Nombre Completo: </td>
                        <td><?php echo  $nombre_completo ?></td>
                     </tr>
                     <tr>
                        <td>Cedula Profesional: </td>
                        <td><?php echo  $cedula ?></td>
                     </tr>
                     <tr>
                        <td>Email: </td>
                        <td><?php echo  $email ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="card card-success">
            <div class="card-header">
               <h3 class="card-title">Calendario</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="card-body">
               <div style="overflow:hidden;">
                  <div class="form-group">
                     <div id="datetimepicker12"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   <?php } ?>

   <?php if ($tipo == 'administrador') {
      $con_escuela = isset($_SESSION['can_esc'])? $_SESSION['can_esc'] : 0;
      $con_directores = isset($_SESSION['can_dir'])? $_SESSION['can_dir'] : 0;
      $con_alumnos = isset($_SESSION['can_alu']) ? $_SESSION['can_alu'] : 0;
      $con_usuarios = isset($_SESSION['can_usu'])? $_SESSION['can_usu'] : 0;
   ?>


      <!-- /.col -->
      <div class="col-lg-3 col-12">
         <!-- small box -->
         <div class="small-box bg-primary">
            <div class="inner">
               <h3>Escuelas</h3>
               <h2><?php echo $con_escuela; ?></h2>
            </div>
            <div class="icon">
               <i class="fas fa-school"></i>
            </div>

         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-12">
         <!-- small box -->
         <div class="small-box bg-warning">
            <div class="inner">
               <h3>Directores</h3>
               <h2><?php echo $con_directores; ?></h2>
            </div>
            <div class="icon">
               <i class="fas fa-user-tie"></i>
            </div>

         </div>
      </div>
      <div class="col-lg-3 col-12">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
               <h3>Alumnos</h3>
               <h2><?php echo $con_alumnos; ?></h2>
            </div>
            <div class="icon">
               <i class="fas fa-user-graduate"></i>
            </div>

         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-12">
         <!-- small box -->
         <div class="small-box bg-danger">
            <div class="inner">
               <h3>Usuarios</h3>
               <h2><?php echo $con_usuarios; ?></h2>
            </div>
            <div class="icon">
               <i class="fas fa-users"></i>
            </div>
         </div>
      </div>



      <div class="col-md-6">
         <!-- USERS LIST -->
         <div class="card">
            <div class="card-header" style="background-color:#f52c41; color:white">
               <h3 class="card-title">Administradores</h3>

               <div class="card-tools">

                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>

            <div class="card-body p-0">
               <ul id="listAdministradores" class="users-list clearfix">

               </ul>
               <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
               <a href="<?php echo constant('URL') ?>administrador">Ver Todos</a>
            </div>
            <!-- /.card-footer -->
         </div>
         <!--/.card -->
      </div>

      <div class="col-md-6">
         <!-- USERS LIST -->
         <div class="card">
            <div class="card-header" style="background-color:purple; color:white">
               <h3 class="card-title">Nuevos directivos</h3>

               <div class="card-tools">
                  <span class="badge badge-dark">Ultimos registros</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>

            <div class="card-body p-0">
               <ul id="listNuevosDirectivos" class="users-list clearfix">

               </ul>
               <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
               <a href="<?php echo constant('URL') ?>directivo">Ver Todos</a>
            </div>
            <!-- /.card-footer -->
         </div>
         <!--/.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
         <div class="card card-info">
            <div class="card-header">
               <h3 class="card-title">Nuevos usuarios</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table id="tableNuevosUsuarios" class="table m-0">
                     <thead>
                        <tr>
                           <th>Usuario</th>
                           <th>Tipo</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                     </tbody>
                  </table>
               </div>
               <!-- /.table-responsive -->
            </div>

         </div>
      </div>

      <div class="col-md-6">
         <div class="card card-danger">
            <div class="card-header">
               <h3 class="card-title">Usuarios Bloqueados</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table id="tableNuevosUsuariosBloqueados" class="table m-0">
                     <thead>
                        <tr>
                           <th>Usuario</th>
                           <th>Tipo</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                     </tbody>
                  </table>
               </div>
               <!-- /.table-responsive -->
            </div>

         </div>
      </div>



   <?php } ?>




   <!-- /.DASHBOARD TUTOR -->
   <?php if ($tipo == 'tutor') {
      $nombre_grupo = isset($_SESSION['nombre_grupo'])? $_SESSION['nombre_grupo'] : 0;
      $turno_grupo = isset($_SESSION['turno_grupo'])? $_SESSION['turno_grupo'] : 0;
      $nombre_alumno = $_SESSION['nombre_alumno'];
      $appaterno_alumno = $_SESSION['appaterno_alumno'];
      $apmaterno_alumno = $_SESSION['apmaterno_alumno'];
      $email_alumno = $_SESSION['email_alumno'];
      $telefono_alumno = $_SESSION['telefono_alumno'];
      $nombre_completo_al = $nombre_alumno . " " . $appaterno_alumno . " " . $apmaterno_alumno;
      //Profesor


   ?>
      <!-- Grid column -->
      <div class="col-lg-6">
         <div class="small-box " style="background: rgb(47,191,71);">
            <div class="inner">
               <h3 class="text-white" style="font-size: 30px">Tareas Del Alumno</h3>
            </div>
            <div class="icon">
               <i class=" fa fa-folder-open-o"></i>
            </div>
            <a href="<?php echo constant('URL')?>tarea/showTareaTutor" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="small-box " style="background: rgb(47,191,71);">
            <div class="inner">
               <h3 class="text-white" style="font-size: 30px">Incidencias Del Alumno</h3>
            </div>
            <div class="icon">
               <i class=" fa fa-folder-open-o"></i>
            </div>
            <a href="<?php echo constant('URL')?>incidencia/showIncidencia" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4">
         <div class="card card-info">
            <div class="card-header">
               <h3 class="card-title">Informacion Del Alumno </h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="card-body">
               <div class="page-content page-container" id="page-content">
                  <div class="padding">
                     <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                           <div class="card-block text-center text-white" style="background: rgb(35,197,204);">
                              <p class="text-info">..</p>
                           </div>
                           <div class="col-sm-8">
                              <div class="card-block">
                                 <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Datos Generales</h6>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <p class="m-b-10 f-w-600">Nombre: <?php echo  $nombre_completo_al ?></p>
                                    </div>
                                    <div class="col-sm-12">
                                       <p class="m-b-10 f-w-600">Celular: <?php echo $telefono_alumno ?></p>
                                    </div>
                                    <div class="col-sm-12">
                                       <p class="m-b-10 f-w-600">Email: <?php echo $email_alumno  ?></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a href="<?php echo constant('URL'); ?>escuela/showEscuela" class="btn btn-primary btn-block"><b>Informacion de la escuela</b></a>
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="card card-info">
            <div class="card-header">
               <h3 class="card-title">Informacion Escolar</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-lg-12">
                  <div class="info-box">
                     <span class="info-box-icon bg-success elevation-1"><i class="fas fa-school"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Escuela Perteneciente</span>
                        <span class="info-box-number">
                           <?php echo $nombre_escuela; ?>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="info-box">
                     <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-id-card"></i></span>
                     <div class="info-box-content">
                        <span class="info-box-text">Grupo</span>
                        <span class="info-box-number">
                           <?php echo $nombre_grupo; ?>- <?php echo $turno_grupo; ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <br>
         </div>
      </div>
   <?php } ?>
   <!-- /.DASHBOARD DIRECTIVO -->
   <?php if ($tipo == 'director') {
      $rfc_escuela = isset($_SESSION['rfc_escuela'])? $_SESSION['rfc_escuela'] : 0;
      $cct_escuela = isset($_SESSION['cct_escuela'])? $_SESSION['cct_escuela'] : 0;
      // $curp = $_SESSION['curp'];  ?>
      <div class="col-lg-3 col-3">
         <!-- small box -->
         <div class="small-box bg-info">
            <div class="inner">
               <h3>Alumnos</h3>
               <p>Registrar</p>
            </div>
            <div class="icon">
               <i class="fas fa-graduation-cap"></i>
            </div>
            <a href="<?php echo constant('URL'); ?>alumno/index" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-3">
         <!-- small box -->
         <div class="small-box bg-success">
            <div class="inner">
               <h3>Profesores</h3>
               <p>Registrar</p>
            </div>
            <div class="icon">
               <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <a href="<?php echo constant('URL'); ?>profesor" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-3">
         <!-- small box -->
         <div class="small-box bg-warning">
            <div class="inner">
               <h3>Directivos</h3>
               <p>Registrar</p>
            </div>
            <div class="icon">
               <i class="fas fa-user-tie"></i>
            </div>
            <a href="<?php echo constant('URL'); ?>directivo/index" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-3">
         <!-- small box -->
         <div class="small-box bg-danger">
            <div class="inner">
               <h3>Tutores</h3>
               <p>Registrar</p>
            </div>
            <div class="icon">
               <i class="fas fa-id-card"></i>
            </div>
            <a href="<?php echo constant('URL'); ?>tutor" class="small-box-footer">Clic Aqui <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-md-5">
         <div class="card card-info">
            <div class="card-header">
               <h3 class="card-title">Informacion Escolar</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <br>
            <div class="col-md-12">
               <div class="card-body">
                  <div class="callout callout-info">
                     <p>Nombre Escuela: <?php echo  $nombre_escuela ?> </p>
                     <p>RFC: <?php echo  $rfc_escuela ?> </p>
                     <p>CCT: <?php echo  $cct_escuela ?></p>
                  </div>
               </div>
               <!-- /.card -->
            </div>
            <br>
         </div>
      </div>
      <div class="col-md-4">
         <div class="card card-success">
            <div class="card-header">
               <h3 class="card-title">Tus Datos Generales </h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="card-body">
               <table class="table table-hover">
                  <tbody>
                     <br><br>
                     <tr>
                        <td>Nombre Completo: </td>
                        <td><?php echo  $nombre_completo ?></td>
                     </tr>
                     <tr>
                        <td>Correo: </td>
                        <td><?php echo  $email ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <br><br>
         </div>
      </div>
      <div class="col-md-3">
         <div class="card card-success">
            <div class="card-header">
               <h3 class="card-title">Cobro Y Pago</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <br><br>
            <div class="row" style="margin-left: 25px;">
               <div class="col-lg-6">
                  <a class="btn btn-app" href="<?php echo constant('URL'); ?>cobro">
                     <i class="fas fa-hand-holding-usd"></i> Cobro
                  </a>
               </div>
               <div class="col-lg-6">
                  <a class="btn btn-app" href="<?php echo constant('URL'); ?>pago">
                     <i class="fas fa-money-check-alt"></i> Pago
                  </a>
               </div>
            </div>
            <br><br>
         </div>
      </div>
      <div class="col-md-6">
         <!-- USERS LIST -->
         <div class="card">
            <div class="card-header" style="background-color:#f52c41; color:white">
               <h3 class="card-title">Profesores</h3>

               <div class="card-tools">

                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>

            <div class="card-body p-0">
               <ul id="listProfesores" class="users-list clearfix">

               </ul>
               <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
               <a href="<?php echo constant('URL'); ?>profesor">Ver Todos</a>
            </div>
            <!-- /.card-footer -->
         </div>
         <!--/.card -->
      </div>
      <div class="col-md-6">
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">Alumnos</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table id="tableAlumnos" class="table m-0">
                     <thead>
                        <tr>
                           <th>Nombre</th>
                           <th>Apellido</th>
                           <th>Contacto</th>
                        </tr>
                     </thead>
                     <tbody>
                     </tbody>
                  </table>
               </div>
               <!-- /.table-responsive -->
            </div>
            <div class="card-footer clearfix">
               <a href="<?php echo constant('URL'); ?>alumno/index" class="btn btn-sm btn-secondary float-right">Ver Todos</a>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card card-success">
            <div class="card-header">
               <h3 class="card-title">Calendario</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                     <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                     <i class="fas fa-times"></i>
                  </button>
               </div>
            </div>
            <div class="card-body">
               <div style="overflow:hidden;">
                  <div class="form-group">
                     <div id="datetimepicker12"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>


   <?php } ?>
</section>

<!-- jQuery -->
<script src="<?php echo constant('URL'); ?>public/plugins/jquery/jquery.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo constant('URL'); ?>public/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo constant('URL'); ?>public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo constant('URL'); ?>public/dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="<?php echo constant('URL'); ?>public/plugins/moment/moment.min.js"></script>
<script src="<?php echo constant('URL'); ?>public/plugins/fullcalendar/main.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
      mostrarCalificaciones();
      mostrarDirectivos();
      mostrarUsuarios();
      mostrarUsuariosBloqueados();
      mostrarAdministradores();
      mostrarProfesores();
      mostrarAlumnos();
      mostrarGradoAcademico();
      mostrarTarea();
      mostrarGrupo();
      mostrarIncidencia();
      mostrarParcial();
   });
   $(function() {
      $('#datetimepicker12').datetimepicker({
         inline: true,
         sideBySide: false,
         language: 'es'
      });
   });

   var mostrarCalificaciones = function() {
      $.ajax({
         type: "POST",

         async: false,
         url: "<?php echo constant('URL'); ?>calificacionDetalleAlumno/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 9) {
                  //console.log(elem.nombre_parcial);
                  var colorCalificacion = "";
                  if (elem.calificacion > 6) {
                     colorCalificacion = "success";
                  } else {
                     colorCalificacion = "danger";
                  }
                  var htmlTags = '<tr>' +
                     '<td>' + elem.id_calificacion + '</td>' +
                     '<td>' + elem.id_profesor + '</td>' +
                     '<td>' + elem.id_alumno + '</td>' +
                     '<td>' + elem.nombre_alumno + '</td>' +
                     '<td>' + elem.id_parcial + '</td>' +
                     '<td>' + elem.nombre_parcial + '</td>' +
                     '<td>' + elem.id_materia + '</td>' +
                     '<td>' + elem.nombre_materia + '</td>' +
                     '<td>' + elem.calificacion + '</td>' +
                     '<td> <span class="badge badge-' + colorCalificacion + '">' + elem.calificacion + '</span></td>' +
                     '</tr>';
                  $('#tableCalificacionAlumno tbody').append(htmlTags);
               }
            });
         },
      });
   }

   var mostrarUsuarios = function() {
      $.ajax({
         type: "POST",

         async: false,
         url: "<?php echo constant('URL'); ?>usuario/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 4) {
                  //console.log(elem.nombre_parcial);
                  var colorStatus = "";
                  var status = "";
                  if (elem.activo_usuario == 1) {
                     colorStatus = "success";
                     status = "Activo";
                  } else if (elem.activo_usuario == 2) {

                     colorStatus = "danger";
                     status = "Inactivo";
                  }
                  var htmlTags = '<tr>' +
                     '<td>' + elem.username_usuario + '</td>' +
                     '<td>' + elem.nombre_tipo_usuario + '</td>' +
                     '<td <span class="badge badge-' + colorStatus + '">' + status + '</span></td>' +
                     '</tr>';
                  $('#tableNuevosUsuarios tbody').append(htmlTags);
               }
            });
         },
      });
   }

   var mostrarUsuariosBloqueados = function() {
      $.ajax({
         type: "POST",

         async: false,
         url: "<?php echo constant('URL'); ?>usuario/readBlock",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 4) {
                  //console.log(elem.nombre_parcial);
                  var colorStatus = "";
                  var status = "";
                  if (elem.activo_usuario == 1) {
                     colorStatus = "success";
                     status = "Activo";
                  } else if (elem.activo_usuario == 2) {

                     colorStatus = "danger";
                     status = "Inactivo";
                  }
                  var htmlTags = '<tr>' +
                     '<td>' + elem.username_usuario + '</td>' +
                     '<td>' + elem.nombre_tipo_usuario + '</td>' +
                     '<td <span class="badge badge-' + colorStatus + '">' + status + '</span></td>' +
                     '</tr>';
                  $('#tableNuevosUsuariosBloqueados tbody').append(htmlTags);
               }
            });
         },
      });
   }
   //<span class="badge badge-' + colorCalificacion + '">'

   var mostrarDirectivos = function() {
      $.ajax({
         type: "POST",
         async: false,
         url: "<?php echo constant('URL'); ?>directivo/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 7) {
                  //console.log(elem.nombre_parcial);
                  var htmlTags = '<li>' +
                     '<img src="<? echo constant('URL') ?>public/director/' + elem.appaterno_director + '_' + elem.apmaterno_director + '_' + elem.nombre_director + '/' + elem.foto_director + '" style="width: 80px; height: 80px;>' + '<br>' +
                     '<a class="users-list-name">' + '<br>'+elem.nombre_director + '</a>' +
                     '<span class="users-list-date">' + elem.email_director + '</span>' +
                     '</li>';
                  $('#listNuevosDirectivos').append(htmlTags);
               }
            });
         },
      });
   }
   var mostrarAdministradores = function() {
      $.ajax({
         type: "POST",
         async: false,
         url: "<?php echo constant('URL'); ?>administrador/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 7) {
                  //console.log(elem.nombre_parcial);
                  var htmlTags = '<li>' +
                     '<img src="<? echo constant('URL') ?>public/administrador/' + elem.appaterno_administrador + '_' + elem.apmaterno_administrador + '_' + elem.nombre_administrador + '/' + elem.foto_administrador + '" style="width: 80px; height: 80px;>' +
                     '<br><br>'+
                     '<a class="users-list-name">' + '<br>'+ elem.nombre_administrador + '</a>' +
                     '<span class="users-list-date">' + elem.email_administrador + '</span>' +
                     '</li>';
                  $('#listAdministradores').append(htmlTags);
               }
            });
         },
      });
   }

   var mostrarProfesores = function() {
      $.ajax({
         type: "POST",
         async: false,
         url: "<?php echo constant('URL'); ?>profesor/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 7) {
                  //console.log(elem.nombre_parcial);
                  var htmlTags = '<li>' +
                     '<img src="<? echo constant('URL') ?>public/profesor/' + elem.appaterno_profesor + '_' + elem.apmaterno_profesor + '_' + elem.nombre_profesor + '/' + elem.foto_profesor + '" style="max-width: 110px; max-height: 110px;>' +
                     '<a class="users-list-name">' + elem.nombre_profesor + '<a>' +
                     '<span class="users-list-date">' + elem.email_profesor + '</span>' +
                     '</li>';
                  $('#listProfesores').append(htmlTags);
               }
            });
         },
      });
   }
   var mostrarAlumnos = function() {
      $.ajax({
         type: "POST",

         async: false,
         url: "<?php echo constant('URL'); ?>alumno/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 4) {
                  //console.log(elem.nombre_parcial);
                  var htmlTags = '<li>' +
                     '<img src=<? echo constant('URL') ?>"public/alumno/' + elem.appaterno_alumno + '_' + elem.apmaterno_alumno + '_' + elem.nombre_alumno + '/' + elem.foto_alumno + '" style="max-width: 110px; max-height: 110px;>' +
                     '<a class="users-list-name">' + elem.nombre_alumno + '<a>' +
                     '<span class="users-list-date">' + elem.email_alumno + '</span>' +
                     '</li>';
                  $('#tableAlumnos').append(htmlTags);
               }
            });
         },
      });
   }
   var mostrarGradoAcademico = function() {
      $.ajax({
         type: "POST",

         async: false,
         url: "<?php echo constant('URL'); ?>gradoAcademico/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 4) {
                  //console.log(elem.nombre_parcial);
                  var htmlTags = '<tr>' +
                     '<td>' + elem.id_grado_academico + '</td>' +
                     '<td>' + elem.nombre_grado_academico + '</td>' +
                     '<td>' + elem.observacion_gradoacademico + '</td>' +
                     '</tr>';
               }
            });
         },
      });
   }
   var mostrarTarea = function() {
      $.ajax({
         type: "POST",

         async: false,
         url: "<?php echo constant('URL'); ?>tarea/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 4) {
                  //console.log(elem.nombre_parcial);
                  var htmlTags = '<tr>' +
                     '<td>' + elem.id_tarea_alumno + '</td>' +
                     '<td>' + elem.id_grupo + '</td>' +
                     '<td>' + elem.id_materia + '</td>' +
                     '<td>' + elem.nombre_materia + '</td>' +
                     '<td>' + elem.descripcion_tarea + '</td>' +
                     '<td>' + elem.fecha_entrega + '</td>' +
                     '</tr>';
               }
            });
         },
      });
   }
   var mostrarGrupo = function() {
      $.ajax({
         type: "POST",

         async: false,
         url: "<?php echo constant('URL'); ?>grupo/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 4) {
                  //console.log(elem.nombre_parcial);
                  var htmlTags = '<tr>' +
                     '<td>' + elem.id_grupo + '</td>' +
                     '<td>' + elem.id_escuela + '</td>' +
                     '<td>' + elem.nombre_grupo + '</td>' +
                     '<td>' + elem.turno_grupo + '</td>' +
                     '</tr>';
               }
            });
         },
      });
   }
   var mostrarIncidencia = function() {
      $.ajax({
         type: "POST",

         async: false,
         url: "<?php echo constant('URL'); ?>incidencia/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 4) {
                  //console.log(elem.nombre_parcial);
                  var htmlTags = '<tr>' +
                     '<td>' + elem.id_incidencia + '</td>' +
                     '<td>' + elem.id_alumno + '</td>' +
                     '<td>' + elem.id_profesor + '</td>' +
                     '<td>' + elem.id_grupo + '</td>' +
                     '<td>' + elem.fechaincidencia_incidencia + '</td>' +
                     '<td>' + elem.horaincidencia_incidencia + '</td>' +
                     '<td>' + elem.descripcion_incidencia + '</td>' +
                     '</tr>';
               }
            });
         },
      });
   }
   var mostrarParcial = function() {
      $.ajax({
         type: "POST",

         async: false,
         url: "<?php echo constant('URL'); ?>parcial/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 4) {
                  //console.log(elem.nombre_parcial);
                  var htmlTags = '<tr>' +
                     '<td>' + elem.id_parcial + '</td>' +
                     '<td>' + elem.id_escuela + '</td>' +
                     '<td>' + elem.nombre_parcial + '</td>' +
                     '<td>' + elem.fechainicio_parcial + '</td>' +
                     '<td>' + elem.fechafin_parcial + '</td>' +
                     '</tr>';
               }
            });
         },
      });
   }
</script>


<?php
$menu->footer();
?>