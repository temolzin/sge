    <?php
    session_start();
    if (!isset($_SESSION['tipo'])) {
      header("Location:usuario");
    }
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('parcial');
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-right">
            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarParcial'> <i class="fas fa-plus-circle"></i> Registrar Parcial</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3>Parcial</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTableParcial" name="dataTableParcial" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>Nombre Parcial</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Fin</th>

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
    <div class="modal fade" id="modalRegistrarParcial" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarParcial" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="card-success">
            <div class="card-header">
              <div class="d-sm-flex align-items-center justify-content-between ">
                <h4 class="card-title">Parcial <small> &nbsp;(*) Campos requeridos</small></h4>
                <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
            </div>
            <form role="form" id="formRegistrarParcial" name="formRegistrarParcial">
              <div class="card-body">

                <div class="card">
                  <div class="card-header py-1 bg-secondary">
                    <h3 class="card-title">Informacion Parcial</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body border-primary">
                    <div class="row">
                      <div class="col-12 col-sm-12">
                        <div class="form-group">
                          <!--<label>Num. de Servicio (*)</label>-->
                          <input type="text" hidden class="form-control" id="id_parcial" name="id_parcial" />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Escuela *</label>
                          <select name="id_escuela" id="id_escuela" class="form-control id_escuela">
                            <option value="default">Seleccione escuela</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nombre Parcial*</label>
                          <input type="text" class="form-control" id="nombre_parcial" name="nombre_parcial" placeholder="Nombre Parcial" />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Fecha Inicio*</label>
                          <input type="date" class="form-control" id="fechainicio_parcial" name="fechainicio_parcial" placeholder="Fecha Inicio" />
                        </div>
                      </div>


                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Fecha Fin*</label>
                          <input type="date" class="form-control" id="fechafin_parcial" name="fechafin_parcial" placeholder="Fecha Fin" />
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
        </div>
        </form>
      </div>
    </div>
    </div>
    </div>

    <!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
    <div class="modal fade" id="modalActualizarParcial" tabindex="-1" role="dialog" aria-labelledby="modalActualizarParcial" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="card-warning">
            <div class="card-header">
              <div class="d-sm-flex align-items-center justify-content-between ">
                <h4 class="card-title">Parcial <small> &nbsp;(*) Campos requeridos</small></h4>
                <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <!---->
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" id="formActualizarParcial" name="formActualizarParcial">
              <div class="card-body">
                <div class="card">
                  <div class="card-header py-1 bg-warning">
                    <h3 class="card-title">Informacion Parcial</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body border-primary">
                    <div class="row">
                      <input type="text" hidden class="form-control" id="id_parcialActualizar" name="id_parcialActualizar" />

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Escuela *</label>
                          <select name="id_escuelaActualizar" id="id_escuelaActualizar" class="form-control id_escuela">
                            <option value="default">Seleccione su escuela</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nombre Parcial*</label>
                          <input type="text" class="form-control" id="nombre_parcialActualizar" name="nombre_parcialActualizar" placeholder="Nombre Parcial" />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Fecha Inicio*</label>
                          <input type="date" class="form-control" id="fechainicio_parcialActualizar" name="fechainicio_parcialActualizar" placeholder="Fecha Inicio" />
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Fecha Fin*</label>
                          <input type="date" class="form-control" id="fechafin_parcialActualizar" name="fechafin_parcialActualizar" placeholder="Fecha Fin" />
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

    <!--------------------------------------------------------- Modal DetalleProfesor----------------------------------------------->
    <div class="modal fade" id="modalDetalleParcial" tabindex="-1" role="dialog" aria-labelledby="modalDetalleParcial" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="card-primary">
            <div class="card-header">
              <div class="d-sm-flex align-items-center justify-content-between ">
                <h4 class="card-title">Parcial <small> &nbsp;(*) Campos requeridos</small></h4>
                <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
            </div>

            <form role="form" id="formConsulta" name="formConsulta">
              <div class="card-body">
                <div class="card">
                  <div class="card-header py-1 bg-primary">
                    <h3 class="card-title">Informacion Parcial</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body border-primary">
                    <div class="row">
                      <input type="text" hidden class="form-control" id="id_parcialConsultar" name="id_parcialConsultar" />

                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Escuela *</label>

                          <select disabled name="id_escuelaConsultar" id="id_escuelaConsultar" class="form-control id_escuela"></select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nombre Parcial*</label>
                          <input disabled type="text" class="form-control" id="nombre_parcialConsultar" name="nombre_parcialConsultar" placeholder="Nombre Parcial" />
                        </div>
                      </div>

                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Fecha inicio </label>
                          <input disabled name="fechainicio_parcialConsultar" id="fechainicio_parcialConsultar" class="form-control fechainicio_parcialConsultar">
                          </input>
                        </div>
                      </div>


                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Fecha fin </label>
                          <input disabled name="fechafin_parcialConsultar" id="fechafin_parcialConsultar" class="form-control fechafin_parcialConsultar">
                          </input>
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

    <!-- ********** Modal Eliminar Profesor *****************-->
    <div class="modal fade" id="modalEliminarParcial" tabindex="-1" role="dialog" aria-labelledby="modalEliminarParcial" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form role="form" id="formEliminarParcial" name="formActualizarParcial">
            <input type="text" hidden id="idEliminarParcial" name="idEliminarParcial">
            <div class="modal-body text-center text-danger">¿Realmente deseas eliminar el registro del parcial?</div>
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
        mostrarParcial();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        llenarEscuela();

      });



      const llenarEscuela = () => {
        $.ajax({
          type: "GET",
          url: "<?php echo constant('URL'); ?>escuela/read",
          async: false,
          dataType: "json",
          success: function(data) {
            $.each(data, function(key, registro) {
              var id = registro.id_escuela;
              var nombre = registro.nombre_escuela;
              $(".id_escuela").append('<option value=' + id + '>' + nombre + '</option>');
            });
          },
          error: function(data) {
            console.log(data);
          }
        });
      }


      var mostrarParcial = function() {
        var tableIncidencia = $('#dataTableParcial').DataTable({
          "processing": true,
          "ajax": {
            "url": "<?php echo constant('URL'); ?>parcial/readTable"
          },
          "columns": [{
              "data": "nombre_parcial"
            },

            {
              "data": "fechainicio_parcial"
            },
            {
              "data": "fechafin_parcial"
            },
            {
              data: null,
              "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleParcial' title="Ver Detalles"><i class="fa fa-eye"></i></button>
        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarParcial' title="Editar Datos"><i class="fa fa-edit"></i></button>
        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarParcial' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
            }
          ],
          responsive: true,
          autoWidth: false,
          language: idiomaDataTable,
          lengthChange: true,
          buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
          dom: 'Bfltip'
        });
        obtenerdatosDT(tableIncidencia);
      }



      var obtenerdatosDT = function(table) {
        $('#dataTableParcial tbody').on('click', 'tr', function() {
          var data = table.row(this).data();
          var idEliminar = $('#idEliminarParcial').val(data.id_parcial);

          var id_parcial = $("#id_parcialActualizar").val(data.id_parcial);

          var id_escuela = $("#id_escuelaActualizar option[value=" + data.id_escuela + "]").attr("selected", true);
          var nombre_parcial = $("#nombre_parcialActualizar").val(data.nombre_parcial);
          var fechainicio = $("#fechainicio_parcialActualizar").val(data.fechainicio_parcial);
          var fechafin = $("#fechafin_parcialActualizar").val(data.fechafin_parcial);

          var idConsulta = $("#id_parcialConsultar").val(data.id_parcial);
          var id_escuelaConsulta = $("#id_escuelaConsultar option[value=" + data.id_escuela + "]").attr("selected", true);
          var nombre_parcial = $("#nombre_parcialConsultar").val(data.nombre_parcial);
          var fechainicio_parcialConsultar = $("#fechainicio_parcialConsultar").val(data.fechainicio_parcial);
          var fechafin_parcialConsultar = $("#fechafin_parcialConsultar").val(data.fechafin_parcial);
        });
      }

      var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
          submitHandler: function() {
            var datos = $('#formRegistrarParcial').serialize();
            $.ajax({
              type: "POST",
              url: "<?php echo constant('URL'); ?>parcial/insert",
              data: datos,
              success: function(data) {
                if (data == 'ok') {
                  Swal.fire(
                    "¡Éxito!",
                    "El registro del parcial ha sido registrado de manera correcta",
                    "success"
                  ).then(function() {
                    window.location = "<?php echo constant('URL'); ?>parcial";
                  })
                } else {
                  Swal.fire(
                    "¡Error!",
                    "Ha ocurrido un error al registrar el parcial. " + data,
                    "error"
                  );
                }
              },
            });
          }
        });
        $('#formRegistrarParcial').validate({
          rules: {
            id_parcial: {
              required: true,
              number: true
            },

            id_escuela: {
              required: true
            },
            nombre_parcial: {
              required: true
            },

            fechainicio_parcial: {
              required: true
            },

            fechafin_parcial: {
              required: true
            }
          },
          messages: {
            id_parcial: {
              required: "Id indefinido",
              number: "Sólo números"
            },
            id_escuela: {
              required: "Id escuela indefinido"
            },
            nombre_parcial: {
              required: "Nombre Parcial indefinido"
            },
            fechainicio_parcial: {
              required: "Ingresa la fecha inicial"
            },
            fechafin_parcial: {
              required: "Ingresa la fecha final"
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
            var datos = $('#formActualizarParcial').serialize();
            $.ajax({
              type: "POST",
              url: "<?php echo constant('URL'); ?>parcial/update",
              data: datos,
              success: function(data) {
                if (data == 'ok') {
                  Swal.fire(
                    "¡Éxito!",
                    "El registro del parcial ha sido Actualizado de manera correcta",
                    "success"
                  ).then(function() {
                    window.location = "<?php echo constant('URL'); ?>parcial";
                  })
                } else {
                  Swal.fire(
                    "¡Error!",
                    "Ha ocurrido un error al Actualizar el registro del parcial. " + data,
                    "error"
                  );
                }
              },
            });
          }
        });
        $('#formActualizarParcial').validate({
          rules: {
            id_parcialActualizar: {
              required: true,
              number: true
            },


            id_escuelaActualizar: {
              required: true
            },


            fechainicio_parcialActualizar: {
              required: true
            },


            fechafin_parcialActualizar: {
              required: true
            }

          },
          messages: {
            id_parcialActualizar: {
              required: "Falta id parcial",
              number: "Sólo números"
            },


            id_escuelaActualizar: {
              required: "Falta id escuela"
            },


            fechainicio_parcialActualizar: {
              required: "Falta registrar fecha inicio"
            },


            fechainicio_finActualizar: {
              required: "Falta registrar fecha fin"
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
        $("#formEliminarParcial").submit(function(event) {
          event.preventDefault();
          var datos = $('#formEliminarParcial').serialize();
          $.ajax({
            type: "POST",
            url: "<?php echo constant('URL'); ?>parcial/delete",
            data: datos,
            success: function(data) {
              if (data == 'ok') {
                Swal.fire(
                  "¡Éxito!",
                  "El registro del parcial ha sido eliminado correctamente",
                  "success"
                ).then(function() {
                  window.location = "<?php echo constant('URL'); ?>parcial";
                })
              } else {
                Swal.fire(
                  "¡Error!",
                  "Ha ocurrido un error al eliminar el registro del parcial. " + data,
                  "error"
                );
              }
            },
          });
        });
      }
    </script>