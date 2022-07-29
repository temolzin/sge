<?php
session_start();
if (!isset($_SESSION['tipo'])) {
  header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('profesor');
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-right">
        <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarProfesor'> <i class="fas fa-plus-circle"></i> Registrar Profesor
        </button>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-header">Profesores</h3>
          </div>
          <div class="card-body">
            <table id="dataTableProfesor" name="dataTableProfesor" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th style="width: 15px;">Foto</th>
                  <th>Nombre</th>

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
<div class="modal fade" id="modalRegistrarProfesor" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarProfesor" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-success">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Profesor <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>
        <form role="form" id="formRegistrarProfesor" name="formRegistrarProfesor">
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
                <div class="col-lg-12">
                    <span><label>Foto(*)</label></span>
                    <div class="form-group input-group">
                      <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" name="foto_profesor" id="foto_profesor" lang="es">
                        <label class="custom-file-label" for="imagen">Selecciona Imagen</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Usuario (*)</label>
                      <input type="number" value="3" hidden class="form-control" id="id_tipo_usuario" name="id_tipo_usuario" />
                      <input type="text" class="form-control" id="username_usuario" name="username_usuario" placeholder="Usuario" />
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Contraseña (*)</label>
                      <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Contraseña" minlength="8" maxlength="12" pattern="[A-Za-z]{8,12}" title="Introduce 8 caracteres mayúsculas/minúsculas/números" />
                    </div>
                  </div>
                  

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Nombre(s) (*)</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input onkeypress="return soloLetras(event)" type="name" class="form-control" id="nombre_profesor" name="nombre_profesor" placeholder="Introduce el Nombre" />
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Apellido Paterno (*)</label>
                      <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="appaterno_profesor" name="appaterno_profesor" placeholder="Introduce el Apellido paterno" />
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Apellido Materno (*)</label>
                      <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="apmaterno_profesor" name="apmaterno_profesor" placeholder="Introduce el apellido materno" />
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Teléfono celular (*)</label>
                      <div class="input-group-prepend">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="tel" id="telefono_profesor" name="telefono_profesor" class="form-control" data-inputmask='"mask": "(99) 99-9999-9999"' data-mask placeholder="Teléfono">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Correo electrónico (*)</label>
                      <div class="input-group-prepend">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="email_profesor" name="email_profesor" placeholder="Eje. usuario@gmail.com" />
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Fecha Nacimiento (*)</label>
                      <input type="date" class="form-control" id="fechanacimiento_profesor" name="fechanacimiento_profesor" placeholder="Introduce la fecha de nacimiento" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card border-red">
              <div class="card-header py-1 bg-secondary ">
                <h3 class="card-title">Información Profesional</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Grado académico (*)</label>
                      <select name="id_grado_academico" id="id_grado_academico" class="form-control id_grado_academico">
                        <option value="default">Seleccione Grado academico</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Escuela (*)</label>
                      <select name="id_escuela" id="id_escuela" class="form-control id_escuela">
                        <option value="default">Seleccione su escuela</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Cédula Profesional (*)</label>
                      <input type="text" class="form-control" id="cedula_profesor" name="cedula_profesor" placeholder="Introduce la cedula profesional" />
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
                      <input type="street-address" class="form-control" id="calle_profesor" name="calle_profesor" placeholder="Calle" />
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>No. exterior (*)</label>
                      <input type="text" class="form-control" id="numexterior_profesor" name="numexterior_profesor" placeholder="No. exterior" />
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>No. interior (*)</label>
                      <input type="text" class="form-control" id="numinterior_profesor" name="numinterior_profesor" placeholder="No. interior " />
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
                      <select name="selectEstado" id="selectEstado" class="form-control selectEstado">
                        <option value="default">Estado</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Municipio (*)</label>
                      <select name="selectMunicipio" id="selectMunicipio" class="form-control selectMunicipio">
                        <option value="default">Municipio</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Colonia (*)</label>
                      <select name="selectColonia" id="selectColonia" class="form-control selectColonia">
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

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarProfesor" tabindex="-1" role="dialog" aria-labelledby="modalActualizarProfesor" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-warning">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Profesor <small> &nbsp;(*) Campos requeridos</small></h4>
            <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <!---->
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="formActualizarProfesor" name="formActualizarProfesor">

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


                  <input type="text" hidden class="form-control" id="id_profesorActualizar" name="id_profesorActualizar" />

                  <input type="text" hidden class="form-control" id="id_usuarioActualizar" name="id_usuarioActualizar" placeholder="Introduce id usuario" />
                  <div class="col-lg-12">
                    <span><label>Foto </label></span>
                    <br>

                    <div class="form-group input-group">
                      <div class="custom-file">

                        <input type="file" accept="image/*" class="custom-file-input" name="foto_profesorActualizar" id="foto_profesorActualizar" lang="es">
                        <label id="foto_profesorActualizar" class="custom-file-label" name="foto_profesorActualizar" id="foto_profesorActualizar" for="imagen">Selecciona Imagen</label>
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
                      <input type="password" class="form-control" id="password_usuarioActualizar" name="password_usuarioActualizar" placeholder="Contraseña" minlength="8" maxlength="12" pattern="[A-Za-z]{8,12}" title="Introduce 8 caracteres mayúsculas/minúsculas/números" />
                    </div>
                  </div>
                  
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Nombre(s)</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input onkeypress="return soloLetras(event)" type="name" class="form-control" id="nombre_profesorActualizar" name="nombre_profesorActualizar" placeholder="Nombre" />
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Apellido Paterno</label>
                      <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="appaterno_profesorActualizar" name="appaterno_profesorActualizar" placeholder="Introduce el Apellido paterno" />
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Apellido Materno</label>
                      <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="apmaterno_profesorActualizar" name="apmaterno_profesorActualizar" placeholder="Introduce el apellido materno" />
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Teléfono</label>
                      <div class="input-group-prepend">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="tel" id="telefono_profesorActualizar" name="telefono_profesorActualizar" class="form-control" data-inputmask='"mask": "(99) 99-9999-9999"' data-mask placeholder="Teléfono">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Correo electrónico</label>
                      <div class="input-group-prepend">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="email_profesorActualizar" name="email_profesorActualizar" placeholder="Eje. usuario@gmail.com" />
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Fecha Nacimiento</label>
                      <input type="date" class="form-control" id="fechanacimiento_profesorActualizar" name="fechanacimiento_profesorActualizar" placeholder="Introduce la fecha de nacimiento" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card border-red">
              <div class="card-header py-1 bg-warning ">
                <h3 class="card-title">Información Profesional</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Grado académico </label>
                      <select name="id_grado_academicoActualizar" id="id_grado_academicoActualizar" class="form-control id_grado_academico">
                        <option value="default">Seleccione un grado academico</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Escuela </label>
                      <select name="id_escuelaActualizar" id="id_escuelaActualizar" class="form-control id_escuela">
                        <option value="default">Seleccione su escuela</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Cédula </label>
                      <input type="text" class="form-control" id="cedula_profesorActualizar" name="cedula_profesorActualizar" placeholder="Cedula profesional" />
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
                      <input type="text" class="form-control" id="calle_profesorActualizar" name="calle_profesorActualizar" placeholder="Calle" />
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>No. exterior </label>
                      <input type="text" class="form-control" id="numexterior_profesorActualizar" name="numexterior_profesorActualizar" placeholder="No. exterior" />
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>No. interior </label>
                      <input type="text" class="form-control" id="numinterior_profesorActualizar" name="numinterior_profesorActualizar" placeholder="No. interior " />
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

<!--------------------------------------------------------- Modal DetalleProfesor----------------------------------------------->
<div class="modal fade" id="modalDetalleProfesor" tabindex="-1" role="dialog" aria-labelledby="modalDetalleProfesor" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="card-primary">
        <div class="card-header">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h4 class="card-title">Profesor <small> &nbsp;</small></h4>
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


                  <input type="text" hidden class="form-control" id="id_profesorConsultar" name="id_profesorConsultar" />

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
                      <input type="text" disabled class="form-control" id="nombre_profesorConsultar" name="nombre_profesorConsultar" placeholder="Introduce el nombre del profesor" />
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Apellido Paterno</label>
                      <input type="text" disabled class="form-control" id="appaterno_profesorConsultar" name="appaterno_profesorConsultar" placeholder="Introduce el Apellido paterno" />
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Apellido Materno</label>
                      <input type="text" disabled class="form-control" id="apmaterno_profesorConsultar" name="apmaterno_profesorConsultar" placeholder="Introduce el apellido materno" />
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Teléfono</label>
                      <input type="text" disabled class="form-control" id="telefono_profesorConsultar" name="telefono_profesorConsultar" placeholder="Introduce el numero telefonico" />
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" disabled class="form-control" id="email_profesorConsultar" name="email_profesorConsultar" placeholder="Introduce el email_profesor" />
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Fecha Nacimiento</label>
                      <input type="date" disabled class="form-control" id="fechanacimiento_profesorConsultar" name="fechanacimiento_profesorConsultar" placeholder="Introduce la fecha de nacimiento" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card border-red">
              <div class="card-header py-1 bg-primary">
                <h3 class="card-title">Información Profesional</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body border-primary">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Grado académico </label>
                      <select disabled name="id_grado_academicoConsultar" id="id_grado_academicoConsultar" class="form-control id_grado_academico">
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Escuela </label>
                      <select disabled name="id_escuelaConsultar" id="id_escuelaConsultar" class="form-control id_escuela"></select>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Cédula profesional</label>
                      <input type="text" disabled class="form-control" id="cedula_profesorConsultar" name="cedula_profesorConsultar" placeholder="Introduce la cedula_profesor" />
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
                      <input type="text" disabled class="form-control" id="calle_profesorConsultar" name="calle_profesorConsultar" placeholder="Calle" />
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>No. exterior </label>
                      <input type="text" disabled class="form-control" id="numexterior_profesorConsultar" name="numexterior_profesorConsultar" placeholder="No. exterior" />
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>No. interior </label>
                      <input type="text" disabled class="form-control" id="numinterior_profesorConsultar" name="numinterior_profesorConsultar" placeholder="No. interior " />
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
                      <label>Estado </label>
                      <input disabled name="selectEstadoConsultar" id="selectEstadoConsultar" class="form-control selectEstadoConsultar">
                      <option value="default"></option>
                      </input>
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Municipio </label>
                      <input disabled name="selectMunicipioConsultar" id="selectMunicipioConsultar" class="form-control selectMunicipioConsultar">
                      <option value="default"></option>
                      </input>
                    </div>
                  </div>

                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Colonia </label>
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

<!-- **** Modal EliminarProfesor *******-->
<div class="modal fade" id="modalEliminarProfesor" tabindex="-1" role="dialog" aria-labelledby="modalEliminarProfesor" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form role="form" id="formEliminarProfesor" name="formActualizarProfesor">
        <input type="text" hidden id="idEliminarProfe" name="idEliminarProfe">
        <input type="text" hidden id="idEliminarUsuario" name="idEliminarUsuario">
        <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Profesor?</div>
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
    mostrarProfesores();
    enviarFormularioRegistrar();
    enviarFormularioActualizar();
    eliminarRegistro();
    mostrarTareas();
    mostrarCalificaciones();
    mostrarIncidencia();
    llenarParcial();
    llenargradoAcademico();
    llenarEscuela();
  });
  const llenargradoAcademico = () => {
    $.ajax({
      type: "GET",
      url: "<?php echo constant('URL'); ?>gradoAcademico/read",
      async: false,
      dataType: "json",
      success: function(data) {
        //console.log('generos: ',data)
        $.each(data, function(key, registro) {
          var id = registro.id_grado_academico;
          var nombre = registro.nombre_grado_academico;
          $(".id_grado_academico").append('<option value=' + id + '>' + nombre + '</option>');
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  }

  const mostrarTareas = () => {
    $.ajax({
      type: "GET",
      url: "<?php echo constant('URL'); ?>tarea/read",
      async: false,
      dataType: "json",
      success: function(data) {
        //console.log('generos: ',data)
        $.each(data, function(key, registro) {
          var id = registro.id_tarea_alumno;
          var nombre = registro.nombre_tarea;
          $(".id_tarea_alumno").append('<option value=' + id + '>' + nombre + '</option>');
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  }

  var mostrarCalificaciones = function() {
      $.ajax({
         type: "POST",

         async: false,
         url: "<?php echo constant('URL'); ?>calificacion/read",
         dataType: 'json', // what to expect back from the PHP script, if anything
         success: function(data) {
            //console.log('CALI ', data);
            $.each(data, function(ind, elem) {
               if (ind <= 9) {
                  //console.log(elem.nombre_parcial);
                  var colorCalificacion = "";
                  if (elem.calificacion > 6) {
                     colorCalificacion = "success";
                  } else {
                     colorCalificacion = "danger";
                  }
                  var htmlTags = '<tr>' +
                     '<td>' + elem.id_calificacion + '</td>' +
                     '<td>' + elem.id_profesor + '</td>' +
                     '<td>' + elem.id_alumno + '</td>' +
                     '<td>' + elem.nombre_alumno + '</td>' +
                     '<td>' + elem.id_parcial + '</td>' +
                     '<td>' + elem.nombre_parcial + '</td>' +
                     '<td>' + elem.id_materia + '</td>' +
                     '<td>' + elem.nombre_materia + '</td>' +
                     '<td>' + elem.calificacion + '</td>' +
                     '<td> <span class="badge badge-' + colorCalificacion + '">' + elem.calificacion + '</span></td>' +
                     '</tr>';
                  $('#tableCalificacionAlumno tbody').append(htmlTags);
               }
            });
         },
      });
   }

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

  const mostrarIncidencia = () => {
    $.ajax({
      type: "GET",
      url: "<?php echo constant('URL'); ?>incidencia/read",
      async: false,
      dataType: "json",
      success: function(data) {
        //console.log('generos: ',data)
        $.each(data, function(key, registro) {
          var id = registro.id_incidencia;
          var idg = registro.id_grupo;
          var idp = registro.id_profesor;
          var ida = registro.id_alumno;
          var fecha = registro.fechaincidencia_incidencia;
          var hora = registro.horaincidencia_incidencia;
          var descripcion = registro.descripcion_incidencia;
          $(".id_incidencia").append('<option value=' + id + '>' + descripcion + '</option>');
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

  var mostrarProfesores = function() {
    var tableProfesor = $('#dataTableProfesor').DataTable({
      "processing": true,
      "serverSide": false,
      "ajax": {
        "url": "<?php echo constant('URL'); ?>profesor/readTable"
      },
      "columns": [

        {
          defaultContent: "",
          "render": function(data, type, full, row) {

            var fullnameImagen = full['appaterno_profesor'] + '_' + full['apmaterno_profesor'] + '_' + full['nombre_profesor'] + '/' + full['foto_profesor'];
            var img = '<?php constant('URL'); ?>public/profesor/' + fullnameImagen;

            return '<center><img src="' + img + '" class="img-circle"  class="cell-border compact stripe" height="50px" width="50px"/></center>';
          }

        },
        {
          defaultContent: "",
          "render": function(data, type, full) {
            return full['nombre_profesor'] + ' ' + full['appaterno_profesor'] + ' ' + full['apmaterno_profesor'];
          }
        },


        {
          data: null,
          "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleProfesor' title="Ver Detalles"><i class="fa fa-eye"></i></button>
        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarProfesor' title="Editar Datos"><i class="fa fa-edit"></i></button>
        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarProfesor' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
    obtenerform_dataDT(tableProfesor);
  }



  var obtenerform_dataDT = function(table) {
    $('#dataTableProfesor tbody').on('click', 'tr', function() {
      var data = table.row(this).data();
      console.log(data);
      // MODAL ACTUALIZAR
      var idEliminar = $('#idEliminarProfe').val(data.id_profesor);
      var idEliminarUsuario = $('#idEliminarUsuario').val(data.id_usuario);
      var idActualizar = $("#id_profesorActualizar").val(data.id_profesor);
      var id_usuario = $("#id_usuarioActualizar").val(data.id_usuario);
      var nombre_profesor = $("#nombre_profesorActualizar").val(data.nombre_profesor);
      var cedula_profesor = $("#cedula_profesorActualizar").val(data.cedula_profesor);
      var appaterno_profesor = $("#appaterno_profesorActualizar").val(data.appaterno_profesor);
      var apmaterno_profesor = $("#apmaterno_profesorActualizar").val(data.apmaterno_profesor);
      var calle_profesor = $("#calle_profesorActualizar").val(data.calle_profesor);
      var numexterior_profesor = $("#numexterior_profesorActualizar").val(data.numexterior_profesor);
      var numinterior_profesor = $("#numinterior_profesorActualizar").val(data.numinterior_profesor);
      var cp_profesor = $("#codigoPostalActualizar").val(data.cp_profesor);

      $("#selectEstadoActualizar").empty();
      var estado_profesor = $("#selectEstadoActualizar").append('<option selected>' + data.estado_profesor + '</option>');
      $("#selectMunicipioActualizar").empty();
      var municipio_profesor = $("#selectMunicipioActualizar").append('<option selected>' + data.municipio_profesor + '</option>');
      $("#selectColoniaActualizar").empty();
      var colonia_profesor = $("#selectColoniaActualizar").append('<option selected>' + data.colonia_profesor + '</option>');
      var telefono_profesor = $("#telefono_profesorActualizar").val(data.telefono_profesor);
      var email_profesor = $("#email_profesorActualizar").val(data.email_profesor);
      var fechanacimiento_profesor = $("#fechanacimiento_profesorActualizar").val(data.fechanacimiento_profesor);
      var id_grado_academico = $("#id_grado_academicoActualizar option[value=" + data.id_grado_academico + "]").attr("selected", true);
      var id_escuela = $("#id_escuelaActualizar option[value=" + data.id_escuela + "]").attr("selected", true);
      var username_usuario = $("#username_usuarioActualizar").val(data.username_usuario);
      var password_usuario = $("#password_usuarioActualizar").val(data.password_usuario);

      // MODAL CONSULTAR

      var idConsulta = $("#id_profesorConsultar").val(data.id_profesor);
      var id_usuarioConsulta = $("#id_usuarioConsultar").val(data.id_usuario);
      var id_grado_academicoConsulta = $("#id_grado_academicoConsultar option[value=" + data.id_grado_academico + "]").attr("selected", true);
      var id_escuelaConsulta = $("#id_escuelaConsultar option[value=" + data.id_escuela + "]").attr("selected", true);
      var username_usuarioConsulta = $("#username_usuarioConsultar").val(data.username_usuario);
      var password_usuarioConsulta = $("#password_usuarioConsultar").val(data.password_usuario);
      var nombre_profesorConsulta = $("#nombre_profesorConsultar").val(data.nombre_profesor);
      var appaterno_profesorConsulta = $("#appaterno_profesorConsultar").val(data.appaterno_profesor);
      var apmaterno_profesorConsulta = $("#apmaterno_profesorConsultar").val(data.apmaterno_profesor);
      var cedula_profesorConsulta = $("#cedula_profesorConsultar").val(data.cedula_profesor);
      var telefono_profesorConsulta = $("#telefono_profesorConsultar").val(data.telefono_profesor);
      var email_profesorConsulta = $("#email_profesorConsultar").val(data.email_profesor);
      var fechanacimiento_profesorConsulta = $("#fechanacimiento_profesorConsultar").val(data.fechanacimiento_profesor);
      var calle_profesorConsulta = $("#calle_profesorConsultar").val(data.calle_profesor);
      var numexterior_profesorConsulta = $("#numexterior_profesorConsultar").val(data.numexterior_profesor);
      var numinterior_profesorConsulta = $("#numinterior_profesorConsultar").val(data.numinterior_profesor);
      var cp_profesorConsulta = $("#codigoPostalConsultar").val(data.cp_profesor);
      var estado_profesorConsulta = $("#selectEstadoConsultar").val(data.estado_profesor);
      var municipio_profesorConsulta = $("#selectMunicipioConsultar").val(data.municipio_profesor);
      var colonia_profesorConsulta = $("#selectColoniaConsultar").val(data.colonia_profesor);
    });
  }
  $.validator.addMethod("selectRequired", function(value, element, arg) {
    return arg !== value;
  }, "Selecciona un valor");

  var enviarFormularioRegistrar = function() {
    $.validator.setDefaults({
      submitHandler: function() {
        var datos = $('#formRegistrarProfesor').serialize();
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
            if ($('#foto_profesor').val() != null) {
              imagen = $('#foto_profesor').prop('files')[0];
            }

            form_data.append('id_usuario', idUsuario);
            form_data.append('foto_profesor', imagen);
            form_data.append('nombre_profesor', document.getElementById('nombre_profesor').value);
            form_data.append('appaterno_profesor', document.getElementById('appaterno_profesor').value);
            form_data.append('apmaterno_profesor', document.getElementById('apmaterno_profesor').value);
            form_data.append('cedula_profesor', document.getElementById('cedula_profesor').value);
            form_data.append('telefono_profesor', document.getElementById('telefono_profesor').value);
            form_data.append('email_profesor', document.getElementById('email_profesor').value);
            form_data.append('fechanacimiento_profesor', document.getElementById('fechanacimiento_profesor').value);
            form_data.append('id_grado_academico', document.getElementById('id_grado_academico').value);
            form_data.append('id_escuela', document.getElementById('id_escuela').value);
            form_data.append('calle_profesor', document.getElementById('calle_profesor').value);
            form_data.append('numinterior_profesor', document.getElementById('numinterior_profesor').value);
            form_data.append('numexterior_profesor', document.getElementById('numexterior_profesor').value);
            form_data.append('codigoPostal', document.getElementById('codigoPostal').value);
            form_data.append('selectEstado', document.getElementById('selectEstado').value);
            form_data.append('selectMunicipio', document.getElementById('selectMunicipio').value);
            form_data.append('selectColonia', document.getElementById('selectColonia').value);

            form_data.append('username_usuario', document.getElementById('username_usuario').value);
            form_data.append('password_usuario', document.getElementById('password_usuario').value);
            form_data.append('id_tipo_usuario', document.getElementById('id_tipo_usuario').value);

            $.ajax({
              type: "POST",
              url: "<?php echo constant('URL'); ?>profesor/insert",
              async: false,
              dataType: 'text', // what to expect back from the PHP script, if anything
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,
              success: function(data) {
                console.log("data.profesor", data)
                if (data == 'ok') {
                  Swal.fire(
                    "¡Éxito!",
                    "El profesor ha sido registrado de manera correcta",
                    "success"
                  ).then(function() {
                    window.location = "<?php echo constant('URL'); ?>profesor";
                  })
                } else {
                  Swal.fire(
                    "¡Error!",
                    "Ha ocurrido un error al registrar el profesor. " + data,
                    "error"
                  );
                }
              },
            });
          },
        });
      }
    });

    $('#formRegistrarProfesor').validate({
      rules: {
        id_profesor: {
          required: true,
          number: true
        },
        id_grado_academico: {
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
        nombre_profesor: {
          required: true
        },
        appaterno_profesor: {
          required: true
        },
        apmaterno_profesor: {
          required: true
        },
        cedula_profesor: {
          required: true
        },
        calle_profesor: {
          required: true
        },
        numexterior_profesor: {
          required: true
        },
        numinterior_profesor: {
          required: true
        },
        telefono_profesor: {
          required: true,
          number: true
        },
        email_profesor: {
          required: true
        },
        fechanacimiento_profesor: {
          required: true
        }
      },
      messages: {
        id_profesor: {
          required: "Ingresa una matrícula",
          number: "Sólo números"
        },
        id_grado_academico: {
          required: "Ingresa un id_grado_academico"
        },
        id_escuela: {
          required: "Ingresa un id_escuela"
        },
        id_usuario: {
          required: "Ingresa un id_usuario"
        },

        nombre_profesor: {
          required: "Ingresa tu nombre_profesor paterno"
        },
        appaterno_profesor: {
          required: "Ingresa tu apmaterno"
        },
        apmaterno_profesor: {
          required: "Ingresa un apmaterno_profesor"
        },
        cedula_profesor: {
          required: "Ingresa tu calle"
        },
        calle_profesor: {
          required: "Ingresa tu calle"
        },
        numexterior_profesor: {
          required: "Ingresa tu Nº Exterior"
        },
        numinterior_profesor: {
          required: "Ingresa tu Nº Interior"
        },
        telefono_profesor: {
          required: "Ingresa un telefono",
          number: "Sólo números"
        },
        email_profesor: {
          required: "Ingresa un email"
        },
        fechanacimiento_profesor: {
          required: "Ingresa una fecha de nacimiento"
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
        var form_data = $('#formActualizarProfesor').serialize();
        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL'); ?>usuario/update",
          async: false,
          data: form_data,
          success: function(data) {
            console.log("data ", data)
          },
        });
        var form_data = new FormData();
        var imagen = "";
        if ($('#foto_profesorActualizar').val() != null) {
          imagen = $('#foto_profesorActualizar').prop('files')[0];
        }
        form_data.append('foto_profesorActualizar', imagen);
        form_data.append('id_profesorActualizar', document.getElementById('id_profesorActualizar').value);
        form_data.append('id_grado_academicoActualizar', document.getElementById('id_grado_academicoActualizar').value);
        form_data.append('id_usuarioActualizar', document.getElementById('id_usuarioActualizar').value);
        form_data.append('id_escuelaActualizar', document.getElementById('id_escuelaActualizar').value);
        form_data.append('nombre_profesorActualizar', document.getElementById('nombre_profesorActualizar').value);
        form_data.append('appaterno_profesorActualizar', document.getElementById('appaterno_profesorActualizar').value);
        form_data.append('apmaterno_profesorActualizar', document.getElementById('apmaterno_profesorActualizar').value);
        form_data.append('cedula_profesorActualizar', document.getElementById('cedula_profesorActualizar').value);
        form_data.append('calle_profesorActualizar', document.getElementById('calle_profesorActualizar').value);
        form_data.append('numinterior_profesorActualizar', document.getElementById('numinterior_profesorActualizar').value);
        form_data.append('numexterior_profesorActualizar', document.getElementById('numexterior_profesorActualizar').value);
        form_data.append('codigoPostalActualizar', document.getElementById('codigoPostalActualizar').value);
        form_data.append('selectEstadoActualizar', document.getElementById('selectEstadoActualizar').value);
        form_data.append('selectMunicipioActualizar', document.getElementById('selectMunicipioActualizar').value);
        form_data.append('selectColoniaActualizar', document.getElementById('selectColoniaActualizar').value);

        form_data.append('telefono_profesorActualizar', document.getElementById('telefono_profesorActualizar').value);
        form_data.append('email_profesorActualizar', document.getElementById('email_profesorActualizar').value);
        form_data.append('fechanacimiento_profesorActualizar', document.getElementById('fechanacimiento_profesorActualizar').value);


        $.ajax({
          type: "POST",
          url: "<?php echo constant('URL'); ?>profesor/update",

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
                "¡Éxito!",
                "El profe ha sido Actualizado de manera correcta",
                "success"
              ).then(function() {
                window.location = "<?php echo constant('URL'); ?>profesor";
              })
            } else {
              Swal.fire(
                "¡Error!",
                "Ha ocurrido un error al Actualizar el profe. " + data,
                "error"
              );
            }
          },
        });

      }
    });
    $('#formActualizarProfesor').validate({
      rules: {
        id_profesorActualizar: {
          required: true,
          number: true
        },
        id_grado_academicoActualizar: {
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
        nombre_profesorActualizar: {
          required: true
        },
        appaterno_profesorActualizar: {
          required: true
        },
        apmaterno_profesorActualizar: {
          required: true
        },
        cedula_profesorActualizar: {
          required: true
        },
        calle_profesorActualizar: {
          required: true
        },
        numexterior_profesorActualizar: {
          required: true
        },
        numinterior_profesorActualizar: {
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
        telefono_profesorActualizar: {
          required: true,
          number: true
        },
        email_profesorActualizar: {
          required: true
        },
        fechanacimiento_profesorActualizar: {
          required: true
        }
      },
      messages: {
        id_profesorActualizar: {
          required: "Falta registrar matrícula",
          number: "Sólo números"
        },
        id_grado_academicoActualizar: {
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
        nombre_profesorActualizar: {
          required: "Falta registrar  tu nombre "
        },
        appaterno_profesorActualizar: {
          required: "Falta registrar tu apellido paterno"
        },
        apmaterno_profesorActualizar: {
          required: "Falta registrar tu apellido materno"
        },
        cedula_profesorActualizar: {
          required: "Falta registrar tu cedula"
        },
        calle_profesorActualizar: {
          required: "Falta registrar tu calle"
        },
        numexterior_profesorActualizar: {
          required: "Falta registrar tu No exterior"
        },
        numinterior_profesorActualizar: {
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
        telefono_profesorActualizar: {
          required: "Falta registrar tu telefono",
          number: "Sólo números"
        },
        email_profesorActualizar: {
          required: "Falta registrar tu email"
        },
        fechanacimiento_profesorActualizar: {
          required: "Falta registrar tu fecha de nacimiento"
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
    $("#formEliminarProfesor").submit(function(event) {
      event.preventDefault();
      var datos = $('#formEliminarProfesor').serialize();
      $.ajax({
        type: "POST",
        url: "<?php echo constant('URL'); ?>profesor/delete",
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
                  "El PROFESOR ha sido ELIMINADO de manera correcta",
                  "success"
                ).then(function() {
                  window.location = "<?php echo constant('URL'); ?>PROFESOR";
                })
              } else {
                Swal.fire(
                  "¡Error!",
                  "Ha ocurrido un error al eliminar el registro del PROFESOR. " + data,
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