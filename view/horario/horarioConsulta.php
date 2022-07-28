<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
  }
require 'view/menu.php';
$menu = new Menu();
$menu->header('horario_consulta');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">

        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tu Horario</h3>
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

<!--------------------------------------------------------- Modal Detalle------------------------------------------>
<div class="modal fade" id="modalDetalleHorario" tabindex="-1" role="dialog" aria-labelledby="modalDetalleHorario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Tu Horario <small> &nbsp;(*) Campos requeridos</small></h4>
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
                                    <div class="col-lg-6">
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
        eliminarRegistro();
    });


    var mostrarHorarios = function() {
        var tableHorario = $('#dataTableHorario').DataTable({
            "processing": true,
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