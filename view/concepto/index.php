<?php
session_start();
if (!isset($_SESSION['tipo'])) {
  header("Location:usuario");
}
$tipo = $_SESSION['tipo'];
require 'view/menu.php';
$menu = new Menu();
$menu->header('concepto');
?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-right">
        <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarConcepto'> <i class="fas fa-plus-circle"></i> Registrar Concepto</button>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3>Concepto</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="dataTableConcepto" name="dataTableConcepto" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Opciones</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--*****************************************MODALS****************************************-->
<!--------------------------------------------------------- Modal Registrar Concepto----------------------------------------------->
<div class="modal fade" id="modalRegistrarConcepto" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarConcepto" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-success">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Concepto <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>
        <form id="formRegistrarConcepto" name="formRegistrarConcepto">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Nombre Concepto (*)</label>
                  <input type="text" class="form-control" id="nombre_concepto" name="nombre_concepto" placeholder="Nombre" />
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Descripción (*)</label>
                  <input type="text" class="form-control" id="descripcion_concepto" name="descripcion_concepto" placeholder="Descripción" />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Registrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarConcepto" tabindex="-1" role="dialog" aria-labelledby="modalActualizarConcepto" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-warning">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Concepto <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <!---->
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="formActualizarConcepto" name="formActualizarConcepto">
          <div class="card-body">
            <!-- /.card-header -->
            <div class="card-body border-primary">
              <div class="row">
                <input type="text" hidden class="form-control" id="id_conceptoActualizar" name="id_conceptoActualizar" />
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Nombre (*)</label>
                    <input type="text" class="form-control" id="nombre_conceptoActualizar" name="nombre_conceptoActualizar" placeholder="Nombre concepto" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Descripción (*)</label>
                    <input type="text" class="form-control" id="descripcion_conceptoActualizar" name="descripcion_conceptoActualizar" placeholder="Descripción" />
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Actualizar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>


<!--------------------------------------------------------- Modal Detalle Concepto----------------------------------------------->
<div class="modal fade" id="modalDetalleConcepto" tabindex="-1" role="dialog" aria-labelledby="modalDetalleConcepto" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-primary">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Concepto <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>
        <form role="form" id="formConsulta" name="formConsulta">
          <div class="card-body">
            <!-- /.card-header -->
            <div class="card-body border-primary">
              <div class="row">
                <input type="text" hidden class="form-control" id="id_conceptoConsultar" name="id_conceptoConsultar" />

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Nombre (*)</label>
                    <input disabled name="nombre_conceptoConsultar" id="nombre_conceptoConsultar" class="form-control nombre_concepto">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Descripción </label>
                    <input disabled name="descripcion_conceptoConsultar" id="descripcion_conceptoConsultar" class="form-control descripcion_conceptoConsultar">
                    </input>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--------------------------------------------------------- Modal Eliminar Concepto----------------------------------------------->
<div class="modal fade" id="modalEliminarConcepto" tabindex="-1" role="dialog" aria-labelledby="modalEliminarConcepto" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form role="form" id="formEliminarConcepto" name="formEliminarConcepto">
        <input type="text" hidden id="idEliminarConcepto" name="idEliminarConcepto">
        <div class="modal-body text-center text-danger">¿Realmente deseas eliminar el registro?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-danger" type="submit">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
$menu->footer();
?>

