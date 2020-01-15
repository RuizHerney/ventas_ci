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

	} # End method __construct

	public function index()
	{
		$data = array(
			'permission' => $this->permissions
		);

		$this->load->library('template');
        $this->template->load('admin', 'home', $data); 
    } # End method Admin
    
} # End class Admin
