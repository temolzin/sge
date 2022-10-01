<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('escuela');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarEscuela'> <i class="fas fa-plus-circle"></i> Registrar Escuela </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabla Escuela</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableEscuela" name="dataTableEscuela" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">Foto</th>
                                    <th>Nombre Escuela</th>
                                    <th>RFC</th>
                                    <th>CCT</th>
                                    <th>Calle</th>
                                    <th>Num Exterior</th>
                                    <th>Num Interior</th>
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
<div class="modal fade" id="modalRegistrarEscuela" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarEscuela" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Escuela <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegistrarEscuela" enctype="multipart/form-data" name="formRegistrarEscuela" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-1 bg-secondary">
                                <h3 class="card-title">Datos Escolares</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span><label>Foto Escuela (*)</label></span>
                                        <div class="form-group input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" name="foto_escuela" id="foto_escuela" lang="es">
                                                <label class="custom-file-label" for="imagen">Seleccione Fotografía</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre Escuela</label>
                                            <input type="text" class="form-control" id="nombre_escuela" name="nombre_escuela" placeholder="Nombre Escuela" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>RFC</label>
                                            <input type="text" class="form-control" id="rfc_escuela" name="rfc_escuela" placeholder="RFC" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>CCT</label>
                                            <input type="text" class="form-control" id="cct_escuela" name="cct_escuela" placeholder="CCT" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Teléfono (*)</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="tel" id="telefono_escuela" name="telefono_escuela" class="form-control" data-inputmask='"mask": "(99) 99-9999-9999"' data-mask placeholder="Teléfono">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email (*)</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="email_escuela" name="email_escuela" placeholder="Eje. escuela@gmail.com " />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Observacion Escuela</label>
                                            <textarea name="observacion_escuela" id="observacion_escuela" cols="20" rows="10" placeholder="Observacion Escuela" class="form-control" style="height: 42px;"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-1 bg-secondary">
                                <h3 class="card-title">Dirección</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Calle Escuela</label>
                                            <input class="form-control" name="calle_escuela" id="calle_escuela" placeholder="Calle Escuela" />
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Numero Exterior</label>
                                            <input type="text" class="form-control" id="numxterior_escuela" name="numxterior_escuela" placeholder="Numero Exterior" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Numero Interior</label>
                                            <input type="text" class="form-control" id="numinterior_escuela" name="numinterior_escuela" placeholder="Numero Interior" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Codigo Postal (*)</label>
                                            <input onfocusout="findCp(this);" type="text" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="Codigo Postal" />
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

<div class="modal fade" id="modalActualizarEscuela" tabindex="-1" role="dialog" aria-labelledby="modalActualizarEscuela" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title"> Escuela <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <form role="form" id="formActualizarEscuela" enctype="multipart/form-data" name="formActualizarEscuela">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-1 bg-secondary">
                                <h3 class="card-title">Datos Escolares</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label hidden>Id (*)</label>
                                            <input type="text" hidden class="form-control" id="id_escuelaActualizar" name="id_escuelaActualizar" placeholder="id" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span><label>Foto Escuela (*)</label></span>
                                        <div class="form-group input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input" name="foto_escuelaActualizar" id="foto_escuelaActualizar" lang="es">
                                                <label class="custom-file-label" for="imagen">Selecciona imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre Escuela</label>
                                            <input type="text" class="form-control" id="nombre_escuelaActualizar" name="nombre_escuelaActualizar" placeholder="Nombre Escuela" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>RFC</label>
                                            <input type="text" class="form-control" id="rfc_escuelaActualizar" name="rfc_escuelaActualizar" placeholder="RFC" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>CCT</label>
                                            <input type="text" class="form-control" id="cct_escuelaActualizar" name="cct_escuelaActualizar" placeholder="CCT" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="telefono_escuelaActualizar" name="telefono_escuelaActualizar" placeholder="Telefono" />
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
                                                <input type="email" class="form-control" id="email_escuelaActualizar" name="email_escuelaActualizar" placeholder="Email" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Observacion</label>
                                            <textarea name="observacion_escuelaActualizar" id="observacion_escuelaActualizar" cols="20" rows="10" placeholder="Observacion" class="form-control" style="height: 42px;"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">


                        <div class="card">
                            <div class="card-header py-1 bg-secondary">
                                <h3 class="card-title">Dirección</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Calle Escuela</label>
                                            <input class="form-control" name="calle_escuelaActualizar" id="calle_escuelaActualizar" placeholder="Calle Escuela" />

                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Numero Exterior</label>
                                            <input type="text" class="form-control" id="numxterior_escuelaActualizar" name="numxterior_escuelaActualizar" placeholder="Numero Exterior" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Numero Interior</label>
                                            <input type="text" class="form-control" id="numinterior_escuelaActualizar" name="numinterior_escuelaActualizar" placeholder="Numero Interior" />
                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Codigo Postal (*)</label>
                                            <input onfocusout="findCpActualizar(this);" type="text" class="form-control" id="codigoPostalActualizar" name="codigoPostalActualizar" placeholder="Codigo Postal" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <select class="form-control estado" id="selectEstadoActualizar" name="selectEstadoActualizar" placeholder="Estado">
                                                <option value="default">Selecciona el Estado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Municipio</label>
                                            <select class="form-control municipio" id="selectMunicipioActualizar" name="selectMunicipioActualizar" placeholder="Municipio">
                                                <option value="default">Selecciona el Municipio</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Colonia</label>
                                            <select class="form-control colonia" id="selectColoniaActualizar" name="selectColoniaActualizar" placeholder="Municipio">
                                                <option value="default">Selecciona la Colonia</option>
                                            </select>
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

