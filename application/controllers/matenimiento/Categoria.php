<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('CategoryModel');
		$this->load->model('StateModel');

		# Validamos si existe una session
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
	} # End method __construct

	public function index()
	{

		$data = array(
			'title' => 'Categorias',
			'categories' => $this->CategoryModel->getCategories()
		);
		$this->load->library('template');
		$this->template->load('admin', 'category/list', $data);
	} # End method Admin

	public function add()
	{
		$data = array(
			'title' => 'Categorias',
			'subTitle' => 'Agregar',
		);

		$this->load->library('template');
		$this->template->load('admin', 'category/add', $data);
	} # End method add

	public function create()
	{
		$name = $this->input->post('name');
		$description = $this->input->post('description');

		$data = array(
			'name' =>  $name,
			'description' => $description,
			'state_id' => '1'
		);

		if ($this->CategoryModel->saveGategory($data)) {

			redirect(base_url() . 'matenimiento/categoria');
		} else {
			$this->session->set_flashdata('error', 'No se pudo guradar la informacion');
			redirect(base_url() . 'categoria/add');
		}
	} # End method create

	public function edit($id)
	{
		$data = array(
			'title' => 'Categorias',
			'subTitle' => 'editar',
			'category' => $this->CategoryModel->getGategoryById($id),
			'states' => $this->StateModel->getStates(),
		);


		$this->load->library('template');
		$this->template->load('admin', 'category/edit', $data);
	} # End method edit

	public function update($id)
	{
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$state_id = $this->input->post('state_id');

		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'state_id' => $this->input->post('state_id'),
		);

		if ($this->CategoryModel->updateCategory($id, $data)) {
			redirect(base_url() . 'matenimiento/categoria');
		} else {
			$this->session->set_flashdata('error', 'No se pudo editar la informacion');
			redirect(base_url() . 'categoria/edit');
		}
	} # End method udpate

	public function view($id)
	{
		$data = array(
			'category' => $this->CategoryModel->getGategoryById($id),
		);
		
		$this->load->view('modules/admin/category/view', $data);
	} # End method view

	public function delete($id)
	{
		if ($this->CategoryModel->deleteCategory($id)) {
			redirect(base_url() . 'matenimiento/categoria');
		} else {
			$this->session->set_flashdata('error', 'No se pudo borrar la informacion');
			redirect(base_url() . 'matenimiento/categoria');
		}
	} # End method delete

} # End class Admin
