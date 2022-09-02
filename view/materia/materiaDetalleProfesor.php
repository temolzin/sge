<?php
session_start();
require 'view/menu.php';
$menu = new Menu();
$menu->header('materia_profesor');
?>

<head>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="public/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="public/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="public/plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
</head>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarMateriaProfesor'> <i class="fas fa-plus-circle"></i> Asignar Materias </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Asignación de Materias</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableMateriaProfesor" name="dataTableMateriaProfesor" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre Profesor</th>
                                    <th>Grupo</th>
                                    <th>Materia</th>
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
<div class="modal fade" id="modalRegistrarMateriaProfesor" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarMateriaProfesor" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header bg-success">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Asignación de Materias <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegistrarAsignarTareas" name="formRegistrarAsignarTareas" method="post">


                    <div class="card-body">
                        <div class="row">
                            <input hidden name="id_materia_profesor" placeholder="ID" />
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Seleccione Profesor (*)</label>
                                    <select name="id_profesor" id="id_profesor" class="form-control id_profesor">
                                        <option value="default">Seleccione el profesor</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Seleccione Grupo (*)</label>
                                    <select name="id_grupo" id="id_grupo" class="form-control id_grupo">
                                        <option value="default">Seleccione el grupo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Seleccione Materia (*)</label>
                                    <select name="id_materia" id="id_materia" class="form-control id_materia">
                                        <option value="default">Seleccione la materia</option>
                                    </select>
                                </div>
                            </div>
                            <!--  <div class="col-12 col-sm-12">
                          <label>Selecciona las materias</label>
                            <select name="id_materia[]" id="id_materia"
                          class="id_materia" multiple="multiple" data-placeholder="Seleciona las materias"
                          style="width: 100%;">
                            </select>
                        </div>
                    </div> -->

                            <br><br><br>
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

