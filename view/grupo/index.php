    <?php
        session_start();
        if (!isset($_SESSION['tipo'])) {
          header("Location:usuario");
        }
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('grupo');
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-right">
            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarGrupo'> <i class="fas fa-plus-circle"></i> Registrar Grupo </button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <div class="card">
             <div class="card-header" >
              <h3 class="card-header">Grupos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dataTableGrupo" name="dataTableGrupo" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Turno</th>

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
  <div class="modal fade" id="modalRegistrarGrupo" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarGrupo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="card-success">
          <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between ">
              <h4 class="card-title">Grupo <small> &nbsp;(*) Campos requeridos</small></h4>
              <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
          </div>
          <form role="form" id="formRegistrarGrupo" name="formRegistrarGrupo">
            <div class="card-body">

             <div class="card">
              <div class="card-header py-1 bg-secondary">
                <h3 class="card-title">Información Grupo</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <div class="col-12 col-sm-12" >
                    <div class="form-group">
                      <!--<label>Num. de Servicio (*)</label>-->
                      <input type="text" hidden class="form-control" id="id_grupo" name="id_grupo"/>
                    </div>
                  </div>
                  
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Nombre Grupo (*)</label>
                      <input type="text" class="form-control" id="nombre_grupo" name="nombre_grupo" placeholder="Grupo"/>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Turno (*)</label>

                      <select type="text" class="form-control" id="turno_grupo" name="turno_grupo">
                         <option value="default">Seleccione el turno</option>
                        <option>Matutino</option>
                        <option>Vespertino</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4">
                              <div class="form-group">
                                 <label>Escuela (*)</label>
                                 <select name="id_escuela" id="id_escuela" class="form-control id_escuela">
                                    <option value="default">Seleccione  escuela</option>
                                 </select>
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
<div class="modal fade" id="modalActualizarGrupo" tabindex="-1" role="dialog" aria-labelledby="modalActualizarGrupo" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-warning">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between " >
            <h4 class="card-title">Grupo <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <!---->
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="formActualizarGrupo" name="formActualizarGrupo">
          <div class="card-body">
            <div class="card">
              <div class="card-header py-1 bg-warning">
                <h3 class="card-title">Información Grupo</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <input type="text" hidden class="form-control" id="id_grupoActualizar" name="id_grupoActualizar"/>
                  <input type="text"  hidden class="form-control" id="id_escuelaActualizar" name="id_escuelaActualizar"/>



                  <div class="col-lg-4">
                    <div class="form-group">
                     <label>Nombre Grupo (*)</label>
                     <input type="text" class="form-control" id="nombre_grupoActualizar" name="nombre_grupoActualizar" placeholder="grupo"/>
                   </div>
                 </div>
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label>Turno (*)</label>

                    <select type="text" class="form-control" id="turno_grupoActualizar" name="turno_grupoActualizar">
                     <option value="default">Seleccione el turno</option>
                     <option>Matutino</option>
                     <option>Vespertino</option>
                   </select>
                 </div>
               </div>
                <div class="col-lg-4">
                              <div class="form-group">
                                 <label>Escuela (*)</label>
                                 <select name="id_escuelaActualizar" id="id_escuelaActualizar" class="form-control id_escuela">
                                    <option value="default">Seleccione su escuela</option>
                                 </select>
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
<div class="modal fade" id="modalDetalleGrupo" tabindex="-1" role="dialog" aria-labelledby="modalDetalleGrupo" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-primary">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between " >
            <h4 class="card-title">Grupo <small> &nbsp;</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>
        <form role="form" id="formConsulta" name="formConsulta">
          <div class="card-body">
            <div class="card">
              <div class="card-header py-1 bg-primary">
                <h3 class="card-title">Información Grupo</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <input type="text" hidden class="form-control" id="id_grupoConsultar" name="id_grupoConsultar"/>
                  <input type="text" hidden class="form-control" id="id_escuelaConsultar" name="id_escuelaConsultar"/>


                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Grupo </label>
                     <input disabled name="nombre_grupoConsultar" id="nombre_grupoConsultar" class="form-control nombre_grupoConsultar">
                     </input>
                   </div>
                 </div>
                 <div class="col-lg-4">
                  <div class="form-group">
               <label>Turno </label>
                <input disabled name="turno_grupoConsultar" id="turno_grupoConsultar" class="form-control turno_grupoConsultar">
                 </div>
               </div>
                 <div class="col-lg-4">
                              <div class="form-group">
                                 <label>Escuela </label>
                                 <select disabled name="id_escuelaConsultar" id="id_escuelaConsultar" class="form-control id_escuela"></select>
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
<div class="modal fade" id="modalEliminarGrupo" tabindex="-1" role="dialog" aria-labelledby="modalEliminarGrupo" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form role="form" id="formEliminarGrupo" name="formActualizarGrupo">
        <input type="text" hidden id="idEliminarGrupo" name="idEliminarGrupo">
        <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Grupo?</div>
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

  $(document).ready(function (){
    mostrarGrupos();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
    llenarEscuela();

  });


