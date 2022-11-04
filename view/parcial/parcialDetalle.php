<?php
session_start();
  if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
  }
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('parcial');
    ?>
    <section class="content">
      <div class="container-fluid">
        <br>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3>Parcial</h3>
              </div>
              <div class="card-body">
                <table id="dataTableParcial" name="dataTableParcial" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th>Nombre Parcial</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Fin</th>
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
    <!--------------------------------------------------------- Modal Detalle----------------------------------------------->
    <div class="modal fade" id="modalDetalleParcial" tabindex="-1" role="dialog" aria-labelledby="modalDetalleParcial" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="card-primary">
            <div class="card-header">
              <div class="d-sm-flex align-items-center justify-content-between ">
                <h4 class="card-title">Parcial <small> &nbsp;(*) Campos requeridos</small></h4>
                <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
            </div>
            <form role="form" id="formConsulta" name="formConsulta">
              <div class="card-body">
                <div class="card">
                  <div class="card-header py-1 bg-primary">
                    <h3 class="card-title">Informacion Parcial</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body border-primary">
                    <div class="row">
                      <input type="text" hidden class="form-control" id="id_parcialConsultar" name="id_parcialConsultar" />
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Escuela *</label>
                          <select disabled name="id_escuelaConsultar" id="id_escuelaConsultar" class="form-control id_escuela"></select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Nombre Parcial*</label>
                          <input disabled type="text" class="form-control" id="nombre_parcialConsultar" name="nombre_parcialConsultar" placeholder="Nombre Parcial" />
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Fecha inicio </label>
                          <input disabled name="fechainicio_parcialConsultar" id="fechainicio_parcialConsultar" class="form-control fechainicio_parcialConsultar">
                          </input>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Fecha fin </label>
                          <input disabled name="fechafin_parcialConsultar" id="fechafin_parcialConsultar" class="form-control fechafin_parcialConsultar">
                          </input>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
</div>

  <?php
  $menu->footer();
  ?>
<script>
  $(document).ready(function() {
    mostrarParcial();
    llenarEscuela();
  });
  const llenarEscuela = () => {
  $.ajax({
    type: "GET",
    url: "<?php echo constant('URL'); ?>escuela/read",
    async: false,
    dataType: "json",
    success: function(data) {
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
    var mostrarParcial = function() {
      var tableIncidencia = $('#dataTableParcial').DataTable({
      "processing": true,
      "ajax": {
      "url": "<?php echo constant('URL'); ?>parcial/readTable"
      },
      "columns": [{
      "data": "nombre_parcial"
      },

      {
        "data": "fechainicio_parcial"
      },
      {
      "data": "fechafin_parcial"
      },
      {
      data: null,
      "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleParcial' title="Ver Detalles"><i class="fa fa-eye"></i></button>`
      }
    ],
    responsive: true,
    autoWidth: false,
    language: idiomaDataTable,
    lengthChange: true,
    buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
    dom: 'Bfltip'
    });
      obtenerdatosDT(tableIncidencia);
    }

  var obtenerdatosDT = function(table) {
    $('#dataTableParcial tbody').on('click', 'tr', function() {
      var data = table.row(this).data();
      var idConsulta = $("#id_parcialConsultar").val(data.id_parcial);
      var id_escuelaConsulta = $("#id_escuelaConsultar option[value=" + data.id_escuela + "]").attr("selected", true);
      var nombre_parcial = $("#nombre_parcialConsultar").val(data.nombre_parcial);
      var fechainicio_parcialConsultar = $("#fechainicio_parcialConsultar").val(data.fechainicio_parcial);
      var fechafin_parcialConsultar = $("#fechafin_parcialConsultar").val(data.fechafin_parcial);
    });
  }
</script>