    <?php
        session_start();
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('Grado Académico');
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-right">
            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarGradoAcademico'> <i class="fas fa-plus-circle"></i> Registrar Grados Académicos</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <div class="card">
             <div class="card-header" >
              <h3 class="card-header">Grados Académicos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dataTableGradoAcademico" name="dataTableGradoAcademico" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Observaciones/Detalles</th>
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
  <div class="modal fade" id="modalRegistrarGradoAcademico" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarGradoAcademico" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="card-success">
          <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between ">
              <h4 class="card-title">Grado Académico <small> &nbsp;(*) Campos requeridos</small></h4>
              <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
          </div>
          <form role="form" id="formRegistrarGradoAcademico" name="formRegistrarGradoAcademico">
            <div class="card-body">
             <div class="card">
              <div class="card-header py-1 bg-secondary">
                <h3 class="card-title">Grado Académico</h3>
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
                      <input type="text" hidden class="form-control" id="id_grado_academico" name="id_grado_academico"/>
                    </div>
                  </div>
                  
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Nombre Grado Académico (*)</label>
                      <input type="text" class="form-control" id="nombre_grado_academico" name="nombre_grado_academico" placeholder="Grado Academico"/>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Observaciones/detalles (*)</label>
                      <input type="text" class="form-control" id="observacion_gradoacademico" name="observacion_gradoacademico" placeholder="Grado Academico"/>
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
                </form>
            </div>
        </div>
    </div>
</div>


<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarGradoAcademico" tabindex="-1" role="dialog" aria-labelledby="modalActualizarGradoAcademico" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-warning">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between " >
            <h4 class="card-title">Grado Académico <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <!---->
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="formActualizarGradoAcademico" name="formActualizarGradoAcademico">
          <div class="card-body">
            <div class="card">
              <div class="card-header py-1 bg-warning">
                <h3 class="card-title">Información Grado Académico</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <input type="text" hidden class="form-control" id="id_grado_academicoActualizar" name="id_grado_academicoActualizar"/>
                  <div class="col-lg-6">
                    <div class="form-group">
                     <label>Nombre Grado Académico (*)</label>
                     <input type="text" class="form-control" id="nombre_grado_academicoActualizar" name="nombre_grado_academicoActualizar" placeholder="Nombre"/>
                   </div>
                 </div>
                 <div class="col-lg-6">
                    <div class="form-group">
                     <label>Observaciones/detalles (*)</label>
                     <input type="text" class="form-control" id="observacion_gradoacademicoActualizar" name="observacion_gradoacademicoActualizar" placeholder="Observaciones"/>
                   </div>
                 </div>
            </div>
                    </div>
                </div>
            </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--------------------------------------------------------- Modal DetalleGradoAcademico----------------------------------------------->
