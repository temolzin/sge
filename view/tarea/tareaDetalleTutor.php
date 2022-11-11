<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('tareaalumno_consulta');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Tareas</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableTareaConsultaAlumno" name="dataTableTareaConsultaAlumno" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Tarea</th>
                                    <th>Grupo</th>
                                    <th>Descripción</th>
                                    <th>Fecha Entrega</th>
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
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Grupo</label>
                                    <input readonly type="text" class="form-control" id="grupo_alumnoConsultar" name="grupo_alumnoConsultar" placeholder="Grupo" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Materia</label>
                                    <input readonly type="text" class="form-control" id="materia_alumnoConsultar" name="materia_alumnoConsultar" placeholder="Materia" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Tarea</label>
                                    <input readonly type="text" class="form-control" id="tarea_alumnoConsultar" name="tarea_alumnoConsultar" placeholder="CCT" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Fecha Entrega</label>
                                    <input readonly type="text" class="form-control" id="fechatarea_alumnoConsultar" name="fechatarea_alumnoConsultar" placeholder="Telefono" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Material</label>
                                    <input readonly type="text" class="form-control" id="material_alumnoConsultar" name="material_alumnoConsultar" placeholder="Material" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Descripción Tarea</label>
                                    <input readonly type="text" class="form-control" id="descripcion_alumnoConsultar" name="descripcion_alumnoConsultar" placeholder="Telefono" />
                                </div>
                            </div>
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
    });

    var mostrarTareaAlumno = function() {
        var tableTareaAlumno = $('#dataTableTareaConsultaAlumno').DataTable({
            "processing": true,
            "ajax": {
                "processing": true,
                "serverSide": false,
                "type": "POST",
                "url":"<?php echo constant('URL'); ?>tarea/readTareaTutorByIdGrupo",
                "data": {id_grupo: '<?php echo $_SESSION['id_grupo']; ?>'},
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
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleTareaAlumno' title="Ver Detalles"><i class="fa fa-eye"></i></button>`
                }
            ],
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
        $('#dataTableTareaConsultaAlumno tbody').on('click', 'tr', function() {
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
</script>