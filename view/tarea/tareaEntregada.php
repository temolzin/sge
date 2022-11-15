<?php
session_start();
if (!isset($_SESSION['tipo'])) {
  header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('Tablero');
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4> Detalles de tareas</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="dataTableTareaEntregada" name="dataTableTareaEntregada" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Tarea</th>
                    <th>Grupo</th>
                    <th>Materia</th>
                    <th>Entregable</th>
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

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarTareaEntregada" tabindex="-1" role="dialog" aria-labelledby="modalActualizarTareaEntregada" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-warning">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Calificar Tareas <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <!---->
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="formActualizarTareaEntregada" name="formActualizarTareaEntregada">
          <div class="card-body">
            <div class="card">
              <div class="card-header py-1 bg-warning">
                <h3 class="card-title">Información Tarea</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <input type="text" hidden class="form-control" id="id_tarea_entregadaActualizar" name="id_tarea_entregadaActualizar" />


                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Comentarios del alumno</label>
                      <input disabled type="text" class="form-control" id="comentarios_tareaActualizar" name="comentarios_tareaActualizar" placeholder="Comentarios" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Calificación</label>

                      <input type="text" class="form-control" id="calificacion_tareaActualizar" name="calificacion_tareaActualizar" placeholder="Calificacion" />
                    </div>
                  </div>

                </div>
              </div>
            </div>


          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning">Actualizar</button>
      </div>

    </div>
    </form>
  </div>
</div>
</div>
</div>
</div>

<?php
$menu->footer();
?>
<script>
  $(document).ready(function() {
    mostrarTareasEntregada();
    enviarFormularioActualizar();
    llenarTarea();
    llenarGrupo();
    llenarMateria();
  });
  var mostrarTareasEntregada = function() {
    var tableTareaEntregada = $('#dataTableTareaEntregada').DataTable({
      "ajax": {
        "processing": true,
        "serverSide": false,
        "type": "POST",
        "url":"<?php echo constant('URL'); ?>tarea/readTareaEntregadaByIdProfesor",
        "data": {id_profesor: '<?php echo $_SESSION['id']; ?>'},
      },
      "columns": [

        {
          "data": "nombre_tarea"
        },
        {
          "data": "nombre_grupo"
        },
        {
          "data": "nombre_materia"
        },
        {
          "defaultContent": "",
          render: function(data, type, row) {
            return `<a download="${row.archivo_tarea_entregada}" href="<?php constant('URL'); ?>public/tareas_entregadas/${row.nombre_tarea}/${row.archivo_tarea_entregada}"><button class='consulta btn btn-danger' title="Descargar PDF"><i class="fa fa-file-pdf"></i></button></a>`;
          }
        },
        {
          data: null,
          "defaultContent":

            `
        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarTareaEntregada' title="Calificar tarea"><i class="fa fa-paper-plane"></i></button>`
        }
      ],
      "fnFooterCallback": function(nRow, aaData, iStart, iEnd, aiDisplay) {
        if (aiDisplay.length > 0) {
          $('body').removeClass('no-record');
        } else {
          $('body').addClass('no-record');
        }
      },
      responsive: true,
      autoWidth: false,
      language: idiomaDataTable,
      lengthChange: true,
      buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
      dom: 'Bfltip'
    });
    obtenerdatosDT(tableTareaEntregada);
  }

  var obtenerdatosDT = function(table) {
    $('#dataTableTareaEntregada tbody').on('click', 'tr', function() {
      var data = table.row(this).data();

      var idActualizar = $("#id_tarea_entregadaActualizar").val(data.id_tarea_entregada);
      var comentarios_tarea = $("#comentarios_tareaActualizar").val(data.comentarios_tarea);
      var calificacion_tarea = $("#calificacion_tareaActualizar").val(data.calificacion_tarea);

      var idConsulta = $("#id_tarea_entregadaConsultar").val(data.id_tarea_entregada);
      var archivo_tarea_entregadaConsulta = $("#archivo_tarea_entregadaConsultar").val(data.archivo_tarea_entregada);
      var comentarios_tareaConsulta = $("#comentarios_tareaConsultar").val(data.comentarios_tarea);
      var calificacion_tareaConsulta = $("#calificacion_tareaConsultar").val(data.calificacion_tarea);
      var id_grupoConsulta = $("#id_grupoConsultar").val(data.id_grupo);
      var id_materiaConsulta = $("#id_materiaConsultar").val(data.id_materia);

    });
  }
  $.validator.addMethod("selectRequired", function(value, element, arg) {
    return arg !== value;
  }, "Selecciona un valor");


  var enviarFormularioActualizar = function() {
    $.validator.setDefaults({
      submitHandler: function() {
        var datos = $('#formActualizarTareaEntregada').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL'); ?>tarea/updateTareaEntregada",
          data: datos,
          success: function(data) {
            if (data == 'ok') {
              Swal.fire(
                "¡Éxito!",
                "El grupo ha sido Actualizado de manera correcta",
                "success"
              ).then(function() {
                window.location = "<?php echo constant('URL'); ?>tarea/tareaEntregada";
              })
            } else {
              Swal.fire(
                "¡Error!",
                "Ha ocurrido un error al Actualizar el grupo. " + data,
                "error"
              );
            }
          },
        });
      }
    });
    $('#formActualizarTareaEntregada').validate({
      rules: {
        id_tarea_entregadaActualizar: {
          required: true,
          number: true
        },


        comentarios_tareaActualizar: {
          required: true
        },


        nombre_grupoActualizar: {
          required: true
        },


        turno_grupoActualizar: {
          required: true
        }

      },
      messages: {
        id_grupoActualizar: {
          required: "Ingresa una id",
          number: "Sólo números"
        },


        id_escuelaActualizar: {
          required: "Ingresa un id escuela"
        },


        nombre_grupoActualizar: {
          required: "Ingresa un nombre"
        },


        turno_grupoActualizar: {
          required: "Ingresa turno"
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
</script>