<!--------------------------------------------------------- Modal DetalleEscuela---------------------------------------------->
<div class="modal fade" id="modalDetalleEscuela" tabindex="-1" role="dialog" aria-labelledby="modalDetalleEscuela" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Escuela <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-1 bg-secondary">
                                <h3 class="card-title">Datos Escolares</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label hidden>Id (*)</label>
                                            <input type="text" hidden class="form-control" id="id_escuelaConsultar" name="id_escuelaConsultar" placeholder="id" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre Escuela</label>
                                            <input readonly type="text" class="form-control" id="nombre_escuelaConsultar" name="nombre_escuelaConsultar" placeholder="Nombre Escuela" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>RFC</label>
                                            <input readonly type="text" class="form-control" id="rfc_escuelaConsultar" name="rfc_escuelaConsultar" placeholder="RFC" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>CCT</label>
                                            <input readonly type="text" class="form-control" id="cct_escuelaConsultar" name="cct_escuelaConsultar" placeholder="CCT" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input readonly type="text" class="form-control" id="telefono_escuelaConsultar" name="telefono_escuelaConsultar" placeholder="Telefono" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input readonly type="text" class="form-control" id="email_escuelaConsultar" name="email_escuelaConsultar" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Observaciones</label>
                                            <input readonly type="text" class="form-control" id="observacion_escuelaConsultar" name="observacion_escuelaConsultar" placeholder="Numero Interior" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">


                        <div class="card">
                            <div class="card-header py-1 bg-secondary">
                                <h3 class="card-title">Dirección</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Calle Escuela</label>
                                            <input readonly class="form-control" name="calle_escuelaConsultar" id="calle_escuelaConsultar" placeholder="Calle Escuela" />

                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Numero Exterior</label>
                                            <input readonly type="text" class="form-control" id="numxterior_escuelaConsultar" name="numxterior_escuelaConsultar" placeholder="Numero Exterior" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Numero Interior</label>
                                            <input readonly type="text" class="form-control" id="numinterior_escuelaConsultar" name="numinterior_escuelaConsultar" placeholder="Numero Interior" />
                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Codigo Postal (*)</label>
                                            <input disabled type="text" class="form-control" id="codigoPostalConsultar" name="codigoPostalConsultar" placeholder="Codigo Postal" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Estado (*)</label>
                                            <input disabled name="selectEstadoConsultar" id="selectEstadoConsultar" class="form-control">
                                            <option value="default"></option>

                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Municipio (*)</label>
                                            <input disabled name="selectMunicipioConsultar" id="selectMunicipioConsultar" class="form-control">
                                            <option value="default"></option>

                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Colonia (*)</label>
                                            <input disabled name="selectColoniaConsultar" id="selectColoniaConsultar" class="form-control">
                                            <option value="default"></option>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<!-- ****************************** Modal Eliminar Escuela *************************************************-->
