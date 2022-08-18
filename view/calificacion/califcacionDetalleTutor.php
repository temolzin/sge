<?php
session_start();
if(!isset($_SESSION['tipo'])){
   header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('calificacion_tutor_consulta');
?>
<section class="content">
   <div class="container-fluid">
      <br>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3>Calificaciones Del Alumno</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="dataTableCalificacionAlumnoTutor" name="dataTableCalificacionAlumnoTutor" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
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
<!--------------------------------------------------------- Modal DetalleProfesor----------------------------------------------->
<div class="modal fade" id="modalDetalleCalificacion" tabindex="-1" role="dialog" aria-labelledby="modalDetalleCalificacion" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="card-primary">
            <div class="card-header">
               <div class="d-sm-flex align-items-center justify-content-between ">
                  <h4 class="card-title">Calificación <small> &nbsp;</small></h4>
                  <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
            </div>
            <form role="form" id="formConsulta" name="formConsulta">
               <div class="card-body">
                  <div class="card">
                     <div class="card-header py-1 bg-primary">
                        <h3 class="card-title">Calificaciones</h3>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body border-primary">
                        <div class="row">
                           <input type="text" hidden class="form-control" id="id_calificacionConsultar" name="id_calificacionConsultar" />
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Profesor</label>
                                 <select disabled name="id_profesorConsultar" id="id_profesorConsultar" class="form-control id_profesor">
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Alumno</label>
                                 <select disabled name="id_alumnoConsultar" id="id_alumnoConsultar" class="form-control id_alumno">
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Parcial</label>
                                 <select disabled name="id_parcialConsultar" id="id_parcialConsultar" class="form-control id_parcial">
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Materia</label>
                                 <select disabled name="id_materiaConsultar" id="id_materiaConsultar" class="form-control id_materia">
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Calificación</label>
                                 <textarea disabled type="text" id="calificacionConsultar" name="calificacionConsultar" class="form-control" placeholder="Enter ..."></textarea>
                              </div>
                           </div>
                           <div class="col-lg-9">
                              <div class="form-group">
                                 <label>Observación</label>
                                 <textarea disabled type="text" id="observacion_calificacionConsultar" name="observacion_calificacionConsultar" class="form-control" placeholder="Enter ..."></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Fecha</label>
                                 <input disabled type="date" class="form-control" id="fecha_calificacionConsultar" name="fecha_calificacionConsultar" placeholder="Fecha" />
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
<?php
$menu->footer();
?>
<script>
   $(document).ready(function() {
      mostrarCalificaciones();
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
      var tableCalificacion = $('#dataTableCalificacionAlumnoTutor').DataTable({
         "processing": true,
         "serverSide": false,
         "ajax": {
            "url": "<?php echo constant('URL'); ?>calificacion/readTableCalificacionTutor"
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
               "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleCalificacion' title="Ver Detalles"><i class="fa fa-eye"></i></button> `
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
      $('#dataTableCalificacionAlumnoTutor tbody').on('click', 'tr', function() {
         var data = table.row(this).data();

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
</script>