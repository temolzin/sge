<?php
session_start();
if (!isset($_SESSION['tipo'])) {
   header("Location:usuario");
}
$foto_escuela = $_SESSION['foto_escuela'];
$nombre_escuela = $_SESSION['nombre_escuela'];
$rfc_escuela = $_SESSION['rfc_escuela'];
$cct_escuela = $_SESSION['cct_escuela'];
$calle_escuela = $_SESSION['calle_escuela'];
$numxterior_escuela = $_SESSION['numxterior_escuela'];
$numinterior_escuela = $_SESSION['numinterior_escuela'];
$cp_escuela = $_SESSION['cp_escuela'];
$estado_escuela = $_SESSION['estado_escuela'];
$municipio_escuela = $_SESSION['municipio_escuela'];
$colonia_escuela = $_SESSION['colonia_escuela'];
$telefono_escuela = $_SESSION['telefono_escuela'];
$email_escuela = $_SESSION['email_escuela'];
$observacion_escuela = $_SESSION['observacion_escuela'];
$fotoruta = constant('URL') . 'public/escuela/' . $cct_escuela . '_' . $rfc_escuela . '_' . $nombre_escuela . '/' . $foto_escuela;
if ($foto_escuela != null){
   $fotoruta = constant('URL') . 'public/escuela/' . $cct_escuela . '_' . $rfc_escuela . '_' . $nombre_escuela . '/' . $foto_escuela;
 }else if($foto_escuela == null){
   $fotoruta= constant('URL') . 'public/img/default.jpg';
 }else if(!file_exists($fotoruta)){
   $fotoruta= constant('URL') . 'public/img/default.jpg';
 }
require 'view/menu.php';
$menu = new Menu();
$menu->header('Tablero');

?>



<head>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/dist/css/adminlte.min.css">
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/perfilescuela.css">
</head>
<section class="content" style="margin: 20px 20px 20px 20px">
   <div class="card mb-3">
      <div class="card-body">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">

               <center>
                  <img src="<?php echo $fotoruta; ?>" height="180px" width="180px" class="rounded-circle img-thumbnail">
               </center>

            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="card p-3 mb-2 bg-gradient-primary ">
                  <center>
                     <h3> <?php echo $nombre_escuela; ?></h3>
                  </center>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6 border-right">
               <div class="description-block">
                  <h5 class="description-header" style="font-size: 20px">Gmail</h5>
                  <span><?php echo $email_escuela; ?></span>
               </div>
            </div>
            <div class="col-sm-6 ">
               <div class="description-block">
                  <h5 class="description-header" style="font-size: 20px">Teléfono</h5>
                  <span><?php echo $telefono_escuela; ?></span>
               </div>
            </div>
            <hr>
         </div>
         <hr>
         <div class="col-sm-12">
            <div class="description-block">
               <h5 class="description-header" style="font-size: 20px">Descripción</h5>
               <h6><?php echo $observacion_escuela; ?></h6>
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-sm-4">
               <label class="col-md-4  control-label">CCT</label>
               <div class="col-md-10 col-sm-9 col-xs-4">
                  <input disabled type="text" class="form-control" value="<?php echo $cct_escuela  ?>">
               </div>
            </div>
            <div class="col-sm-4">
               <label class="col-md-4  control-label">RFC</label>
               <div class="col-md-10 col-sm-9 col-xs-4">
                  <input disabled type="text" class="form-control" value="<?php echo $rfc_escuela  ?>">
               </div>
            </div>
            <div class="col-sm-4">
               <label class="col-md-4  control-label">Calle</label>
               <div class="col-md-10 col-sm-9 col-xs-4">
                  <input disabled type="text" class="form-control" value="<?php echo $calle_escuela  ?>">
               </div>
            </div>
            <div class="col-sm-4">
               <label class="col-md-5  control-label">Nª Exterior</label>
               <div class="col-md-10 col-sm-9 col-xs-4">
                  <input disabled type="text" class="form-control" value="<?php echo $numxterior_escuela  ?>">
               </div>
            </div>
            <div class="col-sm-4">
               <label class="col-md-5  control-label">Nª Interior</label>
               <div class="col-md-10 col-sm-9 col-xs-4">
                  <input disabled type="text" class="form-control" value="<?php echo $numinterior_escuela  ?>">
               </div>
            </div>
            <div class="col-sm-4">
               <label class="col-md-4  control-label">CP</label>
               <div class="col-md-10 col-sm-9 col-xs-4">
                  <input disabled type="text" class="form-control" value="<?php echo $cp_escuela  ?>">
               </div>
            </div>
            <div class="col-sm-4">
               <label class="col-md-4  control-label">Estado</label>
               <div class="col-md-10 col-sm-9 col-xs-4">
                  <input disabled type="text" class="form-control" value="<?php echo $estado_escuela  ?>">
               </div>
            </div>
            <div class="col-sm-4">
               <label class="col-md-5  control-label">Municipio</label>
               <div class="col-md-10 col-sm-9 col-xs-4">
                  <input disabled type="text" class="form-control" value="<?php echo $municipio_escuela  ?>">
               </div>
            </div>
            <div class="col-sm-4">
               <label class="col-md-4  control-label">Colonia</label>
               <div class="col-md-10 col-sm-9 col-xs-4">
                  <input disabled type="text" class="form-control" value="<?php echo $colonia_escuela  ?>"><br><br>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<?php
$menu->footer();
?>