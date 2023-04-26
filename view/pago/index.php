<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
}
$tipo = $_SESSION['tipo'];
require 'view/menu.php';
$menu = new Menu();
$menu->header('Pago');
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarPago'> <i class="fas fa-plus-circle"></i> Registrar Pago </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Pagos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTablePago" name="dataTablePago" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Concepto</th>
                                    <th>Cantidad</th>
                                    <th>Fecha y Hora</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                        </table>
                        <a href="<?php echo constant('URL'); ?>pago/generarReporte" id="export_pdf" class="btn btn-primary">Generar Reporte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--*****************************************MODALS****************************************-->
<!--------------------------------------------------------- Modal Registrar----------------------------------------------->
<div class="modal fade" id="modalRegistrarPago" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarPago" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Pago <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarPago" name="formRegistrarPago" method="post">
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Pago (*)</label>
                                    <div>
                                        <select name="id_cobro" id="id_cobro" class="form-control select_cobro" style="width: 100%;">
                                            <option value="default">Seleccione el pago</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Cantidad (*)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="cantidad_pago" name="cantidad_pago" placeholder="Cantidad pago" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Concepto (*)</label>
                                    <select name="descripcion_pago" id="descripcion_pago" class="form-control descripcion_pago">
                                        <option value="default">Seleccione el concepto de pago</option>
                                        <option>Inscripción</option>
                                        <option>Reinscripción</option>
                                        <option>Constancia de estudios</option>
                                        <option>Mantenimiento</option>
                                        <option>Titulación</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Monto total cobro (*)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="monto_cobro_pago" name="monto_cobro_pago" placeholder="Monto cobro" />
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
<div class="modal fade" id="modalActualizarPago" tabindex="-1" role="dialog" aria-labelledby="modalActualizarPago" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Pago <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarPago" name="formActualizarPago">
                    <div class="card-body">
                        <div class="row">
                            <input hidden type="number" class="form-control" id="id_pagoActualizar" name="id_pagoActualizar" />
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label>Cobro (*)</label>
                                    <select name="id_cobroActualizar" id="id_cobroActualizar" class="form-control id_cobro">
                                        <option value="default">Seleccione el cobro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label>Cantidad (*)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="cantidad_pagoActualizar" name="cantidad_pagoActualizar" placeholder="Cantidad pago" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label>Concepto (*)</label>
                                    <!--  <input type="text" class="form-control" id="descripcion_pagoActualizar" name="descripcion_pagoActualizar" placeholder="Concepto pago"/> -->
                                    <select name="descripcion_pagoActualizar" id="descripcion_pagoActualizar" class="form-control descripcion_pago">
                                        <option value="default">Seleccione el concepto de pago</option>
                                        <option>Inscripción</option>
                                        <option>Reinscripción</option>
                                        <option>Constancia de estudios</option>
                                        <option>Mantenimiento</option>
                                        <option>Titulación</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label>Monto total cobro (*)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="monto_cobro_pagoActualizar" name="monto_cobro_pagoActualizar" placeholder="Monto cobro" />
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

<!--------------------------------------------------------- Modal Detalle Pago----------------------------------------------->
<div class="modal fade" id="modalDetallePago" tabindex="-1" role="dialog" aria-labelledby="modalDetallePago" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Pago <small> &nbsp;</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsultaPago" name="formConsultaPago">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Clave Pago</label>
                                    <input type="number" disabled class="form-control" id="id_pagoConsultar" name="id_pagoConsultar" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Concepto</label>
                                    <input type="text" disabled class="form-control" id="descripcion_pagoConsultar" name="descripcion_pagoConsultar" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Fecha pago</label>
                                    <input type="date" disabled class="form-control" id="fecha_pagoConsultar" name="fecha_pagoConsultar" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Cobro</label>
                                    <select name="id_cobroConsultar" id="id_cobroConsultar" disabled class="form-control id_cobro">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>Cantidad</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" disabled class="form-control" id="cantidad_pagoConsultar" name="cantidad_pagoConsultar" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label>Monto total cobro</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" disabled class="form-control" id="monto_cobro_pagoConsultar" name="monto_cobro_pagoConsultar" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>Monto restante pago</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" disabled class="form-control" id="restante_pagoConsultar" name="restante_pagoConsultar" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Hora</label>
                                    <input type="time" disabled class="form-control" id="hora_pagoConsultar" name="hora_pagoConsultar" />
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

