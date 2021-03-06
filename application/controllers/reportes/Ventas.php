<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ventas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        # Validamos si existe una session
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }

        $this->permissions = $this->backendlib->control();

        # Cargamos los modelos a utilizar
        $this->load->model('SaleModel');
    } # End method __construct

    public function index()
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionRead($this->permissions->p_read);
        
        $dateStart = $this->input->post('dateStart');
        $dateEnd = $this->input->post('dateEnd');

        if ($this->input->post('search')) {

            $sales = $this->SaleModel->GetSalesByDate($dateStart, $dateEnd);
        } else {

            $sales = $this->SaleModel->getSales();
        }

        # Array con los datos a enviar a la vista
        $data = array(
            'title' => 'Reporte Ventas',
            'sales' => $sales,
            'dateStart' => $dateStart,
            'dateEnd' => $dateEnd
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'report/sale', $data);
    } # End method index

} # End class Ventas
