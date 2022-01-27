<?php
    session_start();
require 'view/menu.php';
$menu = new Menu();
$menu->header('Directivo');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarDirectivo'> <i class="fas fa-plus-circle"></i> Registrar Directivo </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Directivos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableDirectivo" name="dataTableDirectivo" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Foto</th>
                                    <th>Teléfono</th>
                                    <th>Cédula profesional</th>
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
<div class="modal fade" id="modalRegistrarDirectivo" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarDirectivo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Directivo <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarDirectivo" name="formRegistrarDirectivo" method="post">
                    <div class="card-body">


                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary "> 
                                <h3 class="card-title">Información director</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                            <div class="col-12 col-sm-12">
                                    <span><label>Fotografía director (*)</label></span>
                                    <div class="form-group input-group">
                                      <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input" name="foto_director" id="foto_director" 
                                        lang="es">
                                        <label class="custom-file-label" for="imagen">Seleccione Fotografía</label>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre (s) (*)</label>
                                            <input type="number" value="2" hidden class="form-control" id="id_tipo_usuario" name="id_tipo_usuario"/>
                                            <div class="input-group mb-3">
                                               <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input  onkeypress="return soloLetras(event)" type="name" class="form-control" id="nombre_director" name="nombre_director" placeholder="Nombre"/>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno (*)</label>
                                            <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="appaterno_director" name="appaterno_director" placeholder="Apellido Paterno"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Materno (*)</label>
                                            <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="apmaterno_director" name="apmaterno_director" placeholder="Apellido Materno"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Fecha nacimiento (*)</label>
                                            <input type="date" class="form-control" id="fechanacimiento_director" name="fechanacimiento_director" placeholder="Fecha nacimiento" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Teléfono celular (*)</label>
                                            <div class="input-group-prepend">
                                               <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="tel" id="telefono_director" name="telefono_director" class="form-control" data-inputmask='"mask": "(99) 99-9999-9999"' data-mask placeholder="Teléfono">
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
                                        <input type="email" class="form-control" id="email_director" name="email_director" placeholder="Eje. usuario@gmail.com"/>
                                    </div>
                                </div>
                            </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>RFC (*)</label>
                                            <input type="text" class="form-control" id="rfc_director" name="rfc_director" placeholder="RFC"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>CURP (*)</label>
                                            <input type="text" class="form-control" id="curp_director" name="curp_director" placeholder="CURP"/>
                                        </div>
                                    </div>
                                </div>
                               
                    
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                         <label>Usuario (*)</label>
                                         <input type="text" class="form-control" id="username_usuario" name="username_usuario" placeholder="Usuario"/>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Contraseña (*)</label>
                                        <input type="password" class="form-control" id="password_usuario" name="password_usuario"
                                        placeholder="Contraseña"
                                        minlength="8"
                                        maxlength="12"
                                        pattern="[A-Za-z]{8,12}"
                                        title="Introduce 8 caracteres mayúsculas/minúsculas/números"/>
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
                                            <input type="text" class="form-control" id="calle_director" name="calle_director" placeholder="Calle"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Número Exterior (*)</label>
                                            <input type="text" class="form-control" id="numexterior_director" name="numexterior_director" placeholder="Número exterior"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label> Número interior (*)</label>
                                            <input type="text" class="form-control" id="numinterior_director" name="numinterior_director" placeholder="Número interior"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                              <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Código Postal (*)</label>
                                    <input onfocusout="findCp(this);" type="postal-code" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="Código Postal"   />
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
                        <h3 class="card-title">Formación Académica y Laboral</h3>
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
                                    <label>Grado académico (*)</label>
                                    <select name="id_grado_academico" id="id_grado_academico" class="form-control id_grado_academico">
                                    <option value="default">Seleccione su grado de estudios</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Cédula Profesional (*)</label>
                                <input type="text" class="form-control" id="cedulaprofesional_director" name="cedulaprofesional_director" placeholder="Cédula" />
                            </div>
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
<div class="modal fade" id="modalActualizarDirectivo" tabindex="-1" role="dialog" aria-labelledby="modalActualizarDirectivo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Directivo <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarDirectivo" name="formActualizarDirectivo">
                    <div class="card-body">

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary "> 
                                <h3 class="card-title">Información director</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_directorActualizar" name="id_directorActualizar"/>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" hidden class="form-control" id="id_usuarioActualizar" name="id_usuarioActualizar"/>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <span><label>Fotografía Director (*)</label></span>
                                    <div class="form-group input-group">
                                      <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input"  name="imgDirectorActualizar" id="imgDirectorActualizar" lang="es">
                                        <label class="custom-file-label" for="imagen">3.jpg</label>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre (s) (*)</label>
                                            <div class="input-group mb-3">
                                               <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input  onkeypress="return soloLetras(event)" type="name" class="form-control" id="nombre_directorActualizar" name="nombre_directorActualizar" placeholder="Nombre"/>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno (*)</label>
                                            <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="appaterno_directorActualizar" name="appaterno_directorActualizar" placeholder="Apellido Paterno"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Materno (*)</label>
                                            <input onkeypress="return soloLetras(event)" type="family-name" class="form-control" id="apmaterno_directorActualizar" name="apmaterno_directorActualizar" placeholder="Apellido Materno"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Fecha nacimiento (*)</label>
                                            <input type="date" class="form-control" id="fechanacimiento_directorActualizar" name="fechanacimiento_directorActualizar" placeholder="Fecha nacimiento" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Teléfono celular (*)</label>
                                            <div class="input-group-prepend">
                                               <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="tel" id="telefono_directorActualizar" name="telefono_directorActualizar" class="form-control" data-inputmask='"mask": "(99) 99-9999-9999"' data-mask placeholder="Teléfono">
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
                                        <input type="email" class="form-control" id="email_directorActualizar" name="email_directorActualizar" placeholder="Eje. usuario@gmail.com"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>RFC (*)</label>
                                            <input type="text" class="form-control" id="rfc_directorActualizar" name="rfc_directorActualizar" placeholder="RFC"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>CURP (*)</label>
                                            <input type="text" class="form-control" id="curp_directorActualizar" name="curp_directorActualizar" placeholder="CURP"/>
                                        </div>
                                    </div>
                                </div>
                               
                    
                                <div class="row">
                                <div class="col-lg-4">
                                        <div class="form-group">
                                         <label>Usuario (*)</label>
                                         <input type="text" class="form-control" id="username_usuarioActualizar" name="username_usuarioActualizar" placeholder="Usuario"/>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Contraseña (*)</label>
                                        <input type="password" class="form-control" id="password_usuarioActualizar" name="password_usuarioActualizar"
                                        placeholder="Contraseña"
                                        minlength="8"
                                        maxlength="12"
                                        pattern="[A-Za-z]{8,12}"
                                        title="Introduce 8 caracteres mayúsculas/minúsculas/números"/>
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
                                            <input type="text" class="form-control" id="calle_directorActualizar" name="calle_directorActualizar" placeholder="Calle"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Número Exterior (*)</label>
                                            <input type="text" class="form-control" id="numexterior_directorActualizar" name="numexterior_directorActualizar" placeholder="Número exterior"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label> Número interior (*)</label>
                                            <input type="text" class="form-control" id="numinterior_directorActualizar" name="numinterior_directorActualizar" placeholder="Número interior"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                              <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Código Postal (*)</label>
                                    <input onfocusout="findCpActualizar(this);" type="postal-code" class="form-control" id="codigoPostalActualizar" name="codigoPostalActualizar" placeholder="Código Postal"   />
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
                        <h3 class="card-title">Formación Académica y Laboral</h3>
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
                                    <label>Grado académico (*)</label>
                                    <select name="id_grado_academicoActualizar" id="id_grado_academicoActualizar" class="form-control id_grado_academico">
                                    <option value="default">Seleccione su grado de estudios</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Cédula Profesional (*)</label>
                                <input type="text" class="form-control" id="cedulaprofesional_directorActualizar" name="cedulaprofesional_directorActualizar" placeholder="Cédula" />
                            </div>
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
<div class="modal fade" id="modalDetalleDirectivo" tabindex="-1" role="dialog" aria-labelledby="modalDetalleDirectivo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Directivo <small> &nbsp;</small></h4>
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
                                <h3 class="card-title">Información director</h3>
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
                                        
                                           <select disabled type="img" name="imgDirectorConsultar" id="imgDirectorConsultar" class="form-control id_director">
                                
                            </select>
                                        
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Clave Director </label>
                                            <input disabled type="text" hiddden class="form-control" id="id_directorConsultar" name="id_directorConsultar"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre (s) </label>
                                            <input disabled type="text" class="form-control" id="nombre_directorConsultar" name="nombre_directorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno </label>
                                            <input disabled type="text" class="form-control" id="appaterno_directorConsultar" name="appaterno_directorConsultar"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Materno </label>
                                            <input disabled type="text" class="form-control" id="apmaterno_directorConsultar" name="apmaterno_directorConsultar"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Fecha nacimiento </label>
                                            <input disabled type="date" class="form-control" id="fechanacimiento_directorConsultar" name="fechanacimiento_directorConsultar"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Teléfono celular </label>
                                            <input disabled type="tel" class="form-control" id="telefono_directorConsultar" name="telefono_directorConsultar"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Correo electrónico</label>
                                            <input disabled type="email" class="form-control" id="email_directorConsultar" name="email_directorConsultar"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>RFC</label>
                                            <input disabled type="text" class="form-control" id="rfc_directorConsultar" name="rfc_directorConsultar"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>CURP</label>
                                            <input disabled type="text" class="form-control" id="curp_directorConsultar" name="curp_directorConsultar"/>
                                        </div>
                                    </div>
                                </div>
                               
                    
                                <div class="row">
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
                                            <label>Calle </label>
                                            <input disabled type="text" class="form-control" id="calle_directorConsultar" name="calle_directorConsultar"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Número Exterior </label>
                                            <input disabled type="text" class="form-control" id="numexterior_directorConsultar" name="numexterior_directorConsultar"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label> Número interior</label>
                                            <input disabled type="text" class="form-control" id="numinterior_directorConsultar" name="numinterior_directorConsultar"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Código Postal </label>
                                        <input disabled type="postal-code" class="form-control" id="codigoPostalConsultar" name="codigoPostalConsultar"  />
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
                      <label>Colonia</label>
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
                        <h3 class="card-title">Formación Académica y Laboral</h3>
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
                                    <label>Grado académico </label>
                                    <select disabled name="id_grado_academicoConsultar" id="id_grado_academicoConsultar" class="form-control id_grado_academico">
                                    <option value="default">Seleccione su grado de estudios</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Cédula Profesional </label>
                                <input disabled type="text" class="form-control" id="cedulaprofesional_directorConsultar" name="cedulaprofesional_directorConsultar" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <div class="form-group">
                                <label>Escuela </label>
                                <select disabled name="id_escuelaConsultar" id="id_escuelaConsultar" class="form-control id_escuela">
                                    <option value="default">Seleccione su escuela</option>
                                </select>
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
<div class="modal fade" id="modalEliminarDirectivo" tabindex="-1" role="dialog" aria-labelledby="modalEliminarDirectivo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarDirectivo" name="formEliminarDirectivo">            
                <input type="text" hidden id="idEliminarDirector" name="idEliminarDirector">
                <input type="text" hidden id="idEliminarUsuario" name="idEliminarUsuario">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Director?</div>
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
        mostrarDirectivos();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        llenarGradoAcademico();
        llenarEscuela();
        rutaImagen(); 
        
    });
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
    
