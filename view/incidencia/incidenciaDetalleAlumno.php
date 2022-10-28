    <?php
    session_start();
    if (!isset($_SESSION['tipo'])) {
      header("Location:usuario");
    }
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('alumno_incidencia');
    ?>
    <section class="content">
      <div class="container-fluid">
        <br>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Tus Incidencias</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTableAlumnoIncidencia" name="dataTableAlumnoIncidencia" class="table table-bordered table-hover dt-responsive nowrap">
                  <thead>
                    <tr>
                      <th>Profesor</th>
                      <th>Fecha</th>
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

    <!--------------------------------------------------------- Modal DetalleProfesor----------------------------------------------->
    <div class="modal fade" id="modalDetalleAlumnoIncidencia" tabindex="-1" role="dialog" aria-labelledby="modalDetalleAlumnoIncidencia" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="card-primary">
            <div class="card-header">
              <div class="d-sm-flex align-items-center justify-content-between ">
                <h4 class="card-title">Detalle de Tu Incidencia <small> &nbsp;</small></h4>
                <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
            </div>
            <form role="form" id="formConsulta" name="formConsulta">
              <div class="card-body">
                <div class="card">
                  <div class="card-header py-1 bg-primary">
                    <h3 class="card-title">Incidencias</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>

                  </div>

                  <!--  -->




                  <div class="card-body border-primary">
                    <div class="row">

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nombre Alumno </label>
                          <input disabled type="text" class="form-control" id="id_alumnoConsultar" name="id_alumnoConsultar" placeholder="Falta tu nombre" />
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nombre Profesor</label>
                          <input disabled type="text" class="form-control" id="id_profesorConsultar" name="id_profesorConsultar" placeholder="Falta Profesor" />
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Grupo </label>
                          <input disabled type="text" class="form-control" id="id_grupoConsultar" name="id_grupoConsultar" placeholder="Falta Grupo" />
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Fecha</label>
                          <input disabled type="date" class="form-control" id="fechaincidencia_incidenciaConsultar" name="fechaincidencia_incidenciaConsultar" placeholder="Fecha" />
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <label>Hora</label>

                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                              <input disabled type="text" id="horaincidencia_incidenciaConsultar" name="horaincidencia_incidenciaConsultar" class="form-control datetimepicker-input" data-target="#timepicker" />
                              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">

                        <div class="form-group">
                          <label>Descripción</label>
                          <textarea disabled type="text" id="descripcion_incidenciaConsultar" name="descripcion_incidenciaConsultar" class="form-control" placeholder="Enter ..."></textarea>
                        </div>
                      </div>


                    </div>
                  </div>

                </div>
              </div>
          </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
        mostrarAlumnoIncidencia();

      });




      var mostrarAlumnoIncidencia = function() {
        var TableAlumnoIncidencia = $('#dataTableAlumnoIncidencia').DataTable({
          "processing": true,
          "serverSide": false,
          "ajax": {
            "url": "<?php echo constant('URL'); ?>incidencia/readTableIncidenciaAlumno"
          },
          "columns": [{
              defaultContent: "",
              "render": function(data, type, full) {
                return full['nombre_profesor'] + ' ' + full['appaterno_profesor'] + ' ' + full['apmaterno_profesor'];
              }
            },
            {
              "data": "fechaincidencia_incidencia"
            },
            {
              "data": "descripcion_incidencia"
            },
            {
              data: null,
              "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleAlumnoIncidencia' title="Ver Detalles"><i class="fa fa-eye"></i></button>`
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
        obtenerdatosDT(TableAlumnoIncidencia);
      }

      var obtenerdatosDT = function(table) {
        $('#dataTableAlumnoIncidencia tbody').on('click', 'tr', function() {
          var data = table.row(this).data();
          var id_alumnoConsulta = $("#id_alumnoConsultar").val(data.nombre_alumno + ' ' + data.appaterno_alumno + ' ' + data.apmaterno_alumno);
          var id_profesorConsulta = $("#id_profesorConsultar").val(data.nombre_profesor + ' ' + data.appaterno_profesor + ' ' + data.apmaterno_profesor);
          var id_grupoConsulta = $("#id_grupoConsultar").val(data.nombre_grupo);
          var fechaincidencia_incidenciaConsulta = $("#fechaincidencia_incidenciaConsultar").val(data.fechaincidencia_incidencia);
          var horaincidencia_incidenciaConsulta = $("#horaincidencia_incidenciaConsultar").val(data.horaincidencia_incidencia);
          var descripcion_incidenciaConsulta = $("#descripcion_incidenciaConsultar").val(data.descripcion_incidencia);
        });
      }
    </script>