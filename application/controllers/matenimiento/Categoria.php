<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria extends CI_Controller
{
	public function __construct() {
		parent::__construct();

		$this->load->model('CategoriaModel');

		# Validamos si existe una session
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
	} # End method __construct

	public function index()
	{

		$data = array(
			'title' => 'Categorias',
			'categorias' => $this->CategoriaModel->getCategorias()
		);
		$this->load->library('template');
        $this->template->load('admin', 'category/list', $data); 
        
    } # End method Admin
    
} # End class Admin
