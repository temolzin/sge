<?php
session_start();
if (!isset($_SESSION['tipo'])) {
  header("Location:usuario");
}

$foto = $_SESSION['foto'];
$tipo = $_SESSION['tipo'];
$nombre = $_SESSION['nombre'];
$appaterno = $_SESSION['appaterno'];
$apmaterno = $_SESSION['apmaterno'];
$telefono = $_SESSION['telefono'];
$email = $_SESSION['email'];
$fecha_nacimiento = $_SESSION['fecha_nacimiento'];

$nombre_completo = $nombre . " " . $appaterno . " " . $apmaterno;
$fotoruta = constant('URL') . 'public/' . '/' . $appaterno . '_' . $apmaterno . '_' . $nombre . '/' . $foto;
  if ($foto != null) {
    $fotoruta = 'public/' . '/' . $appaterno . '_' . $apmaterno . '_' . $nombre . '/' . $foto;
    if (!file_exists($fotoruta)) {
      $fotoruta = constant('URL') . 'public/img/default.jpg';
    } else {
      $fotoruta = constant('URL') . 'public/' . '/' . $appaterno . '_' . $apmaterno . '_' . $nombre . '/' . $foto;
    }
  } else {
    $fotoruta = constant('URL') . 'public/img/default.jpg';
  }

?>
<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('Tablero');
?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-12">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src=<?php echo $fotoruta ?> alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?php echo $nombre_completo ?></h3>

            <p class="text-muted text-center"><?php echo $tipo ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Followers</b> <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b> <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b> <a class="float-right">13,287</a>
              </li>
            </ul>
            <a class="btn btn-primary btn-block" data-toggle='modal' data-target='#modalCambiarPassword'><b>Cambiar Contraseña</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <!-- About Me Box -->
      <div class="card card-primary col-lg-9 col-md-11">
        <div class="card-header">
          <h3 class="card-title">Sobre Mí</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong><i class="fas fa-phone mr-1"></i> Contacto</strong>

          <p class="text-muted">
            <?php echo $telefono ?>
          </p>
          <p class="text-muted">
            <?php echo $email ?>
          </p>

          <strong><i class="far fa-file-alt mr-1"></i> Fecha de Nacimiento</strong>

          <p class="text-muted"><?php echo $fecha_nacimiento ?></p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>


<!--*****************************************MODALS****************************************-->
<!--------------------------------------------------------- Modal Cambiar Contraseña----------------------------------------------->
<div class="modal fade" id="modalCambiarPassword" tabindex="-1" role="dialog" aria-labelledby="modalCambiarPassword" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-primary">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Contraseña <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <!---->

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="formRegistrarMateria" name="formRegistrarMateria" method="post">
          <div class="card-body">

            <!-- /.card-tools -->
            <!-- /.card-header -->
            <div class="card-body border-primary">
              <div class="row">

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Nueva contraseña (*)</label>
                    <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" placeholder="Nueva Contraseña" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Repite contraseña (*)</label>
                    <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" placeholder="Repite Contraseña" />
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
$menu->footer();
?>
