<?php
session_start();
if (!isset($_SESSION['tipo'])) {
  header("Location:usuario");
}
$tipo = $_SESSION['tipo'];
require 'view/menu.php';
$menu = new Menu();
$menu->header('parcial');
?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-right">
        <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistroConcepto'> <i class="fas fa-plus-circle"></i> Registrar Concepto</button>
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
                  <th>Cantidad</th>
                  <th>Descripción</th>
                  <th>Tipo</th>
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
          "data": "cantidad_concepto"
        },
        {
          "data": "descripcion_concepto"
        },
        {
          "data": "tipo_concepto"
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
      var cantidad_concepto = $("#cantidad_conceptoActualizar").val(data.cantidad_concepto);
      var descripcion_concepto = $("#descripcion_conceptoActualizar").val(data.descripcion_concepto);
      var tipo_concepto = $("#tipo_conceptoActualizar").val(data.tipo_concepto);

      var idConsulta = $("#id_conceptoConsultar").val(data.id_concepto);
      var nombre_concepto = $("#nombre_conceptoConsultar").val(data.nombre_concepto);
      var cantidad_concepto = $("#cantidad_conceptoConsultar").val(data.cantidad_concepto);
      var descripcion_concepto = $("#descripcion_conceptoConsultar").val(data.descripcion_concepto);
      var tipo_concepto = $("#tipo_conceptoConsultar").val(data.tipo_concepto);
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
        cantidad_concepto: {
          required: true
        },
        descripcion_concepto: {
          required: true
        },
        tipo_concepto: {
          required: true
        }
      },
      messages: {
        id_concepto: {
          required: "Ingresa ID",
          number: "Sólo números"
        },
        nombre_concepto: {
          required: "Ingresa el nombre del concepto"
        },
        cantidad_concepto: {
          required: "Ingresa la cantidad"
        },
        descripcion_concepto: {
          required: "Ingresa la descripción"
        },
        tipo_concepto: {
          required: "Ingresa el tipo de concepto"
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
        id_conceptoActualizar: {
          required: true,
          number: true
        },

        nombre_conceptoActualizar: {
          required: true
        },

        cantidad_conceptoActualizar: {
          required: true
        },

        descripcion_conceptoActualizar: {
          required: true
        },

        tipo_conceptoActualizar: {
          required: true
        }
      },
      messages: {
        id_conceptoActualizar: {
          required: "Ingresa el id",
          number: "Sólo números"
        },

        nombre_conceptoActualizar: {
          required: "Ingresa el concepto"
        },

        cantidad_conceptoActualizar: {
          required: "Ingresa la cantidad"
        },

        tipo_conceptoActualizar: {
          required: "Ingresa el tipo"
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