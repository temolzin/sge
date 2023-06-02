<?php
class Pago extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('pago/index');
    }

    function showPagoRealizado()
    {
        $this->view->render('pago/pagoRealizado');
    }

    function insert()
    {
        $id_cobro = $_POST['id_cobro'];
        $id_alumno = $_POST['id_alumno'];
        $cantidad_pago = $_POST['cantidad_pago'];
        $descripcion_pago = $_POST['descripcion_pago'];
        $monto_cobro_pago = $_POST['monto_cobro_pago'];
        $restante_pago = $monto_cobro_pago - $cantidad_pago;

        $data = array(
            'id_cobro' => $id_cobro,
            'id_alumno' => $id_alumno,
            'cantidad_pago' => $cantidad_pago,
            'descripcion_pago' => $descripcion_pago,
            'monto_cobro_pago' => $monto_cobro_pago,
            'restante_pago' => $restante_pago
        );

        require 'model/pagoDAO.php';
        $this->loadModel('PagoDAO');
        $pagoDAO = new PagoDAO();
        $pagoDAO->insert($data);
    }


    function update()
    {
        $id_pago = $_POST['id_pagoActualizar'];
        $id_cobro = $_POST['id_cobroActualizar'];
        $id_alumno = $_POST['id_alumnoActualizar'];
        $cantidad_pago = $_POST['cantidad_pagoActualizar'];
        $descripcion_pago = $_POST['descripcion_pagoActualizar'];
        $monto_cobro_pago = $_POST['monto_cobro_pagoActualizar'];
        $restante_pago = $monto_cobro_pago - $cantidad_pago;

        $data = array(
            'id_pago' => $id_pago,
            'id_cobro' => $id_cobro,
            'id_alumno' => $id_alumno,
            'cantidad_pago' => $cantidad_pago,
            'descripcion_pago' => $descripcion_pago,
            'monto_cobro_pago' => $monto_cobro_pago,
            'restante_pago' => $restante_pago
        );

        require 'model/pagoDAO.php';
        $this->loadModel('PagoDAO');
        $pagoDAO = new PagoDAO();
        $pagoDAO->update($data);
    }

    function delete()
    {
        $id_pago = $_POST['idEliminarPago'];

        require 'model/pagoDAO.php';
        $this->loadModel('PagoDAO');
        $pagoDAO = new PagoDAO();
        $pagoDAO->delete($id_pago);
    }
    
    function readByIdEscuela()
    {
        $id_escuela = $_POST['id_escuela'];
        require 'model/pagoDAO.php';
        $this->loadModel('PagoDAO');
        $pagoDAO = new PagoDAO();
        $pagoDAO = $pagoDAO->readByIdEscuela($id_escuela);

        $obj = null;
        if (is_array($pagoDAO) || is_object($pagoDAO)) {
            foreach ($pagoDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    function read()
    {
        require 'model/pagoDAO.php';
        $this->loadModel('PagoDAO');
        $pagoDAO = new PagoDAO();
        $pagoDAO = $pagoDAO->read();
        echo json_encode($pagoDAO);
    }

    function readTable()
    {
        require 'model/pagoDAO.php';
        $this->loadModel('PagoDAO');
        $pagoDAO = new PagoDAO();
        $pagoDAO = $pagoDAO->read();

        $obj = null;
        if (is_array($pagoDAO) || is_object($pagoDAO)) {
            foreach ($pagoDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    function readPagosRealizadosByIdAlumno()
    {
        $id_alumno = $_POST['id_alumno'];
        require 'model/pagoDAO.php';
        $this->loadModel('PagoDAO');
        $pago_consultaDAO = new PagoDAO();
        $pago_consultaDAO = $pago_consultaDAO->readPagosRealizadosByIdAlumno($id_alumno);

        $obj = null;
        if (is_array($pago_consultaDAO) || is_object($pago_consultaDAO)) {
            foreach ($pago_consultaDAO as $key => $value) {
                $obj["data"][] = $value;
            }
        } else {
            $obj = array();
        }
        echo json_encode($obj);
    }

    function generarReporte()
    {
        require_once __DIR__ . '/../vendor/autoload.php';
        require_once __DIR__ . '/../view/pago/reportePago/plantillaReporte.php';

        $pagos = array();
        $escuela = array();

        $id_escuela = $_GET['id_escuela'];
        require 'model/pagoDAO.php';
        $this->loadModel('PagoDAO');
        $pagoDAO = new PagoDAO();
        $pagoDAO->obtenerDatos($pagos, $escuela, $id_escuela);

        $ruta_imagen = constant('URL') . 'public/escuela/' . $escuela['cct_escuela'] . '_' . $escuela['rfc_escuela'] . '_' . $escuela['nombre_escuela'] . '/';

        $logo = constant('URL'). 'favicon.png';

        $css = file_get_contents(__DIR__ . '/../view/pago/reportePago/styles.css');

        $mpdf = new \Mpdf\Mpdf([]);

        $plantilla = getPlantilla($pagos, $ruta_imagen, $logo, $escuela);

        $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->writeHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

        header('Content-Type: application/pdf');
        $mpdf->Output("reportePago", "I");
    }
}
