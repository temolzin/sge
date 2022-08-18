<?php
session_start();
if (!isset($_SESSION['tipo'])) {
  header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('Tarea');
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-right">
        <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarTarea'>
          <i class="fas fa-plus-circle"></i> Asignar Tarea
        </button>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tareas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="dataTableTarea" name="dataTableTarea" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>Grupo</th>
                  <th>Materia</th>
                  <th>Nombre</th>
                  <th>Fecha_entrega</th>
                  <th>Descripción</th>
                  <th>Archivo</th>
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
<!--- Modal Registrar--->
<div class="modal fade" id="modalRegistrarTarea" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarTarea" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-success">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Tarea <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>
        <form role="form" id="formRegistrarTarea" name="formRegistrarTarea">
          <div class="card-body">
            <div class="card">
              <div class="card-header py-1 bg-secondary">
                <h3 class="card-title">Datos de tarea</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                <div class="col-lg-12">
                    <span><label>Subir Archivo (*)</label></span>
                    <div class="form-group input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="archivo_tarea" id="archivo_tarea" lang="es">
                        <label class="custom-file-label" for="archivo">Seleccione Archivo</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Nombre/Título (*)</label>
                      <input type="text" class="form-control" id="nombre_tarea" name="nombre_tarea" placeholder="Introduce el nombre/titulo de la tarea." />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Seleccione Materia (*)</label>
                      <select name="id_materia" id="id_materia" class="form-control id_materia">
                        <option value="default">Seleccione la materia</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Seleccione Grupo (*)</label>
                      <select name="id_grupo" id="id_grupo" class="form-control id_grupo">
                        <option value="default">Seleccione el grupo</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Indique Fecha de entrega (*)</label>
                      <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" placeholder="Introduce la fecha de entrega" />
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Descripción (*)</label>
                      <textarea type="text" class="form-control" id="descripcion_tarea" name="descripcion_tarea" placeholder="Introduce la descripción de la tarea."></textarea>
                    </div>
                  </div>
                  <div class="col-6 lg-6">
                    <div class="form-group">
                      <!--<label>Num. de Servicio (*)</label>-->
                      <input type="text" hidden class="form-control" id="id_tarea_alumno" name="id_tarea_alumno" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Registrar</button>
              </div>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarTarea" tabindex="-1" role="dialog" aria-labelledby="modalActualizarTarea" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-warning">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Tarea <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <!---->
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="formActualizarTarea" name="formActualizarTarea">
          <div class="card-body">
            <div class="card">
              <div class="card-header py-1 bg-warning">
                <h3 class="card-title">Datos de Tarea</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <input type="text" hidden class="form-control" id="id_tarea_alumnoActualizar" name="id_tarea_alumnoActualizar" />
                  <div class="col-lg-12">
                    <span><label>Archivo (*)</label></span>
                    <br>
                    <div class="form-group input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="archivo_tareaActualizar" id="archivo_tareaActualizar" lang="es">
                        <label id="archivo_tareaActualizar" class="custom-file-label" name="archivo_tareaActualizar" id="archivo_tareaActualizar" for="imagen">Seleccione archivo</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Nombre/Título (*)</label>
                      <input type="text" class="form-control" id="nombre_tareaActualizar" name="nombre_tareaActualizar" placeholder="Introduce el nombre de la tarea" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Materia (*)</label>
                      <select dname="id_materiaActualizar" id="id_materiaActualizar" class="form-control id_materia">
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Grupo (*)</label>
                      <select name="id_grupoActualizar" id="id_grupoActualizar" class="form-control id_grupo">
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Fecha de entrega (*)</label>
                      <input type="date" class="form-control" id="fecha_entregaActualizar" name="fecha_entregaActualizar" placeholder="Introduce la fecha de entrega" />
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Descripción (*)</label>
                      <input type="text" class="form-control" id="descripcion_tareaActualizar" name="descripcion_tareaActualizar" placeholder="Introduce la descripción de la tarea" />
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

    </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
<!--------------------------------------------------------- Modal DetalleTarea----------------------------------------------->
<div class="modal fade" id="modalDetalleTarea" tabindex="-1" role="dialog" aria-labelledby="modalDetalleTarea" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-primary">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Tarea <small> &nbsp;</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>
        <form role="form" id="formConsulta" name="formConsulta">
          <div class="card-body">
            <div class="card">
              <div class="card-header py-1 bg-primary">
                <h3 class="card-title">Datos Generales</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <input type="text" hidden class="form-control" id="id_tarea_alumnoConsultar" name="id_tarea_alumnoConsultar" />
                  <div class="col-lg-4">
                    <span><label>Archivo</label></span>
                    <br>
                    <div align="center" class="mx-auto">
                      <img id="archivo_tareaConsultar" class="rounded" name="archivo_tareaConsultar" width="30%">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Nombre/Título</label>
                      <input type="text" disabled class="form-control" id="nombre_tareaConsultar" name="nombre_tareaConsultar" placeholder="Nombre/titulo" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Materia </label>
                      <select disabled name="id_materiaConsultar" id="id_materiaConsultar" class="form-control id_materia">
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Grupo </label>
                      <select disabled name="id_grupoConsultar" id="id_grupoConsultar" class="form-control id_grupo">
                      </select>
                    </div>
                  </div>
                  
                  
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Fecha de entrega</label>
                      <input type="date" disabled class="form-control" id="fecha_entregaConsultar" name="fecha_entregaConsultar" placeholder="Fecha de entrega" />
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Descripción</label>
                      <input type="text" disabled class="form-control" id="descripcion_tareaConsultar" name="descripcion_tareaConsultar" placeholder="Descripcion" />
                    </div>
                  </div>

                  
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
    </div>
  </div>
  </form>
</div>
</div>
</div>
</div>
</div>
<!-- ********** Modal Eliminar Tarea *****************-->
<div class="modal fade" id="modalEliminarTarea" tabindex="-1" role="dialog" aria-labelledby="modalEliminarTarea" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form role="form" id="formEliminarTarea" name="formEliminarTarea">
        <input type="text" hidden id="idEliminarTarea" name="idEliminarTarea">
        <div class="modal-body text-center text-danger">¿Realmente deseas eliminar esta Tarea?</div>
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
    mostrarTareas();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
    llenarMateria();
    llenarGrupo();
  });
  const llenarMateria = () => {
    $.ajax({
      type: "GET",
      url: "<?php echo constant('URL'); ?>materia/read",
      async: false,
      dataType: "json",
      success: function(data) {
        $.each(data, function(key, registro) {
          var id = registro.id_materia;
          var nombre = registro.nombre_materia;
          $(".id_materia").append('<option value=' + id + '>' + nombre + '</option>');
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  }
  const llenarGrupo = () => {
    $.ajax({
      type: "GET",
      url: "<?php echo constant('URL'); ?>grupo/read",
      async: false,
      dataType: "json",
      success: function(data) {
        $.each(data, function(key, registro) {
          var id = registro.id_grupo;
          var nombre = registro.nombre_grupo;
          $(".id_grupo").append('<option value=' + id + '>' + nombre + '</option>');
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  }
  
  var mostrarTareas = function() {
    var tableTarea = $('#dataTableTarea').DataTable({
      "processing": true,
      "serverSide": false,
      "ajax": {
        "url": "<?php echo constant('URL'); ?>tarea/readTable"
      },
      "columns": [{
          "data": "id_grupo"
        },
        {
          "data": "id_materia"
        },
        {
          "data": "nombre_tarea"
        },
        {
          "data": "fecha_entrega"
        },
        {
          "data": "descripcion_tarea"
        },
        {
          "data": "archivo_tarea"
        },
        {
          data: null,
          "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleTarea' title="Ver Detalles"><i class="fa fa-eye"></i></button>
          <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarTarea' title="Editar Datos"><i class="fa fa-edit"></i></button>
          <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarTarea' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
    obtenerdatosDT(tableTarea);
  }

  var obtenerdatosDT = function(table) {
    $('#dataTableTarea tbody').on('click', 'tr', function() {
      var data = table.row(this).data();
      console.log("hola ",data);

      var idEliminar = $('#idEliminarTarea').val(data.id_tarea_alumno);

      var idActualizar = $("#id_tarea_alumnoActualizar").val(data.id_tarea_alumno);
      var id_grupo = $("#id_grupoActualizar option[value=" + data.id_grupo + "]").attr("selected", true);
      var id_materia = $("#id_materiaActualizar option[value=" + data.id_materia + "]").attr("selected", true);
      var nombre_tarea = $("#nombre_tareaActualizar").val(data.nombre_tarea);
      var fecha_entrega = $("#fecha_entregaActualizar").val(data.fecha_entrega);
      var descripcion_tarea = $("#descripcion_tareaActualizar").val(data.descripcion_tarea);
      var archivo_tarea = $("#archivo_tareaActualizar").val(data.archivo_tarea);


      var idConsulta = $("#id_tarea_alumnoConsultar").val(data.id_tarea_alumno);
      var id_grupoConsulta = $("#id_grupoConsultar option[value=" + data.id_grupo + "]").attr("selected", true);
      var id_materiaConsulta = $("#id_materiaConsultar option[value=" + data.id_materia + "]").attr("selected", true);
      var nombre_tareaConsulta = $("#nombre_tareaConsultar").val(data.nombre_tarea);
      var fecha_entregaConsulta = $("#fecha_entregaConsultar").val(data.fecha_entrega);
      var descripcion_tareaConsulta = $("#descripcion_tareaConsultar").val(data.descripcion_tarea);
      //var archivo_tareaConsulta = $("#archivo_tareaConsultar").val(data.archivo_tarea);

    });
  }
  $.validator.addMethod("selectRequired", function(value, element, arg) {
    return arg !== value;
  }, "Selecciona un valor");

  var enviarFormularioRegistrar = function() {
    $.validator.setDefaults({
      submitHandler: function() {
        var form_data = $('#formRegistrarTarea').serialize();
        var form_data = new FormData();

        var archivo = "";
        if ($('#archivo_tarea').val() != null) {
          archivo = $('#archivo_tarea').prop('files')[0];
        }


        form_data.append('archivo_tarea', archivo);
        form_data.append('id_grupo', document.getElementById('id_grupo').value);
        form_data.append('id_materia', document.getElementById('id_materia').value);
        form_data.append('nombre_tarea', document.getElementById('nombre_tarea').value);
        form_data.append('fecha_entrega', document.getElementById('fecha_entrega').value);
        form_data.append('descripcion_tarea', document.getElementById('descripcion_tarea').value);

        $.ajax({
          type: "POST",

          async: false,
          url: "<?php echo constant('URL'); ?>tarea/insert",
          dataType: 'text', // what to expect back from the PHP script, if anything
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          success: function(data) {


            if (data != 'ok') {
              Swal.fire(
                "¡Éxito!",
                "La tarea se asignó con exito",
                "success"
              ).then(function() {
                window.location = "<?php echo constant('URL'); ?>tarea";
              })
            } else {
              Swal.fire(
                "¡Error!",
                "Ha ocurrido un error al registrar la tarea. " + data,
                "error"
              );
            }

          },
        });
      }
    });



    $('#formRegistrarTarea').validate({
      rules: {
        id_tarea_alumno: {
          required: true,
          number: true
        },
        id_grupo: {
          required: true,
          number: true
        },
        id_materia: {
          required: true,
          number: true
        },
        nombre_tarea: {
          required: true,
        },
        fecha_entrega: {
          required: true,

        },
        descripcion_tarea: {
          required: true
        },
        archivo_tarea: {
          required: true
        }
      },
      messages: {
        id_tarea_alumno: {
          required: "Ingresa una matrícula",
          number: "Sólo números"
        },
        id_grupo: {
          required: "Ingresa un grupo"
        },
        id_materia: {
          required: "Ingresa una materia"
        },
        nombre_tarea: {
          required: "Ingresa el nombre/titulo"
        },
        fecha_entrega: {
          required: "Ingresa la fecha de entrega"
        },
        descripcion_tarea: {
          required: "Ingresa la descripcion de la tarea"
        },
        archivo_tarea: {
          required: "Selecciona el archivo"
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
        var datos = $('#formActualizarTarea').serialize();
        var form_data = new FormData();

        var archivo = "";
        if ($('#archivo_tareaActualizar').val() != null) {
          archivo = $('#archivo_tareaActualizar').prop('files')[0];
        }


        form_data.append('archivo_tareaActualizar', archivo);
        form_data.append('id_tarea_alumnoActualizar', document.getElementById('id_tarea_alumnoActualizar').value);
        form_data.append('id_grupoActualizar', document.getElementById('id_grupoActualizar').value);
        form_data.append('id_materiaActualizar', document.getElementById('id_materiaActualizar').value);
        form_data.append('nombre_tareaActualizar', document.getElementById('nombre_tareaActualizar').value);
        form_data.append('fecha_entregaActualizar', document.getElementById('fecha_entregaActualizar').value);
        form_data.append('descripcion_tareaActualizar', document.getElementById('descripcion_tareaActualizar').value);
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL'); ?>tarea/update",
          async: false,
          dataType: 'text', // what to expect back from the PHP script, if anything
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          success: function(data) {
            if (data != 'ok') {
              Swal.fire(
                "¡Éxito!",
                "La Tarea ha sido Actualizada de manera correcta",
                "success"
              ).then(function() {
                window.location = "<?php echo constant('URL'); ?>tarea";
              })
            } else {
              Swal.fire(
                "¡Error!",
                "Ha ocurrido un error al Actualizar el tarea. " + data,
                "error"
              );
            }
          },
        });
      }
    });
    $('#formActualizarTarea').validate({
      rules: {
        id_tarea_alumnoActualizar: {
          required: true,
          number: true
        },
        id_grupoActualizar: {
          required: true
        },
        id_materiaActualizar: {
          required: true
        },
        nombre_tareaActualizar: {
          required: true
        },
        fecha_entregaActualizar: {
          required: true
        },
        descripcion_tareaActualizar: {
          required: true
        },
        archivo_tareaActualizar: {
          required: true
        }
      },
      messages: {
        id_tarea_alumnoActualizar: {
          required: "Ingresa una matrícula",
          number: "Sólo números"
        },
        id_grupoActualizar: {
          required: "Ingresa un grupo"
        },
        id_materiaActualizar: {
          required: "Ingresa la materia"
        },
        nombre_tareaActualizar: {
          required: "Ingresa el nombre/titulo de la tarea "
        },
        fecha_entregaActualizar: {
          required: "Ingresa la fecha de entrega de la tarea "
        },
        descripcion_tareaActualizar: {
          required: "Ingresa la descripcion de la tarea "
        },
        archivo_tareaActualizar: {
          required: "Ingresa el material de la tarea"
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
    $("#formEliminarTarea").submit(function(event) {
      event.preventDefault();
      var datos = $('#formEliminarTarea').serialize();
      $.ajax({
        type: "POST",
        url: "<?php echo constant('URL'); ?>tarea/delete",
        data: datos,
        success: function(data) {
          if (data != 'ok') {
            Swal.fire(
              "¡Éxito!",
              "La Tarea ha sido eliminada correctamente",
              "success"
            ).then(function() {
              window.location = "<?php echo constant('URL'); ?>tarea";
            })
          } else {
            Swal.fire(
              "¡Error!",
              "Ha ocurrido un error al eliminar la tarea. " + data,
              "error"
            );
          }
        },
      });
    });
  }

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>