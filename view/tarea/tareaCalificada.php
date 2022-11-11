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
            <h3> Tareas Evaluadas</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="dataTableTareaCalificada" name="dataTableTareaCalificada" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Tarea</th>
                    <th>Grupo</th>
                    <th>Materia</th>
                    <th>Tu entregable</th>
                    <th>Calificación</th>
                    <th>Comentario</th>
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
    mostrarTareasCalificada();
    enviarFormularioActualizar();
    llenarTarea();
    llenarGrupo();
    llenarMateria();
  });
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
  const llenarTarea = () => {
    $.ajax({
      type: "GET",
      url: "<?php echo constant('URL'); ?>tarea_alumno/read",
      async: false,
      dataType: "json",
      success: function(data) {
        $.each(data, function(key, registro) {
          var id = registro.id_tarea_alumno;
          var nombre = registro.nombre_tarea;
          $(".id_tarea_alumno").append('<option value=' + id + '>' + nombre + '</option>');
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  }

  var mostrarTareasCalificada = function() {
    var tableTareaCalificada = $('#dataTableTareaCalificada').DataTable({
      "processing": true,
      "serverSide": false,
      "ajax": {
        "processing": true,
        "serverSide": false,
        "type": "POST",
        "url":"<?php echo constant('URL'); ?>tarea/readTareaCalificadaByIdGrupo",
        "data": {id_grupo: '<?php echo $_SESSION['id_grupo']; ?>'},
      },
      "columns": [{
          "data": "nombre_tarea"
        },
        {
          "data": "nombre_grupo"
        },
        {
          "data": "nombre_materia"
        },
        {
          "data": "archivo_tarea_entregada"
        },
        {
          "data": "calificacion_tarea"
        },
        {
          "data": "comentarios_tarea"
        },

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
    obtenerdatosDT(dataTableTareaCalificada);
  }

  var obtenerdatosDT = function(table) {
    $('#dataTableTareaCalificada tbody').on('click', 'tr', function() {
      var data = table.row(this).data();
      console.log(data);

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
        var datos = $('#formActualizarTareaCalificada').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL'); ?>tareaCalificada/update",
          data: datos,

          success: function(data) {

            if (data == 'ok') {
              Swal.fire(
                "¡Éxito!",
                "La Tarea ha sido Actualizada de manera correcta",
                "success"
              ).then(function() {
                window.location = "<?php echo constant('URL'); ?>tareaCalificada";
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
    $('#formActualizarTareaCalificada').validate({
      rules: {
        id_tarea_entregadaActualizar: {
          required: true,
          number: true
        },
        archivo_tarea_entregadaActualizar: {
          required: true
        },
        comentarios_tareaActualizar: {
          required: true
        },
        calificacion_tareaActualizar: {
          required: true
        }
      },
      messages: {

        id_tarea_entregadaActualizar: {
          required: "Ingresa el id",
          number: "Sólo números"
        },
        archivo_tarea_entregadaActualizar: {
          required: "Ingresa el material de la tarea"
        },
        comentarios_tareaActualizar: {
          required: "Ingresa un comentario de la tarea "
        },
        calificacion_tareaActualizar: {
          required: "Ingresa la calificacion de la tarea "
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
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>