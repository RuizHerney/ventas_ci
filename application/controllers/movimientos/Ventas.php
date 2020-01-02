<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ventas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('SaleModel');
        $this->load->model('TypeVoucherModel');
        $this->load->model('ClientModel');

        # Validamos si existe una session
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    } # End method construct

    public function index()
    {
        # Array con los datos a enviar a la vista
        $data = array(
            'title' => 'Ventas'
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
            'Subtitle'          => 'Agregar',
            'vouchers'          => $this->TypeVoucherModel->getVouhers(),
            'clients'           => $this->ClientModel->getClients(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'sale/add', $data);
    } # End method add

} # End Class Ventas