<div class="modal fade" id="modalDetalleGradoAcademico" tabindex="-1" role="dialog" aria-labelledby="modalDetalleGradoAcademico" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-primary">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between " >
            <h4 class="card-title">Grado Académico<small> &nbsp;</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>
        <form role="form" id="formConsulta" name="formConsulta">
          <div class="card-body">
            <div class="card">
              <div class="card-header py-1 bg-primary">
                <h3 class="card-title">Información Grado Académico</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <input type="text" hidden class="form-control" id="id_grado_academicoConsultar" name="id_grado_academicoConsultar"/>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Grado Académico </label>
                     <input disabled name="nombre_grado_academicoConsultar" id="nombre_grado_academicoConsultar" class="form-control nombre_grado_academicoConsultar">
                     </input>
                   </div>
                 </div>
                 <div class="col-lg-6">
                    <div class="form-group">
                      <label>Observaciones/detalles </label>
                     <input disabled name="observacion_gradoacademicoConsultar" id="observacion_gradoacademicoConsultar" class="form-control observacion_gradoacademicoConsultar">
                     </input>
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
<div class="modal fade" id="modalEliminarGradoAcademico" tabindex="-1" role="dialog" aria-labelledby="modalEliminarGradoAcademico" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form role="form" id="formEliminarGradoAcademico" name="formEliminarGradoAcademico">
        <input type="text" hidden id="idEliminarGradoAcademico" name="idEliminarGradoAcademico">
        <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Grado Academico?</div>
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
    mostrarGrados();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();

  });
  var mostrarGrados = function() {
    var tableGradoAcademico = $('#dataTableGradoAcademico').DataTable({
      "processing": true,
      "serverSide": false,
      "ajax": {
        "url": "<?php echo constant('URL');?>gradoAcademico/readTable"
      },
      "columns": [

      { "data": "nombre_grado_academico"},
      {"data": "observacion_gradoacademico"},

      {data:null,
        "defaultContent":
        `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleGradoAcademico' title="Ver Detalles"><i class="fa fa-eye"></i></button>
        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarGradoAcademico' title="Editar Datos"><i class="fa fa-edit"></i></button>
        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarGradoAcademico' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
      }],
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

    obtenerdatosDT(tableGradoAcademico);
    }
  var obtenerdatosDT = function (table) {
    $('#dataTableGradoAcademico tbody').on('click','tr', function() {
      var data = table.row(this).data();
      var idEliminar = $('#idEliminarGradoAcademico').val(data.id_grado_academico);

      var id_grado_academico = $("#id_grado_academicoActualizar").val(data.id_grado_academico);
      var nombre_grado_academico = $("#nombre_grado_academicoActualizar").val(data.nombre_grado_academico);
      var observacion_gradoacademico = $("#observacion_gradoacademicoActualizar").val(data.observacion_gradoacademico);
    
      var idConsulta = $("#id_grado_academicoConsultar").val(data.id_grado_academico);
      var nombre_grado_academicoConsultar = $("#nombre_grado_academicoConsultar").val(data.nombre_grado_academico);
      var observacion_gradoacademicoConsultar = $("#observacion_gradoacademicoConsultar").val(data.observacion_gradoacademico); 
    });
  }

  var enviarFormularioRegistrar = function () {
    $.validator.setDefaults({
      submitHandler: function () {
        var datos = $('#formRegistrarGradoAcademico').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL');?>gradoAcademico/insert",
          data: datos,
          success: function (data) {
            if (data == 'ok') {
              Swal.fire(
                "¡Éxito!",
                "El grado academico ha sido registrado de manera correcta",
                "success"
                ).then(function () {
                  window.location = "<?php echo constant('URL');?>gradoAcademico";
                })
              } else {
                Swal.fire(
                  "¡Error!",
                  "Ha ocurrido un error al registrar el grado academico. " + data,
                  "error"
                  );
              }
            },
          });
      }
    });
    $('#formRegistrarGradoAcademico').validate({
      rules: {
        id_grado_academico: {
          required: true,
          number: true
        },
        nombre_grado_academico: {
          required: true
        },
        observacion_gradoacademico: {
          required: true
        }
      },
      messages: {
        id_grado_academico: {
          required: "Ingresa una matrícula",
          number: "Sólo números"
        },
        nombre_grado_academico: {
          required: "Ingresa un nombre "
        },
        observacion_gradoacademico: {
          required: "Ingresa las observaciones o detalles "
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
        var datos = $('#formActualizarGradoAcademico').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL');?>gradoAcademico/update",
          data: datos,
          success: function (data) {
            if (data == 'ok') {
              Swal.fire(
                "¡Éxito!",
                "El grado academico ha sido Actualizado de manera correcta",
                "success"
                ).then(function () {
                  window.location = "<?php echo constant('URL');?>gradoAcademico";
                })
              } else {
                Swal.fire(
                  "¡Error!",
                  "Ha ocurrido un error al Actualizar el grado academico. " + data,
                  "error"
                  );
              }
            },
          });
      }
    });
    $('#formActualizarGradoAcademico').validate({
      rules: {
        id_grado_academicoActualizar: {
          required: true,
          number: true
        },
        nombre_grado_academicoActualizar: {
          required: true
        },
        observacion_gradoacademicoActualizar: {
          required: true
        }
      },
      messages: {
        id_grado_academicoActualizar: {
          required: "Ingresa una id",
          number: "Sólo números"
        },
        nombre_grado_academicoActualizar: {
          required: "Ingresa un nombre"
        },
        observacion_gradoacademicoActualizar: {
          required: "Ingresa las observaciones o detalles"
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
    $( "#formEliminarGradoAcademico" ).submit(function( event ) {
      event.preventDefault();
      var datos = $('#formEliminarGradoAcademico').serialize();
      $.ajax({
        type: "POST",
        url: "<?php echo constant('URL');?>gradoAcademico/delete",
        data: datos,
        success: function (data) {
          if (data == 'ok') {
            Swal.fire(
              "¡Éxito!",
              "El grado academico ha sido eliminado correctamente",
              "success"
              ).then(function () {
                window.location = "<?php echo constant('URL');?>gradoAcademico";
              })
            } else {
              Swal.fire (
                "¡Error!",
                "Ha ocurrido un error al eliminar el grado academico. " + data,
                "error"
                );
            }
          },
        });
    });
  }


</script>