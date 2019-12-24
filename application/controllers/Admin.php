<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct() {
		parent::__construct();

		# Validamos si existe una session
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
	} # End method __construct

	public function index()
	{
		$this->load->library('template');
        $this->template->load('admin', 'home'); 
    } # End method Admin
    
} # End class Admin