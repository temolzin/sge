    <?php
    session_start();
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('incidencia');
    ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-right">
            <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarIncidencia'> <i class="fas fa-plus-circle"></i> Registrar Incidencias </button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <div class="card">
             <div class="card-header"  >
              <h3 class="card-header">Datos Registrados De Incidencias</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dataTableIncidencias" name="dataTableIncidencias" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Profesor</th>
                    <th>Alumno</th>
                    <th>Grupo</th>
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
  <!--------------------------------------------------------- Modal Registrar----------------------------------------------->
  <div class="modal fade" id="modalRegistrarIncidencia" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarIncidencia" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="card-success">
          <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between " >
              <h4 class="card-title">Indicencias <small> &nbsp;(*) Campos requeridos</small></h4>
              <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <!---->

          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="formRegistrarIncidencias" name="formRegistrarIncidencias" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="text" hidden class="form-control" id="id_incidencia" name="id_incidencia"/>
                  </div>
                </div>
              </div>



              <div class="card border-red">
                <div class="card-header py-1 bg-secondary"> 
                  <h3 class="card-title">Información Incidencias</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body border-secondary">
                  

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Seleccione Alumno (*)</label>
                        <select name="id_alumno" id="id_alumno" class="form-control id_alumno">
                          <option value="default">Seleccione el alumno</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Seleccione Profesor (*)</label>
                        <select name="id_profesor" id="id_profesor" class="form-control id_profesor">
                          <option value="default">Seleccione el profesor</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Seleccione Grupo (*)</label>
                        <select name="id_grupo" id="id_grupo" class="form-control id_grupo">
                          <option value="default">Seleccione el grupo</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Ingrese Fecha (*)</label>
                          <input type="date" class="form-control" id="fechaincidencia_incidencia" name="fechaincidencia_incidencia" placeholder="Fecha"/>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <label>Ingrese Hora (*)</label>

                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                              <input type="text"  id="horaincidencia_incidencia" name="horaincidencia_incidencia" class="form-control datetimepicker-input" data-target="#timepicker"/>
                              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Ingrese Descripción (*)</label> 
                        <textarea  type="text" id="descripcion_incidencia" name="descripcion_incidencia" class="form-control" placeholder="Ingrese descripción del incidente..."></textarea>
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
        </form>
      </div>
    </div>
  </div>
