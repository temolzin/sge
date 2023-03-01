<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('Cobro');
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarCobro'> <i class="fas fa-plus-circle"></i> Registrar Cobro </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header"> Cobros</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableCobro" name="dataTableCobro" class="table table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Alumno</th>
                                    <th>Cantidad</th>
                                    <th>Concepto</th>
                                    <th>Fecha</th>
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
<div class="modal fade" id="modalRegistrarCobro" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarCobro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Cobro <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarCobro" name="formRegistrarCobro" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Alumno (*)</label>
                                    <div class="form-group">
                                        <select name="id_alumno" id="id_alumno" class="form-control id_alumno" style="width:100%;">
                                            <option value="default">Seleccione el alumno</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Cantidad (*)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="cantidad_cobro" name="cantidad_cobro" placeholder="Cantidad cobro" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>IVA (*)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="iva_cobro" name="iva_cobro" placeholder="IVA cobro" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Concepto (*)</label>
                                    <select name="concepto_cobro" id="concepto_cobro" class="form-control concepto_cobro">
                                        <option value="default">Seleccione el concepto de pago</option>
                                        <option>Inscripción</option>
                                        <option>Reinscripción</option>
                                        <option>Constancia de estudios</option>
                                        <option>Mantenimiento</option>
                                        <option>Titulación</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Fecha límite (*)</label>
                                    <input type="date" class="form-control" id="fechalimite_cobro" name="fechalimite_cobro" placeholder="Fecha límite" />
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
<div class="modal fade" id="modalActualizarCobro" tabindex="-1" role="dialog" aria-labelledby="modalActualizarCobro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Cobro <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarCobro" name="formActualizarCobro">
                    <div class="card-body">
                        <div class="row">
                            <input hidden type="number" class="form-control" id="id_cobroActualizar" name="id_cobroActualizar" />
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Alumno (*)</label>
                                    <div class="form-group">
                                        <select name="id_alumnoActualizar" id="id_alumnoActualizar" class="form-control id_alumno" style="width:100%;">
                                            <option value="default">Seleccione el alumno</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Cantidad (*)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="cantidad_cobroActualizar" name="cantidad_cobroActualizar" placeholder="Cantidad cobro" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>IVA (*)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="iva_cobroActualizar" name="iva_cobroActualizar" placeholder="IVA cobro" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Concepto (*)</label>
                                    <select name="concepto_cobroActualizar" id="concepto_cobroActualizar" class="form-control concepto_cobro">
                                        <option value="default">Seleccione el concepto de pago</option>
                                        <option>Inscripción</option>
                                        <option>Reinscripción</option>
                                        <option>Constancia de estudios</option>
                                        <option>Mantenimiento</option>
                                        <option>Titulación</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Fecha límite (*)</label>
                                    <input type="date" class="form-control" id="fechalimite_cobroActualizar" name="fechalimite_cobroActualizar" placeholder="Fecha límite" />
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

<!--------------------------------------------------------- Modal DetalleCobro----------------------------------------------->
<div class="modal fade" id="modalDetalleCobro" tabindex="-1" role="dialog" aria-labelledby="modalDetalleCobro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Cobro <small> &nbsp;</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Clave Cobro</label>
                                <input type="number" disabled class="form-control" id="id_cobroConsultar" name="id_cobroConsultar" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Alumno</label>
                                    <div class="form-group">
                                        <select name="id_alumnoConsultar" id="id_alumnoConsultar" disabled class="form-control id_alumno" style="width:100%;">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Cantidad</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" disabled class="form-control" id="cantidad_cobroConsultar" name="cantidad_cobroConsultar" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>IVA</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input type="number" disabled class="form-control" id="iva_cobroConsultar" name="iva_cobroConsultar" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Concepto</label>
                                    <input type="text" disabled class="form-control" id="concepto_cobroConsultar" name="concepto_cobroConsultar" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Fecha cobro</label>
                                    <input type="date" disabled class="form-control" id="fecha_cobroConsultar" name="fecha_cobroConsultar" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Fecha límite</label>
                                    <input type="date" disabled class="form-control" id="fechalimite_cobroConsultar" name="fechalimite_cobroConsultar" />
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

