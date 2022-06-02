<?php
session_start();
require 'view/menu.php';
$menu = new Menu();
$menu->header('Escuela');
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
                    <!---->
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarEscuela" name="formRegistrarEscuela" method="post">
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
                                            <label>Telefono</label>
                                            <input type="text" class="form-control" id="telefono_escuela" name="telefono_escuela" placeholder="Telefono" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" id="email_escuela" name="email_escuela" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Observacion Escuela</label>
                                            <input type="text" class="form-control" id="observacion_escuela" name="observacion_escuela" placeholder="Observacion Escuela" />
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
                                            <input class="form-control" name="calle_escuela" id="calle_escuela" placeholder="Calle Escuela" />

                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Numero Exterior</label>
                                            <input type="text" class="form-control" id="numxterior_escuela" name="numxterior_escuela" placeholder="Numero Exterior" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
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
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarEscuela" name="formActualizarEscuela">
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
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input type="text" class="form-control" id="telefono_escuelaActualizar" name="telefono_escuelaActualizar" placeholder="Telefono" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" id="email_escuelaActualizar" name="email_escuelaActualizar" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Observacion</label>
                                            <input type="text" class="form-control" id="observacion_escuelaActualizar" name="observacion_escuelaActualizar" placeholder="Observacion" />
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


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Numero Exterior</label>
                                            <input type="text" class="form-control" id="numxterior_escuelaActualizar" name="numxterior_escuelaActualizar" placeholder="Numero Exterior" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Numero Interior</label>
                                            <input type="text" class="form-control" id="numinterior_escuelaActualizar" name="numinterior_escuelaActualizar" placeholder="Numero Interior" />
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Codigo Postal (*)</label>
                                            <input onfocusout="findCpActualizar(this);" type="text" class="form-control" id="codigoPostalActualizar" name="codigoPostalActualizar" placeholder="Codigo Postal" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <select class="form-control estado" id="selectEstadoActualizar" name="selectEstadoActualizar" placeholder="Estado">
                                                <option value="default">Selecciona el Estado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Municipio</label>
                                            <select class="form-control municipio" id="selectMunicipioActualizar" name="selectMunicipioActualizar" placeholder="Municipio">
                                                <option value="default">Selecciona el Municipio</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
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
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input readonly type="text" class="form-control" id="telefono_escuelaConsultar" name="telefono_escuelaConsultar" placeholder="Telefono" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input readonly type="text" class="form-control" id="email_escuelaConsultar" name="email_escuelaConsultar" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
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


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Numero Exterior</label>
                                            <input readonly type="text" class="form-control" id="numxterior_escuelaConsultar" name="numxterior_escuelaConsultar" placeholder="Numero Exterior" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
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
            <form role="form" id="formEliminarEscuela" name="formActualizarEscuela">
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
    $(document).ready(function() {
        mostrarEscuela();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
    });


    function findCp(id_estado) {
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

        Sepomex.findCp({
                "cp": id_estado.value,
                "user": "apiqroo"
            },
            function(response) {
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
    }

    function findCpActualizar(id_estado) {
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

        Sepomex.findCp({
                "cp": id_estado.value,
                "user": "apiqroo"
            },
            function(response) {
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

    var mostrarEscuela = function() {
        var tableEscuela = $('#dataTableEscuela').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>escuela/readTable"
            },
            "columns": [
                {
                    "data": "nombre_escuela"
                },
                {
                    "data": "rfc_escuela"
                },
                {
                    "data": "cct_escuela"
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
            var calle_escuelaConsultar = $("#calle_escuelaConsultar").val(data.calle_escuela);
            var numxterior_escuelaConsultar = $("#numxterior_escuelaConsultar").val(data.numxterior_escuela);
            var numinterior_escuelaConsultar = $("#numinterior_escuelaConsultar").val(data.numinterior_escuela);
            var cp_escuelaConsulta = $("#codigoPostalConsultar").val(data.cp_escuela);
            var estado_escuelaConsulta = $("#selectEstadoConsultar").val(data.estado_escuela);
            var municipio_escuelaConsulta = $("#selectMunicipioConsultar").val(data.municipio_escuela);
            var colonia_escuelaConsulta = $("#selectColoniaConsultar").val(data.colonia_escuela);
            var telefono_escuelaConsultar = $("#telefono_escuelaConsultar").val(data.telefono_escuela);
            var email_escuelaConsultar = $("#email_escuelaConsultar").val(data.email_escuela);
            var observacion_escuelaConsultar = $("#observacion_escuelaConsultar").val(data.observacion_escuela);

        });
    }

    var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formRegistrarEscuela').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>escuela/insert",
                    data: datos,
                    success: function(data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El Escuela ha sido registrado de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>escuela";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el escuela. " + data,
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

    var enviarFormularioActualizar = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formActualizarEscuela').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>escuela/update",
                    data: datos,
                    success: function(data) {
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
                                "Ha ocurrido un error al Actualizar el escuela. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarEscuela').validate({
            rules: {
                matriculaActualizar: {
                    required: true,
                    number: true
                },
                nombreActualizar: {
                    required: true
                },
                apaternoActualizar: {
                    required: true
                },
                amaternoActualizar: {
                    required: true
                },
                emailActualizar: {
                    required: true
                }
            },
            messages: {
                matriculaActualizar: {
                    required: "Ingresa una matrícula",
                    number: "Sólo números"
                },
                nombreActualizar: {
                    required: "Ingresa un nombre"
                },
                apaternoActualizar: {
                    required: "Ingresa un apellido paterno"
                },
                amaternoActualizar: {
                    required: "Ingresa un apellido materno"
                },
                emailActualizar: {
                    required: "Ingresa un email"
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

    /*var dataTableFunction = function () {
        var table = $("#dataTableEscuela").DataTable({
            responsive: true,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });

        table.buttons().container().appendTo('#dataTableEscuela_wrapper .col-md-6:eq(0)');
    }*/
</script>