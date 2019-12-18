<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data = array(
			
			'title' => 'Title goes here',
			
		);
		$this->load->library('template');
		$this->template->load('admin', 'home', $data);
	}
}