const rutaImagen = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL');?>directivo/read",
            async: false,
            dataType: "json",
            success: function(data){
                //console.log('generos: ',data)
                $.each(data,function(key, registro) {
                    var id = registro.id_director;
                    var nombre = registro.nombre_director;
                    var appat = registro.appaterno_director;
                    var apmat = registro.apmaterno_director;
                    var foto = registro.foto_director;
                    var fullnameImagen = appat + '' + apmat + '' + nombre + '/' + foto;
                  var fotoConsulta = '/SGE/public/director/' + fullnameImagen;
                    $(".id_director").append('<option value='+id+'>'+fotoConsulta+'</option>');
                    $('#imgDirectorConsultar').attr(fotoConsulta);
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

   /* function findCp(id_estado) {
        var selectEstado = document.getElementById('selectEstado');
        var selectMunicipio = document.getElementById('selectMunicipio');
        var selectColonia = document.getElementById('selectColonia');
        const optionEstado = document.createElement('option');
        const optionMunicipio = document.createElement('option');
        const optionColonia = document.createElement('option');

        for (let i = selectEstado.options.length; i >= 0; i--) {
        selectEstado.remove(i);
    }
    for (let i = selectMunicipio.options.length; i >= 0; i--) {
        selectMunicipio.remove(i);
    }
    for (let i = selectColonia.options.length; i >= 0; i--) {
        selectColonia.remove(i);
    }
    Sepomex.findCp(
      {
        "cp": id_estado.value,
        "user": "apiqroo"
      },
      function(response){
                //alert(response[0].CODI_COLONIA);
                response.forEach(
                  function(valor, indice, array) {
                        // element => console.log(valor.CODI_COLONIA);
                        optionEstado.value = valor.CODI_ESTADO;
                        optionEstado.text = valor.CODI_ESTADO;
                        selectEstado.appendChild(optionEstado);

                        optionMunicipio.value = valor.CODI_MUNICIPIO;
                        optionMunicipio.text = valor.CODI_MUNICIPIO;
                        selectMunicipio.appendChild(optionMunicipio);

                        var op = new Option(valor.CODI_COLONIA, valor.CODI_COLONIA);
                        $("#selectColonia").append(op);
                      }
                      );
                console.log(response);
              }
              )
    }*/

    

            function findCpActualizar(id_estado){
            console.log(id_estado);
            var selectEstado = document.getElementById('selectEstadoActualizar');
            var selectMunicipio = document.getElementById('selectMunicipioActualizar');
            var selectColonia = document.getElementById('selectColoniaActualizar');
            const optionEstado = document.createElement('option');
            const optionMunicipio = document.createElement('option');
            const optionColonia = document.createElement('option');

            for (let i = selectEstado.options.length; i >= 0; i--) {
            selectEstado.remove(i);
            }
            for (let i = selectMunicipio.options.length; i >= 0; i--) {
            selectMunicipio.remove(i);
            }
            for (let i = selectColonia.options.length; i >= 0; i--) {
            selectColonia.remove(i);
            }

            Sepomex.findCp(
            {
            "cp": id_estado.value,
            "user": "apiqroo"
            },
            function(response){
            response.forEach(
              function(valor, indice, array) {
                            // element => console.log(valor.CODI_COLONIA);
                            optionEstado.value = valor.CODI_ESTADO;
                            optionEstado.text = valor.CODI_ESTADO;
                            selectEstado.appendChild(optionEstado);

                            optionMunicipio.value = valor.CODI_MUNICIPIO;
                            optionMunicipio.text = valor.CODI_MUNICIPIO;
                            selectMunicipio.appendChild(optionMunicipio);

                            var op = new Option(valor.CODI_COLONIA, valor.CODI_COLONIA);
                            $("#selectColoniaActualizar").append(op);
                          }
                          );
            console.log(response);
        }
        )
        }

    const llenarGradoAcademico = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL');?>gradoAcademico/read",
            async: false,
            dataType: "json",
            success: function(data){
                //console.log('generos: ',data)
                $.each(data,function(key, registro) {
                    var id = registro.id_grado_academico;
                    var nombre = registro.nombre_grado_academico;
                    $(".id_grado_academico").append('<option value='+id+'>'+nombre+'</option>');
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
            url: "<?php echo constant('URL');?>escuela/read",
            async: false,
            dataType: "json",
            success: function(data){
                //console.log('generos: ',data)
                $.each(data,function(key, registro) {
                    var id = registro.id_escuela;
                    var nombre = registro.nombre_escuela;
                    $(".id_escuela").append('<option value='+id+'>'+nombre+'</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }




    var mostrarDirectivos = function() {
        var tableDirectivo = $('#dataTableDirectivo').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": {
                "url": "<?php echo constant('URL');?>directivo/readtable"
            },
            "columns": [
            {defaultContent: "",
          "render": function ( data, type, full ) {
            return full['nombre_director'] + ' ' + full['appaterno_director']+ ' ' + full['apmaterno_director'];
          }  
        },
            { defaultContent: "",
     
            'render': function ( data, type, JsonResultRow, meta ) {

             var fullnameImagen  = JsonResultRow.appaterno_director + '_' + JsonResultRow.apmaterno_director + '_' + JsonResultRow.nombre_director+ '/'+ JsonResultRow.foto_director;

             var img = '/SGE/public/Director/'+ fullnameImagen;

             return '<center><img src="' + img + '" class="img-circle"  class="cell-border compact stripe" height="150px" width="150px"/></center>';
            }
            },  
            { "data": "telefono_director"},
            { "data": "cedulaprofesional_director"},
                {data:null,
                    "defaultContent":
                    `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleDirectivo' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                    <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarDirectivo' title="Editar Datos"><i class="fa fa-edit"></i></button>
                    <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarDirectivo' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
        obtenerdatosDT(tableDirectivo);
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableDirectivo tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            console.log(data);

            var idEliminarDirector = $('#idEliminarDirector').val(data.id_director);
            var idEliminarUsuario = $('#idEliminarUsuario').val(data.id_usuario);

            var id_director = $("#id_directorActualizar").val(data.id_director);
            var id_escuela = $("#id_escuelaActualizar option[value=" + data.id_escuela + "]").attr("selected",true);
            var id_grado_academico = $("#id_grado_academicoActualizar option[value=" + data.id_grado_academico + "]").attr("selected",true);
            var id_usuario = $("#id_usuarioActualizar").val(data.id_usuario);
            var foto_director = $("#foto_directorActualizar").val(data.foto_director);
            var nombre_director = $("#nombre_directorActualizar").val(data.nombre_director);
            var appaterno_director = $("#appaterno_directorActualizar").val(data.appaterno_director);
            var apmaterno_director = $("#apmaterno_directorActualizar").val(data.apmaterno_director);
            var rfc_director = $("#rfc_directorActualizar").val(data.rfc_director);
            var curp_director = $("#curp_directorActualizar").val(data.curp_director);
            var calle_director = $("#calle_directorActualizar").val(data.calle_director);
            var numexterior_director = $("#numexterior_directorActualizar").val(data.numexterior_director);
            var numinterior_director = $("#numinterior_directorActualizar").val(data.numinterior_director);
            var cp_director = $("#codigoPostalActualizar").val(data.cp_director);
            var username_usuario = $("#username_usuarioActualizar").val(data.username_usuario);
            var password_usuario = $("#password_usuarioActualizar").val(data.password_usuario);
            $("#selectEstadoActualizar").empty();
            var estado_director = $("#selectEstadoActualizar").append('<option selected>' + data.estado_director + '</option>');


            $("#selectMunicipioActualizar").empty();
            var municipio_director = $("#selectMunicipioActualizar").append('<option selected>' + data.municipio_director + '</option>');


            $("#selectColoniaActualizar").empty();
            var colonia_director = $("#selectColoniaActualizar").append('<option selected>' + data.colonia_director + '</option>');
            var telefono_director = $("#telefono_directorActualizar").val(data.telefono_director);
            var email_director = $("#email_directorActualizar").val(data.email_director);
            var cedulaprofesional_director = $("#cedulaprofesional_directorActualizar").val(data.cedulaprofesional_director);
            var fechanacimiento_director = $("#fechanacimiento_directorActualizar").val(data.fechanacimiento_director);

            var idConsulta = $("#id_directorConsultar").val(data.id_director);
            var id_escuelaConsulta = $("#id_escuelaConsultar option[value=" + data.id_escuela + "]").attr("selected",true);
            var id_grado_academicoConsulta = $("#id_grado_academicoConsultar option[value=" + data.id_grado_academico + "]").attr("selected",true);
            var username_usuarioConsulta = $("#username_usuarioConsultar").val(data.username_usuario);
            var password_usuarioConsulta = $("#password_usuarioConsultar").val(data.password_usuario);
            var rutaImagenConsulta = $("#imgDirectorConsultar option[value=" + data.id_director + "]").attr("selected",true);
            var nombre_directorConsulta = $("#nombre_directorConsultar").val(data.nombre_director); 
            var appaterno_directorConsulta = $("#appaterno_directorConsultar").val(data.appaterno_director);
            var apmaterno_directorConsulta = $("#apmaterno_directorConsultar").val(data.apmaterno_director);
            var rfc_directorConsulta = $("#rfc_directorConsultar").val(data.rfc_director);
            var curp_directorConsulta = $("#curp_directorConsultar").val(data.curp_director);
            var calle_directorConsulta = $("#calle_directorConsultar").val(data.calle_director);
            var numexterior_directorConsulta = $("#numexterior_directorConsultar").val(data.numexterior_director);
            var numinterior_directorConsulta = $("#numinterior_directorConsultar").val(data.numinterior_director);
            var cp_directorConsulta = $("#codigoPostalConsultar").val(data.cp_director);
            var estado_directorConsulta = $("#selectEstadoConsultar").val(data.estado_director);
            var municipio_directorConsulta = $("#selectMunicipioConsultar").val(data.municipio_director);
            var colonia_directorConsulta = $("#selectColoniaConsultar").val(data.colonia_director);
            var telefono_directorConsulta = $("#telefono_directorConsultar").val(data.telefono_director);
            var email_directorConsulta = $("#email_directorConsultar").val(data.email_director);
            var cedulaprofesional_directorConsulta = $("#cedulaprofesional_directorConsultar").val(data.cedulaprofesional_director);
            var fechanacimiento_directorConsulta = $("#fechanacimiento_directorConsultar").val(data.fechanacimiento_director);
        });
    }

    $.validator.addMethod("selectRequired", function(value, element, arg){
        return arg !== value;
    }, "Selecciona un valor");

   

    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarDirectivo').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>usuario/insert",
                    async: false,
                    data: datos,
                    
                    success: function (data) {
                        console.log("data ",data)
                        var id_usuario = data;
                       
                        var idUsuario = id_usuario; 
                                var form_data = new FormData();
                        var imagen = ""; 
                        if($('#foto_director').val() != null) {
                          imagen = $('#foto_director').prop('files')[0];
                        }
                        form_data.append('id_usuario', idUsuario);
                        form_data.append('foto_director', imagen);
                        form_data.append('id_grado_academico', document.getElementById('id_grado_academico').value);
                        form_data.append('id_escuela', document.getElementById('id_escuela').value);

                        form_data.append('nombre_director', document.getElementById('nombre_director').value);
                        form_data.append('appaterno_director', document.getElementById('appaterno_director').value);
                        form_data.append('apmaterno_director', document.getElementById('apmaterno_director').value);
                        form_data.append('rfc_director', document.getElementById('rfc_director').value);
                        form_data.append('curp_director', document.getElementById('curp_director').value);
                        form_data.append('calle_director', document.getElementById('calle_director').value);
                        form_data.append('numexterior_director', document.getElementById('numexterior_director').value);
                        form_data.append('numinterior_director', document.getElementById('numinterior_director').value);
                        
                        form_data.append('codigoPostal', document.getElementById('codigoPostal').value);
                        form_data.append('selectEstado', document.getElementById('selectEstado').value);
                        form_data.append('selectMunicipio', document.getElementById('selectMunicipio').value);
                        form_data.append('selectColonia', document.getElementById('selectColonia').value);
                        
                        form_data.append('telefono_director', document.getElementById('telefono_director').value);
                        form_data.append('email_director', document.getElementById('email_director').value);
                        form_data.append('cedulaprofesional_director', document.getElementById('cedulaprofesional_director').value);
                        form_data.append('fechanacimiento_director', document.getElementById('fechanacimiento_director').value);
                        
                        form_data.append('id_tipo_usuario', document.getElementById('id_tipo_usuario').value);
                        form_data.append('username_usuario', document.getElementById('username_usuario').value);
                        form_data.append('password_usuario', document.getElementById('password_usuario').value);
                        
                        

                      $.ajax({
                        type: "POST",
                        url: "<?php echo constant('URL');?>directivo/insert",
                        async: false,
                        dataType: 'text',  // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                       // data: datos +"&id_usuario="+id_usuario,
                       
                            success: function (data) { 
                                
                                if (data == 'ok') {
                                    Swal.fire(
                                        "¡Éxito!",
                                        "El director ha sido registrado de manera correcta",
                                        "success"
                                        ).then(function () {
                                            window.location = "<?php echo constant('URL');?>directivo";
                                        })
                                    } else {
                                        Swal.fire(
                                            "¡Error!",
                                            "Ha ocurrido un error al registrar el director. " + data,
                                            "error"
                                            );
                                    }
                                },
                            });

                    },
                });

                
            }
        });
        $('#formRegistrarDirectivo').validate({
            rules: {
                nombre_director: {
                    required: true
                },
                appaterno_director: {
                    required: true
                },
                apmaterno_director: {
                    required: true
                },
                id_grado_academico: {
                    selectRequired: "default"
                },
                id_escuela: {
                    selectRequired: "default"
                },
                id_usuario: {
                    selectRequired: "default"
                },
                fechanacimiento_director: {
                    required: true
                },
                telefono_director: {
                    required: true,
                    number: true
                },
                email_director: {
                    required: true,
                    email: true
                },
                calle_director: {
                    required: true
                },
                numexterior_director: {
                    required: true
                },
                numinterior_director: {
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
                },
                cedulaprofesional_director: {
                    required: true
                },
                rfc_director: {
                    required: true
                },
                curp_director: {
                    required: true
                }
            },
            messages: {
                nombre_director: {
                    required: "Ingrese su nombre"
                },
                appaterno_director: {
                    required: "Ingrese su apellido paterno"
                },
                apmaterno_director: {
                    required: "Ingrese su apellido materno"
                },
                id_grado_academico: {
                    selectRequired: "Seleccione su grado de estudios"
                },
                id_escuela: {
                    selectRequired: "Seleccione una escuela"
                },
                id_usuario: {
                    selectRequired: "Seleccione su usuario"
                },
                fechanacimiento_director: {
                    required: "Ingrese su cumpleaños"
                },
                telefono_director: {
                    required: "Ingrese su teléfono",
                    number: "Sólo números"
                },
                email_director: {
                    required: "Ingrese su email",
                    email: "Debe llevar el formato de correo electrónico"
                },
                calle_director: {
                    required: "Ingrese su calle"
                },
                numexterior_director: {
                    required: "Ingrese su no. exterior"
                },
                numinterior_director: {
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
                },
                cedulaprofesional_director: {
                    required: "Ingrese su cédula profesional"
                },
                rfc_director: {
                    required: "Ingrese su RFC"
                },
                curp_director: {
                    required: "Ingrese su CURP"
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
            var datos = $('#formActualizarDirectivo').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL');?>usuario/update",
                async: false,
                data: datos,
                success: function (data) {
                    console.log("data ",data)
                    
                    },
                });
                var form_data = new FormData();
                        var imagen = ""; 
                        if($('#imgDirectorActualizar').val() != null) {
                          imagen = $('#imgDirectorActualizar').prop('files')[0];
                        }
                        
                        form_data.append('imgDirectorActualizar', imagen);
                        
                        form_data.append('id_directorActualizar', document.getElementById('id_directorActualizar').value);
                        form_data.append('id_usuarioActualizar', document.getElementById('id_usuarioActualizar').value);
                        form_data.append('id_grado_academicoActualizar', document.getElementById('id_grado_academicoActualizar').value);
                        form_data.append('id_escuelaActualizar', document.getElementById('id_escuelaActualizar').value);

                        form_data.append('nombre_directorActualizar', document.getElementById('nombre_directorActualizar').value);
                        form_data.append('appaterno_directorActualizar', document.getElementById('appaterno_directorActualizar').value);
                        form_data.append('apmaterno_directorActualizar', document.getElementById('apmaterno_directorActualizar').value);
                        form_data.append('rfc_directorActualizar', document.getElementById('rfc_directorActualizar').value);
                        form_data.append('curp_directorActualizar', document.getElementById('curp_directorActualizar').value);
                        form_data.append('calle_directorActualizar', document.getElementById('calle_directorActualizar').value);
                        form_data.append('numexterior_directorActualizar', document.getElementById('numexterior_directorActualizar').value);
                        form_data.append('numinterior_directorActualizar', document.getElementById('numinterior_directorActualizar').value);
                        
                        form_data.append('codigoPostalActualizar', document.getElementById('codigoPostalActualizar').value);
                        form_data.append('selectEstadoActualizar', document.getElementById('selectEstadoActualizar').value);
                        form_data.append('selectMunicipioActualizar', document.getElementById('selectMunicipioActualizar').value);
                        form_data.append('selectColoniaActualizar', document.getElementById('selectColoniaActualizar').value);
                        
                        form_data.append('telefono_directorActualizar', document.getElementById('telefono_directorActualizar').value);
                        form_data.append('email_directorActualizar', document.getElementById('email_directorActualizar').value);
                        form_data.append('cedulaprofesional_directorActualizar', document.getElementById('cedulaprofesional_directorActualizar').value);
                        form_data.append('fechanacimiento_directorActualizar', document.getElementById('fechanacimiento_directorActualizar').value);
                        
                        
                        

            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL');?>directivo/update",
                async: false,
                dataType: 'text',  // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                success: function (data) {
                    console.log("data ",data)
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El directivo ha sido Actualizado de manera correcta",
                            "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>directivo";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el directivo. " + data,
                                "error"
                                );
                        }
                    },
                });

        }
    });
        $('#formActualizarDirectivo').validate({
            rules: {
                nombre_directorActualizar: {
                    required: true
                },
                appaterno_directorActualizar: {
                    required: true
                },
                apmaterno_directorActualizar: {
                    required: true
                },
                id_grado_academicoActualizar: {
                    selectRequired: "default"
                },
                id_escuelaActualizar: {
                    selectRequired: "default"
                },
                id_usuarioActualizar: {
                    selectRequired: "default"
                },
                fechanacimiento_directorActualizar: {
                    required: true
                },
                telefono_directorActualizar: {
                    required: true,
                    number: true
                },
                email_directorActualizar: {
                    required: true,
                    email: true
                },
                calle_directorActualizar: {
                    required: true
                },
                numexterior_directorActualizar: {
                    required: true
                },
                numinterior_directorActualizar: {
                    required: true
                },
                codigoPostalActualizar: {
                    required: true,
                    number: true
                },
                selectEstadoActualizar: {
                    selectRequired: true
                },
                selectMunicipioActualizar: {
                    selectRequired: true
                },
                selectColoniaActualizar: {
                    selectRequired: true
                },
                cedulaprofesional_directorActualizar: {
                    required: true
                },
                rfc_directorActualizar: {
                    required: true
                },
                curp_directorActualizar: {
                    required: true
                }
            },
            messages: {
                nombre_directorActualizar: {
                    required: "Ingrese su nombre"
                },
                appaterno_directorActualizar: {
                    required: "Ingrese su apellido paterno"
                },
                apmaterno_directorActualizar: {
                    required: "Ingrese su apellido materno"
                },
                id_grado_academicoActualizar: {
                    selectRequired: "Seleccione su grado de estudios"
                },
                id_escuelaActualizar: {
                    selectRequired: "Seleccione una escuela"
                },
                id_usuarioActualizar: {
                    selectRequired: "Seleccione su usuario"
                },
                fechanacimiento_directorActualizar: {
                    required: "Ingrese su cumpleaños"
                },
                telefono_directorActualizar: {
                    required: "Ingrese su teléfono",
                    number: "Sólo números"
                },
                email_directorActualizar: {
                    required: "Ingrese su email",
                    email: "Debe llevar el formato de correo electrónico"
                },
                calle_directorActualizar: {
                    required: "Ingrese su calle"
                },
                numexterior_directorActualizar: {
                    required: "Ingrese su no. exterior"
                },
                numinterior_directorActualizar: {
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
                },
                cedulaprofesional_directorActualizar: {
                    required: "Ingrese su cédula profesional"
                },
                rfc_directorActualizar: {
                    required: "Ingrese su RFC"
                },
                curp_directorActualizar: {
                    required: "Ingrese su CURP"
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
    $( "#formEliminarDirectivo" ).submit(function( event ) {
        event.preventDefault();
        var datos = $('#formEliminarDirectivo').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL');?>directivo/delete",
            async: false,
            data: datos,
            success: function (data) {
                console.log("data ",data)
                var id_usuario = data;

                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>usuario/delete",
                    async: false,
                    data: datos +"&id_usuario="+id_usuario,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El directivo ha sido registrado de manera correcta",
                                "success"
                                ).then(function () {
                                    window.location = "<?php echo constant('URL');?>directivo";
                                })
                            } else {
                                Swal.fire(
                                    "¡Error!",
                                    "Ha ocurrido un error al registrar el directivo. " + data,
                                    "error"
                                    );
                            }
                        },
                    });

            },
        });


    });
}
function leerCodigoPostal(codigoPostal){
          $.get( "<?php echo constant('URL'); ?> 'public/js/sepomex_abril-2016.json", function( data ) {
            let data = JSON.parse(rawdata);
            console.log(data);
            let busqueda = data.filter(codigo => codigo.cp == codigoPostal);
            res.json(busqueda);
          });
        }

</script>
<script >
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
  function findCp(codigoPostal){
        leerCodigoPostal(codigoPostal.value);

    }
</script>