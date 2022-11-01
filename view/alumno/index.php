<?php session_start();
   if (!isset($_SESSION['tipo'])) {
      header("Location:usuario");
   }
   require 'view/menu.php';
   $menu = new Menu();
   $menu->header('alumno');
   ?>

 <section class="content">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12 text-right">
             <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarAlumno'> <i class="fas fa-plus-circle"></i> Registrar Alumno
             </button>
          </div>
       </div>
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
                            <th style="width: 50px;">Foto </th>
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
 <div class="modal fade" id="modalRegistrarAlumno" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarAlumno" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="card-success">
             <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between ">
                   <h4 class="card-title">Alumno <small> &nbsp;(*) Campos requeridos</small></h4>
                   <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
             </div>
             <form role="form" id="formRegistrarAlumno" name="formRegistrarAlumno">
                <div class="card-body">
                   <div class="card">
                      <div class="card-header py-1 bg-secondary">
                         <h3 class="card-title">Datos Generales</h3>
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
                                  <input type="number" value="5" hidden class="form-control" id="id_tipo_usuario" name="id_tipo_usuario" />
                               </div>
                            </div>
                            <div class="col-lg-12">
                               <span><label>Foto(*)</label></span>
                               <div class="form-group input-group">
                                  <div class="custom-file">
                                     <input type="file" accept="image/*" class="custom-file-input" name="foto_alumno" id="foto_alumno" lang="es">
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
                                  <input onkeypress="return soloLetras(event)" type="name" class="form-control" id="nombre_alumno" name="nombre_alumno" placeholder="Introduce el Nombre" />
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="form-group">
                                  <label>Apellido Paterno (*)</label>
                                  <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="appaterno_alumno" name="appaterno_alumno" placeholder="Introduce el Apellido Paterno" />
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="form-group">
                                  <label>Apellido Materno (*)</label>
                                  <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="apmaterno_alumno" name="apmaterno_alumno" placeholder="Introduce el Apellido Materno" />
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <label>Teléfono (*)</label>
                               <div class="input-group-prepend">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                  <input type="text" id="telefono_alumno" name="telefono_alumno" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Télefono">
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <label>Email (*)</label>
                               <div class="input-group-prepend">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <input type="email" class="form-control" id="email_alumno" name="email_alumno" placeholder="Eje. usuario@gmail.com etc" />
                               </div>
                            </div>

                            <div class="col-lg-4">
                               <div class="form-group">
                                  <label>Fecha Nacimiento (*)</label>
                                  <input type="date" class="form-control" id="fechanacimiento_alumno" name="fechanacimiento_alumno" placeholder="Introduce la fecha de nacimiento" />
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="card border-red">
                      <div class="card-header py-1 bg-secondary ">
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
                                  <label>Grupo (*)</label>
                                  <select name="id_grupo" id="id_grupo" class="form-control id_grupo">
                                     <option value="default">Seleccione Grupo</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                  <label>Escuela (*)</label>
                                  <select name="id_escuela" id="id_escuela" class="form-control id_escuela">
                                     <option value="default">Seleccione escuela</option>
                                  </select>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="card">
                      <div class="card-header py-1 bg-secondary">
                         <h3 class="card-title">Dirección</h3>
                         <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                         </div>
                      </div>
                      <div class="card-body">
                         <div class="row">
                            <div class="col-12 col-md-6">
                               <div class="form-group">
                                  <label>Calle (*)</label>
                                  <input type="street-address" class="form-control" id="calle_alumno" name="calle_alumno" placeholder="Eje. Av Principal, Calle ***" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>No. exterior (*)</label>
                                  <input type="text" class="form-control" id="noexterior_alumno" name="noexterior_alumno" placeholder="No. exterior" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>No. interior (*)</label>
                                  <input type="text" class="form-control" id="nointerior_alumno" name="nointerior_alumno" placeholder="No. interior " />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Código Postal (*)</label>
                                  <input onfocusout="findCp(this);" type="postal-code" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="Codigo Postal" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Estado (*)</label>
                                  <select name="selectEstado" id="selectEstado" class="form-control selectEstado" placeholder="Selecciona tu Estado">
                                     <option value="default">Estado</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Municipio (*)</label>
                                  <select name="selectMunicipio" id="selectMunicipio" class="form-control selectMunicipio" placeholder="Selecciona tu Municipio">
                                     <option value="default">Municipio</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Colonia (*)</label>
                                  <select name="selectColonia" id="selectColonia" class="form-control selectColonia" placeholder="Selecciona tu Colonia">
                                     <option value="default">Colonia</option>
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
 <!----------------------------------------------- Modal Actualizar----------------------------------------------->
 <div class="modal fade" id="modalActualizarAlumno" tabindex="-1" role="dialog" aria-labelledby="modalActualizarAlumno" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="card-warning">
             <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between ">
                   <h4 class="card-title">Alumno <small> &nbsp;(*) Campos requeridos</small></h4>
                   <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <!---->
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form role="form" id="formActualizarAlumno" name="formActualizarAlumno">
                <div class="card-body">
                   <div class="card">
                      <div class="card-header py-1 bg-warning">
                         <h3 class="card-title">Datos Generales</h3>
                         <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                         </div>
                         <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body border-primary">
                         <div class="row">
                            <input type="text" hidden class="form-control" id="id_alumnoActualizar" name="id_alumnoActualizar" />
                            <input type="text" hidden class="form-control" id="id_usuarioActualizar" name="id_usuarioActualizar" placeholder="Introduce idusuario" />
                            <div class="col-lg-12">
                               <span><label>Foto</label></span>
                               <br>
                               <div class="form-group input-group">
                                  <div class="custom-file">
                                     <input type="file" accept="image/*" class="custom-file-input" name="foto_alumnoActualizar" id="foto_alumnoActualizar" lang="es">
                                     <label id="foto_alumnoActualizar" class="custom-file-label" name="foto_alumnoActualizar" id="foto_alumnoActualizar" for="imagen">Selecciona Imagen</label>
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
                               <label>Nombre(s)</label>
                               <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fas fa-user"></i></span>
                                  </div>
                                  <input onkeypress="return soloLetras(event)" type="name" class="form-control" id="nombre_alumnoActualizar" name="nombre_alumnoActualizar" placeholder="Introduce el Nombre" />
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="form-group">
                                  <label>Apellido Paterno</label>
                                  <input onkeypress="return soloLetras(event)" type="text" class="form-control" id="appaterno_alumnoActualizar" name="appaterno_alumnoActualizar" placeholder="Introduce el Apellido paterno" />
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="form-group">
                                  <label>Apellido Materno</label>
                                  <input onkeypress="return soloLetras(event)" type="text" class="form-control" id="apmaterno_alumnoActualizar" name="apmaterno_alumnoActualizar" placeholder="Introduce el Apellido materno" />
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <label>Teléfono</label>
                               <div class="input-group-prepend">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                  <input type="text" id="telefono_alumnoActualizar" name="telefono_alumnoActualizar" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <label>Email</label>
                               <div class="input-group-prepend">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <input type="email" class="form-control" id="email_alumnoActualizar" name="email_alumnoActualizar" placeholder="Eje. usuario@gmail.com etc" />
                               </div>
                            </div>
                            <div class="col-lg-4">
                               <div class="form-group">
                                  <label>Fecha Nacimiento</label>
                                  <input type="date" class="form-control" id="fechanacimiento_alumnoActualizar" name="fechanacimiento_alumnoActualizar" placeholder="Introduce la fecha de nacimiento" />
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="card border-red">
                      <div class="card-header py-1 bg-warning ">
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
                                  <label>Grupo </label>
                                  <select name="id_grupoActualizar" id="id_grupoActualizar" class="form-control id_grupo">
                                     <option value="default">Seleccione un grupo</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                  <label>Escuela </label>
                                  <select name="id_escuelaActualizar" id="id_escuelaActualizar" class="form-control id_escuela">
                                     <option value="default">Seleccione su escuela</option>
                                  </select>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="card">
                      <div class="card-header py-1 bg-warning">
                         <h3 class="card-title">Dirección</h3>
                         <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                         </div>
                         <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                         <div class="row">
                            <div class="col-12 col-md-6">
                               <div class="form-group">
                                  <label>Calle </label>
                                  <input type="text" class="form-control" id="calle_alumnoActualizar" name="calle_alumnoActualizar" placeholder="Calle" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>No. exterior </label>
                                  <input type="text" class="form-control" id="noexterior_alumnoActualizar" name="noexterior_alumnoActualizar" placeholder="No. exterior" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>No. interior </label>
                                  <input type="text" class="form-control" id="nointerior_alumnoActualizar" name="nointerior_alumnoActualizar" placeholder="No. interior " />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Código Postal </label>
                                  <input onfocusout="findCpActualizar(this);" type="text" class="form-control" id="codigoPostalActualizar" name="codigoPostalActualizar" placeholder="Codigo Postal" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Estado </label>
                                  <select name="selectEstadoActualizar" id="selectEstadoActualizar" class="form-control selectEstadoActualizar">
                                     <option value="default">Estado</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Municipio </label>
                                  <select name="selectMunicipioActualizar" id="selectMunicipioActualizar" class="form-control selectMunicipioActualizar">
                                     <option value="default">Municipio</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Colonia </label>
                                  <select name="selectColoniaActualizar" id="selectColoniaActualizar" class="form-control selectColoniaActualizar">
                                     <option value="default">Colonia</option>
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
 <!--------------------------------------------------------- Modal DetalleAlumno----------------------------------------------->
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
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Usuario</label>
                                  <input disabled type="text" class="form-control" id="username_usuarioConsultar" name="username_usuarioConsultar" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Contraseña</label>
                                  <input disabled type="password" class="form-control" id="password_usuarioConsultar" name="password_usuarioConsultar" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Nombre(s)</label>
                                  <input type="text" disabled class="form-control" id="nombre_alumnoConsultar" name="nombre_alumnoConsultar" placeholder="Introduce el nombre del alumno" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Apellido Paterno</label>
                                  <input type="text" disabled class="form-control" id="appaterno_alumnoConsultar" name="appaterno_alumnoConsultar" placeholder="Introduce el Apellido paterno" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Apellido Materno</label>
                                  <input type="text" disabled class="form-control" id="apmaterno_alumnoConsultar" name="apmaterno_alumnoConsultar" placeholder="Introduce el Apellido Materno" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Teléfono</label>
                                  <input type="text" disabled class="form-control" id="telefono_alumnoConsultar" name="telefono_alumnoConsultar" placeholder="Introduce el numero telefonico" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" disabled class="form-control" id="email_alumnoConsultar" name="email_alumnoConsultar" placeholder="Introduce el email_alumno" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Fecha Nacimiento</label>
                                  <input type="date" disabled class="form-control" id="fechanacimiento_alumnoConsultar" name="fechanacimiento_alumnoConsultar" placeholder="Introduce la fecha de nacimiento" />
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
                                  <label>Grupo </label>
                                  <select disabled name="id_grupoConsultar" id="id_grupoConsultar" class="form-control id_grupo">
                                  </select>
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-group">
                                  <label>Escuela </label>
                                  <select disabled name="id_escuelaConsultar" id="id_escuelaConsultar" class="form-control id_escuela"></select>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="card">
                      <div class="card-header py-1 bg-primary">
                         <h3 class="card-title">Dirección</h3>
                         <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                         </div>
                         <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                         <div class="row">
                            <div class="col-12 col-md-6">
                               <div class="form-group">
                                  <label>Calle</label>
                                  <input type="text" disabled class="form-control" id="calle_alumnoConsultar" name="calle_alumnoConsultar" placeholder="Calle" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>No. exterior</label>
                                  <input type="text" disabled class="form-control" id="noexterior_alumnoConsultar" name="noexterior_alumnoConsultar" placeholder="No. exterior" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>No. interior </label>
                                  <input type="text" disabled class="form-control" id="nointerior_alumnoConsultar" name="nointerior_alumnoConsultar" placeholder="No. interior " />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Código Postal </label>
                                  <input disabled type="text" class="form-control" id="codigoPostalConsultar" name="codigoPostalConsultar" placeholder="Codigo Postal" />
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Estado</label>
                                  <input disabled name="selectEstadoConsultar" id="selectEstadoConsultar" class="form-control selectEstadoConsultar">
                                  <option value="default"></option>
                                  </input>
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Municipio</label>
                                  <input disabled name="selectMunicipioConsultar" id="selectMunicipioConsultar" class="form-control selectMunicipioConsultar">
                                  <option value="default"></option>
                                  </input>
                               </div>
                            </div>
                            <div class="col-lg-3">
                               <div class="form-group">
                                  <label>Colonia</label>
                                  <input disabled name="selectColoniaConsultar" id="selectColoniaConsultar" class="form-control selectColoniaConsultar">
                                  <option value="default"></option>
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
       </form>
    </div>
 </div>
 </div>
 </div>
 </div>

 <!-- **** Modal Eliminar Alumno *******-->
 <div class="modal fade" id="modalEliminarAlumno" tabindex="-1" role="dialog" aria-labelledby="modalEliminarAlumno" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header bg-danger">
             <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
             </button>
          </div>
          <form role="form" id="formEliminarAlumno" name="formActualizarAlumno">
             <input type="text" hidden id="idEliminarAlumno" name="idEliminarAlumno">
             <input type="text" hidden id="idEliminarUsuario" name="idEliminarUsuario">
             <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Alumno?</div>
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
       /*$('#selectEstado').empty();*/
       for (let i in codigoLeido) {
          $('#selectEstadoActualizar').append('<option value=' + codigoLeido[i].estado + '>' + codigoLeido[i].estado + '</option>');
          break;
       }
       $('#selectMunicipio').empty();
       for (let i in codigoLeido) {
          $('#selectMunicipioActualizar').append('<option value=' + codigoLeido[i].municipio + '>' + codigoLeido[i].municipio + '</option>');
          break;
       }
       $('#selectColonia').empty();
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
       mostrarAlumnos();
       enviarFormularioRegistrar();
       enviarFormularioActualizar();
       eliminarRegistro();
       llenarGrupo();
       llenarEscuela();
    });

    const llenarGrupo = () => {
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

    var mostrarAlumnos = function() {
       var tableAlumno = $('#dataTableAlumno').DataTable({
          "processing": true,
          "serverSide": false,
          "ajax": {
             "url": "<?php echo constant('URL'); ?>alumno/readTable"
          },
          "columns": [{
                defaultContent: "",
                "render": function(data, type, full, row) {
                  var fullnameImagen = full['appaterno_alumno'] + '_' + full['apmaterno_alumno'] + '_' + full['nombre_alumno'] + '/' + full['foto_alumno'];


                  var img = '<?php echo constant('URL'); ?>public/alumno/' + fullnameImagen;

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
                "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleAlumno' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                  <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarAlumno' title="Editar Datos"><i class="fa fa-edit"></i></button>
                  <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarAlumno' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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


    var obtenerform_dataDT = function(table) {
       $('#dataTableAlumno tbody').on('click', 'tr', function() {
          var data = table.row(this).data();
          console.log(data);
          // MODAL ACTUALIZAR
          var idEliminar = $('#idEliminarAlumno').val(data.id_alumno);
          var idEliminarUsuario = $('#idEliminarUsuario').val(data.id_usuario);
          var idActualizar = $("#id_alumnoActualizar").val(data.id_alumno);
          var id_usuario = $("#id_usuarioActualizar").val(data.id_usuario);
          var nombre_alumno = $("#nombre_alumnoActualizar").val(data.nombre_alumno);
          var appaterno_alumno = $("#appaterno_alumnoActualizar").val(data.appaterno_alumno);
          var apmaterno_alumno = $("#apmaterno_alumnoActualizar").val(data.apmaterno_alumno);
          var calle_alumno = $("#calle_alumnoActualizar").val(data.calle_alumno);
          var noexterior_alumno = $("#noexterior_alumnoActualizar").val(data.noexterior_alumno);
          var nointerior_alumno = $("#nointerior_alumnoActualizar").val(data.nointerior_alumno);
          var cp_alumno = $("#codigoPostalActualizar").val(data.cp_alumno);
          $("#selectEstadoActualizar").empty();
          var estado_alumno = $("#selectEstadoActualizar").append('<option selected>' + data.estado_alumno + '</option>');
          $("#selectMunicipioActualizar").empty();
          var municipio_alumno = $("#selectMunicipioActualizar").append('<option selected>' + data.municipio_alumno + '</option>');
          $("#selectColoniaActualizar").empty();
          var colonia_alumno = $("#selectColoniaActualizar").append('<option selected>' + data.colonia_alumno + '</option>');
          var telefono_alumno = $("#telefono_alumnoActualizar").val(data.telefono_alumno);
          var email_alumno = $("#email_alumnoActualizar").val(data.email_alumno);
          var fechanacimiento_alumno = $("#fechanacimiento_alumnoActualizar").val(data.fechanacimiento_alumno);
          var id_grupo = $("#id_grupoActualizar option[value=" + data.id_grupo + "]").attr("selected", true);
          var id_escuela = $("#id_escuelaActualizar option[value=" + data.id_escuela + "]").attr("selected", true);
          var username_usuario = $("#username_usuarioActualizar").val(data.username_usuario);
          var password_usuario = $("#password_usuarioActualizar").val(data.password_usuario);
          // MODAL CONSULTAR

          var idConsulta = $("#id_alumnoConsultar").val(data.id_alumno);
          var id_usuarioConsulta = $("#id_usuarioConsultar").val(data.id_usuario);
          var id_grupoConsulta = $("#id_grupoConsultar option[value=" + data.id_grupo + "]").attr("selected", true);
          var id_escuelaConsulta = $("#id_escuelaConsultar option[value=" + data.id_escuela + "]").attr("selected", true);
          var username_usuarioConsulta = $("#username_usuarioConsultar").val(data.username_usuario);
          var password_usuarioConsulta = $("#password_usuarioConsultar").val(data.password_usuario);
          var nombre_alumnoConsulta = $("#nombre_alumnoConsultar").val(data.nombre_alumno);
          var appaterno_alumnoConsulta = $("#appaterno_alumnoConsultar").val(data.appaterno_alumno);
          var apmaterno_alumnoConsulta = $("#apmaterno_alumnoConsultar").val(data.apmaterno_alumno);
          var telefono_alumnoConsulta = $("#telefono_alumnoConsultar").val(data.telefono_alumno);
          var email_alumnoConsulta = $("#email_alumnoConsultar").val(data.email_alumno);
          var fechanacimiento_alumnoConsulta = $("#fechanacimiento_alumnoConsultar").val(data.fechanacimiento_alumno);
          var calle_alumnoConsulta = $("#calle_alumnoConsultar").val(data.appaterno_alumno);
          var noexterior_alumnoConsulta = $("#noexterior_alumnoConsultar").val(data.noexterior_alumno);
          var nointerior_alumnoConsulta = $("#nointerior_alumnoConsultar").val(data.nointerior_alumno);
          var cp_alumnoConsulta = $("#codigoPostalConsultar").val(data.cp_alumno);
          var estado_alumnoConsulta = $("#selectEstadoConsultar").val(data.estado_alumno);
          var municipio_alumnoConsulta = $("#selectMunicipioConsultar").val(data.municipio_alumno);
          var colonia_alumnoConsulta = $("#selectColoniaConsultar").val(data.colonia_alumno);
       });
    }
    var enviarFormularioRegistrar = function() {
       $.validator.setDefaults({
          submitHandler: function() {
             var datos = $('#formRegistrarAlumno').serialize();
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
                   var imagen = "";
                   if ($('#foto_alumno').val() != null) {
                      imagen = $('#foto_alumno').prop('files')[0];
                     }
                   form_data.append('id_usuario', idUsuario);
                   form_data.append('foto_alumno', imagen);
                   form_data.append('nombre_alumno', document.getElementById('nombre_alumno').value);
                   form_data.append('appaterno_alumno', document.getElementById('appaterno_alumno').value);
                   form_data.append('apmaterno_alumno', document.getElementById('apmaterno_alumno').value);
                   form_data.append('telefono_alumno', document.getElementById('telefono_alumno').value);
                   form_data.append('email_alumno', document.getElementById('email_alumno').value);
                   form_data.append('fechanacimiento_alumno', document.getElementById('fechanacimiento_alumno').value);
                   form_data.append('id_grupo', document.getElementById('id_grupo').value);
                   form_data.append('id_escuela', document.getElementById('id_escuela').value);
                   form_data.append('calle_alumno', document.getElementById('calle_alumno').value);
                   form_data.append('nointerior_alumno', document.getElementById('nointerior_alumno').value);
                   form_data.append('noexterior_alumno', document.getElementById('noexterior_alumno').value);
                   form_data.append('codigoPostal', document.getElementById('codigoPostal').value);
                   form_data.append('selectEstado', document.getElementById('selectEstado').value);
                   form_data.append('selectMunicipio', document.getElementById('selectMunicipio').value);
                   form_data.append('selectColonia', document.getElementById('selectColonia').value);
                   form_data.append('username_usuario', document.getElementById('username_usuario').value);
                   form_data.append('password_usuario', document.getElementById('password_usuario').value);
                   form_data.append('id_tipo_usuario', document.getElementById('id_tipo_usuario').value);
                   $.ajax({
                      type: "POST",
                      url: "<?php echo constant('URL'); ?>alumno/insert",
                      async: false,
                      dataType: 'text', // what to expect back from the PHP script, if anything
                      cache: false,
                      contentType: false,
                      processData: false,
                      data: form_data,
                      success: function(data) {
                         if (data != 'ok') {
                            Swal.fire(
                              "¡Éxito!",
                              "El Alumno ha sido registrado con exito",
                              "success"
                            ).then(function() {
                              window.location = "<?php echo constant('URL'); ?>alumno";
                            })
                         } else {
                            Swal.fire(
                              "¡Error!",
                              "Ha ocurrido un error al registrar el alumno. " + data,
                              "error"
                           );
                        }

                     },
                  });

               },
            });
         }
      });
         $('#formRegistrarAlumno').validate({
          rules: {
            id_alumno: {
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
            nombre_alumno: {
               required: true
            },
            appaterno_alumno: {
               required: true
            },
            apmaterno_alumno: {
               required: true
            },
            calle_alumno: {
               required: true
            },
            noexterior_alumno: {
               required: true
            },
            nointerior_alumno: {
               required: true
            },
            telefono_alumno: {
               required: true
            },
            email_alumno: {
               required: true
            },
            fechanacimiento_alumno: {
               required: true
            }
         },
            messages: {
            id_alumno: {
               required: "Ingresa una matrícula",
               umber: "Sólo números"
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
            nombre_alumno: {
               required: "Ingresa tu Nombre"
            },
            appaterno_alumno: {
               required: "Ingresa tu Apellido Paterno"
            },
            apmaterno_alumno: {
               required: "Ingresa un Apellido  Materno"
            },
            calle_alumno: {
               required: "Ingresa tu calle"
            },
            noexterior_alumno: {
               required: "Ingresa tu Nº Exterior"
            },
            nointerior_alumno: {
               required: "Ingresa tu Nº Interior"
            },
            telefono_alumno: {
               required: "Ingresa un telefono"
            },
            email_alumno: {
               required: "Ingresa tu correo electronico"
            },
            fechanacimiento_alumno: {
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
            var datos = $('#formActualizarAlumno').serialize();
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
             if ($('#foto_alumnoActualizar').val() != null) {
                imagen = $('#foto_alumnoActualizar').prop('files')[0];
             }
             form_data.append('foto_alumnoActualizar', imagen);
             form_data.append('id_alumnoActualizar', document.getElementById('id_alumnoActualizar').value);
             form_data.append('id_usuarioActualizar', document.getElementById('id_usuarioActualizar').value);

             form_data.append('nombre_alumnoActualizar', document.getElementById('nombre_alumnoActualizar').value);
             form_data.append('appaterno_alumnoActualizar', document.getElementById('appaterno_alumnoActualizar').value);
             form_data.append('apmaterno_alumnoActualizar', document.getElementById('apmaterno_alumnoActualizar').value);
             form_data.append('telefono_alumnoActualizar', document.getElementById('telefono_alumnoActualizar').value);
             form_data.append('email_alumnoActualizar', document.getElementById('email_alumnoActualizar').value);
             form_data.append('fechanacimiento_alumnoActualizar', document.getElementById('fechanacimiento_alumnoActualizar').value);
             form_data.append('id_grupoActualizar', document.getElementById('id_grupoActualizar').value);
             form_data.append('id_escuelaActualizar', document.getElementById('id_escuelaActualizar').value);
             form_data.append('calle_alumnoActualizar', document.getElementById('calle_alumnoActualizar').value);
             form_data.append('nointerior_alumnoActualizar', document.getElementById('nointerior_alumnoActualizar').value);
             form_data.append('noexterior_alumnoActualizar', document.getElementById('noexterior_alumnoActualizar').value);
             form_data.append('codigoPostalActualizar', document.getElementById('codigoPostalActualizar').value);
             form_data.append('selectEstadoActualizar', document.getElementById('selectEstadoActualizar').value);
             form_data.append('selectMunicipioActualizar', document.getElementById('selectMunicipioActualizar').value);
             form_data.append('selectColoniaActualizar', document.getElementById('selectColoniaActualizar').value);
             $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>alumno/update",
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
                         "Ha ocurrido un error al Actualizar el alumno. " + data,
                         "error"
                      );
                   } else {
                      Swal.fire(
                         "¡Éxito!",
                         "El Alumno ha sido actualizado de manera correcta",
                         "success"
                      ).then(function() {
                         window.location = "<?php echo constant('URL'); ?>alumno";
                      })
                   }
                },
             });

          }
       });
       $('#formActualizarAlumno').validate({
          rules: {
             id_alumnoActualizar: {
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
             // foto_alumnoActualizar: {
             //        required: true
             //      },
             nombre_alumnoActualizar: {
                required: true
             },
             appaterno_alumnoActualizar: {
                required: true
             },
             apmaterno_alumnoActualizar: {
                required: true
             },
             calle_alumnoActualizar: {
                required: true
             },
             noexterior_alumnoActualizar: {
                required: true
             },
             nointerior_alumnoActualizar: {
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

             telefono_alumnoActualizar: {
                required: true
             },
             email_alumnoActualizar: {
                required: true
             },
             fechanacimiento_alumnoActualizar: {
                required: true
             }
          },
          messages: {
             id_alumnoActualizar: {
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
             // foto_alumnoActualizar: {
             //        required: "falta foto"
             //      },
             nombre_alumnoActualizar: {
                required: "Falta registrar  tu nombre "
             },
             appaterno_alumnoActualizar: {
                required: "Falta registrar tu apellido paterno"
             },
             apmaterno_alumnoActualizar: {
                required: "Falta registrar tu apellido materno"
             },
             calle_alumnoActualizar: {
                required: "Falta registrar tu calle"
             },
             noexterior_alumnoActualizar: {
                required: "Falta registrar tu No exterior"
             },
             nointerior_alumnoActualizar: {
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
             telefono_alumnoActualizar: {
                required: "Falta registrar tu numero telefonico"
             },
             email_alumnoActualizar: {
                required: "Falta registrar tu email"
             },
             fechanacimiento_alumnoActualizar: {
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
       $("#formEliminarAlumno").submit(function(event) {
          event.preventDefault();
          var datos = $('#formEliminarAlumno').serialize();
          $.ajax({
             type: "POST",
             url: "<?php echo constant('URL'); ?>alumno/delete",
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
                            "El Alumno ha sido ELIMINADO de manera correcta",
                            "success"
                         ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>alumno";
                         })
                      } else {
                         Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al eliminar el registro del alumno. " + data,
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
