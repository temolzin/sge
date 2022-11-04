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
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Tu Horario</h3>
                    </div>
                    <div class="card-body">
                        <table id="dataTableHorario" name="dataTableHorario" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora inicio</th>
                                    <th>Hora fin</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
</script>