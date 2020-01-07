<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ventas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        # Cargamos los modelos a utilizar
        $this->load->model('SaleModel');
        $this->load->model('TypeVoucherModel');
        $this->load->model('ClientModel');
        $this->load->model('DetailSaleModel');
        $this->load->model('ProductModel');

        # Validamos si existe una session
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    } # End method construct

    public function index()
    {
        # Array con los datos a enviar a la vista
        $data = array(
            'title' => 'Ventas',
            'sales' => $this->SaleModel->getSales()
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'sale/list', $data);
    } # End method index

    public function add()
    {
        # Array con los datos a enviar a la vista
        $data = array(
            'title'             => 'Ventas',
            'subTitle'          => 'Agregar',
            'vouchers'          => $this->TypeVoucherModel->getVouhers(),
            'clients'           => $this->ClientModel->getClients(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'sale/add', $data);
    } # End method add

    public function create()
    {
        # Recuperamos los datos de la vista que vienen por el method post
        $date               = $this->input->post('date');
        $sub_total          = $this->input->post('subtotal');
        $igv                = $this->input->post('igv');
        $discount           = $this->input->post('discount');
        $total              = $this->input->post('total');
        $type_voucher_id    = $this->input->post('idvoucher');
        $client_id          = $this->input->post('idclient');
        $user_id            = $this->session->userdata('id');
        $num_voucher        = $this->input->post('num');
        $serie              = $this->input->post('serie');

        $products_id        = $this->input->post('idproduct');
        $price              = $this->input->post('price');
        $quantity           = $this->input->post('quantity');
        $import             = $this->input->post('import');

        # Array con los datos a enviar al modelo
        $data = array(
            'date'              => $date,
            'sub_total'         => $sub_total,
            'igv'               => $igv,
            'discount'          => $discount,
            'total'             => $total,
            'type_voucher_id'   => $type_voucher_id,
            'client_id'         => $client_id,
            'user_id'           => $user_id,
            'num_voucher'       => $num_voucher,
            'serie'             => $serie
        );

        # Validamos que la venta halla sido registrada correctamente
        if ($this->SaleModel->saveSale($data)) {
            # Traemos el id de la ultima venta
            $sale_id = $this->SaleModel->lastId();

            # Llamamos al metodo updateVoucher
            $this->updateVoucherQuantity($type_voucher_id);

            # Llamamos al metodo saveDetails
            $this->saveDetailsSale($sale_id, $products_id, $price, $quantity, $import);

            # Lo enviamos a la vista list con sus errores
            redirect(base_url() . 'movimientos/ventas');
        } else {
            # Lo enviamos a la vista add con sus errores
            redirect(base_url() . 'movimientos/ventas/add');
        }
    } # End method create

    protected function updateVoucherQuantity($voucher_id)
    {
        # Traemos el comprobante por su a id
        $voucherCurrent = $this->TypeVoucherModel->getVoucherById($voucher_id);

        // TODO:: Hacer un metodo en el modelo TypeVoucherModel que solo obtega la cantidad
        # Array con los datos a enviar al modelo
        $data = array(
            'quantity' => $voucherCurrent->quantity + 1,
        );

        # Modificamos la cantidad del comprobante
        $this->TypeVoucherModel->updateVoucher($voucher_id, $data);
    } # End method updateVoucher

    protected function saveDetailsSale($sale_id, $products, $price, $quantity, $import)
    {
        # Recorremos los productos para guardar cada registro del detalle venta
        for ($i = 0; $i < count($products); $i++) {
            # Array con los datos a enviar al modelo
            $data = array(

                'product_id'        => $products[$i],
                'sale_id'           => $sale_id,
                'price'             => $price[$i],
                'quantity'          => $quantity[$i],
                'import'            => $import[$i],
            );

            # guardamos el registro de la venta
            $this->DetailSaleModel->saveDetailsSales($data);
            # Llamamos al metodo updateStockProduct
            $this->updateStockProduct($products[$i], $quantity[$i]);
        }
    } # End method saveDetails

    public function view()
    {
        # Recuperamos los datos de la vista que vienen por el method post
        $id_sale = $this->input->post('id');

        # Array con los datos a enviar a la vista
        $data = array(
            'sale'          => $this->SaleModel->getSaleById($id_sale),
            'details'       => $this->DetailSaleModel->getDetailsSalesById($id_sale)
        );
        
        # Lo enviamos a la vista view
        $this->load->view('modules/admin/sale/view', $data);
    } # End method view

    public function updateStockProduct($product_id, $quantity)
    {
        // TODO:: Hacer un metodo en el modelo Product que solo obtega el stock
        $productCurrent = $this->ProductModel->getProductById($product_id);

        # Array con los datos a enviar al modelo
        $data = array(
            'stock' => $productCurrent->stock - $quantity
        );
        # actulizamos el stock del product
        $this->ProductModel->updateProduct($product_id, $data);
    } # End method updateStockProduct

} # End Class Ventas
