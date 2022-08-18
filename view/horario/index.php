<?php
session_start();
if(!isset($_SESSION['tipo'])){
    header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('Horario');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarHorario'> <i class="fas fa-plus-circle"></i> Registrar Horario </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Horarios</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableHorario" name="dataTableHorario" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora inicio</th>
                                    <th>Hora fin</th>
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
<div class="modal fade" id="modalRegistrarHorario" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarHorario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Horario <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarHorario" name="formRegistrarHorario" method="post">
                    <div class="card-body">

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Fecha</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Fecha (*)</label>
                                            <input type="date" class="form-control" id="materia_fecha_horario" name="materia_fecha_horario" placeholder="Fecha" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Horario</h3>
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
                                            <label>Hora comienzo (*)</label>
                                            <input type="time" class="form-control" id="materia_horainicio_horario" name="materia_horainicio_horario" placeholder="Inicio" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Hora finaliza (*)</label>
                                            <input type="time" class="form-control" id="materia_horafin_horario" name="materia_horafin_horario" placeholder="Finaliza" />
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

<!--------------------------------------------------------- Modal Actualizar--------------------------------------->
<div class="modal fade" id="modalActualizarHorario" tabindex="-1" role="dialog" aria-labelledby="modalActualizarHorario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Horario <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarHorario" name="formActualizarHorario">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_horarioActualizar" name="id_horarioActualizar" />
                            </div>
                        </div>

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Fecha</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Fecha (*)</label>
                                            <input type="date" class="form-control" id="materia_fecha_horarioActualizar" name="materia_fecha_horarioActualizar" placeholder="Fecha" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Horario</h3>
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
                                            <label>Hora comienzo (*)</label>
                                            <input type="time" class="form-control" id="materia_horainicio_horarioActualizar" name="materia_horainicio_horarioActualizar" placeholder="Inicio" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Hora finaliza (*)</label>
                                            <input type="time" class="form-control" id="materia_horafin_horarioActualizar" name="materia_horafin_horarioActualizar" placeholder="Finaliza" />
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

<!--------------------------------------------------------- Modal Detalle------------------------------------------>
<div class="modal fade" id="modalDetalleHorario" tabindex="-1" role="dialog" aria-labelledby="modalDetalleHorario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Horario <small> &nbsp;</small></h4>
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
                                <h3 class="card-title">Información del horario</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Clave horario </label>
                                            <input disabled type="text" class="form-control" id="id_horarioConsultar" name="id_horarioConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Fecha </label>
                                            <input type="text" disabled class="form-control" id="materia_fecha_horarioConsultar" name="materia_fecha_horarioConsultar" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Hora inicio </label>
                                            <input type="text" disabled class="form-control" id="materia_horainicio_horarioConsultar" name="materia_horainicio_horarioConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Hora fin </label>
                                            <input type="text" disabled class="form-control" id="materia_horafin_horarioConsultar" name="materia_horafin_horarioConsultar" />
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
<div class="modal fade" id="modalEliminarHorario" tabindex="-1" role="dialog" aria-labelledby="modalEliminarHorario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarHorario" name="formEliminarHorario">
                <input type="text" hidden id="idEliminarHorario" name="idEliminarHorario">
                <div class="modal-body text-center text-danger">¿Realmente desea eliminar este Horario?</div>
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
        mostrarHorarios();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
    });


    var mostrarHorarios = function() {
        var tableHorario = $('#dataTableHorario').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>horario/readTableHorarioConsulta"
            },
            "columns": [{
                    "data": "materia_fecha_horario"
                },
                {
                    "data": "materia_horainicio_horario"
                },
                {
                    "data": "materia_horafin_horario"
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleHorario' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarHorario' title="Editar Datos"><i class="fa fa-edit"></i></button>
                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarHorario' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
        obtenerdatosDT(tableHorario);
    }

    var obtenerdatosDT = function(table) {
        $('#dataTableHorario tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            console.log(data);
            var idEliminar = $('#idEliminarHorario').val(data.id_horario);

            var id_horario = $("#id_horarioActualizar").val(data.id_horario);
            var materia_fecha_horario = $("#materia_fecha_horarioActualizar").val(data.materia_fecha_horario);
            var materia_horainicio_horario = $("#materia_horainicio_horarioActualizar").val(data.materia_horainicio_horario);
            var materia_horafin_horario = $("#materia_horafin_horarioActualizar").val(data.materia_horafin_horario);

            var idConsulta = $("#id_horarioConsultar").val(data.id_horario);
            var materia_fecha_horarioConsulta = $("#materia_fecha_horarioConsultar").val(data.materia_fecha_horario);
            var materia_horainicio_horarioConsulta = $("#materia_horainicio_horarioConsultar").val(data.materia_horainicio_horario);
            var materia_horafin_horarioConsulta = $("#materia_horafin_horarioConsultar").val(data.materia_horafin_horario);
        });
    }


    var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formRegistrarHorario').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>horario/insert",
                    data: datos,
                    success: function(data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El horario ha sido registrado de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>horario";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el horario. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarHorario').validate({
            rules: {
                materia_fecha_horario: {
                    required: true
                },
                materia_horainicio_horario: {
                    required: true
                },
                materia_horafin_horario: {
                    required: true
                }
            },
            messages: {
                materia_fecha_horario: {
                    required: "Ingrese la fecha del horario"
                },
                materia_horainicio_horario: {
                    required: "Ingrese la hora de inicio de la clase"
                },
                materia_horafin_horario: {
                    required: "Ingrese la hora de fin de la clase"
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
                var datos = $('#formActualizarHorario').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>horario/update",
                    data: datos,
                    success: function(data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El horario ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>horario";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el horario. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarHorario').validate({
            rules: {
                materia_fecha_horarioActualizar: {
                    required: true
                },
                materia_horainicio_horarioActualizar: {
                    required: true
                },
                materia_horafin_horarioActualizar: {
                    required: true
                }
            },
            messages: {
                materia_fecha_horarioActualizar: {
                    required: "Ingrese la fecha del horario"
                },
                materia_horainicio_horarioActualizar: {
                    required: "Ingrese la hora de inicio de la clase"
                },
                materia_horafin_horarioActualizar: {
                    required: "Ingrese la hora de fin de la clase"
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
        $("#formEliminarHorario").submit(function(event) {
            event.preventDefault();
            var datos = $('#formEliminarHorario').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>horario/delete",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El horario ha sido eliminado correctamente",
                            "success"
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>horario";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al eliminar el horario. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }
</script>