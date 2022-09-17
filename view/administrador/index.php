 <?php @session_start();?>
 <?php
  if(session_id() == ''){
      session_start();
  }
  if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
  }
  require 'view/menu.php';
  $menu = new Menu();
  $menu->header('administrador');
  ?>
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12 text-right">
         <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarAdministrador'> <i class="fas fa-plus-circle"></i> Registrar Administrador
         </button>
       </div>
     </div>
     <br>
     <div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h3> Administradores</h3>
           </div>
           <div class="card-body">
             <table id="dataTableAdministrador" name="dataTableAdministrador" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
               <thead>
                 <tr>
                   <th style="width: 20px;">Foto </th>
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

 <!--- Modal Registrar--->
 <div class="modal fade" id="modalRegistrarAdministrador" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarAdministrador" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="card-success">
         <div class="card-header">
           <div class="d-sm-flex align-items-center justify-content-between ">
             <h4 class="card-title">Administrador <small> &nbsp;(*) Campos requeridos</small></h4>
             <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
         </div>
         <form role="form" id="formRegistrarAdministrador" name="formRegistrarAdministrador">
           <div class="card-body">
             <div class="card">
               <div class="card-header py-1 bg-secondary">
                 <h3 class="card-title">Datos Generales</h3>
                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                 </div>
               </div>
               <div class="card-body border-primary">
                 <div class="row">
                   <div class="col-12 col-sm-12">
                     <div class="form-group">
                       <input type="number" value="1" hidden class="form-control" id="id_tipo_usuario" name="id_tipo_usuario" />
                     </div>
                   </div>
                   <div class="col-lg-12">
                     <span><label>Foto Administrador (*)</label></span>
                     <div class="form-group input-group">
                       <div class="custom-file">
                         <input type="file" accept="image/*" class="custom-file-input" name="foto_administrador" id="foto_administrador" lang="es">
                         <label class="custom-file-label" for="imagen">Selecciona Imagen</label>
                       </div>
                     </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="form-group">
                       <label>Usuario (*)</label>
                       <input type="text" class="form-control" id="username_usuario" name="username_usuario" placeholder="Usuario" />
                     </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="form-group">
                       <label>Contraseña (*)</label>
                       <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Contraseña" minlength="8" maxlength="12" pattern="[A-Za-z]{8,12}" title="Introduce 8 caracteres mayusculas/minusculas/numeros" />
                     </div>
                   </div>

                   <div class="col-lg-4">
                     <label>Nombre(s) (*)</label>
                     <div class="input-group mb-3">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fas fa-user"></i></span>
                       </div>
                       <input onkeypress="return soloLetras(event)" type="name" class="form-control" id="nombre_administrador" name="nombre_administrador" placeholder="Introduce el Nombre" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Apellido Paterno (*)</label>
                       <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="appaterno_administrador" name="appaterno_administrador" placeholder="Introduce el Apellido Paterno" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Apellido Materno (*)</label>
                       <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="apmaterno_administrador" name="apmaterno_administrador" placeholder="Introduce el Apellido Materno" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <label>Teléfono (*)</label>
                     <div class="input-group-prepend">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fas fa-phone"></i></span>
                       </div>
                       <input type="text" id="telefono_administrador" name="telefono_administrador" class="form-control" data-inputmask='"mask": "(999) 999-9999"' placeholder="Telefono">
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <label>Email (*)</label>
                     <div class="input-group-prepend">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                       </div>
                       <input type="email" class="form-control" id="email_administrador" name="email_administrador" placeholder="Eje. usuario@gmail.com etc" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Fecha Nacimiento (*)</label>
                       <input type="date" class="form-control" id="fechanacimiento_administrador" name="fechanacimiento_administrador" placeholder="Introduce la fecha de nacimiento" />
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

 <!----------------------------------------------- Modal Actualizar----------------------------------------------->
 <div class="modal fade" id="modalActualizarAdministrador" tabindex="-1" role="dialog" aria-labelledby="modalActualizarAdministrador" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="card-warning">
         <div class="card-header">
           <div class="d-sm-flex align-items-center justify-content-between ">
             <h4 class="card-title">Administrador <small> &nbsp;(*) Campos requeridos</small></h4>
             <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
         </div>
         <form role="form" id="formActualizarAdministrador" name="formActualizarAdministrador">
           <div class="card-body">
             <div class="card">
               <div class="card-header py-1 bg-warning">
                 <h3 class="card-title">Datos Generales</h3>
                 <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                 </div>
               </div>
               <div class="card-body border-primary">
                 <div class="row">
                   <input type="text" hidden class="form-control" id="id_administradorActualizar" name="id_administradorActualizar" />
                   <input type="text" hidden class="form-control" id="id_usuarioActualizar" name="id_usuarioActualizar" placeholder="Introduce idusuario" />
                   <div class="col-lg-12">
                     <span><label>Foto administrador (*)</label></span>
                     <br>
                     <div class="form-group input-group">
                       <div class="custom-file">
                         <input type="file" accept="image/*" class="custom-file-input" name="foto_administradorActualizar" id="foto_administradorActualizar" lang="es">
                         <label id="foto_administradorActualizar" class="custom-file-label" name="foto_administradorActualizar" id="foto_administradorActualizar" for="imagen">Selecciona Imagen</label>
                       </div>
                     </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="form-group">
                       <label>Usuario</label>
                       <input type="text" class="form-control" id="username_usuarioActualizar" name="username_usuarioActualizar" placeholder="Usuario" />
                     </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="form-group">
                       <label>Contraseña</label>
                       <input type="password" class="form-control" id="password_usuarioActualizar" name="password_usuarioActualizar" placeholder="Contraseña" />
                     </div>
                   </div>

                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Nombre(s)</label>
                       <div class="input-group mb-3">
                         <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-user"></i></span>
                         </div>
                         <input onkeypress="return soloLetras(event)" type="text" class="form-control" id="nombre_administradorActualizar" name="nombre_administradorActualizar" placeholder="Introduce el nombre del administrador" />
                       </div>
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Apellido Paterno</label>
                       <input onkeypress="return soloLetras(event)" type="text" class="form-control" id="appaterno_administradorActualizar" name="appaterno_administradorActualizar" placeholder="Introduce el Apellido paterno" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Apellido Materno</label>
                       <input onkeypress="return soloLetras(event)" type="text" class="form-control" id="apmaterno_administradorActualizar" name="apmaterno_administradorActualizar" placeholder="Introduce el Apellido materno" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Teléfono</label>
                       <div class="input-group-prepend">
                         <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-phone"></i></span>
                         </div>
                         <input type="text" class="form-control" id="telefono_administradorActualizar" name="telefono_administradorActualizar" placeholder="Introduce el numero telefonico" />
                       </div>
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Email</label>
                       <div class="input-group-prepend">
                         <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                         </div>
                         <input type="text" class="form-control" id="email_administradorActualizar" name="email_administradorActualizar" placeholder="Introduce el tu correo" />
                       </div>
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Fecha Nacimiento</label>
                       <input type="date" class="form-control" id="fechanacimiento_administradorActualizar" name="fechanacimiento_administradorActualizar" placeholder="Introduce la fecha de nacimiento" />
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

 <!--------------------------------------------------------- Modal DetalleAdministrador----------------------------------------------->
 <div class="modal fade" id="modalDetalleAdministrador" tabindex="-1" role="dialog" aria-labelledby="modalDetalleAdministrador" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="card-primary">
         <div class="card-header">
           <div class="d-sm-flex align-items-center justify-content-between ">
             <h4 class="card-title">Administrador <small> &nbsp;</small></h4>
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
               </div>
               <div class="card-body border-primary">
                 <div class="row">
                   <input type="text" hidden class="form-control" id="id_administradorConsultar" name="id_administradorConsultar" />
                   <input type="text" hidden class="form-control" id="id_usuarioConsultar" name="id_usuarioConsultar" />
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Usuario</label>
                       <input disabled type="text" class="form-control" id="username_usuarioConsultar" name="username_usuarioConsultar" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Contraseña</label>
                       <input disabled type="password" class="form-control" id="password_usuarioConsultar" name="password_usuarioConsultar" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Nombre(s)</label>
                       <input type="text" disabled class="form-control" id="nombre_administradorConsultar" name="nombre_administradorConsultar" placeholder="Introduce el nombre del administrador" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Apellido Paterno</label>
                       <input type="text" disabled class="form-control" id="appaterno_administradorConsultar" name="appaterno_administradorConsultar" placeholder="Introduce el Apellido paterno" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Apellido Materno</label>
                       <input type="text" disabled class="form-control" id="apmaterno_administradorConsultar" name="apmaterno_administradorConsultar" placeholder="Introduce el Apellido Materno" />
                     </div>
                   </div>
                   <div class="col-lg-4">
                     <div class="form-group">
                       <label>Teléfono</label>
                       <input type="text" disabled class="form-control" id="telefono_administradorConsultar" name="telefono_administradorConsultar" placeholder="Introduce el numero telefonico" />
                     </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="form-group">
                       <label>Email</label>
                       <input type="text" disabled class="form-control" id="email_administradorConsultar" name="email_administradorConsultar" placeholder="Introduce el email_administrador" />
                     </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="form-group">
                       <label>Fecha Nacimiento</label>
                       <input type="date" disabled class="form-control" id="fechanacimiento_administradorConsultar" name="fechanacimiento_administradorConsultar" placeholder="Introduce la fecha de nacimiento" />
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

 <!-- **** Modal Eliminar Administrador *******-->
 <div class="modal fade" id="modalEliminarAdministrador" tabindex="-1" role="dialog" aria-labelledby="modalEliminarAdministrador" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header bg-danger">
         <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <form role="form" id="formEliminarAdministrador" name="formActualizarAdministrador">
         <input type="text" hidden id="idEliminarAdministrador" name="idEliminarAdministrador">
         <input type="text" hidden id="idEliminarUsuario" name="idEliminarUsuario">
         <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Administrador?</div>
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

 <script src="<?php constant('URL'); ?>public/plugins/inputmask/jquery.inputmask.min.js"></script>
 <script>
   var findCp = function(codigoPostal) {
     var codigoLeido = leerCodigoPostal(codigoPostal.value);
     $('#selectEstado').empty();
     for (let i in codigoLeido) {
       $('#selectEstado').append('<option value=' + codigoLeido[i].estado + '>' + codigoLeido[i].estado + '</option>');
       break;
     }

     $('#selectMunicipio').empty();
     for (let i in codigoLeido) {
       $('#selectMunicipio').append('<option value=' + codigoLeido[i].municipio + '>' + codigoLeido[i].municipio + '</option>');
       break;
     }
     $('#selectColonia').empty();
     for (let i in codigoLeido) {
       $('#selectColonia').append('<option value=' + codigoLeido[i].asentamiento + '>' + codigoLeido[i].asentamiento + '</option>');
     }
   }

   var findCpActualizar = function(codigoPostal) {
     var codigoLeido = leerCodigoPostal(codigoPostal.value);
     for (let i in codigoLeido) {
       $('#selectEstadoActualizar').append('<option value=' + codigoLeido[i].estado + '>' + codigoLeido[i].estado + '</option>');
     }
     $('#selectColoniaActualizar').empty();
     for (let i in codigoLeido) {
       $('#selectMunicipioActualizar').append('<option value=' + codigoLeido[i].municipio + '>' + codigoLeido[i].municipio + '</option>');
     }
     $('#selectColoniaActualizar').empty();
     for (let i in codigoLeido) {
       $('#selectColoniaActualizar').append('<option value=' + codigoLeido[i].asentamiento + '>' + codigoLeido[i].asentamiento + '</option>');
     }
   }

   function leerCodigoPostal(codigoPostal) {
     var result = '';
     $.ajax({
       type: "GET",
       url: "<?php echo constant('URL'); ?>public/js/sepomex_abril-2016.json",
       async: false,
       dataType: "json",
       success: function(rawdata) {
         console.log(rawdata);
         console.log("<?php echo constant('URL'); ?>public/js/sepomex_abril-2016.json");
         let busqueda = rawdata.filter(codigo => codigo.cp == codigoPostal);
         console.log(busqueda);
         result = busqueda;
       },
       error: function(data) {
         console.log(data);
       }
     });
     return result;
   }

   $(document).ready(function() {
     mostrarAdministradors();
     enviarFormularioRegistrar();
     enviarFormularioActualizar();
     eliminarRegistro();
     llenarEscuela();
   });

   $('[data-mask]').inputmask()

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


   var mostrarAdministradors = function() {
     var tableAdministrador = $('#dataTableAdministrador').DataTable({
       "processing": true,
       "serverSide": false,
       "ajax": {
         "url": "<?php echo constant('URL'); ?>administrador/readTable"

       },
       "columns": [{
           defaultContent: "",
           "render": function(data, type, full, row) {

             var fullnameImagen = full['appaterno_administrador'] + '_' + full['apmaterno_administrador'] + '_' + full['nombre_administrador'] + '/' + full['foto_administrador'];


             var img = '<?php echo constant('URL'); ?>public/administrador/' + fullnameImagen;

             return '<center><img src="' + img + '" class="img-circle"  class="cell-border compact stripe" height="50px" width="50px"/></center>';
           }

         },
         {
           defaultContent: "",
           "render": function(data, type, full) {
             return full['nombre_administrador'] + ' ' + full['appaterno_administrador'] + ' ' + full['apmaterno_administrador'];
           }
         },

         {
           "data": "email_administrador"
         },


         {
           data: null,
           "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleAdministrador' title="Ver Detalles"><i class="fa fa-eye"></i></button>
      <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarAdministrador' title="Editar Datos"><i class="fa fa-edit"></i></button>
      <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarAdministrador' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
     obtenerform_dataDT(tableAdministrador);
   }


   var obtenerform_dataDT = function(table) {
     $('#dataTableAdministrador tbody').on('click', 'tr', function() {
       var data = table.row(this).data();
       console.log(data);
       // MODAL ACTUALIZAR
       var idEliminar = $('#idEliminarAdministrador').val(data.id_administrador);
       var idEliminarUsuario = $('#idEliminarUsuario').val(data.id_usuario);
       var idActualizar = $("#id_administradorActualizar").val(data.id_administrador);
       var id_usuario = $("#id_usuarioActualizar").val(data.id_usuario);
       var nombre_administrador = $("#nombre_administradorActualizar").val(data.nombre_administrador);
       var appaterno_administrador = $("#appaterno_administradorActualizar").val(data.appaterno_administrador);
       var apmaterno_administrador = $("#apmaterno_administradorActualizar").val(data.apmaterno_administrador);
       var telefono_administrador = $("#telefono_administradorActualizar").val(data.telefono_administrador);
       var email_administrador = $("#email_administradorActualizar").val(data.email_administrador);
       var fechanacimiento_administrador = $("#fechanacimiento_administradorActualizar").val(data.fechanacimiento_administrador);;
       var username_usuario = $("#username_usuarioActualizar").val(data.username_usuario);
       var password_usuario = $("#password_usuarioActualizar").val(data.password_usuario);
       var idConsulta = $("#id_administradorConsultar").val(data.id_administrador);
       var id_usuarioConsulta = $("#id_usuarioConsultar").val(data.id_usuario);
       var username_usuarioConsulta = $("#username_usuarioConsultar").val(data.username_usuario);
       var password_usuarioConsulta = $("#password_usuarioConsultar").val(data.password_usuario);
       var nombre_administradorConsulta = $("#nombre_administradorConsultar").val(data.nombre_administrador);
       var appaterno_administradorConsulta = $("#appaterno_administradorConsultar").val(data.appaterno_administrador);
       var apmaterno_administradorConsulta = $("#apmaterno_administradorConsultar").val(data.apmaterno_administrador);
       var telefono_administradorConsulta = $("#telefono_administradorConsultar").val(data.telefono_administrador);
       var email_administradorConsulta = $("#email_administradorConsultar").val(data.email_administrador);
       var fechanacimiento_administradorConsulta = $("#fechanacimiento_administradorConsultar").val(data.fechanacimiento_administrador);
     });
   }

   var enviarFormularioRegistrar = function() {
     $.validator.setDefaults({
       submitHandler: function() {
         var datos = $('#formRegistrarAdministrador').serialize();
         $.ajax({
           type: "POST",
           url: "<?php echo constant('URL'); ?>usuario/insert",
           async: false,
           data: datos,
           success: function(data) {
             console.log("data", data)
             var id_usuario = data;
             var idUsuario = id_usuario;
             var form_data = new FormData();
             imagen = $('#foto_administrador').prop('files')[0]; // Aqui obtienes la imagen del usuario de BBDD
             $urlImagenBasica = '<?php echo constant('URL'); ?>public/img/default.jpg';
             if ($('#foto_administrador').val() == null) {
               imagen = $urlImagenBasica // Esta la tienes que obtener anteriormente y guardarla en la variable $urlImagenBasica
             }
             var imagen = '<?php echo constant('URL'); ?>public/img/default.jpg';
             if ($('#foto_administrador').val() != null) {
               imagen = $('#foto_administrador').prop('files')[0];
             } else {
               imagen = "images/default-profile.jpg";
             }
             form_data.append('id_usuario', idUsuario);
             form_data.append('foto_administrador', imagen);
             form_data.append('nombre_administrador', document.getElementById('nombre_administrador').value);
             form_data.append('appaterno_administrador', document.getElementById('appaterno_administrador').value);
             form_data.append('apmaterno_administrador', document.getElementById('apmaterno_administrador').value);
             form_data.append('telefono_administrador', document.getElementById('telefono_administrador').value);
             form_data.append('email_administrador', document.getElementById('email_administrador').value);
             form_data.append('fechanacimiento_administrador', document.getElementById('fechanacimiento_administrador').value);


             form_data.append('username_usuario', document.getElementById('username_usuario').value);
             form_data.append('password_usuario', document.getElementById('password_usuario').value);
             form_data.append('id_tipo_usuario', document.getElementById('id_tipo_usuario').value);

             $.ajax({
               type: "POST",
               url: "<?php echo constant('URL'); ?>administrador/insert",
               async: false,
               dataType: 'text', // what to expect back from the PHP script, if anything
               cache: false,
               contentType: false,
               processData: false,
               data: form_data,
               success: function(data) {
                 if (data == 'ok') {
                   Swal.fire(
                     "¡Error!",
                     "Ha ocurrido un error al registrar el administrador. " + data,
                     "error"
                   );
                 } else {
                   Swal.fire(
                     "¡Éxito!",
                     "El Administrador ha sido registrado de manera correcta",
                     "success"
                   ).then(function() {
                     window.location = "<?php echo constant('URL'); ?>administrador";
                   })
                 }
               },
             });

           },
         });
       }
     });
     $('#formRegistrarAdministrador').validate({
       rules: {
         id_administrador: {
           required: true,
           number: true
         },
         id_grupo: {
           required: true,
           number: true
         },
         id_escuela: {
           required: true,
           number: true
         },
         id_usuario: {
           required: true,
           number: true
         },

         nombre_administrador: {
           required: true
         },
         appaterno_administrador: {
           required: true
         },
         apmaterno_administrador: {
           required: true
         },
         calle_administrador: {
           required: true
         },
         noexterior_administrador: {
           required: true
         },
         nointerior_administrador: {
           required: true
         },
         telefono_administrador: {
           required: true
         },
         email_administrador: {
           required: true
         },
         fechanacimiento_administrador: {
           required: true
         }
       },
       messages: {
         id_administrador: {
           required: "Ingresa una matrícula",
           number: "Sólo números"
         },
         id_grupo: {
           required: "Ingresa un id_grupo"
         },
         id_escuela: {
           required: "Ingresa un id_escuela"
         },
         id_usuario: {
           required: "Ingresa un id_usuario"
         },

         nombre_administrador: {
           required: "Ingresa tu Nombre"
         },
         appaterno_administrador: {
           required: "Ingresa tu Apellido Paterno"
         },
         apmaterno_administrador: {
           required: "Ingresa un Apellido  Materno"
         },
         calle_administrador: {
           required: "Ingresa tu calle"
         },
         noexterior_administrador: {
           required: "Ingresa tu Nº Exterior"
         },
         nointerior_administrador: {
           required: "Ingresa tu Nº Interior"
         },

         telefono_administrador: {
           required: "Ingresa un telefono"
         },
         email_administrador: {
           required: "Ingresa tu correo electronico"
         },
         fechanacimiento_administrador: {
           required: "Ingresa tu  fecha de nacimiento"
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
         var datos = $('#formActualizarAdministrador').serialize();
         $.ajax({
           type: "POST",
           url: "<?php echo constant('URL'); ?>usuario/update",
           async: false,
           data: datos,
           success: function(data) {
             console.log("data ", data)


           },
         });

         var form_data = new FormData();
         var imagen = "";
         if ($('#foto_administradorActualizar').val() != null) {
           imagen = $('#foto_administradorActualizar').prop('files')[0];
         }
         form_data.append('foto_administradorActualizar', imagen);
         form_data.append('id_administradorActualizar', document.getElementById('id_administradorActualizar').value);
         form_data.append('id_usuarioActualizar', document.getElementById('id_usuarioActualizar').value);

         form_data.append('nombre_administradorActualizar', document.getElementById('nombre_administradorActualizar').value);
         form_data.append('appaterno_administradorActualizar', document.getElementById('appaterno_administradorActualizar').value);
         form_data.append('apmaterno_administradorActualizar', document.getElementById('apmaterno_administradorActualizar').value);
         form_data.append('telefono_administradorActualizar', document.getElementById('telefono_administradorActualizar').value);
         form_data.append('email_administradorActualizar', document.getElementById('email_administradorActualizar').value);
         form_data.append('fechanacimiento_administradorActualizar', document.getElementById('fechanacimiento_administradorActualizar').value);

         $.ajax({
           type: "POST",
           url: "<?php echo constant('URL'); ?>administrador/update",
           async: false,
           dataType: 'text', // what to expect back from the PHP script, if anything
           cache: false,
           contentType: false,
           processData: false,
           data: form_data,
           success: function(data) {
             console.log("data ", data)
             if (data == 'ok') {
               Swal.fire(
                 "¡Error!",
                 "Ha ocurrido un error al Actualizar el administrador. " + data,
                 "error"
               );
             } else {
               Swal.fire(
                 "¡Éxito!",
                 "El Administrador ha sido actualizado de manera correcta",
                 "success"
               ).then(function() {
                 window.location = "<?php echo constant('URL'); ?>administrador";
               })
             }
           },
         });

       }
     });
     $('#formActualizarAdministrador').validate({
       rules: {
         id_administradorActualizar: {
           required: true,
           number: true
         },
         id_grupoActualizar: {
           required: true
         },
         id_escuelaActualizar: {
           required: true
         },
         id_usuarioActualizar: {
           required: true
         },
         // foto_administradorActualizar: {
         //        required: true
         //      },
         nombre_administradorActualizar: {
           required: true
         },
         appaterno_administradorActualizar: {
           required: true
         },
         apmaterno_administradorActualizar: {
           required: true
         },
         calle_administradorActualizar: {
           required: true
         },
         noexterior_administradorActualizar: {
           required: true
         },
         nointerior_administradorActualizar: {
           required: true
         },

         selectEstadoActualizar: {
           required: true
         },
         selectMunicipioActualizar: {
           required: true
         },
         selectColoniaActualizar: {
           required: true
         },

         telefono_administradorActualizar: {
           required: true
         },
         email_administradorActualizar: {
           required: true
         },
         fechanacimiento_administradorActualizar: {
           required: true
         }
       },
       messages: {
         id_administradorActualizar: {
           required: "Falta registrar matrícula",
           number: "Sólo números"
         },
         id_grupoActualizar: {
           required: "Falta registrar id_grupo"
         },
         id_escuelaActualizar: {
           required: "Falta registrar escuela"
         },
         id_usuarioActualizar: {
           required: "Falta registrar usuario"
         },
         // foto_administradorActualizar: {
         //        required: "falta foto"
         //      },
         nombre_administradorActualizar: {
           required: "Falta registrar  tu nombre "
         },
         appaterno_administradorActualizar: {
           required: "Falta registrar tu apellido paterno"
         },
         apmaterno_administradorActualizar: {
           required: "Falta registrar tu apellido materno"
         },
         calle_administradorActualizar: {
           required: "Falta registrar tu calle"
         },
         noexterior_administradorActualizar: {
           required: "Falta registrar tu No exterior"
         },
         nointerior_administradorActualizar: {
           required: "Falta registrar tu No Interior"
         },
         selectEstadoActualizar: {
           required: "Falta registrar tu Codigo Postal"
         },
         selectMunicipioActualizar: {
           required: "Falta Seleccionar tu  Municipio/Alcaldia"
         },
         selectColoniaActualizar: {
           required: "Falta Seleccionar tu colonia"
         },
         telefono_administradorActualizar: {
           required: "Falta registrar tu numero telefonico"
         },
         email_administradorActualizar: {
           required: "Falta registrar tu email"
         },
         fechanacimiento_administradorActualizar: {
           required: "Falta registrar tu fecha de  nacimiento"
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
     $("#formEliminarAdministrador").submit(function(event) {
       event.preventDefault();
       var datos = $('#formEliminarAdministrador').serialize();
       $.ajax({
         type: "POST",
         url: "<?php echo constant('URL'); ?>administrador/delete",
         async: false,
         data: datos,
         success: function(data) {
           console.log("data ", data)
           var id_usuario = data;

           $.ajax({
             type: "POST",
             url: "<?php echo constant('URL'); ?>usuario/delete",
             async: false,
             data: datos + "&id_usuario=" + id_usuario,
             success: function(data) {
               if (data == 'ok') {
                 Swal.fire(
                   "¡Éxito!",
                   "El administrador ha sido ELIMINADO de manera correcta",
                   "success"
                 ).then(function() {
                   window.location = "<?php echo constant('URL'); ?>administrador";
                 })
               } else {
                 Swal.fire(
                   "¡Error!",
                   "Ha ocurrido un error al eliminar el registro del administrador. " + data,
                   "error"
                 );
               }
             },
           });
         },
       });
     });
   }

   $(".custom-file-input").on("change", function() {
     var fileName = $(this).val().split("\\").pop();
     $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   });
 </script>
 <script>
   function soloLetras(e) {
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = "áéíóúabcdefghijklmnñopqrstuvwxyz ";
     especiales = "8-37-39-46";
     tecla_especial = false
     for (var i in especiales) {
       if (key == especiales[i]) {
         tecla_especial = true;
         break;
       }
     }
     if (letras.indexOf(tecla) == -1 && !tecla_especial) {
       return false;
     }
   }
 </script>
