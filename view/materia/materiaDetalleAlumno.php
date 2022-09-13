<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('alumno_materia');
?>

<section class="content">
    <div class="container-fluid">

        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Materias</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableAlumnoMateria" name="dataTableAlumnoMateria" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
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
                                <h3 class="card-title">Información Materias</h3>
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


<?php
$menu->footer();
?>

<script>
    $(document).ready(function() {
        mostrarMaterias();
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
            url: "<?php echo constant('URL'); ?>horario/read",
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
        var tableMateria = $('#dataTableAlumnoMateria').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>materia/readTableMateriaAlumno"
            },
            "columns": [

                {
                    "data": "nombre_materia"
                },
                {
                    "data": "materia_fecha_horario"
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleMateria' title="Ver Detalles"><i class="fa fa-eye"></i></button>`
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
        $('#dataTableAlumnoMateria tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            //console.log(data);

            var idConsulta = $("#id_materiaConsultar").val(data.id_materia);
            var id_escuelaConsulta = $("#id_escuelaConsultar option[value=" + data.id_escuela + "]").attr("selected", true);
            var id_horarioConsulta = $("#id_horarioConsultar option[value=" + data.id_horario + "]").attr("selected", true);
            var nombre_materiaConsulta = $("#nombre_materiaConsultar").val(data.nombre_materia);
        });
    }
</script>