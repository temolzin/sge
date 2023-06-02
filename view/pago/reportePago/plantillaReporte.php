<?php

function getPlantilla($pagos, $ruta_imagen, $logo, $escuela){

  $primer_pago = reset($pagos);
  $ultimo_pago = end($pagos);
  $fecha_primer_pago = date('d/m/Y', strtotime($primer_pago['hora_pago']));
  $fecha_ultimo_pago = date('d/m/Y', strtotime($ultimo_pago['hora_pago']));

$plantilla= '
<body>
<header class="clearfix">
  <div id="logo">
    <img src="' . $logo . '" width="100" height="100">
  </div>
  <div id="company">
  <div id="logo_esc">
    <img src="' . $ruta_imagen . $escuela['foto_escuela'] . '" width="100" height="100">
  </div>
    <h2 class="name">' . $pagos[0]['nombre_escuela'] . '</h2>
    <div>' . $pagos[0]['telefono_escuela'] . '</div>
    <div id="email"><a>' . $pagos[0]['email_escuela'] . '</a></div>
  </div>
  </div>
</header>
<main>
  <div id="details" class="clearfix">
    <div id="invoice">
      <h1>REPORTE DE PAGOS</h1>
      <div class="date">Fecha de inicio: '. $fecha_primer_pago .'</div>
      <div class="date">Fecha de corte: '. $fecha_ultimo_pago .'</div>
    </div>
  </div>
  <table border="0" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th class="no">#</th>
        <th class="desc">CONCEPTO</th>
        <th class="unit">CANTIDAD DE COBRO</th>
        <th class="qty">FECHA DE PAGO</th>
        <th class="total">PAGO</th>
      </tr>
    </thead>
    <tbody>';

    $total_pagos = 0;
    foreach($pagos as $pago) {
      $total_pagos += $pago['cantidad_pago'];
      $plantilla .='
      <tr>
        <td class="no">'. $pago['id_pago'] .'</td>
        <td class="desc"><h3>'. $pago['descripcion_pago'] .'</h3></td>
        <td class="unit">$'. number_format($pago['monto_cobro_pago'], 2, '.', ',') .'</td>
        <td class="qty">'. date('d/m/Y', strtotime($pago['hora_pago'])) .'</td>
        <td class="total">$'. number_format($pago['cantidad_pago'], 2, '.', ',') .'</td>
      </tr>';
    }

      $plantilla .='
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2"></td>
        <td colspan="2">SUBTOTAL</td>
        <td>$'. number_format($total_pagos, 2, '.', ',') .'</td>
      </tr>
      <tr>
        <td colspan="2"></td>
        <td colspan="2">INGRESOS TOTALES</td>
        <td>$'. number_format($total_pagos, 2, '.', ',') .'</td>
      </tr>
    </tfoot>
  </table>
  <div id="notices">
    <div>IMPORTANTE:</div>
    <div class="notice">Para mayores informes consulta el apartado de pagos</div>
  </div>
</main>
<footer>
<div><a href="https://www.rootheim.com">Root Heim Company</a></div>
</footer>
</body>';

    return $plantilla;

  }

?>