<script>
  $(document).ready(function() {
    mostrarConcepto();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
  });

  var mostrarConcepto = function() {
    var tableConcepto = $('#dataTableConcepto').DataTable({
      "processing": true,
      "ajax": {
        "url": "<?php echo constant('URL'); ?>concepto/readTable"
      },
      "columns": [{
          "data": "nombre_concepto"
        },
        {
          "data": "descripcion_concepto"
        },
        {
          data: null,
          "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleConcepto' title="Ver Detalles"><i class="fa fa-eye"></i></button>
              <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarConcepto' title="Editar Datos"><i class="fa fa-edit"></i></button>
              <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarConcepto' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
        }
      ],
      responsive: true,
      autoWidth: false,
      language: idiomaDataTable,
      lengthChange: true,
      buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
      dom: 'Bfltip'
    });

    obtenerdatosDT(tableConcepto);
  }

  var obtenerdatosDT = function(table) {
    $('#dataTableConcepto tbody').on('click', 'tr', function() {
      var data = table.row(this).data();
      var idEliminar = $('#idEliminarConcepto').val(data.id_concepto);

      var id_concepto = $("#id_conceptoActualizar").val(data.id_concepto);
      var nombre_concepto = $("#nombre_conceptoActualizar").val(data.nombre_concepto);
      var descripcion_concepto = $("#descripcion_conceptoActualizar").val(data.descripcion_concepto);

      var idConsulta = $("#id_conceptoConsultar").val(data.id_concepto);
      var nombre_concepto = $("#nombre_conceptoConsultar").val(data.nombre_concepto);
      var descripcion_concepto = $("#descripcion_conceptoConsultar").val(data.descripcion_concepto);
    });
  }

  var enviarFormularioRegistrar = function() {
    $.validator.setDefaults({
      submitHandler: function() {
        var datos = $('#formRegistrarConcepto').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL'); ?>concepto/insert",
          data: datos,
          success: function(data) {
            if (data == 'ok') {
              Swal.fire(
                "¡Éxito!",
                "El concepto ha registrado de manera correcta",
                "success"
              ).then(function() {
                window.location = "<?php echo constant('URL'); ?>concepto";
              })
            } else {
              Swal.fire(
                "¡Error!",
                "Ha ocurrido un error al registrar el concepto. " + data,
                "error"
              );
            }
          },
        });
      }
    });
    $('#formRegistrarConcepto').validate({
      rules: {
        id_concepto: {
          required: true,
          number: true
        },
        nombre_concepto: {
          required: true
        },
        descripcion_concepto: {
          required: true
        },
      },
      messages: {
        id_concepto: {
          required: "Ingresa ID",
          number: "Sólo números"
        },
        nombre_concepto: {
          required: "Ingresa el nombre del concepto"
        },
        descripcion_concepto: {
          required: "Ingresa la descripción"
        },
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
  var enviarFormularioActualizar = function() {
    $.validator.setDefaults({
      submitHandler: function() {
        var datos = $('#formActualizarConcepto').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL'); ?>concepto/update",
          data: datos,
          success: function(data) {
            if (data == 'ok') {
              Swal.fire(
                "¡Éxito!",
                "El registro del concepto ha sido Actualizado de manera correcta",
                "success"
              ).then(function() {
                window.location = "<?php echo constant('URL'); ?>concepto";
              })
            } else {
              Swal.fire(
                "¡Error!",
                "Ha ocurrido un error al Actualizar el concepto. " + data,
                "error"
              );
            }
          },
        });
      }
    });
    $('#formActualizarConcepto').validate({
      rules: {
        nombre_conceptoActualizar: {
          required: true
        },

        descripcion_conceptoActualizar: {
          required: true
        },
      },
      messages: {
        nombre_conceptoActualizar: {
          required: "Ingresa el concepto"
        },

        descripcion_conceptoActualizar: {
          required: "Ingresa una descripción"
        },
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

  var eliminarRegistro = function() {
    $("#formEliminarConcepto").submit(function(event) {
      event.preventDefault();
      var datos = $('#formEliminarConcepto').serialize();
      $.ajax({
        type: "POST",
        url: "<?php echo constant('URL'); ?>concepto/delete",
        data: datos,
        success: function(data) {
          if (data == 'ok') {
            Swal.fire(
              "¡Éxito!",
              "El concepto ha sido eliminador correctamente",
              "success"
            ).then(function() {
              window.location = "<?php echo constant('URL'); ?>concepto";
            })
          } else {
            Swal.fire(
              "¡Error!",
              "Ha ocurrido un error al eliminar el registro" + data,
              "error"
            );
          }
        },
      });
    });
  }
</script>