<!-- ****************************** Modal Eliminar Cobro *************************************************-->
<div class="modal fade" id="modalEliminarCobro" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCobro" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarCobro" name="formActualizarCobro">
                <input type="text" hidden id="idEliminarCobro" name="idEliminarCobro">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Cobro?</div>
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
    $('.id_alumno').select2();
});

    $(document).ready(function() {
        mostrarCobros();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        llenarAlumno();
    });

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
                    $('.id_alumno').append(new Option(nombre + ' ' + appat + ' ' + apmat, id, false, false));
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    var mostrarCobros = function() {
        var tableCobro = $('#dataTableCobro').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>cobro/readTable"
            },
            "columns": [{
                    defaultContent: "",
                    "render": function(data, type, JsonResultRow, meta) {
                        return JsonResultRow.nombre_alumno + ' ' + JsonResultRow.appaterno_alumno + ' ' + JsonResultRow.apmaterno_alumno;
                    }
                },
                {
                    "data": "cantidad_cobro"
                },
                {
                    "data": "concepto_cobro"
                },
                {
                    "data": "fechalimite_cobro"
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleCobro' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarCobro' title="Editar Datos"><i class="fa fa-edit"></i></button>
                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarCobro' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
        obtenerdatosDT(tableCobro);
    }

    $.validator.addMethod("selectRequired", function(value, element, arg) {
        return arg !== value;
    }, "Selecciona un valor");

    var obtenerdatosDT = function(table) {
        $('#dataTableCobro tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarCobro').val(data.id_cobro);

            var id_cobro = $("#id_cobroActualizar").val(data.id_cobro);
            var id_alumno = $("#id_alumnoActualizar option[value=" + data.id_alumno + "]").attr("selected", true);
            var cantidad_cobro = $("#cantidad_cobroActualizar").val(data.cantidad_cobro);
            var iva_cobro = $("#iva_cobroActualizar").val(data.iva_cobro);
            var concepto_cobro = $("#concepto_cobroActualizar").val(data.concepto_cobro);
            var fechalimite_cobro = $("#fechalimite_cobroActualizar").val(data.fechalimite_cobro);

            var idConsulta = $("#id_cobroConsultar").val(data.id_cobro);
            var id_alumnoConsulta = $("#id_alumnoConsultar option[value=" + data.id_alumno + "]").attr("selected", true);
            var cantidad_cobroConsulta = $("#cantidad_cobroConsultar").val(data.cantidad_cobro);
            var iva_cobroConsulta = $("#iva_cobroConsultar").val(data.iva_cobro);
            var concepto_cobroConsulta = $("#concepto_cobroConsultar").val(data.concepto_cobro);
            var fecha_cobroConsulta = $("#fecha_cobroConsultar").val(data.fecha_cobro);
            var fechalimite_cobroConsulta = $("#fechalimite_cobroConsultar").val(data.fechalimite_cobro);
        });
    }

    var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formRegistrarCobro').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>cobro/insert",
                    data: datos,
                    success: function(data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El Cobro ha sido registrado de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>cobro";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el Cobro. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarCobro').validate({
            rules: {
                id_alumno: {
                    selectRequired: "default"
                },
                cantidad_cobro: {
                    required: true,
                    number: true
                },
                iva_cobro: {
                    required: true,
                    number: true
                },
                concepto_cobro: {
                    selectRequired: "default"
                },
                fechalimite_cobro: {
                    required: true
                }
            },
            messages: {
                id_alumno: {
                    selectRequired: "Seleccione un alumno"
                },
                cantidad_cobro: {
                    required: "Ingrese cantidad de cobro",
                    number: "Sólo números"
                },
                iva_cobro: {
                    required: "Ingrese el iva del cobro",
                    number: "Sólo números"
                },
                concepto_cobro: {
                    selectRequired: "Seleccione el motivo de cobro"
                },
                fechalimite_cobro: {
                    required: "Ingrese la fecha límite de cobro"
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
                var datos = $('#formActualizarCobro').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>cobro/update",
                    data: datos,
                    success: function(data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El Cobro ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>cobro";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el Cobro. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarCobro').validate({
            rules: {
                id_alumnoActualizar: {
                    selectRequired: "default"
                },
                cantidad_cobroActualizar: {
                    required: true,
                    number: true
                },
                iva_cobroActualizar: {
                    required: true,
                    number: true
                },
                concepto_cobroActualizar: {
                    selectRequired: "default"
                },
                fechalimite_cobroActualizar: {
                    required: true
                }
            },
            messages: {
                id_alumnoActualizar: {
                    selectRequired: "Seleccione un alumno"
                },
                cantidad_cobroActualizar: {
                    required: "Ingrese cantidad de cobro",
                    number: "Sólo números"
                },
                iva_cobroActualizar: {
                    required: "Ingrese el iva del cobro",
                    number: "Sólo números"
                },
                concepto_cobroActualizar: {
                    selectRequired: "Seleccione el motivo de cobro"
                },
                fechalimite_cobroActualizar: {
                    required: "Ingrese la fecha límite de cobro"
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
        $("#formEliminarCobro").submit(function(event) {
            event.preventDefault();
            var datos = $('#formEliminarCobro').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>cobro/delete",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El Cobro ha sido eliminado correctamente",
                            "success"
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>cobro";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al eliminar el Cobro. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }
</script>