</div>

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarIncidencia" tabindex="-1" role="dialog" aria-labelledby="modalActualizarIncidencia" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-warning">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between " >
            <h4 class="card-title">Incidencias <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <!---->
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="formActualizarIncidencia" name="formActualizarIncidencia">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <input type="text" hidden class="form-control" id="id_incidenciaActualizar" name="id_incidenciaActualizar"/>
                </div>
              </div>
            </div>

           <!--  
           -->



           <div class="card border-red">
            <div class="card-header py-1 bg-warning"> 
              <h3 class="card-title">Información Incidencias</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body border-secondary">
              <div class="row">


                <div class="col-lg-12">
                  <div class="form-group">
                    <label> Alumno (*)</label>
                    <select name="id_alumnoActualizar" id="id_alumnoActualizar" class="form-control id_alumno">
                      <option value="default">Seleccione el alumno</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label> Profesor (*)</label>
                    <select name="id_profesorActualizar" id="id_profesorActualizar" class="form-control id_profesor">
                      <option value="default">Seleccione el profesor</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label> Grupo (*)</label>
                    <select name="id_grupoActualizar" id="id_grupoActualizar" class="form-control id_grupo">
                      <option value="default">Seleccione el grupo</option>
                    </select>
                  </div>
                </div>
              </div>    
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label> Fecha (*)</label>
                    <input type="date" class="form-control" id="fechaincidencia_incidenciaActualizar" name="fechaincidencia_incidenciaActualizar" placeholder="Fecha"/>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label> Hora (*)</label>

                      <div class="input-group date" id="timepicker" data-target-input="nearest">
                        <input type="text"  id="horaincidencia_incidenciaActualizar" name="horaincidencia_incidenciaActualizar" class="form-control datetimepicker-input" data-target="#timepicker"/>
                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                      </div>

                    </div>

                  </div>
                </div>
              </div>


              <div class="col-sm-12">

                <div class="form-group">
                 <label> Descripción (*)</label> 
                 <textarea type="text" id="descripcion_incidenciaActualizar" name="descripcion_incidenciaActualizar" class="form-control" placeholder="Enter ..."></textarea> 
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
<div class="modal fade" id="modalDetalleIncidencia" tabindex="-1" role="dialog" aria-labelledby="modalDetalleIncidencia" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-primary">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between " >
            <h4 class="card-title">Incidencia <small> &nbsp;</small></h4>
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
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <input type="text" hidden class="form-control" id="id_incidenciaConsultar" name="id_incidenciaConsultar"/>


       <div class="col-lg-12">
                    <div class="form-group">
                      <label>Alumno</label>
                      <select  disabled name="id_alumnoConsultar" id="id_alumnoConsultar" class="form-control id_alumno">
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Profesor</label>
                      <select   disabled name="id_profesorConsultar" id="id_profesorConsultar" class="form-control id_profesor">
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Grupo </label>
                      <select  disabled  name="id_grupoConsultar" id="id_grupoConsultar" class="form-control id_grupo">
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Fecha</label>
                      <input  disabled type="date" class="form-control" id="fechaincidencia_incidenciaConsultar" name="fechaincidencia_incidenciaConsultar" placeholder="Fecha"/>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Hora</label>

                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                          <input  disabled type="text"  id="horaincidencia_incidenciaConsultar" name="horaincidencia_incidenciaConsultar" class="form-control datetimepicker-input" data-target="#timepicker"/>
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
                     <textarea    disabled type="text" id="descripcion_incidenciaConsultar" name="descripcion_incidenciaConsultar" class="form-control" placeholder="Enter ..."></textarea>
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
<div class="modal fade" id="modalEliminarIncidencia" tabindex="-1" role="dialog" aria-labelledby="modalEliminarIncidencia" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form role="form" id="formEliminarIncidencia" name="formActualizarIncidencia">
        <input type="text" hidden id="idEliminarIncidencia" name="idEliminarIncidencia">
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

      $(document).ready(function (){
        mostrarIncidencias();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        llenarGrupo();
        llenarProfesor();
        llenarAlumno();
      });
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      const llenarGrupo = () => {
        $.ajax({
          type: "GET",
          url: "<?php echo constant('URL');?>grupo/read",
          async: false,
          dataType: "json",
          success: function(data){
              //console.log('generos: ',data)
              $.each(data,function(key, registro) {
               var id = registro.id_grupo;
               var nombre = registro.nombre_grupo;
               $(".id_grupo").append('<option value='+id+'>'+nombre+'</option>');
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
          url: "<?php echo constant('URL');?>profesor/read",
          async: false,
          dataType: "json",
          success: function(data){
            $.each(data,function(key, registro) {
              var id = registro.id_profesor;
              var nombre = registro.nombre_profesor;
              var appat = registro.appaterno_profesor;
              var apmat = registro.apmaterno_profesor;
              $(".id_profesor").append('<option value='+id+'>'+nombre+' '+appat+' '+apmat+'</option>');

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
          url: "<?php echo constant('URL');?>alumno/read",
          async: false,
          dataType: "json",
          success: function(data){
            $.each(data,function(key, registro) {
              var id = registro.id_alumno;
              var nombre = registro.nombre_alumno;
              var appat = registro.appaterno_alumno;
              var apmat = registro.apmaterno_alumno;
              $(".id_alumno").append('<option value='+id+'>'+nombre+' '+appat+' '+apmat+'</option>');

            });
          },
          error: function(data) {
            console.log(data);
          }
        });
      }


      var mostrarIncidencias = function() {
        var tableIncidencia = $('#dataTableIncidencias').DataTable({
          "processing": true,
          "serverSide": false,
          "ajax": {
            "url": "<?php echo constant('URL');?>incidencia/readTable"
          },
          "columns": [
          { defaultContent: "",
          "render": function ( data, type, full ) {
            return full['nombre_profesor'] + ' ' + full['appaterno_profesor']+ ' ' + full['apmaterno_profesor'];}  },
            { defaultContent: "",
            "render": function ( data, type, full ) {
              return full['nombre_alumno'] + ' ' + full['appaterno_alumno']+ ' ' + full['apmaterno_alumno'];}  },

              { "data": "nombre_grupo"},
              { "data": "descripcion_incidencia"},
              {data:null,
                "defaultContent":
                `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleIncidencia' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarIncidencia' title="Editar Datos"><i class="fa fa-edit"></i></button>
                <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarIncidencia' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
        $('#dataTableIncidencias tbody').on('click', 'tr', function() {
          var data = table.row(this).data();
          var idEliminar = $('#idEliminarIncidencia').val(data.id_incidencia);

          var idActualizar = $("#id_incidenciaActualizar").val(data.id_incidencia);
          var id_alumno = $("#id_alumnoActualizar").val(data.id_alumno);
          var id_profesor = $("#id_profesorActualizar").val(data.id_profesor);
          var id_grupo = $("#id_grupoActualizar").val(data.id_grupo);
          var fechaincidencia_incidencia = $("#fechaincidencia_incidenciaActualizar").val(data.fechaincidencia_incidencia);
          var horaincidencia_incidencia = $("#horaincidencia_incidenciaActualizar").val(data.horaincidencia_incidencia);
          var descripcion_incidencia = $("#descripcion_incidenciaActualizar").val(data.descripcion_incidencia);

          var idConsulta = $("#id_incidenciaConsultar").val(data.id_incidencia);
          var id_alumnoConsulta = $("#id_alumnoConsultar").val(data.id_alumno);
          var id_profesorConsulta = $("#id_profesorConsultar").val(data.id_profesor);
          var id_grupoConsulta = $("#id_grupoConsultar").val(data.id_grupo);
          var fechaincidencia_incidenciaConsulta = $("#fechaincidencia_incidenciaConsultar").val(data.fechaincidencia_incidencia);
          var horaincidencia_incidenciaConsulta = $("#horaincidencia_incidenciaConsultar").val(data.horaincidencia_incidencia);   
          var descripcion_incidenciaConsulta = $("#descripcion_incidenciaConsultar").val(data.descripcion_incidencia); 
        });
      }

      var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
          submitHandler: function () {
            var datos = $('#formRegistrarIncidencias').serialize();
            $.ajax({
              type: "POST",
              url: "<?php echo constant('URL');?>incidencia/insert",
              data: datos,
              success: function (data) {
                if (data == 'ok') {
                  Swal.fire(
                    "¡Éxito!",
                    "La incidencia ha sido registrado de manera correcta",
                    "success"
                    ).then(function () {
                      window.location = "<?php echo constant('URL');?>incidencia";
                    })
                  } else {
                    Swal.fire(
                      "¡Error!",
                      "Ha ocurrido un error al registrar la incidencia. " + data,
                      "error"
                      );
                  }
                },
              });
          }
        });
        $('#formRegistrarIncidencias').validate({
          rules: {
            id_incidencia: {
              required: true,
              number: true
            },
            id_incidencia: {
              required: true
            },
            id_profesor: {
              required: true
            },
            descripcion_incidencia: {
              required: true
            }
          },
          messages: {
            id_incidencia: {
              required: "Ingresa una matrícula",
              number: "Sólo números"
            },
            id_incidencia: {
              required: "Ingresa un id_incidencia"
            },
            id_profesor: {
              required: "Ingresa un id_profesor"
            },
            descripcion_incidencia: {
              required: "Ingresa un descripcion_incidencia" 
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
            var datos = $('#formActualizarIncidencia').serialize();
            $.ajax({
              type: "POST",
              url: "<?php echo constant('URL');?>incidencia/update",
              data: datos,
              success: function (data) {
                if (data == 'ok') {
                  Swal.fire(
                    "¡Éxito!",
                    "La incidencia ha sido Actualizado de manera correcta",
                    "success"
                    ).then(function () {
                      window.location = "<?php echo constant('URL');?>incidencia";
                    })
                  } else {
                    Swal.fire(
                      "¡Error!",
                      "Ha ocurrido un error al Actualizar el incidencia. " + data,
                      "error"
                      );
                  }
                },
              });
          }
        });
        $('#formActualizarIncidencia').validate({
          rules: {
            id_incidenciaActualizar: {
              required: true,
              number: true
            },


            id_profesorActualizar: {
              required: true
            },
            descripcion_incidenciaActualizar: {
              required: true
            }

          },
          messages: {
            id_incidenciaActualizar: {
              required: "Ingresa una matrícula",
              number: "Sólo números"
            },


            id_profesorActualizar: {
              required: "Ingresa un id_profesor"
            },
            descripcion_incidenciaActualizar: {
              required: "Ingresa un descripcion_incidencia"
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
        $( "#formEliminarIncidencia" ).submit(function( event ) {
          event.preventDefault();
          var datos = $('#formEliminarIncidencia').serialize();
          $.ajax({
            type: "POST",
            url: "<?php echo constant('URL');?>incidencia/delete",
            data: datos,
            success: function (data) {
              if (data == 'ok') {
                Swal.fire(
                  "¡Éxito!",
                  "La incidencia ha sido eliminado correctamente",
                  "success"
                  ).then(function () {
                    window.location = "<?php echo constant('URL');?>incidencia";
                  })
                } else {
                  Swal.fire (
                    "¡Error!",
                    "Ha ocurrido un error al eliminar el incidencia. " + data,
                    "error"
                    );
                }
              },
            });
        });
      }


    </script>