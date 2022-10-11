<?php
session_start();
if (!isset($_SESSION['tipo'])) {
   header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('profesor_alumno_consulta');
?>

<head>
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/plugins/fontawesome-free/css/all.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/dist/css/adminlte.min.css">
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/dist/css/adminlte.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/dist/css/adminlte.min.css">
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/perfilalumno.css">

</head>
<script src="js/sha1.js"></script>
<section class="content">
   <div class="container-fluid">
      <br>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3>Alumnos</h3>
               </div>
               <div class="card-body">
                  <table id="dataTableAlumno" name="dataTableAlumno" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                     <thead>
                        <tr>
                           <th class="img-fluid"style="width: 50px; height:50px">Foto </th>
                           <th>Nombre</th>
                           <th>Email</th>
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
<!--- Modals--->
<!----------------------------------- Modal DetalleAlumno------------------------>
<div class="modal fade" id="modalDetalleAlumno" tabindex="-1" role="dialog" aria-labelledby="modalDetalleAlumno" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="card-primary">
            <div class="card-header">
               <div class="d-sm-flex align-items-center justify-content-between ">
                  <h4 class="card-title">Alumno <small> &nbsp;</small></h4>
                  <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
               <!---->
            </div>
            <!-- /.card-header -->
            <!-- form start -->
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
                           <input type="text" hidden class="form-control" id="id_alumnoConsultar" name="id_alumnoConsultar" />
                           <input type="text" hidden class="form-control" id="id_usuarioConsultar" name="id_usuarioConsultar" />
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Nombre(s)</label>
                                 <input type="text" disabled class="form-control" id="nombre_alumnoConsultar" name="nombre_alumnoConsultar" placeholder="Introduce el nombre del alumno" />
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Apellido Paterno</label>
                                 <input type="text" disabled class="form-control" id="appaterno_alumnoConsultar" name="appaterno_alumnoConsultar" placeholder="Introduce el Apellido paterno" />
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Apellido Materno</label>
                                 <input type="text" disabled class="form-control" id="apmaterno_alumnoConsultar" name="apmaterno_alumnoConsultar" placeholder="Introduce el Apellido Materno" />
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Teléfono</label>
                                 <input type="text" disabled class="form-control" id="telefono_alumnoConsultar" name="telefono_alumnoConsultar" placeholder="Introduce el numero telefonico" />
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="text" disabled class="form-control" id="email_alumnoConsultar" name="email_alumnoConsultar" placeholder="Introduce el email_alumno" />
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card border-red">
                     <div class="card-header py-1 bg-primary">
                        <h3 class="card-title">Información Escolar</h3>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body border-primary">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Grupo</label>
                                 <select disabled name="id_grupoConsultar" id="id_grupoConsultar" class="form-control id_grupo">
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Escuela</label>
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
      </form>
   </div>
</div>
</div>
</div>
</div>
<?php
$menu->footer();
?>
<script src="<?php echo constant('URL') ?>public/plugins/inputmask/jquery.inputmask.min.js"></script>
<script>
   $(document).ready(function() {
      mostrarAlumnos();
      llenarGrupo();
      llenarEscuela();
   });

   $('[data-mask]').inputmask()

   function llenarGrupo() {
      $.ajax({
         type: "GET",
         url: "<?php echo constant('URL'); ?>grupo/read",
         async: false,
         dataType: "json",
         success: function(data) {
            //console.log('generos: ',data)
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


   function llenarEscuela() {
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



   function mostrarAlumnos() {
      var tableAlumno = $('#dataTableAlumno').DataTable({
         "processing": true,
         "serverSide": false,
         "ajax": {
            "url": "<?php echo constant('URL'); ?>alumno/readTableAlumnoProfesor"

         },
         "columns": [{
               defaultContent: "",
               "render": function(data, type, full, row) {

                  var fullnameImagen = full['appaterno_alumno'] + '_' + full['apmaterno_alumno'] + '_' + full['nombre_alumno'] + '/' + full['foto_alumno'];


                  var img = '<?php echo constant('URL') ?>public/alumno/' + fullnameImagen;

                  return '<center><img src="' + img + '"class="rounded-circle img-fluid " style="width: 50px; height: 50px;"/></center>';
               }
            },
            {
               defaultContent: "",
               "render": function(data, type, full) {
                  return full['nombre_alumno'] + ' ' + full['appaterno_alumno'] + ' ' + full['apmaterno_alumno'];
               }
            },

            {
               "data": "email_alumno"
            },
            {
               data: null,
               "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleAlumno' title="Ver Detalles"><i class="fa fa-eye"></i></button>`
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
      obtenerform_dataDT(tableAlumno);
   }


   function obtenerform_dataDT(table) {
      $('#dataTableAlumno tbody').on('click', 'tr', function() {
         var data = table.row(this).data();
         console.log(data);
         var idConsulta = $("#id_alumnoConsultar").val(data.id_alumno);
         var id_usuarioConsulta = $("#id_usuarioConsultar").val(data.id_usuario);
         var id_grupoConsulta = $("#id_grupoConsultar option[value=" + data.id_grupo + "]").attr("selected", true);
         var id_escuelaConsulta = $("#id_escuelaConsultar option[value=" + data.id_escuela + "]").attr("selected", true);
         var nombre_alumnoConsulta = $("#nombre_alumnoConsultar").val(data.nombre_alumno);
         var appaterno_alumnoConsulta = $("#appaterno_alumnoConsultar").val(data.appaterno_alumno);
         var apmaterno_alumnoConsulta = $("#apmaterno_alumnoConsultar").val(data.apmaterno_alumno);
         var telefono_alumnoConsulta = $("#telefono_alumnoConsultar").val(data.telefono_alumno);
         var email_alumnoConsulta = $("#email_alumnoConsultar").val(data.email_alumno);
      });
   }
</script>