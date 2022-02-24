<?php
session_start();
require 'view/menu.php';
$menu = new Menu();
$menu->header('TareaAlumno');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tareas</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableTareaAlumno" name="dataTableTareaAlumno" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Tarea</th>
                                    <th>Grupo</th>
                                    <th>Descripción</th>
                                    <th>Fecha Entrega</th>
                                    <th>Archivo</th>
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

<!--------------------------------------------------------- Modal DetalleTareaAlumno---------------------------------------------->
<div class="modal fade" id="modalDetalleTareaAlumno" tabindex="-1" role="dialog" aria-labelledby="modalDetalleTareaAlumno" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Detalle Tarea</h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" name="formConsulta">

                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label hidden>Id (*)</label>
                                    <input type="text" hidden class="form-control" id="id_tarea_alumnoConsultar" name="id_tarea_alumnoConsultar" placeholder="id" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Grupo</label>
                                    <input readonly type="text" class="form-control" id="grupo_alumnoConsultar" name="grupo_alumnoConsultar" placeholder="Grupo" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Materia</label>
                                    <input readonly type="text" class="form-control" id="materia_alumnoConsultar" name="materia_alumnoConsultar" placeholder="Materia" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Tarea</label>
                                    <input readonly type="text" class="form-control" id="tarea_alumnoConsultar" name="tarea_alumnoConsultar" placeholder="CCT" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Descripción Tarea</label>
                                    <input readonly type="text" class="form-control" id="descripcion_alumnoConsultar" name="descripcion_alumnoConsultar" placeholder="Telefono" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Material</label>
                                    <input readonly type="text" class="form-control" id="material_alumnoConsultar" name="material_alumnoConsultar" placeholder="Material" />
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Fecha Entrega</label>
                                    <input readonly type="text" class="form-control" id="fechatarea_alumnoConsultar" name="fechatarea_alumnoConsultar" placeholder="Telefono" />
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<!--------** Modulo Adjuntar Tarea **--------->


<div class="modal fade" id="modalRegistrarEscuela" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarEscuela" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Enviar Tareas</h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegistrarTareaAlumno" name="formRegistrarTareaAlumno" method="post">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label hidden>Id (*)</label>
                                    <input type="text" hidden class="form-control" id="id_tarea_alumnoDetalle" name="id_tarea_alumnoDetalle" placeholder="id" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label hidden>Calificación Tarea</label>
                                    <input type="text" hidden class="form-control border-0" id="calificacion_tarea" name="calificacion_tarea" placeholder="Nombre Tarea">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre Tarea</label>
                                    <input readonly type="text" class="form-control border-0" id="tarea_alumnoDetalle" name="tarea_alumnoDetalle" placeholder="Nombre Tarea" />
                                </div>
                            </div>



                            <div clas="col-lg-6">
                                <div class="form-group">
                                    <label>Subir archivos</label>
                                    <input type="file" class="form-control" id="archivo_tarea_entregada" name="archivo_tarea_entregada" placeholder="Archivos" />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Comentarios</label>
                                    <textarea class="form-control" name="comentarios_tarea" id="comentarios_tarea" rows="5" cols="20" placeholder="Comentarios">
                                </textarea>
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


<?php
$menu->footer();
?>

