<?php
    session_start();
    if (!isset($_SESSION['tipo'])) {
      header("Location:usuario");
    }
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('calificacion');
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-right">
            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarCalificacion'> <i class="fas fa-plus-circle"></i> Registrar Calificaciones </button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3>Datos Registrados De Calificaciones</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTableCalificacion" name="dataTableCalificacion" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                  <thead>
                    <tr>

                      <th>Alumno</th>
                      <th>Parcial</th>
                      <th>Materia</th>
                      <th>Calificación</th>
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
    <!--------------------------------------------------------- Modal Registrar----------------------------------------------->
    <div class="modal fade" id="modalRegistrarCalificacion" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarCalificacion" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="card-success">
            <div class="card-header">
              <div class="d-sm-flex align-items-center justify-content-between ">
                <h4 class="card-title">Calificaciones <small> &nbsp;(*) Campos requeridos</small></h4>
                <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <!---->

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" id="formRegistrarCalificacion" name="formRegistrarCalificacion" method="post">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input type="text" hidden class="form-control" id="id_calificacion" name="id_calificacion" />
                    </div>
                  </div>
                </div>



                <div class="card border-red">
                  <div class="col-lg-12">
                    <h3 class="card-title">Calificación</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body border-secondary">


                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Profesor (*)</label>
                          <select name="id_profesor" id="id_profesor" class="form-control id_profesor">
                            <option value="default">Seleccione el profesor</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Alumno (*)</label>
                          <select name="id_alumno" id="id_alumno" class="form-control id_alumno">
                            <option value="default">Seleccione el alumno</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Parcial (*)</label>
                          <select name="id_parcial" id="id_parcial" class="form-control id_parcial">
                            <option value="default">Seleccione el parcial</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Materia (*)</label>
                          <select name="id_materia" id="id_materia" class="form-control id_materia">
                            <option value="default">Seleccione la materia</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Calificación (*)</label>
                          <input type="number" step="any" id="calificacion" name="calificacion" class="form-control" placeholder="Ingresa calificacion">
                        </div>
                      </div>

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Fecha (*)</label>
                          <input type="date" class="form-control" id="fecha_calificacion" name="fecha_calificacion" placeholder="Fecha" />
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Observación (*)</label>
                          <textarea type="text" id="observacion_calificacion" name="observacion_calificacion" class="form-control" placeholder="Ingresa observacion..."></textarea>
                        </div>
                      </div>
                    </div>
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
      </form>
    </div>
    </div>
    </div>
    </div>

    <!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
    <div class="modal fade" id="modalActualizarCalificacion" tabindex="-1" role="dialog" aria-labelledby="modalActualizarCalificacion" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="card-warning">
            <div class="card-header">
              <div class="d-sm-flex align-items-center justify-content-between ">
                <h4 class="card-title">Calificaciones <small> &nbsp;(*) Campos requeridos</small></h4>
                <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <!---->
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" id="formActualizarCalificacion" name="formActualizarCalificacion">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <input type="text" hidden class="form-control" id="id_calificacionActualizar" name="id_calificacionActualizar" />
                    </div>
                  </div>
                </div>

                <!--  
           -->



                <div class="card border-red">
                  <div class="card-header py-1 bg-warning">
                    <h3 class="card-title">Calificación</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body border-secondary">
                    <div class="row">




                      <div class="col-lg-4">
                        <div class="form-group">
                          <label> Profesor </label>
                          <select name="id_profesorActualizar" id="id_profesorActualizar" class="form-control id_profesor">
                            <option value="default">Seleccione el profesor</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label> Alumno </label>
                          <select name="id_alumnoActualizar" id="id_alumnoActualizar" class="form-control id_alumno">
                            <option value="default">Seleccione el alumno</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label> Parcial </label>
                          <select name="id_parcialActualizar" id="id_parcialActualizar" class="form-control id_parcial">
                            <option value="default">Seleccione el parcial</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label> Materia </label>
                          <select name="id_materiaActualizar" id="id_materiaActualizar" class="form-control id_materia">
                            <option value="default">Seleccione la materia</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Calificación </label>
                          <input type="number" step="any" id="calificacionActualizar" name="calificacionActualizar" class="form-control" placeholder="Enter ..." />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Fecha</label>
                          <input type="date" class="form-control" id="fecha_calificacionActualizar" name="fecha_calificacionActualizar" placeholder="Fecha" />
                        </div>
                      </div>
                      <div class="col-lg-12">

                        <div class="form-group">
                          <label>Observación (*)</label>
                          <textarea type="text" id="observacion_calificacionActualizar" name="observacion_calificacionActualizar" class="form-control" placeholder="Enter ..."></textarea>
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

    <!--------------------------------------------------------- Modal DetalleProfesor----------------------------------------------->
    <div class="modal fade" id="modalDetalleCalificacion" tabindex="-1" role="dialog" aria-labelledby="modalDetalleCalificacion" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="card-primary">
            <div class="card-header">
              <div class="d-sm-flex align-items-center justify-content-between ">
                <h4 class="card-title">Calificacion <small> &nbsp;</small></h4>
                <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
            </div>
            <form role="form" id="formConsulta" name="formConsulta">
              <div class="card-body">
                <div class="card">
                  <div class="card-header py-1 bg-primary">
                    <h3 class="card-title">Calificación</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body border-primary">
                    <div class="row">
                      <input type="text" hidden class="form-control" id="id_calificacionConsultar" name="id_calificacionConsultar" />




                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Profesor</label>
                          <select disabled name="id_profesorConsultar" id="id_profesorConsultar" class="form-control id_profesor">
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Alumno</label>
                          <select disabled name="id_alumnoConsultar" id="id_alumnoConsultar" class="form-control id_alumno">
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Parcial </label>
                          <select disabled name="id_parcialConsultar" id="id_parcialConsultar" class="form-control id_parcial">
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Materia</label>
                          <select disabled name="id_materiaConsultar" id="id_materiaConsultar" class="form-control id_materia">
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">

                        <div class="form-group">
                          <label>Calificación</label>
                          <textarea disabled type="text" id="calificacionConsultar" name="calificacionConsultar" class="form-control" placeholder="Enter ..."></textarea>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label>Fecha </label>
                          <input disabled type="date" class="form-control" id="fecha_calificacionConsultar" name="fecha_calificacionConsultar" placeholder="Fecha" />
                        </div>
                      </div>
                      <div class="col-lg-12">

                        <div class="form-group">
                          <label>Observación </label>
                          <textarea disabled type="text" id="observacion_calificacionConsultar" name="observacion_calificacionConsultar" class="form-control" placeholder="Enter ..."></textarea>
                        </div>
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

    <!-- ********** Modal Eliminar Profesor *****************-->
    <div class="modal fade" id="modalEliminarCalificacion" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCalificacion" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form role="form" id="formEliminarCalificacion" name="formActualizarCalificacion">
            <input type="text" hidden id="idEliminarCalificacion" name="idEliminarCalificacion">
            <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este registro?</div>
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
        mostrarCalificaciones();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        llenarParcial();
        llenarMateria();
        llenarProfesor();
        llenarAlumno();
      });

      const llenarParcial = () => {
        $.ajax({
          type: "GET",
          url: "<?php echo constant('URL'); ?>parcial/read",
          async: false,
          dataType: "json",
          success: function(data) {
            //console.log('generos: ',data)
            $.each(data, function(key, registro) {
              var id = registro.id_parcial;
              var nombre = registro.nombre_parcial;
              $(".id_parcial").append('<option value=' + id + '>' + nombre + '</option>');
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

      const llenarProfesor = () => {
        $.ajax({
          type: "GET",
          url: "<?php echo constant('URL'); ?>profesor/read",
          async: false,
          dataType: "json",
          success: function(data) {
            $.each(data, function(key, registro) {
              var id = registro.id_profesor;
              var nombre = registro.nombre_profesor;
              var appat = registro.appaterno_profesor;
              var apmat = registro.apmaterno_profesor;
              $(".id_profesor").append('<option value=' + id + '>' + nombre + ' ' + appat + ' ' + apmat + '</option>');

            });
          },
          error: function(data) {
            console.log(data);
          }
        });
      }


      const llenarAlumno = () => {
        $.ajax({
          type: "GET",
          url: "<?php echo constant('URL'); ?>alumno/read",
          async: false,
          dataType: "json",
          success: function(data) {
            $.each(data, function(key, registro) {
              var id = registro.id_alumno;
              var nombre = registro.nombre_alumno;
              var appat = registro.appaterno_alumno;
              var apmat = registro.apmaterno_alumno;
              $(".id_alumno").append('<option value=' + id + '>' + nombre + ' ' + appat + ' ' + apmat + '</option>');

            });
          },
          error: function(data) {
            console.log(data);
          }
        });
      }


      var mostrarCalificaciones = function() {
        var tableCalificacion = $('#dataTableCalificacion').DataTable({
          "processing": true,
          "serverSide": false,
          "ajax": {
            "url": "<?php echo constant('URL'); ?>calificacion/readTable"
          },
          "columns": [{
              defaultContent: "",
              "render": function(data, type, full) {
                return full['nombre_alumno'] + ' ' + full['appaterno_alumno'] + ' ' + full['apmaterno_alumno'];
              }
            },
            {
              "data": "nombre_parcial"
            },
            {
              "data": "nombre_materia"
            },
            {
              "data": "calificacion"
            },

            {
              data: null,
              "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleCalificacion' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarCalificacion' title="Editar Datos"><i class="fa fa-edit"></i></button>
                <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarCalificacion' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
        obtenerdatosDT(tableCalificacion);
      }



      var obtenerdatosDT = function(table) {
        $('#dataTableCalificacion tbody').on('click', 'tr', function() {
          var data = table.row(this).data();
          var idEliminar = $('#idEliminarCalificacion').val(data.id_calificacion);

          var idActualizar = $("#id_calificacionActualizar").val(data.id_calificacion);
          var id_profesor = $("#id_profesorActualizar").val(data.id_profesor);
          var id_alumno = $("#id_alumnoActualizar").val(data.id_alumno);
          var id_parcial = $("#id_parcialActualizar").val(data.id_parcial);
          var id_materia = $("#id_materiaActualizar").val(data.id_materia);
          var calificacion = $("#calificacionActualizar").val(data.calificacion);
          var observacion_calificacion = $("#observacion_calificacionActualizar").val(data.observacion_calificacion);
          var fecha_calificacion = $("#fecha_calificacionActualizar").val(data.fecha_calificacion);

          var idConsulta = $("#id_calificacionConsultar").val(data.id_calificacion);
          var id_profesorConsulta = $("#id_profesorConsultar").val(data.id_profesor);
          var id_alumnoConsulta = $("#id_alumnoConsultar").val(data.id_alumno);
          var id_parcialConsulta = $("#id_parcialConsultar").val(data.id_parcial);
          var id_materiaConsulta = $("#id_materiaConsultar").val(data.id_materia);
          var calificacionConsulta = $("#calificacionConsultar").val(data.calificacion);
          var observacion_calificacionConsulta = $("#observacion_calificacionConsultar").val(data.observacion_calificacion);
          var fecha_calificacionConsulta = $("#fecha_calificacionConsultar").val(data.fecha_calificacion);
        });
      }

      var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
          submitHandler: function() {
            var datos = $('#formRegistrarCalificacion').serialize();
            $.ajax({
              type: "POST",
              url: "<?php echo constant('URL'); ?>calificacion/insert",
              data: datos,
              success: function(data) {
                if (data == 'ok') {
                  Swal.fire(
                    "¡Éxito!",
                    "La calificacion ha sido registrado de manera correcta",
                    "success"
                  ).then(function() {
                    window.location = "<?php echo constant('URL'); ?>calificacion";
                  })
                } else {
                  Swal.fire(
                    "¡Error!",
                    "Ha ocurrido un error al registrar la calificacion. " + data,
                    "error"
                  );
                }
              },
            });
          }
        });
        $('#formRegistrarCalificacion').validate({
          rules: {
            id_calificacion: {
              required: true,
              number: true
            },
            id_calificacion: {
              required: true
            },
            id_profesor: {
              required: true
            },
            observacion_calificacion: {
              required: true
            }
          },
          messages: {
            id_calificacion: {
              required: "Ingresa una matrícula",
              number: "Sólo números"
            },
            id_calificacion: {
              required: "Ingresa un id_calificacion"
            },
            id_profesor: {
              required: "Ingresa un id_profesor"
            },
            observacion_calificacion: {
              required: "Ingresa un observacion_calificacion"
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
            var datos = $('#formActualizarCalificacion').serialize();
            $.ajax({
              type: "POST",
              url: "<?php echo constant('URL'); ?>calificacion/update",
              data: datos,
              success: function(data) {
                if (data == 'ok') {
                  Swal.fire(
                    "¡Éxito!",
                    "La calificacion ha sido Actualizado de manera correcta",
                    "success"
                  ).then(function() {
                    window.location = "<?php echo constant('URL'); ?>calificacion";
                  })
                } else {
                  Swal.fire(
                    "¡Error!",
                    "Ha ocurrido un error al Actualizar el calificacion. " + data,
                    "error"
                  );
                }
              },
            });
          }
        });
        $('#formActualizarCalificacion').validate({
          rules: {
            id_calificacionActualizar: {
              required: true,
              number: true
            },
            id_profesorActualizar: {
              required: true
            },
            id_alumnoActualizar: {
              required: true
            },
            id_parcialActualizar: {
              required: true
            },
            id_materiaActualizar: {
              required: true
            },
            calificacionActualizar: {
              required: true
            },
            observacion_calificacionActualizar: {
              required: true
            },
            fecha_calificacionActualizar: {
              required: true
            }

          },
          messages: {
            id_calificacionActualizar: {
              required: "Ingresa una matrícula",
              number: "Sólo números"
            },
            id_profesorActualizar: {
              required: "Ingresa un id_profesor"
            },
            id_alumnoActualizar: {
              required: "Ingresa un alumno"
            },
            id_parcialActualizar: {
              required: "Ingresa un parcial"
            },
            id_materiaActualizar: {
              required: "Ingresa una materia"
            },
            calificacionActualizar: {
              required: "Ingresa la calificacion"
            },
            observacion_calificacionActualizar: {
              required: "Ingresa un observacion_calificacion"
            },
            fecha_calificacionActualizar: {
              required: "Ingresa una fecha_calificacion"
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
        $("#formEliminarCalificacion").submit(function(event) {
          event.preventDefault();
          var datos = $('#formEliminarCalificacion').serialize();
          $.ajax({
            type: "POST",
            url: "<?php echo constant('URL'); ?>calificacion/delete",
            data: datos,
            success: function(data) {
              if (data == 'ok') {
                Swal.fire(
                  "¡Éxito!",
                  "La calificacion ha sido eliminado correctamente",
                  "success"
                ).then(function() {
                  window.location = "<?php echo constant('URL'); ?>calificacion";
                })
              } else {
                Swal.fire(
                  "¡Error!",
                  "Ha ocurrido un error al eliminar la calificacion. " + data,
                  "error"
                );
              }
            },
          });
        });
      }
    </script>