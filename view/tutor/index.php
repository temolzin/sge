<?php
session_start();
require 'view/menu.php';
$menu = new Menu();
$menu->header('Tutor');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarTutor'> <i class="fas fa-plus-circle"></i> Registrar Tutor </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Tutores</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableTutor" name="dataTableTutor" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 15px;">Foto</th>
                                    <th>Nombre</th>
                                    <th>Alumno Asignado</th>
                                    <th>Escuela</th>
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
<!--------------------------------------------------------- Modal Registrar----------------------------------------->
<div class="modal fade" id="modalRegistrarTutor" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarTutor" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Tutor <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarTutor" name="formRegistrarTutor" method="post">
                    <div class="card-body">


                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Información tutor</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                                <div class="row">
                                <div class="col-lg-12">
                                    <span><label>Fotografía Tutor (*)</label></span>
                                    <div class="form-group input-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" class="custom-file-input" name="foto_tutor" id="foto_tutor" lang="es">
                                            <label class="custom-file-label" for="imagen">Seleccione Fotografía</label>
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
                                            <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Contraseña" minlength="8" maxlength="12" pattern="[A-Za-z]{8,12}" title="Introduce 8 caracteres mayúsculas/minúsculas/números" />
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre (s) (*)</label>
                                            <input type="number" value="4" hidden class="form-control" id="id_tipo_usuario" name="id_tipo_usuario" />
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input onkeypress="return soloLetras(event)" type="name" class="form-control" id="nombre_tutor" name="nombre_tutor" placeholder="Nombre" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno (*)</label>
                                            <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="appaterno_tutor" name="appaterno_tutor" placeholder="Apellido Paterno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Materno (*)</label>
                                            <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="apmaterno_tutor" name="apmaterno_tutor" placeholder="Apellido Materno" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Fecha nacimiento (*)</label>
                                            <input type="date" class="form-control" id="fechanacimiento_tutor" name="fechanacimiento_tutor" placeholder="Fecha nacimiento" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Teléfono celular (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="tel" id="telefono_tutor" name="telefono_tutor" class="form-control" data-inputmask='"mask": "(99) 99-9999-9999"' data-mask placeholder="Teléfono">
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
                                                <input type="email" class="form-control" id="email_tutor" name="email_tutor" placeholder="Eje. usuario@gmail.com" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Datos Domicilio </h3>

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
                                            <label>Calle (*)</label>
                                            <input type="text" class="form-control" id="calle_tutor" name="calle_tutor" placeholder="Calle" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Número Exterior (*)</label>
                                            <input type="text" class="form-control" id="noexterior_tutor" name="noexterior_tutor" placeholder="Número exterior" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label> Número interior (*)</label>
                                            <input type="text" class="form-control" id="nointerior_tutor" name="nointerior_tutor" placeholder="Número interior" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Código Postal (*)</label>
                                            <input onfocusout="findCp(this);" type="postal-code" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="Código Postal" />
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

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Información alumno</h3>
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
                                            <label>Alumno (*)</label>
                                            <select name="id_alumno" id="id_alumno" class="form-control id_alumno">
                                                <option value="default">Seleccione su alumno</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Escuela (*)</label>
                                            <select name="id_escuela" id="id_escuela" class="form-control id_escuela">
                                                <option value="default">Seleccione su escuela</option>
                                            </select>
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
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<!--------------------------------------------------------- Modal Actualizar---------------------------------------->
<div class="modal fade" id="modalActualizarTutor" tabindex="-1" role="dialog" aria-labelledby="modalActualizarTutor" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Tutor <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarTutor" name="formActualizarTutor">
                    <div class="card-body">


                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Información tutor</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                                <div class="row">
                                <div class="col-lg-12">
                                    <span><label>Fotografía Tutor (*)</label></span>
                                    <div class="form-group input-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" class="custom-file-input" onChange="actualiza(this.value)" name="imgTutorActualizar" id="imgTutorActualizar" lang="es">
                                            <label class="custom-file-label" for="imagen">Selecciona imagen</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Usuario (*)</label>
                                            <input type="text" class="form-control" id="username_usuarioActualizar" name="username_usuarioActualizar" placeholder="Usuario" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Contraseña (*)</label>
                                            <input type="password" class="form-control" id="password_usuarioActualizar" name="password_usuarioActualizar" placeholder="Contraseña" minlength="8" maxlength="12" pattern="[A-Za-z]{8,12}" title="Introduce 8 caracteres mayúsculas/minúsculas/números" />
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" hidden class="form-control" id="id_tutorActualizar" name="id_tutorActualizar" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" hidden class="form-control" id="id_usuarioActualizar" name="id_usuarioActualizar" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre(s) (*)</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input onkeypress="return soloLetras(event)" type="name" class="form-control" id="nombre_tutorActualizar" name="nombre_tutorActualizar" placeholder="Nombre" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno (*)</label>
                                            <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="appaterno_tutorActualizar" name="appaterno_tutorActualizar" placeholder="Apellido Paterno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Materno (*)</label>
                                            <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="apmaterno_tutorActualizar" name="apmaterno_tutorActualizar" placeholder="Apellido Materno" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Fecha nacimiento (*)</label>
                                            <input type="date" class="form-control" id="fechanacimiento_tutorActualizar" name="fechanacimiento_tutorActualizar" placeholder="Fecha nacimiento" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Teléfono celular (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="tel" id="telefono_tutorActualizar" name="telefono_tutorActualizar" class="form-control" data-inputmask='"mask": "(99) 99-9999-9999"' data-mask placeholder="Teléfono">
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
                                                <input type="email" class="form-control" id="email_tutorActualizar" name="email_tutorActualizar" placeholder="Eje. usuario@gmail.com" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Datos Domicilio </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-secondary" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Calle (*)</label>
                                            <input type="text" class="form-control" id="calle_tutorActualizar" name="calle_tutorActualizar" placeholder="Calle" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Número Exterior (*)</label>
                                            <input type="text" class="form-control" id="noexterior_tutorActualizar" name="noexterior_tutorActualizar" placeholder="Número exterior" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label> Número interior (*)</label>
                                            <input type="text" class="form-control" id="nointerior_tutorActualizar" name="nointerior_tutorActualizar" placeholder="Número interior" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Código Postal (*)</label>
                                            <input onfocusout="findCpActualizar(this);" type="postal-code" class="form-control" id="codigoPostalActualizar" name="codigoPostalActualizar" placeholder="Código Postal" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Estado (*)</label>
                                            <select name="selectEstadoActualizar" id="selectEstadoActualizar" class="form-control selectEstadoActualizar">
                                                <option value="default">Estado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Municipio (*)</label>
                                            <select name="selectMunicipioActualizar" id="selectMunicipioActualizar" class="form-control selectMunicipioActualizar">
                                                <option value="default">Municipio</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Colonia (*)</label>
                                            <select name="selectColoniaActualizar" id="selectColoniaActualizar" class="form-control selectColoniaActualizar">
                                                <option value="default">Colonia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Información alumno</h3>
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
                                            <label>Alumno (*)</label>
                                            <select name="id_alumnoActualizar" id="id_alumnoActualizar" class="form-control id_alumno">
                                                <option value="default">Seleccione su alumno</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
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

<!--------------------------------------------------------- Modal Detalle------------------------------------------->
<div class="modal fade" id="modalDetalleTutor" tabindex="-1" role="dialog" aria-labelledby="modalDetalleTutor" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Tutor <small> &nbsp;</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">




                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Información tutor</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                                <!--  <div class="row">
                                     <div class="figure">
                                        <div class="form-group">
                                        
                                           <select disabled type="img" name="imgTutorConsultar" id="imgTutorConsultar" class="form-control id_tutor">
                                
                            </select>
                                         <img  src="$imgTutorConsultar" name="imgTutorConsultar" id="imgTutorConsultar"
                                            width="150"
                                            height="150"/>  
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Clave Tutor</label>
                                            <input disabled type="text" class="form-control" id="id_tutorConsultar" name="id_tutorConsultar" />
                                        </div>
                                    </div>
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
                                </div>

                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre (s) </label>
                                            <input disabled type="text" class="form-control" id="nombre_tutorConsultar" name="nombre_tutorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno </label>
                                            <input disabled type="text" class="form-control" id="appaterno_tutorConsultar" name="appaterno_tutorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Materno </label>
                                            <input disabled type="text" class="form-control" id="apmaterno_tutorConsultar" name="apmaterno_tutorConsultar" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Fecha nacimiento</label>
                                            <input disabled type="date" class="form-control" id="fechanacimiento_tutorConsultar" name="fechanacimiento_tutorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Teléfono celular</label>
                                            <input disabled type="tel" class="form-control" id="telefono_tutorConsultar" name="telefono_tutorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Correo electrónico</label>
                                            <input disabled type="email" class="form-control" id="email_tutorConsultar" name="email_tutorConsultar" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card border-red">
                                <div class="card-header py-1 bg-secondary ">
                                    <h3 class="card-title">Datos Domicilio </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-secondary" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body border-primary">
                                    <div class="row">

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Calle </label>
                                                <input disabled type="text" class="form-control" id="calle_tutorConsultar" name="calle_tutorConsultar" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Número Exterior </label>
                                                <input disabled type="text" class="form-control" id="noexterior_tutorConsultar" name="noexterior_tutorConsultar" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label> Número interior </label>
                                                <input disabled type="text" class="form-control" id="nointerior_tutorConsultar" name="nointerior_tutorConsultar" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Código Postal </label>
                                                <input disabled type="postal-code" class="form-control" id="codigoPostalConsultar" name="codigoPostalConsultar" />
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

                            <div class="card border-red">
                                <div class="card-header py-1 bg-secondary ">
                                    <h3 class="card-title">Información alumno</h3>
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
                                                <label>Alumno </label>
                                                <select disabled name="id_alumnoConsultar" id="id_alumnoConsultar" class="form-control id_alumno">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Escuela </label>
                                                <select disabled name="id_escuelaConsultar" id="id_escuelaConsultar" class="form-control id_escuela">
                                                </select>
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

<!-- ****************************** Modal Eliminar  *************************************************-->
<div class="modal fade" id="modalEliminarTutor" tabindex="-1" role="dialog" aria-labelledby="modalEliminarTutor" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarTutor" name="formEliminarTutor">
                <input type="text" hidden id="idEliminarTutor" name="idEliminarTutor">
                <input type="text" hidden id="idEliminarUsuario" name="idEliminarUsuario">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Tutor?</div>
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
        mostrarTutores();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        llenarAlumno();
        llenarEscuela();
        rutaImagen();

    });

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    function actualiza(nombre) {
        console.log(nombre);
        document.getElementById('imgTutorActualizar').value = nombre;
    }



    const rutaImagen = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>tutor/read",
            async: false,
            dataType: "json",
            success: function(data) {
                //console.log('generos: ',data)
                $.each(data, function(key, registro) {
                    var id = registro.id_tutor;
                    var nombre = registro.nombre_tutor;
                    var appat = registro.appaterno_tutor;
                    var apmat = registro.apmaterno_tutor;
                    var foto = registro.foto_tutor;
                    var fullnameImagen = appat + '_' + apmat + '_' + nombre + '/' + foto;
                    var fotoConsulta = '/SGE/public/tutor/' + fullnameImagen;
                    $(".id_tutor").append('<option value=' + id + '>' + fotoConsulta + '</option>');
                    $('#imgTutorConsultar').attr(fotoConsulta);
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
                //console.log('generos: ',data)
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

    const llenarEscuela = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>escuela/read",
            async: false,
            dataType: "json",
            success: function(data) {
                //console.log('generos: ',data)
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




    var mostrarTutores = function() {
        var tableTutor = $('#dataTableTutor').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>tutor/readtable"
            },
            "columns": [

                {
                    defaultContent: "",

                    'render': function(data, type, JsonResultRow, meta) {

                        var fullnameImagen = JsonResultRow.appaterno_tutor + '_' + JsonResultRow.apmaterno_tutor + '_' + JsonResultRow.nombre_tutor + '/' + JsonResultRow.foto_tutor;

                        var img = '/SGE/public/Tutor/' + fullnameImagen;

                        return '<center><img src="' + img + '" class="img-circle"  class="cell-border compact stripe" height="50px" width="50px"/></center>';
                    }

                },
                {
                    defaultContent: "",
                    "render": function(data, type, JsonResultRow, meta) {
                        return JsonResultRow.nombre_tutor + ' ' + JsonResultRow.appaterno_tutor + ' ' + JsonResultRow.apmaterno_tutor;
                    }
                },
                // { "data": "nombre_alumno" },
                {
                    defaultContent: "",
                    "render": function(data, type, JsonResultRow, meta) {
                        return JsonResultRow.nombre_alumno + ' ' + JsonResultRow.appaterno_alumno + ' ' + JsonResultRow.apmaterno_alumno;
                    }
                },
                {
                    "data": "nombre_escuela"
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleTutor' title="Ver Detalles">
            <i class="fa fa-eye"></i></button>
            <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarTutor' title="Editar Datos">
            <i class="fa fa-edit"></i></button>
            <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarTutor' title="Eliminar Registro">
            <i class="far fa-trash-alt"></i></button>`
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
        obtenerdatosDT(tableTutor);
    }

    var obtenerdatosDT = function(table) {
        $('#dataTableTutor tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            console.log(data);

            var idEliminarTutor = $('#idEliminarTutor').val(data.id_tutor);
            var idEliminarUsuario = $('#idEliminarUsuario').val(data.id_usuario);

            var id_tutor = $("#id_tutorActualizar").val(data.id_tutor);
            var id_usuario = $("#id_usuarioActualizar").val(data.id_usuario);
            var nombre_tutor = $("#nombre_tutorActualizar").val(data.nombre_tutor);
            var appaterno_tutor = $("#appaterno_tutorActualizar").val(data.appaterno_tutor);
            var apmaterno_tutor = $("#apmaterno_tutorActualizar").val(data.apmaterno_tutor);
            var id_alumno = $("#id_alumnoActualizar option[value=" + data.id_alumno + "]").attr("selected", true);
            var id_escuela = $("#id_escuelaActualizar option[value=" + data.id_escuela + "]").attr("selected", true);
            var username_usuario = $("#username_usuarioActualizar").val(data.username_usuario);
            var password_usuario = $("#password_usuarioActualizar").val(data.password_usuario);

            var fechanacimiento_tutor = $("#fechanacimiento_tutorActualizar").val(data.fechanacimiento_tutor);
            var telefono_tutor = $("#telefono_tutorActualizar").val(data.telefono_tutor);
            var email_tutor = $("#email_tutorActualizar").val(data.email_tutor);
            var calle_tutor = $("#calle_tutorActualizar").val(data.calle_tutor);
            var noexterior_tutor = $("#noexterior_tutorActualizar").val(data.noexterior_tutor);
            var nointerior_tutor = $("#nointerior_tutorActualizar").val(data.nointerior_tutor);
            var cp_tutor = $("#codigoPostalActualizar").val(data.cp_tutor);

            $("#selectEstadoActualizar").empty();
            var estado_tutor = $("#selectEstadoActualizar").append('<option selected>' + data.estado_tutor + '</option>');


            $("#selectMunicipioActualizar").empty();
            var municipio_tutor = $("#selectMunicipioActualizar").append('<option selected>' + data.municipio_tutor + '</option>');


            $("#selectColoniaActualizar").empty();
            var colonia_tutor = $("#selectColoniaActualizar").append('<option selected>' + data.colonia_tutor + '</option>');

            $("#imgTutorActualizar").empty();
            var foto_tutor = $("#imgTutorActualizar").append(data.foto_tutor);

            //var fullnameImagen = appaterno_tutor + '_' + apmaterno_tutor + '_' + nombre_tutor + '/';
            // $('#imgTutorActualizar').attr('src', '/SGE/public/tutor/' + fullnameImagen + foto_tutor);

            var idConsulta = $("#id_tutorConsultar").val(data.id_tutor);
            var nombreConsulta = $("#nombre_tutorConsultar").val(data.nombre_tutor);
            var appaterno_tutorConsulta = $("#appaterno_tutorConsultar").val(data.appaterno_tutor);
            var apmaterno_tutorConsulta = $("#apmaterno_tutorConsultar").val(data.apmaterno_tutor);
            var id_alumnoConsulta = $("#id_alumnoConsultar option[value=" + data.id_alumno + "]").attr("selected", true);
            var id_escuelaConsulta = $("#id_escuelaConsultar option[value=" + data.id_escuela + "]").attr("selected", true);
            var username_usuarioConsulta = $("#username_usuarioConsultar").val(data.username_usuario);
            var password_usuarioConsulta = $("#password_usuarioConsultar").val(data.password_usuario);
            var fechanacimiento_tutorConsulta = $("#fechanacimiento_tutorConsultar").val(data.fechanacimiento_tutor);
            var telefono_tutorConsulta = $("#telefono_tutorConsultar").val(data.telefono_tutor);
            var email_tutorConsulta = $("#email_tutorConsultar").val(data.email_tutor);
            var calle_tutorConsulta = $("#calle_tutorConsultar").val(data.calle_tutor);
            var noexterior_tutorConsulta = $("#noexterior_tutorConsultar").val(data.noexterior_tutor);
            var nointerior_tutorConsulta = $("#nointerior_tutorConsultar").val(data.nointerior_tutor);

            var cp_tutorConsulta = $("#codigoPostalConsultar").val(data.cp_tutor);
            var estado_tutorConsulta = $("#selectEstadoConsultar").val(data.estado_tutor);
            var municipio_tutorConsulta = $("#selectMunicipioConsultar").val(data.municipio_tutor);
            var colonia_tutorConsulta = $("#selectColoniaConsultar").val(data.colonia_tutor);

            // var fullnameImagen = appaterno_tutor + '_' + apmaterno_tutor + '_' + nombre_tutor + '/';
            //$('#imgTutorConsultar').attr('src', '/public/tutor/' + fullnameImagen + foto_tutor);
            //var fotoConsulta = $("#imgTutorConsultar").attr('src' + 'public/tutor/' + fullnameImagen);

            var rutaImagenConsulta = $("#imgTutorConsultar option[value=" + data.id_tutor + "]").attr("selected", true);
        });
    }

    $.validator.addMethod("selectRequired", function(value, element, arg) {
        return arg !== value;
    }, "Selecciona un valor");

    var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formRegistrarTutor').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>usuario/insert",
                    async: false,
                    data: datos,

                    success: function(data) {
                        console.log("data ", data)
                        var id_usuario = data;
                        var idUsuario = id_usuario;
                        var form_data = new FormData();
                        var imagen = "";
                        if ($('#foto_tutor').val() != null) {
                            imagen = $('#foto_tutor').prop('files')[0];
                        }
                        form_data.append('id_usuario', idUsuario);
                        form_data.append('foto_tutor', imagen);
                        form_data.append('id_alumno', document.getElementById('id_alumno').value);
                        form_data.append('id_escuela', document.getElementById('id_escuela').value);

                        form_data.append('nombre_tutor', document.getElementById('nombre_tutor').value);
                        form_data.append('appaterno_tutor', document.getElementById('appaterno_tutor').value);
                        form_data.append('apmaterno_tutor', document.getElementById('apmaterno_tutor').value);
                        form_data.append('fechanacimiento_tutor', document.getElementById('fechanacimiento_tutor').value);
                        form_data.append('telefono_tutor', document.getElementById('telefono_tutor').value);
                        form_data.append('email_tutor', document.getElementById('email_tutor').value);
                        form_data.append('calle_tutor', document.getElementById('calle_tutor').value);
                        form_data.append('noexterior_tutor', document.getElementById('noexterior_tutor').value);
                        form_data.append('nointerior_tutor', document.getElementById('nointerior_tutor').value);
                        form_data.append('codigoPostal', document.getElementById('codigoPostal').value);
                        form_data.append('selectEstado', document.getElementById('selectEstado').value);
                        form_data.append('selectMunicipio', document.getElementById('selectMunicipio').value);
                        form_data.append('selectColonia', document.getElementById('selectColonia').value);
                        form_data.append('username_usuario', document.getElementById('username_usuario').value);
                        form_data.append('password_usuario', document.getElementById('password_usuario').value);
                        form_data.append('id_tipo_usuario', document.getElementById('id_tipo_usuario').value);



                        $.ajax({
                            type: "POST",
                            url: "<?php echo constant('URL'); ?>tutor/insert",
                            async: false,
                            dataType: 'text', // what to expect back from the PHP script, if anything
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            // data: datos +"&id_usuario="+id_usuario,

                            success: function(data) {

                                if (data == 'ok') {
                                    Swal.fire(
                                        "¡Éxito!",
                                        "El Tutor ha sido registrado de manera correcta",
                                        "success"
                                    ).then(function() {
                                        window.location = "<?php echo constant('URL'); ?>tutor";
                                    })
                                } else {
                                    Swal.fire(
                                        "¡Error!",
                                        "Ha ocurrido un error al registrar el tutor. " + data,
                                        "error"
                                    );
                                }
                            },
                        });

                    },
                });


            }
        });
        $('#formRegistrarTutor').validate({
            rules: {
                nombre_tutor: {
                    required: true
                },
                appaterno_tutor: {
                    required: true
                },
                apmaterno_tutor: {
                    required: true
                },
                id_alumno: {
                    selectRequired: "default"
                },
                id_escuela: {
                    selectRequired: "default"
                },
                id_usuario: {
                    selectRequired: "default"
                },
                fechanacimiento_tutor: {
                    required: true
                },
                telefono_tutor: {
                    required: true,
                    number: true
                },
                email_tutor: {
                    required: true,
                    email: true
                },
                calle_tutor: {
                    required: true
                },
                noexterior_tutor: {
                    required: true
                },
                nointerior_tutor: {
                    required: true
                },
                codigoPostal: {
                    required: true,
                    number: true
                },
                selectEstado: {
                    selectRequired: true
                },
                selectMunicipio: {
                    selectRequired: true
                },
                selectColonia: {
                    selectRequired: true
                }
            },
            messages: {
                nombre_tutor: {
                    required: "Ingrese su nombre"
                },
                appaterno_tutor: {
                    required: "Ingrese su apellido paterno"
                },
                apmaterno_tutor: {
                    required: "Ingrese su apellido materno"
                },
                id_alumno: {
                    selectRequired: "Seleccione un alumno"
                },
                id_escuela: {
                    selectRequired: "Seleccione una escuela"
                },
                id_usuario: {
                    selectRequired: "Seleccione un usuario"
                },
                fechanacimiento_tutor: {
                    required: "Ingrese su cumpleaños"
                },
                telefono_tutor: {
                    required: "Ingrese su teléfono",
                    number: "Sólo números"
                },
                email_tutor: {
                    required: "Ingrese su email",
                    email: "Debe llevar el formato de correo electrónico"
                },
                calle_tutor: {
                    required: "Ingrese su calle"
                },
                noexterior_tutor: {
                    required: "Ingrese su no. exterior"
                },
                nointerior_tutor: {
                    required: "Ingrese su no. interior"
                },
                codigoPostal: {
                    required: "Ingrese su código postal",
                    number: "Sólo números"
                },
                selectEstado: {
                    selectRequired: "Ingrese su estado"
                },
                selectMunicipio: {
                    selectRequired: "Ingrese su municipio"
                },
                selectColonia: {
                    selectRequired: "Ingrese su colonia"
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
                var datos = $('#formActualizarTutor').serialize();
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
                if ($('#imgTutorActualizar').val() != null) {
                    imagen = $('#imgTutorActualizar').prop('files')[0];
                }
                form_data.append('imgTutorActualizar', imagen);
                form_data.append('id_tutorActualizar', document.getElementById('id_tutorActualizar').value);
                form_data.append('id_usuarioActualizar', document.getElementById('id_usuarioActualizar').value);

                form_data.append('id_alumnoActualizar', document.getElementById('id_alumnoActualizar').value);
                form_data.append('id_escuelaActualizar', document.getElementById('id_escuelaActualizar').value);

                form_data.append('nombre_tutorActualizar', document.getElementById('nombre_tutorActualizar').value);
                form_data.append('appaterno_tutorActualizar', document.getElementById('appaterno_tutorActualizar').value);
                form_data.append('apmaterno_tutorActualizar', document.getElementById('apmaterno_tutorActualizar').value);
                form_data.append('fechanacimiento_tutorActualizar', document.getElementById('fechanacimiento_tutorActualizar').value);
                form_data.append('telefono_tutorActualizar', document.getElementById('telefono_tutorActualizar').value);
                form_data.append('email_tutorActualizar', document.getElementById('email_tutorActualizar').value);
                form_data.append('calle_tutorActualizar', document.getElementById('calle_tutorActualizar').value);
                form_data.append('noexterior_tutorActualizar', document.getElementById('noexterior_tutorActualizar').value);
                form_data.append('nointerior_tutorActualizar', document.getElementById('nointerior_tutorActualizar').value);
                form_data.append('codigoPostalActualizar', document.getElementById('codigoPostalActualizar').value);
                form_data.append('selectEstadoActualizar', document.getElementById('selectEstadoActualizar').value);
                form_data.append('selectMunicipioActualizar', document.getElementById('selectMunicipioActualizar').value);
                form_data.append('selectColoniaActualizar', document.getElementById('selectColoniaActualizar').value);
                //form_data.append('username_usuarioActualizar', document.getElementById('username_usuarioActualizar').value);
                // form_data.append('password_usuarioActualizar', document.getElementById('password_usuarioActualizar').value);
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>tutor/update",
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
                                "El Tutor ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>tutor";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el tutor. " + data,
                                "error"
                            );
                        }
                    },
                });

            }
        });

        $('#formActualizarTutor').validate({
            rules: {
                nombre_tutorActualizar: {
                    required: true
                },
                appaterno_tutorActualizar: {
                    required: true
                },
                apmaterno_tutorActualizar: {
                    required: true
                },
                id_alumnoActualizar: {
                    selectRequired: "default"
                },
                id_escuelaActualizar: {
                    selectRequired: "default"
                },
                id_usuarioActualizar: {
                    selectRequired: "default"
                },
                fechanacimiento_tutorActualizar: {
                    required: true
                },
                telefono_tutorActualizar: {
                    required: true,
                    number: true
                },
                email_tutorActualizar: {
                    required: true,
                    email: true
                },
                calle_tutorActualizar: {
                    required: true
                },
                noexterior_tutorActualizar: {
                    required: true
                },
                nointerior_tutorActualizar: {
                    required: true
                },
                codigoPostalActualizar: {
                    required: true,
                    number: true
                },
                selectEstadoActualizar: {
                    selectRequired: "default"
                },
                selectMunicipioActualizar: {
                    selectRequired: "default"
                },
                selectColoniaActualizar: {
                    selectRequired: "default"
                }
            },
            messages: {
                nombre_tutorActualizar: {
                    required: "Ingrese su nombre"
                },
                appaterno_tutorActualizar: {
                    required: "Ingrese su apellido paterno"
                },
                apmaterno_tutorActualizar: {
                    required: "Ingrese su apellido materno"
                },
                id_alumnoActualizar: {
                    selectRequired: "Seleccione un alumno"
                },
                id_escuelaActualizar: {
                    selectRequired: "Seleccione una escuela"
                },
                id_usuarioActualizar: {
                    selectRequired: "Seleccione un usuario"
                },
                fechanacimiento_tutorActualizar: {
                    required: "Ingrese su cumpleaños"
                },
                telefono_tutorActualizar: {
                    required: "Ingrese su teléfono",
                    number: "Sólo números"
                },
                email_tutorActualizar: {
                    required: "Ingrese su email",
                    email: "Debe llevar el formato de correo electrónico"
                },
                calle_tutorActualizar: {
                    required: "Ingrese su calle"
                },
                noexterior_tutorActualizar: {
                    required: "Ingrese su no. exterior"
                },
                nointerior_tutorActualizar: {
                    required: "Ingrese su no. interior"
                },
                codigoPostalActualizar: {
                    required: "Ingrese su código postal",
                    number: "Sólo números"
                },
                selectEstadoActualizar: {
                    selectRequired: "Ingrese su estado"
                },
                selectMunicipioActualizar: {
                    selectRequired: "Ingrese su municipio"
                },
                selectColoniaActualizar: {
                    selectRequired: "Ingrese su colonia"
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
        $("#formEliminarTutor").submit(function(event) {
            event.preventDefault();
            var datos = $('#formEliminarTutor').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>tutor/delete",
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
                                    "El Tutor ha sido registrado de manera correcta",
                                    "success"
                                ).then(function() {
                                    window.location = "<?php echo constant('URL'); ?>tutor";
                                })
                            } else {
                                Swal.fire(
                                    "¡Error!",
                                    "Ha ocurrido un error al registrar el tutor. " + data,
                                    "error"
                                );
                            }
                        },
                    });

                },
            });


        });
    }
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