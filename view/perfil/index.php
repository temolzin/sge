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

            <a class="btn btn-primary btn-block" data-toggle='modal' data-target='#modalCambiarPassword'><b>Cambiar Contraseña</b></a>
          </div>
        </div>
      </div>

      <!-- About Me Box -->
      <div class="card card-primary col-lg-9 col-md-11">
        <div class="card-header">
          <h3 class="card-title">Sobre Mí</h3>
        </div>
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
      </div>
    </div>
  </div>
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
        <form role="form" id="formCambiarPassword" name="formCambiarPassword" method="post">
          <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">
          <div class="card-body">

            <!-- /.card-tools -->
            <!-- /.card-header -->
            <div class="card-body border-primary">
              <div class="row">

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Nueva contraseña (*)</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="nueva_password" name="nueva_password" placeholder="Nueva Contraseña" />
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="toggle_password">
                          <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Repite contraseña (*)</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="repite_password" name="repite_password" placeholder="Repite Contraseña" />
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="toggle_password">
                          <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
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

<script>
  $(document).ready(function() {
    enviarFormularioActualizarPassword();
  });

  var enviarFormularioActualizarPassword = function() {
    $.validator.setDefaults({
      submitHandler: function() {
        var datos = $('#formCambiarPassword').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL'); ?>usuario/updatePassword",
          data: datos,
          success: function(data) {
            if (data == 'ok') {
              Swal.fire(
                "¡Éxito!",
                "La contraseña ha sido actualizada de manera correcta",
                "success"
              ).then(function() {
                window.location = "<?php echo constant('URL'); ?>perfil";
              })
            } else {
              Swal.fire(
                "¡Error!",
                "Ha ocurrido un error al actualizar la contraseña. " + data,
                "error"
              );
            }
          },
        });
      }
    });

    $('#formCambiarPassword').validate({
      rules: {
        id: {
          required: true
        },
        nueva_password: {
          required: true,
          minlength: 8
        },
        repite_password: {
          required: true,
          equalTo: '#nueva_password'
        }
      },
      messages: {
        nueva_password: {
          required: "Ingrese la nueva contraseña",
          minlength: "La contraseña debe tener al menos 8 caracteres"
        },
        repetir_password: {
          required: "Repita la nueva contraseña",
          equalTo: "Las contraseñas no coinciden"
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  }

  $(document).on('click', '#toggle_password', function() {
    $(this).toggleClass('btn-outline-secondary btn-outline-primary');
    var input = $(this).parent().prev('input');
    if (input.attr('type') === 'password') {
      input.attr('type', 'text');
      $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
    } else {
      input.attr('type', 'password');
      $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
    }
  });
</script>
