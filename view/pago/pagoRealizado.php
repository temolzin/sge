<?php
session_start();
if (!isset($_SESSION['tipo'])) {
   header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('pago_consulta');
?>
<section class="content">
   <div class="container-fluid">
      <br>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3>Tus Pagos Realizados</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="dataTablePagoRealizado" name="dataTablePagoRealizado" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                     <thead>
                        <tr>
                           <th>Concepto</th>
                           <th>Cobro total</th>
                           <th>Cantidad pago</th>
                           <th>Restante pago</th>
                           <th>Fecha de pago</th>
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
<!--------------------------------------------------------- Modal DetallePagoRealizado----------------------------------------------->
<div class="modal fade" id="modalDetallePagoRealizado" tabindex="-1" role="dialog" aria-labelledby="modalDetallePagoRealizado" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="card-primary">
            <div class="card-header">
               <div class="d-sm-flex align-items-center justify-content-between ">
                  <h4 class="card-title">Pago <small> &nbsp;</small></h4>
                  <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               </div>
            </div>
            <form role="form" id="formConsulta" name="formConsulta">
               <div class="card-body">
                  <div class="row">
                     <input type="text" hidden class="form-control" id="id_pagoConsultar" name="id_pagoConsultar" />
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label>Alumno</label>
                           <input disabled name="nombre_alumnoConsultar" id="nombre_alumnoConsultar" class="form-control nombre_alumno" />
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Fecha de pago</label>
                           <input type="text" disabled name="fecha_pagoConsultar" id="fecha_pagoConsultar" class="form-control fecha_pago">
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Concepto</label>
                           <input type="text" disabled name="descripcion_pagoConsultar" id="descripcion_pagoConsultar" class="form-control descripcion_pago">
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Cobro total</label>
                           <input type="text" disabled name="monto_cobro_pagoConsultar" id="monto_cobro_pagoConsultar" class="form-control monto_cobro_pago">
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Cantidad pagada</label>
                           <input type="text" disabled name="cantidad_pagoConsultar" id="cantidad_pagoConsultar" class="form-control cantidad_pago">
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Cantidad Restante</label>
                           <input type="text" disabled name="restante_pagoConsultar" id="restante_pagoConsultar" class="form-control restante_pago">
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
      mostrarPagosRealizados();
   });

   var mostrarPagosRealizados = function() {
      var tablePagoRealizado = $('#dataTablePagoRealizado').DataTable({
         "ajax": {
            "processing": true,
            "serverSide": false,
            "type": "POST",
            "url": "<?php echo constant('URL'); ?>pago/readPagosRealizadosByIdAlumno",
            "data": {
               id_alumno: '<?php echo $_SESSION['id']; ?>'
            },
         },
         "columns": [{
               "data": "descripcion_pago"
            },
            {
               "data": "monto_cobro_pago"
            },
            {
               "data": "cantidad_pago"
            },
            {
               "data": "restante_pago"
            },
            {
               "data": "hora_pago"
            },

            {
               data: null,
               "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetallePagoRealizado' title="Ver Detalles"><i class="fa fa-eye"></i></button> `
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
      obtenerdatosDT(tablePagoRealizado);
   }

   var obtenerdatosDT = function(table) {
      $('#dataTablePagoRealizado tbody').on('click', 'tr', function() {
         var data = table.row(this).data();

         var idConsulta = $("#id_pagoConsultar").val(data.id_pago);
         var nombre_alumnoConsulta = $("#nombre_alumnoConsultar").val(data.nombre_alumno + ' ' + data.appaterno_alumno + ' ' + data.apmaterno_alumno);
         var cobro_total = $("#monto_cobro_pagoConsultar").val(data.monto_cobro_pago);
         var cantidadConsulta = $("#cantidad_pagoConsultar").val(data.cantidad_pago);
         var fecha_pagoConsulta = $("#fecha_pagoConsultar").val(data.hora_pago);
         var descripcionConsulta = $("#descripcion_pagoConsultar").val(data.descripcion_pago);
         var restanteConsulta = $("#restante_pagoConsultar").val(data.restante_pago);
      });
   }
</script>