<!-- ****************************** Modal Eliminar Pago *************************************************-->
<div class="modal fade" id="modalEliminarPago" tabindex="-1" role="dialog" aria-labelledby="modalEliminarPago" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarPago" name="formEliminarPago">
                <input type="text" hidden id="idEliminarPago" name="idEliminarPago">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Pago?</div>
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
        $(document).ready(function() {
            $('.select_cobro').select2();
        });
        mostrarPagos();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        llenarCobro();
    });

    const llenarCobro = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>cobro/read",
            async: false,
            dataType: "json",
            success: function(data) {
                //console.log('generos: ',data)
                $.each(data, function(key, registro) {
                    var id = registro.id_cobro;
                    var nombre = registro.nombre_alumno;
                    var appat = registro.appaterno_alumno;
                    var apmat = registro.apmaterno_alumno;
                    var cantidad = registro.cantidad_cobro;
                    var concepto = registro.concepto_cobro;
                    $('.select_cobro').append(new Option(nombre + ' ' + appat + ' ' + apmat +  ' ---> ' + concepto, id, false, false));
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    var mostrarPagos = function() {
        var tablePago = $('#dataTablePago').DataTable({
            
            "ajax": {
            "processing": true,
            "serverSide": false,
            "type": "POST",
            "url":"<?php echo constant('URL'); ?>pago/readByIdEscuela",
            "data": {id_escuela: '<?php echo $_SESSION['id_escuela']; ?>'},
            },
            "columns": [{
                    "data": "descripcion_pago"
                },
                {
                    "data": "cantidad_pago"
                },
                {
                    "data": "hora_pago"
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetallePago' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                    <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarPago' title="Editar Datos"><i class="fa fa-edit"></i></button>
                    <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarPago' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
        obtenerdatosDT(tablePago);
    }

    $.validator.addMethod("selectRequired", function(value, element, arg) {
        return arg !== value;
    }, "Selecciona un valor");

    var obtenerdatosDT = function(table) {
        $('#dataTablePago tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            //console.log(data);
            var idEliminar = $('#idEliminarPago').val(data.id_pago);

            var id_pago = $("#id_pagoActualizar").val(data.id_pago);
            var id_cobro = $("#id_cobroActualizar option[value=" + data.id_cobro + "]").attr("selected", true);
            var cantidad_pago = $("#cantidad_pagoActualizar").val(data.cantidad_pago);
            var descripcion_pago = $("#descripcion_pagoActualizar").val(data.descripcion_pago);
            var monto_cobro_pago = $("#monto_cobro_pagoActualizar").val(data.monto_cobro_pago);

            var idConsulta = $("#id_pagoConsultar").val(data.id_pago);
            var id_cobroConsulta = $("#id_cobroConsultar option[value=" + data.id_cobro + "]").attr("selected", true);
            var cantidad_pagoConsulta = $("#cantidad_pagoConsultar").val(data.cantidad_pago);
            var descripcion_pagoConsulta = $("#descripcion_pagoConsultar").val(data.descripcion_pago);
            var hora_pagoConsulta = $("#hora_pagoConsultar").val(data.hora_pago);
            var monto_cobro_pagoConsulta = $("#monto_cobro_pagoConsultar").val(data.monto_cobro_pago);
            var restante_pagoConsulta = $("#restante_pagoConsultar").val(data.restante_pago);
        });
    }

    var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formRegistrarPago').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>pago/insert",
                    data: datos,
                    success: function(data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El pago ha sido registrado de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>pago";
                            })
                            
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el pago. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarPago').validate({
            rules: {
                id_cobro: {
                    selectRequired: "default"
                },
                cantidad_pago: {
                    required: true,
                    number: true
                },
                descripcion_pago: {
                    selectRequired: "default"
                },
                monto_cobro_pago: {
                    required: true,
                    number: true
                }
            },
            messages: {
                id_cobro: {
                    selectRequired: "Seleccione un cobro"
                },
                cantidad_pago: {
                    required: "Ingrese cantidad de pago",
                    number: "Sólo números"
                },
                descripcion_pago: {
                    selectRequired: "Seleccione el motivo de pago"
                },
                monto_cobro_pago: {
                    required: "Ingrese cantidad de cobro",
                    number: "Sólo números"
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
                var datos = $('#formActualizarPago').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>pago/update",
                    data: datos,
                    success: function(data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El Cobro ha sido registrado de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>pago";
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
        $('#formActualizarPago').validate({
            rules: {
                id_cobroActualizar: {
                    selectRequired: "default"
                },
                cantidad_pagoActualizar: {
                    required: true,
                    number: true
                },
                descripcion_pagoActualizar: {
                    selectRequired: "default"
                },
                monto_cobro_pagoActualizar: {
                    required: true,
                    number: true
                }
            },
            messages: {
                id_cobroActualizar: {
                    selectRequired: "Seleccione un cobro"
                },
                cantidad_pagoActualizar: {
                    required: "Ingrese cantidad de pago",
                    number: "Sólo números"
                },
                descripcion_pagoActualizar: {
                    selectRequired: "Seleccione el motivo de pago"
                },
                monto_cobro_pagoActualizar: {
                    required: "Ingrese cantidad de cobro",
                    number: "Sólo números"
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
        $("#formEliminarPago").submit(function(event) {
            event.preventDefault();
            var datos = $('#formEliminarPago').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>pago/delete",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El Pago ha sido eliminado correctamente",
                            "success"
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>pago";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al eliminar el Pago. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }
</script>
