<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $permissions;

	public function __construct() {
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
		$data = array(
			'permission' 	=> $this->permissions,
			'sales' 		=> $this->backendmodel->rowCount('sales'),
			'products' 		=> $this->backendmodel->rowCount('products'),
			'clients' 		=> $this->backendmodel->rowCount('clients'),
			'users' 		=> $this->backendmodel->rowCount('users'),
			'years' 		=> $this->SaleModel->years(),
		);

		$this->load->library('template');
        $this->template->load('admin', 'home', $data); 
	} # End method Admin
	
	public function getData()
	{
		$year = $this->input->post('year');

		$result = $this->SaleModel->amounts($year);

		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	} # End method getData
    
} # End class Admin
