<?php
class Pago extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('pago/index');
    }

    function insert() {
        $id_cobro = $_POST['id_cobro'];
        $cantidad_pago = $_POST['cantidad_pago'];
        $descripcion_pago = $_POST['descripcion_pago'];
        $monto_cobro_pago = $_POST['monto_cobro_pago'];
        $restante_pago = $monto_cobro_pago-$cantidad_pago; 

        $data = array(
            'id_cobro' => $id_cobro,
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


    function update() {
        $id_pago = $_POST['id_pagoActualizar'];
        $id_cobro = $_POST['id_cobroActualizar'];
        $cantidad_pago = $_POST['cantidad_pagoActualizar'];
        $descripcion_pago = $_POST['descripcion_pagoActualizar'];
        $monto_cobro_pago = $_POST['monto_cobro_pagoActualizar'];
        $restante_pago = $monto_cobro_pago-$cantidad_pago; 

        $data = array(
            'id_pago' => $id_pago,
            'id_cobro' => $id_cobro,
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

    function delete(){
        $id_pago = $_POST['idEliminarPago'];

        require 'model/pagoDAO.php';
        $this->loadModel('PagoDAO');
        $pagoDAO = new PagoDAO();
        $pagoDAO->delete($id_pago);
    }

    function read() {
       require 'model/pagoDAO.php';
       $this->loadModel('PagoDAO');
       $pagoDAO = new PagoDAO();
       $pagoDAO = $pagoDAO->read();
       echo json_encode($pagoDAO);
   }

   function readTable() {
    require 'model/pagoDAO.php';
    $this->loadModel('PagoDAO');
    $pagoDAO = new PagoDAO();
    $pagoDAO = $pagoDAO->read();

    $obj = null;
    if (is_array($pagoDAO) || is_object($pagoDAO))
    {
        foreach ($pagoDAO as $key => $value) {
            $obj["data"][] = $value;
        }
    } else {
        $obj = array();
    }
    echo json_encode($obj);
    
}


}