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
   $fotoruta = constant('URL') . 'public/' . $tipo . '/' . $appaterno . '_' . $apmaterno . '_' . $nombre . '/' . $foto;
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
   $nombre_completo = $nombre . " " . $appaterno . " " . $apmaterno;
   $fotoruta = constant('URL') . 'public/' . $tipo . '/' . $appaterno . '_' . $apmaterno . '_' . $nombre . '/' . $foto;
   if ($foto == null){
      $fotoruta= constant('URL') . 'public/img/default.jpg';
   }
}

require 'view/menu.php';
$menu = new Menu();
$menu->header('Tablero');
?>

<section class="content">
   <?php if ($tipo == 'administrador') { ?>
      <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/perfiladmin.css">
      <div class="row">
         <div class="col-lg-12">
            <div class="card user-card-full">
               <div class="row m-l-0 m-r-0">
                  <div class="col-sm-4 bg-c-lite-green user-profile" style="  background: linear-gradient(to bottom, #003399 0%, #33cccc 100%);">
                     <div class="card-block text-center text-white">
                        <img src="<?php echo $fotoruta; ?>" alt="user-avatar" class="img-circle img-fluid" style="width: 180px; height: 180px;"><br><br>
                        <h6 style="font-size: 25px"><?php echo $nombre_completo; ?></h6>
                        <p style="font-size: 20px">Administrador</p>
                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                     </div>
                  </div>
                  <div class="col-sm-8">
                     <div class="card-block">
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600" style="font-size: 20px">Informacion</h6>
                        <div class="row">
                           <div class="col-sm-4">
                              <p class="m-b-10 f-w-600" style="font-size: 18px">Nombre</p>
                              <h6 class="text-muted f-w-400" style="font-size: 18px"><?php echo $nombre; ?></h6>
                           </div>
                           <div class="col-sm-4">
                              <p class="m-b-10 f-w-600" style="font-size: 18px">Apellido Paterno</p>
                              <h6 class="text-muted f-w-400" style="font-size: 18px"><?php echo $appaterno; ?></h6>
                           </div>
                           <div class="col-sm-4">
                              <p class="m-b-10 f-w-600" style="font-size: 18px">Apellido Materno</p>
                              <h6 class="text-muted f-w-400" style="font-size: 18px"><?php echo $apmaterno; ?></h6>
                           </div>
                        </div>
                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600" style="font-size: 20px">Datos Generales</h6>
                        <div class="row">
                           <div class="col-sm-6">
                              <p class="m-b-10 f-w-600" style="font-size: 18px">Telefono</p>
                              <h6 class="text-muted f-w-400" style="font-size: 18px"><?php echo $telefono; ?></h6>
                           </div>
                           <div class="col-sm-6">
                              <p class="m-b-10 f-w-600" style="font-size: 18px">Email</p>
                              <h6 class="text-muted f-w-400" style="font-size: 18px"><?php echo $email; ?></h6>
                           </div>
                           <br>
                           <div class="col-sm-6">
                              <p class="m-b-10 f-w-600" style="font-size: 18px">Fecha de nacimiento</p>
                              <h6 class="text-muted f-w-400" style="font-size: 18px"><?php echo $fecha_nacimiento; ?></h6>
                           </div>
                        </div>
                        <ul class="social-link list-unstyled m-t-40 m-b-10">
                           <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                           <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                           <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <?php } else { ?>

      <head>
         <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/perfil.css">
      </head>
      <div class=row>

         <body>
            <div class="container">
               <div class="row">
                  <div class="offset-lg-12 col-lg-12 col-sm-12 col-12 main-section text-center">
                     <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 profile-header"></div>
                     </div>
                     <div class="row user-detail">
                        <div class="col-lg-12 col-sm-12 col-12">
                           <img 
                           srcset="<?php echo $fotoruta; ?> 180w,
                           <?php echo $fotoruta; ?> 140w"
                              sizes="(max-width: 180px) 180px,
                              (max-width: 140px) 140px"
                           src="<?php echo $fotoruta; ?>" class="rounded-circle img-thumbnail">
                           <h5><?php echo $nombre_completo; ?></h5>
                           <p><i class="fa fa-map-marked-alt" aria-hidden="true"></i> <?php echo $estado; ?>, <?php echo $municipio; ?>.</p>
                           <table class="table table-sm">
                              <thead>
                                 <tr>
                                    <th scope="col">Fecha de nacimiento: <?php echo $fecha_nacimiento; ?></th>
                                    <th scope="col">Telefono: <?php echo $telefono; ?></th>
                                    <th scope="col">Email: <?php echo $email; ?></th>
                                    <th scope="col">Calle: <?php echo $calle; ?></th>
                                 </tr>
                                 <tr>
                                    <th scope="col">Nª Exterior: <?php echo $num_exterior; ?></th>
                                    <th scope="col">Nª Interior: <?php echo $num_interior; ?></th>
                                    <th scope="col">CP: <?php echo $cp; ?></th>
                                    <th scope="col">Estado: <?php echo $estado; ?></th>
                                 </tr>
                                 <tr>
                                    <th scope="col">Municipio: <?php echo $municipio; ?></th>
                                    <th scope="col">Colonia: <?php echo $colonia; ?></th>
                                    <th></th>
                                    <th></th>
                                 </tr>
                              </thead>
                           </table>
                        </div>
                     </div>
                     <div class="row user-social-detail">
                     </div>
                  </div>
               </div>
            </div>
         </body>
      <?php } ?>
      </div>
</section>
<?php
$menu->footer();
?>