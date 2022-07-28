<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
  }
require 'view/menu.php';
$menu = new Menu();
$menu->header('Materia');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarMateria'> <i class="fas fa-plus-circle"></i> Registrar Materia </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Materias</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableMateria" name="dataTableMateria" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Escuela</th>
                                    <th>Nombre materia</th>
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
<div class="modal fade" id="modalRegistrarMateria" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarMateria" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Materia <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarMateria" name="formRegistrarMateria" method="post">
                    <div class="card-body">

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Información de la materia</h3>
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
                                            <label>Nombre materia (*)</label>
                                            <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" placeholder="Materia" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Horario (*)</label>
                                            <select name="id_horario" id="id_horario" class="form-control id_horario">
                                                <option value="default">Seleccione su horario</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Escuela perteneciente</h3>
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

<!--------------------------------------------------------- Modal Actualizar--------------------------------------->
<div class="modal fade" id="modalActualizarMateria" tabindex="-1" role="dialog" aria-labelledby="modalActualizarMateria" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Materia <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarMateria" name="formActualizarMateria">
                    <div class="card-body">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_materiaActualizar" name="id_materiaActualizar" />
                            </div>
                        </div>

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Información de la materia</h3>
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
                                            <label>Nombre materia (*)</label>
                                            <input type="text" class="form-control" id="nombre_materiaActualizar" name="nombre_materiaActualizar" placeholder="Materia" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Horario (*)</label>
                                            <select name="id_horarioActualizar" id="id_horarioActualizar" class="form-control id_horario">
                                                <option value="default">Seleccione su horario</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Escuela perteneciente</h3>
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

<!--------------------------------------------------------- Modal Detalle------------------------------------------>
<div class="modal fade" id="modalDetalleMateria" tabindex="-1" role="dialog" aria-labelledby="modalDetalleMateria" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Materia <small> &nbsp;</small></h4>
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
                                <h3 class="card-title">Información de la materia</h3>
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
                                            <label>Clave materia </label>
                                            <input disabled type="text" class="form-control" id="id_materiaConsultar" name="id_materiaConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre materia </label>
                                            <input type="text" disabled class="form-control" id="nombre_materiaConsultar" name="nombre_materiaConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Horario </label>
                                            <select disabled name="id_horarioConsultar" id="id_horarioConsultar" class="form-control id_horario">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Escuela perteneciente</h3>
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
                                            <label>Escuela </label>
                                            <select disabled name="id_escuelaConsultar" id="id_escuelaConsultar" class="form-control id_escuela">
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
<div class="modal fade" id="modalEliminarMateria" tabindex="-1" role="dialog" aria-labelledby="modalEliminarMateria" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarMateria" name="formEliminarMateria">
                <input type="text" hidden id="idEliminarMateria" name="idEliminarMateria">
                <div class="modal-body text-center text-danger">¿Realmente desea eliminar esta Materia?</div>
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
        mostrarMaterias();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        llenarEscuela();
        llenarHorario();
    });

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

    const llenarHorario = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>horario/readHorarioConsulta",
            async: false,
            dataType: "json",
            success: function(data) {
                //console.log('generos: ',data)
                $.each(data, function(key, registro) {
                    var id = registro.id_horario;
                    var fecha = registro.materia_fecha_horario;
                    var horario = registro.materia_horainicio_horario;
                    $(".id_horario").append('<option value=' + id + '>' + fecha + ' --> ' + horario + '</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    var mostrarMaterias = function() {
        var tableMateria = $('#dataTableMateria').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>materia/readtable"
            },
            "columns": [{
                    "data": "nombre_escuela"
                },
                {
                    "data": "nombre_materia"
                },
                {
                    "data": "materia_fecha_horario"
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleMateria' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarMateria' title="Editar Datos"><i class="fa fa-edit"></i></button>
                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarMateria' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
        obtenerdatosDT(tableMateria);
    }

    var obtenerdatosDT = function(table) {
        $('#dataTableMateria tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            console.log(data);
            var idEliminar = $('#idEliminarMateria').val(data.id_materia);

            var id_materia = $("#id_materiaActualizar").val(data.id_materia);
            var id_escuela = $("#id_escuelaActualizar option[value=" + data.id_escuela + "]").attr("selected", true);
            var id_horario = $("#id_horarioActualizar option[value=" + data.id_horario + "]").attr("selected", true);
            var nombre_materia = $("#nombre_materiaActualizar").val(data.nombre_materia);

            var idConsulta = $("#id_materiaConsultar").val(data.id_materia);
            var id_escuelaConsulta = $("#id_escuelaConsultar option[value=" + data.id_escuela + "]").attr("selected", true);
            var id_horarioConsulta = $("#id_horarioConsultar option[value=" + data.id_horario + "]").attr("selected", true);
            var nombre_materiaConsulta = $("#nombre_materiaConsultar").val(data.nombre_materia);
        });
    }

    $.validator.addMethod("selectRequired", function(value, element, arg) {
        return arg !== value;
    }, "Selecciona un valor");

    var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formRegistrarMateria').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>materia/insert",
                    data: datos,
                    success: function(data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La materia ha sido registrada de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>materia";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar la materia. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarMateria').validate({
            rules: {
                id_escuela: {
                    selectRequired: "default"
                },
                id_horario: {
                    selectRequired: "default"
                },
                nombre_materia: {
                    required: true
                }
            },
            messages: {
                id_escuela: {
                    selectRequired: "Seleccione una escuela"
                },
                id_horario: {
                    selectRequired: "Seleccione un horario"
                },
                nombre_materia: {
                    required: "Ingrese el nombre de la materia"
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
                var datos = $('#formActualizarMateria').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>materia/update",
                    data: datos,
                    success: function(data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La Materia ha sido Actualizada de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>materia";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar la materia. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarMateria').validate({
            rules: {
                id_escuelaActualizar: {
                    selectRequired: "default"
                },
                id_horarioActualizar: {
                    selectRequired: "default"
                },
                nombre_materiaActualizar: {
                    required: true
                }
            },
            messages: {
                id_escuelaActualizar: {
                    selectRequired: "Seleccione una escuela"
                },
                id_horarioActualizar: {
                    selectRequired: "Seleccione un horario"
                },
                nombre_materiaActualizar: {
                    required: "Ingrese el nombre de la materia"
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
        $("#formEliminarMateria").submit(function(event) {
            event.preventDefault();
            var datos = $('#formEliminarMateria').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>materia/delete",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "La materia ha sido eliminado correctamente",
                            "success"
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>materia";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al eliminar la materia. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }
</script>