<script>
    $(document).ready(function() {
        mostrarTareaAlumno();
        eliminarRegistro();
        enviarFormularioRegistrar();
    });




    var mostrarTareaAlumno = function() {
        var tableTareaAlumno = $('#dataTableTareaAlumno').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>tarea/readTableTareaAlumno"
            },
            "columns": [{
                    "data": "nombre_tarea"
                },
                {
                    "data": "id_grupo"
                },

                {
                    "data": "descripcion_tarea"
                },
                {
                    "data": "fecha_entrega"
                },

                {
                    "defaultContent": "",
                    render: function(data, type, row) {
                        return `<a download="${row.archivo_tarea}" href="public/tareas/${row.nombre_tarea}/${row.archivo_tarea}"><button class='consulta btn btn-danger' title="Descargar PDF"><i class="fa fa-file-pdf"></i></button></a>`;
                    }
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleTareaAlumno' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                <button class='editar btn btn-success' data-toggle='modal' data-target='#modalRegistrarEscuela' title="Seleccionar Archivos"><i class="fa fa-paper-plane"></i></button>`
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
        obtenerdatosDT(tableTareaAlumno);
    }

    var obtenerdatosDT = function(table) {
        $('#dataTableTareaAlumno tbody').on('click', 'tr', function() {
            var data = table.row(this).data();




            var idConsultar = $("#id_tarea_alumnoConsultar").val(data.id_tarea_alumno);
            var grupoalumno = $("#grupo_alumnoConsultar").val(data.id_grupo);
            var materilaAlumno = $("#materia_alumnoConsultar").val(data.id_materia);
            var tarea_alumnoConsultar = $("#tarea_alumnoConsultar").val(data.nombre_tarea);
            var descripcion_alumnoConsultar = $("#descripcion_alumnoConsultar").val(data.descripcion_tarea);
            var material_alumnoConsultar = $("#material_alumnoConsultar").val(data.archivo_tarea);
            var fechatarea_alumnoConsultar = $("#fechatarea_alumnoConsultar").val(data.fecha_entrega);

            var idDetalle = $("#id_tarea_alumnoDetalle").val(data.id_tarea_alumno);
            var tarea_alumnoDetalle = $("#tarea_alumnoDetalle").val(data.nombre_tarea);


        });
    }

    var enviarFormularioRegistrar = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var form_data = $('#formRegistrarTareaAlumno').serialize();
                var form_data = new FormData();

                var archivo = "";
                if ($('#archivo_tarea_entregada').val() != null) {
                    archivo = $('#archivo_tarea_entregada').prop('files')[0];
                }


                form_data.append('id_tarea_alumnoDetalle', document.getElementById('id_tarea_alumnoDetalle').value);

                form_data.append('archivo_tarea_entregada', archivo);

                form_data.append('tarea_alumnoDetalle', document.getElementById('tarea_alumnoDetalle').value);

                form_data.append('comentarios_tarea', document.getElementById('comentarios_tarea').value);

                form_data.append('calificacion_tarea', document.getElementById('calificacion_tarea').value);


                $.ajax({
                    type: "POST",

                    async: false,
                    url: "<?php echo constant('URL'); ?>tareaalumno/insert",
                    dataType: 'text', // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(data) {


                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "La tarea se envio con exito",
                                "success"
                            ).then(function() {
                                window.location = "<?php echo constant('URL'); ?>tareaalumno";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el tareaalumno. " + data,
                                "error"
                            );
                        }

                    },
                });
            }
        });
        $('#formRegistrarTareaAlumno').validate({
            rules: {

                id_tarea_alumno: {
                    required: true,
                    number: true
                },
                nombre_tareaalumno: {
                    required: true
                },
                rfc_tareaalumno: {
                    required: true
                },
                cct_tareaalumno: {
                    required: true
                },
                calle_tareaalumno: {
                    required: true
                },
                numxterior_tareaalumno: {
                    required: true
                },
                numinterior_tareaalumno: {
                    required: true
                },
                telefono_tareaalumno: {

                    required: true,
                    number: true
                },
                email_tareaalumno: {
                    required: true
                },
                observacion_tareaalumno: {
                    required: true
                }
            },
            messages: {
                id_tareaalumno: {
                    required: "Ingresa una matrícula",
                    number: "Sólo números"
                },
                nombre_tareaalumno: {
                    required: "Ingresa un nombre"
                },
                rfc_tareaalumno: {
                    required: "Ingresa un apellido paterno"
                },
                cct_tareaalumno: {
                    required: "Ingresa un apellido materno"
                },
                numxterior_tareaalumno: {
                    required: "Ingresa el numero Exterior"
                },
                numinterior_tareaalumno: {
                    required: "Ingresa el numero Interior"
                },
                telefono_tareaalumno: {
                    required: "Ingresa el numero Telefono"
                },
                email_tareaalumno: {
                    required: "Ingresa un email"
                },
                observacion_tareaalumno: {
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
</script>