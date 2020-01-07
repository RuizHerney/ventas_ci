<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ventas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        # Cargamos los modelos a utilizar
        $this->load->model('SaleModel');

        # Validamos si existe una session
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    } # End method __construct

    public function index()
    {
        # Array con los datos a enviar a la vista
        $data = array(
            'title' => 'Reporte Ventas',
            'sales' => $this->SaleModel->getSales()
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'report/sale', $data);
    } # End method index

} # End class Ventas