const llenarEscuela = () => {
  $.ajax({
    type: "GET",
    url: "<?php echo constant('URL');?>escuela/read",
    async: false,
    dataType: "json",
    success: function (data) {
      $.each(data, function (key, registro) {
        var id = registro.id_escuela;
        var nombre = registro.nombre_escuela;
        $(".id_escuela").append('<option value=' + id + '>' + nombre + '</option>');
      });
    },
    error: function (data) {
      console.log(data);
    }
  });
}



  var mostrarGrupos = function() {
    var tableIncidencia = $('#dataTableGrupo').DataTable({
      "processing": true,
      "serverSide": false,
      "ajax": {
        "url": "<?php echo constant('URL');?>grupo/readTable"
      },
      "columns": [


      { "data": "nombre_grupo"},
      { "data": "turno_grupo"},
      {data:null,
        "defaultContent":
        `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleGrupo' title="Ver Detalles"><i class="fa fa-eye"></i></button>
        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarGrupo' title="Editar Datos"><i class="fa fa-edit"></i></button>
        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarGrupo' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
      }
      ],
      "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
           if (aiDisplay.length > 0) {
               $('body').removeClass('no-record');
           }
           else {
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
    obtenerdatosDT(tableIncidencia);
  }



  var obtenerdatosDT = function (table) {
    $('#dataTableGrupo tbody').on('click', 'tr', function() {
      var data = table.row(this).data();
      var idEliminar = $('#idEliminarGrupo').val(data.id_grupo);

      var id_grupo = $("#id_grupoActualizar").val(data.id_grupo);
      var id_escuela = $("#id_escuelaActualizar").val(data.id_escuela);
      var nombre_grupo = $("#nombre_grupoActualizar").val(data.nombre_grupo);
      var turno_grupo = $("#turno_grupoActualizar").val(data.turno_grupo);

      var idConsulta = $("#id_grupoConsultar").val(data.id_grupo);
      var id_escuela = $("#id_escuelaConsultar").val(data.id_escuela);
      var nombre_grupo = $("#nombre_grupoConsultar").val(data.nombre_grupo);
      var turno_grupo = $("#turno_grupoConsultar").val(data.turno_grupo);
    });
  }

  var enviarFormularioRegistrar = function () {
    $.validator.setDefaults({
      submitHandler: function () {
        var datos = $('#formRegistrarGrupo').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL');?>grupo/insert",
          data: datos,
          success: function (data) {
            if (data == 'ok') {
              Swal.fire(
                "¡Éxito!",
                "El grupo ha sido registrado de manera correcta",
                "success"
                ).then(function () {
                  window.location = "<?php echo constant('URL');?>grupo";
                })
              } else {
                Swal.fire(
                  "¡Error!",
                  "Ha ocurrido un error al registrar la grupo. " + data,
                  "error"
                  );
              }
            },
          });
      }
    });
    $('#formRegistrarGrupo').validate({
      rules: {
        id_grupo: {
          required: true,
          number: true
        },

        id_escuela: {
          required: true
        },

        nombre_grupo: {
          required: true
        },

        turno_grupo: {
          required: true
        }
      },
      messages: {
        id_grupo: {
          required: "Ingresa una matrícula",
          number: "Sólo números"
        },
        id_escuela: {
          required: "Ingresa un id escuela"
        },
        nombre_grupo: {
          required: "Ingresa un nombre "
        },
        turno_grupo: {
          required: "Ingresa turno"
        }


      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  }

  var enviarFormularioActualizar = function () {
    $.validator.setDefaults({
      submitHandler: function () {
        var datos = $('#formActualizarGrupo').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL');?>grupo/update",
          data: datos,
          success: function (data) {
            if (data == 'ok') {
              Swal.fire(
                "¡Éxito!",
                "El grupo ha sido Actualizado de manera correcta",
                "success"
                ).then(function () {
                  window.location = "<?php echo constant('URL');?>grupo";
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
    $('#formActualizarGrupo').validate({
      rules: {
        id_grupoActualizar: {
          required: true,
          number: true
        },


        id_escuelaActualizar: {
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
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  }

  var eliminarRegistro = function () {
    $( "#formEliminarGrupo" ).submit(function( event ) {
      event.preventDefault();
      var datos = $('#formEliminarGrupo').serialize();
      $.ajax({
        type: "POST",
        url: "<?php echo constant('URL');?>grupo/delete",
        data: datos,
        success: function (data) {
          if (data == 'ok') {
            Swal.fire(
              "¡Éxito!",
              "El grupo ha sido eliminado correctamente",
              "success"
              ).then(function () {
                window.location = "<?php echo constant('URL');?>grupo";
              })
            } else {
              Swal.fire (
                "¡Error!",
                "Ha ocurrido un error al eliminar el grupo. " + data,
                "error"
                );
            }
          },
        });
    });
  }


</script>