<?php
session_start();
if (!isset($_SESSION['tipo'])) {
  header("Location:usuario");
}

//Alumno 
$foto_alumno = $_SESSION['foto_alumno'];
$nombre_alumno = $_SESSION['nombre_alumno'];
$appaterno_alumno = $_SESSION['appaterno_alumno'];
$apmaterno_alumno = $_SESSION['apmaterno_alumno'];
$calle_alumno = $_SESSION['calle_alumno'];
$num_exterior_alumno = $_SESSION['num_exterior_alumno'];
$num_interior_alumno = $_SESSION['num_interior_alumno'];
$cp_alumno = $_SESSION['cp_alumno'];
$estado_alumno = $_SESSION['estado_alumno'];
$municipio_alumno = $_SESSION['municipio_alumno'];
$colonia_alumno = $_SESSION['colonia_alumno'];
$telefono_alumno = $_SESSION['telefono_alumno'];
$email_alumno = $_SESSION['email_alumno'];
$fecha_nacimiento_alumno =    $_SESSION['fecha_nacimiento_alumno'];
$nombre_completo_al = $nombre_alumno . " " . $appaterno_alumno . " " . $apmaterno_alumno;
$fotorutaalumno = constant('URL') . 'public/alumno/' . $appaterno_alumno . '_' . $apmaterno_alumno . '_' . $nombre_alumno . '/' . $foto_alumno;
if ($foto_alumno == null){
  $fotorutaalumno= constant('URL') . 'public/img/default.jpg';
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('Tablero');

?>

<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>css/perfilalumno.css">
</head>

<section class="content" style="margin: 20px 20px 20px 20px">
  <div class="container emp-profile">
    <form method="post" style="background-color: #fff"><br><br><br><br>
      <div class="row">
        <div class="col-md-4">
          <div class="profile-img">
            <br>
            <img src="<?php echo $fotorutaalumno; ?>" alt="user-avatar" height="180px" width="180px" class="rounded-circle img-thumbnail">

          </div>
        </div>
        <div class="col-md-6">
          <div class="profile-head"><br>
            <h5>
              Información Del Alumno
            </h5>
            <h6>
              Datos Generales
            </h6>
            <br><br>

          </div>
          <div class="tab-content profile-tab" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <div class="col-md-6">
                  <label>Nombre Completo:</label>
                </div>
                <div class="col-md-6">
                  <p> <?php echo $nombre_completo_al; ?> </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Fecha De Nacimiento:</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $fecha_nacimiento_alumno; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Teléfono:</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $telefono_alumno; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Email:</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $email_alumno; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Calle:</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $calle_alumno; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>N° Interior:</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $num_interior_alumno; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>N° Exterior:</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $num_exterior_alumno; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>CP:</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $cp_alumno; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Estado:</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $estado_alumno; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Municipio:</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $municipio_alumno; ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Colonia:</label>
                </div>
                <div class="col-md-6">
                  <p><?php echo $colonia_alumno; ?></p>
                </div>
              </div>
              <br>
            </div>
          </div>
        </div>
      </div>

    </div>


  </form>
  </div>

</section>
<?php
$menu->footer();
?>