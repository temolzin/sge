<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('Pago');
?>
<section class="content">
    <div class="container-fluid">
    <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Pagos</h3>
                    </div>
                    <div class="card-body">
                        <table id="dataTablePago" name="dataTablePago" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Concepto</th>
                                    <th>Cantidad</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
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
                </div>
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

<?php
$menu->footer();
?>

<script>
    $(document).ready(function() {
        mostrarPagos();
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
                    $(".id_cobro").append('<option value=' + id + '>' + nombre + ' ' + appat + ' ' + apmat + ' --> ' + cantidad + ' --> ' + concepto + '</option>');
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
                    "data": "fecha_pago"
                },
                {
                    "data": "hora_pago"
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetallePago' title="Ver Detalles"><i class="fa fa-eye"></i></button>`
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
            var idConsulta = $("#id_pagoConsultar").val(data.id_pago);
            var id_cobroConsulta = $("#id_cobroConsultar option[value=" + data.id_cobro + "]").attr("selected", true);
            var cantidad_pagoConsulta = $("#cantidad_pagoConsultar").val(data.cantidad_pago);
            var descripcion_pagoConsulta = $("#descripcion_pagoConsultar").val(data.descripcion_pago);
            var fecha_pagoConsulta = $("#fecha_pagoConsultar").val(data.fecha_pago);
            var hora_pagoConsulta = $("#hora_pagoConsultar").val(data.hora_pago);
            var monto_cobro_pagoConsulta = $("#monto_cobro_pagoConsultar").val(data.monto_cobro_pago);
            var restante_pagoConsulta = $("#restante_pagoConsultar").val(data.restante_pago);
        });
    }
</script>