<div class="modal fade" id="modalEliminarEscuela" tabindex="-1" role="dialog" aria-labelledby="modalEliminarEscuela" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarEscuela" name="formEliminarEscuela">
                <input type="text" hidden id="idEliminarEscuela" name="idEliminarEscuela">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Escuela?</div>
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
        mostrarEscuela();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        rutaImagen();
    });

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    const rutaImagen = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>escuela/read",
            async: false,
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, registro) {
                    var id = registro.id_escuela;
                    var nombre = registro.nombre_escuela;
                    var cct = registro.cct_escuela;
                    var rfc = registro.rfc_escuela;
                    var foto_escuela = registro.foto_escuela;
                    var fullnameImagen = cct + '' + rfc + '' + nombre + '/' + foto_escuela;
                    var fotoConsulta = '<?php echo constant('URL') ?>public/escuela/' + fullnameImagen;
                    $(".id_escuela").append('<option value=' + id + '>' + fotoConsulta + '</option>');
                    $('#foto_escuelaConsultar').attr(fotoConsulta);
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    var mostrarEscuela = function() {
        var tableEscuela = $('#dataTableEscuela').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>escuela/readTable"
            },
            "columns": [{
                    defaultContent: "",
                    'render': function(data, type, JsonResultRow, meta) {
                        var fullnameImagen = JsonResultRow.cct_escuela + '_' + JsonResultRow.rfc_escuela + '_' + JsonResultRow.nombre_escuela + '/' + JsonResultRow.foto_escuela;
                        var img = '<?php echo constant('URL') ?>public/escuela/' + fullnameImagen;
                        return '<center><img src="' + img + '" class="img-circle"  class="cell-border compact stripe" height="50px" width="50px"/></center>';
                    }
                },
                {
                    defaultContent: "",
                    "render": function(data, type, full) {
                        return full['nombre_escuela'];
                    }
                },
                {
                    defaultContent: "",
                    "render": function(data, type, full) {
                        return full['rfc_escuela'];
                    }
                },
                {
                    defaultContent: "",
                    "render": function(data, type, full) {
                        return full['cct_escuela'];
                    }
                },
                {
                    "data": "calle_escuela"
                },
                {
                    "data": "numxterior_escuela"
                },
                {
                    "data": "numinterior_escuela"
                },

                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleEscuela' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarEscuela' title="Editar Datos"><i class="fa fa-edit"></i></button>
                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarEscuela' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
                }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableEscuela);
    }

    var obtenerdatosDT = function(table) {
        $('#dataTableEscuela tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarEscuela').val(data.id_escuela);

            var id_escuela = $("#id_escuelaActualizar").val(data.id_escuela);
            var nombre_escuela = $("#nombre_escuelaActualizar").val(data.nombre_escuela);
            var rfc_escuela = $("#rfc_escuelaActualizar").val(data.rfc_escuela);
            var cct_escuela = $("#cct_escuelaActualizar").val(data.cct_escuela);
            var calle_escuela = $("#calle_escuelaActualizar").val(data.calle_escuela);
            var numxterior_escuela = $("#numxterior_escuelaActualizar").val(data.numxterior_escuela);
            var numinterior_escuela = $("#numinterior_escuelaActualizar").val(data.numinterior_escuela);
            var cp_escuela = $("#codigoPostalActualizar").val(data.cp_escuela);
            $("#selectEstadoActualizar").empty();
            var estado_escuela = $("#selectEstadoActualizar").append('<option selected>' + data.estado_escuela + '</option>');
            $("#selectMunicipioActualizar").empty();
            var municipio_escuela = $("#selectMunicipioActualizar").append('<option selected>' + data.municipio_escuela + '</option>');
            $("#selectColoniaActualizar").empty();
            var colonia_alumno = $("#selectColoniaActualizar").append('<option selected>' + data.colonia_escuela + '</option>');
            var telefono_escuela = $("#telefono_escuelaActualizar").val(data.telefono_escuela);
            var email_escuela = $("#email_escuelaActualizar").val(data.email_escuela);
            var observacion_escuela = $("#observacion_escuelaActualizar").val(data.observacion_escuela);

            var idConsultar = $("#id_escuelaConsultar").val(data.id_escuela);
            var nombre_escuelaConsultar = $("#nombre_escuelaConsultar").val(data.nombre_escuela);
            var rfc_escuelaConsultar = $("#rfc_escuelaConsultar").val(data.rfc_escuela);
            var cct_escuelaConsultar = $("#cct_escuelaConsultar").val(data.cct_escuela);
            var telefono_escuelaConsultar = $("#telefono_escuelaConsultar").val(data.telefono_escuela);
            var email_escuelaConsultar = $("#email_escuelaConsultar").val(data.email_escuela);
            var observacion_escuelaConsultar = $("#observacion_escuelaConsultar").val(data.observacion_escuela);
            var calle_escuelaConsultar = $("#calle_escuelaConsultar").val(data.calle_escuela);
            var numxterior_escuelaConsultar = $("#numxterior_escuelaConsultar").val(data.numxterior_escuela);
            var numinterior_escuelaConsultar = $("#numinterior_escuelaConsultar").val(data.numinterior_escuela);
            var cp_escuelaConsulta = $("#codigoPostalConsultar").val(data.cp_escuela);
            var estado_escuelaConsulta = $("#selectEstadoConsultar").val(data.estado_escuela);
            var municipio_escuelaConsulta = $("#selectMunicipioConsultar").val(data.municipio_escuela);
            var colonia_escuelaConsulta = $("#selectColoniaConsultar").val(data.colonia_escuela);

        });
    }

    var datosInsertar = null;
    $('#formRegistrarEscuela').on('submit', function(e) {
       datosInsertar = new FormData(this);
    });
    var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
            submitHandler: function(e) {
                // var datos = $('#formRegistrarEscuela').serialize();
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>escuela/insert",
                    data: datosInsertar,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.submit').attr("disabled", "disabled");
                        $('#formRegistrarEscuela').css("opacity", ".5");
                    },
                    success: function(data) {
                        console.log("data ", data)
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La escuela ha sido registrado de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>escuela";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar la escuela. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarEscuela').validate({
            rules: {
                id_escuela: {
                    required: true,
                    number: true
                },
                nombre_escuela: {
                    required: true
                },
                rfc_escuela: {
                    required: true
                },
                cct_escuela: {
                    required: true
                },
                calle_escuela: {
                    required: true
                },
                numxterior_escuela: {
                    required: true
                },
                numinterior_escuela: {
                    required: true
                },
                telefono_escuela: {

                    required: true,
                    number: true
                },
                email_escuela: {
                    required: true
                },
                observacion_escuela: {
                    required: true
                }
            },
            messages: {
                id_escuela: {
                    required: "Ingresa una matrícula",
                    number: "Sólo números"
                },
                nombre_escuela: {
                    required: "Ingresa un nombre"
                },
                rfc_escuela: {
                    required: "Ingresa un apellido paterno"
                },
                cct_escuela: {
                    required: "Ingresa un apellido materno"
                },
                numxterior_escuela: {
                    required: "Ingresa el numero Exterior"
                },
                numinterior_escuela: {
                    required: "Ingresa el numero Interior"
                },
                telefono_escuela: {
                    required: "Ingresa el numero Telefono"
                },
                email_escuela: {
                    required: "Ingresa un email"
                },
                observacion_escuela: {
                    required: "Ingrese una observacion"
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

    // ACTUALIZAR
    var datosActualizar = null;
    $('#formActualizarEscuela').on('submit', function(e) {
        datosActualizar = new FormData(this);
    });
    var enviarFormularioActualizar = function() {
        $.validator.setDefaults({
            submitHandler: function(e) {

                    $.ajax({
                        type: "POST",
                        url: "<?php echo constant('URL'); ?>escuela/update",
                        data: datosActualizar,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('.submit').attr("disabled", "disabled");
                            $('#formActualizarEscuela').css("opacity", ".5");
                        },
                        success: function(data) {
                            console.log("data ", data)
                            if (data == 'ok') {
                                Swal.fire(
                                    "¡Éxito!",
                                    "El Escuela ha sido Actualizado de manera correcta",
                                    "success"
                                ).then(function() {
                                    window.location = "<?php echo constant('URL'); ?>escuela";
                                })
                            } else {
                                Swal.fire(
                                    "¡Error!",
                                    "Ha ocurrido un error al Actualizar el escuela." + data,
                                    "error"
                                );
                            }
                        },
                    });
            }
        });
        $('#formActualizarEscuela').validate({
            rules: {
                id_escuela: {
                    required: true,
                    number: true
                },
                nombre_escuela: {
                    required: true
                },
                rfc_escuela: {
                    required: true
                },
                cct_escuela: {
                    required: true
                },
                calle_escuela: {
                    required: true
                },
                numxterior_escuela: {
                    required: true
                },
                numinterior_escuela: {
                    required: true
                },
                telefono_escuela: {
                    required: true,
                    number: true
                },
                email_escuela: {
                    required: true
                },
                observacion_escuela: {
                    required: true
                }
            },
            messages: {
                id_escuela: {
                    required: "Ingresa una matrícula",
                    number: "Sólo números"
                },
                nombre_escuela: {
                    required: "Ingresa un nombre"
                },
                rfc_escuela: {
                    required: "Ingresa un apellido paterno"
                },
                cct_escuela: {
                    required: "Ingresa un apellido materno"
                },
                numxterior_escuela: {
                    required: "Ingresa el numero Exterior"
                },
                numinterior_escuela: {
                    required: "Ingresa el numero Interior"
                },
                telefono_escuela: {
                    required: "Ingresa el numero Telefono"
                },
                email_escuela: {
                    required: "Ingresa un email"
                },
                observacion_escuela: {
                    required: "Ingrese una observacion"
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
    // FIN ACTUALIZAR

    var eliminarRegistro = function() {
        $("#formEliminarEscuela").submit(function(event) {
            event.preventDefault();
            var datos = $('#formEliminarEscuela').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>escuela/delete",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El Escuela ha sido eliminado correctamente",
                            "success"
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>escuela";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al eliminar el escuela. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }
</script>
