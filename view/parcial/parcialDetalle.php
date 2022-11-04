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
    mostrarParcial();
  });
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
</script>