<!--------------------------------------------------------- Modal Actualizar--------------------------------------->
<div class="modal fade" id="modalActualizarMateriaProfesor" tabindex="-1" role="dialog" aria-labelledby="modalActualizarMateriaProfesor" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Asignación de Materias-Profesores <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarMateriaProfesor" name="formActualizarMateriaProfesor">
                    <div class="card-body">


                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Información de la asignación de materias</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body border-primary">
                                <div class="row">
                                    <input type="text" hidden class="form-control" id="id_MateriaProfesorActualizar" name="id_MateriaProfesorActualizar" />
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Profesor (*)</label>
                                            <select name="id_profesorActualizar" id="id_profesorActualizar" class="form-control id_profesor">
                                                <option value="default">Seleccione el profesor</option>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Grupo (*)</label>
                                            <select name="id_grupoActualizar" id="id_grupoActualizar" class="form-control id_grupo">
                                                <option value="default">Seleccione su grupo</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Materia (*)</label>
                                            <select multiple name="id_materiaActualizar" id="id_materiaActualizar" class="form-control id_materia" data-placeholder="Para visulizar las materias">

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
<div class="modal fade" id="modalDetalleMateriaProfesor" tabindex="-1" role="dialog" aria-labelledby="modalDetalleMateriaProfesor" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Asignación de Materias-Profesores <small> &nbsp;</small></h4>
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
                                <h3 class="card-title">Información de la materia-profesor</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                                <div class="row">
                                    <input type="text" hidden class="form-control" id="id_materiaProfesorConsultar" name="id_materiaProfesorConsultar" />
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Profesor</label>
                                            <select disabled name="id_profesorConsultar" id="id_profesorConsultar" class="form-control id_profesor">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Grupo </label>

                                            <select disabled name="id_grupoConsultar" id="id_grupoConsultar" class="form-control id_grupo">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Materia </label>
                                            <input disabled name="id_materiaConsultar" id="id_materiaConsultar" class="form-control id_materiaConsultar">
                                            </input>
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
<div class="modal fade" id="modalEliminarMateriaProfesor" tabindex="-1" role="dialog" aria-labelledby="modalEliminarMateriaProfesor" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarMateriaProfesor" name="formEliminarMateriaProfesor">
                <input type="text" hidden id="idEliminarMateriaProfesor" name="idEliminarMateriaProfesor">
                <div class="modal-body text-center text-danger">¿Realmente desea eliminar esta asignacion de materia?</div>
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
        llenarMateria();
        llenarProfesor();
        llenarGrupo();


    });
    //Initialize Select2 Elements
    //  $('.id_materia').select2({
    //     theme: 'bootstrap4'
    // })
    const llenarMateria = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>materia/read",
            async: false,
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, registro) {
                    var id = registro.id_materia;
                    var nombre = registro.nombre_materia;
                    $(".id_materia").append('<option value=' + id + '>' + nombre + '</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    const llenarProfesor = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>profesor/read",
            async: false,
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, registro) {
                    var id = registro.id_profesor;
                    var nombre = registro.nombre_profesor;
                    var appat = registro.appaterno_profesor;
                    var apmat = registro.apmaterno_profesor;
                    $(".id_profesor").append('<option value=' + id + '>' + nombre + ' ' + appat + ' ' + apmat + '</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    const llenarGrupo = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>grupo/read",
            async: false,
            dataType: "json",
            success: function(data) {
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



    var mostrarMaterias = function() {
        var tableMateria = $('#dataTableMateriaProfesor').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>materia/readTableDetalleProfesor"
            },
            "columns": [{
                    defaultContent: "",
                    "render": function(data, type, full) {
                        return full['nombre_profesor'] + ' ' + full['appaterno_profesor'] + ' ' + full['apmaterno_profesor'];
                    }
                },

                {
                    "data": "nombre_grupo"
                },
                {
                    "data": "nombre_materia"
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleMateriaProfesor' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarMateriaProfesor' title="Editar Datos"><i class="fa fa-edit"></i></button>
                <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarMateriaProfesor' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
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
        $('#dataTableMateriaProfesor tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            console.log(data);
            var idEliminar = $('#idEliminarMateriaProfesor').val(data.id_materia_profesor);


            var idActualizar = $('#id_MateriaProfesorActualizar').val(data.id_materia_profesor);
            var id_profesor = $("#id_profesorActualizar  option[value=" + data.id_profesor + "]").attr("selected", true);
            var id_grupo = $("#id_grupoActualizar option[value=" + data.id_grupo + "]").attr("selected", true);
            var id_materia = $("#id_materiaActualizar option[value=" + data.id_materia + "]").attr("selected", true);
            //var estado_alumno = $("#id_materiaActualizar").append('<option selected>' + data.id_materia + '</option>');

            var idConsulta = $("#id_materiaProfesorConsultar").val(data.id_materia_profesor);
            var id_profesorConsulta = $("#id_profesorConsultar option[value=" + data.id_profesor + "]").attr("selected", true);
            var id_grupoConsulta = $("#id_grupoConsultar option[value=" + data.id_grupo + "]").attr("selected", true);

            var id_materiaConsulta = $('#id_materiaConsultar').val(data.nombre_materia);
        });
    }

    $.validator.addMethod("selectRequired", function(value, element, arg) {
        return arg !== value;
    }, "Selecciona un valor");

    var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formRegistrarAsignarTareas').serialize();

                // echo('#formRegistrarAsignarTareas').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>materia/insertDetalleProfesor",
                    data: datos,

                    success: function(data) {

                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La asignacion de materias es  correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>materia/showMateria";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al realizar la asignacion. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarAsignarTareas').validate({
            rules: {
                id_profesor: {
                    selectRequired: "default"
                },

                id_grupo: {
                    selectRequired: "default"
                },
                id_materia: {
                    selectRequired: "default"
                }
            },
            messages: {
                id_profesor: {
                    required: "Selecciona el profesor/profesora"
                },

                id_grupo: {
                    selectRequired: "Seleccione un grupo"
                },
                id_materia: {
                    selectRequired: "Selecciona las materias"
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
                var datos = $('#formActualizarMateriaProfesor').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>materia/updateDetalleProfesor",
                    data: datos,
                    success: function(data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La asignacion  ha sido Actualizada de manera correcta",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>materia/showMateria";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al asignar materias materia. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarMateriaProfesor').validate({
            rules: {
                id_profesorActualizar: {
                    selectRequired: "default"
                },

                id_grupoActualizar: {
                    selectRequired: "default"
                },
                id_materiaActualizar: {
                    selectRequired: "default"
                }

            },
            messages: {
                id_profesorActualizar: {
                    required: "Falta seleccionar al profesor"
                },

                id_grupoActualizar: {
                    selectRequired: "Falta seleccionar un grupo"
                },
                id_materiaActualizar: {
                    selectRequired: "Falta seleccionar las materias"
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
        $("#formEliminarMateriaProfesor").submit(function(event) {
            event.preventDefault();
            var datos = $('#formEliminarMateriaProfesor').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>materia/deleteDetalleProfesor",
                data: datos,
                success: function(data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "La materia ha sido eliminado correctamente",
                            "success"
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>materia/showMateria";
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