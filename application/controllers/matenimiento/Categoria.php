<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		# Hacemos los llamados a los modelos necesarios
		$this->load->model('CategoryModel');
		$this->load->model('StateModel');

		# Validamos si existe una session
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
	} # End method __construct

	public function index()
	{

		# Array con los datos a enviar a la vista
		$data = array(
			'title' => 'Categorias',
			'categories' => $this->CategoryModel->getCategories()
		);

		# Llamado a la clase template
		$this->load->library('template');
		$this->template->load('admin', 'category/list', $data);
	} # End method Admin

	public function add()
	{
		# Array con los datos a enviar a la vista
		$data = array(
			'title' => 'Categorias',
			'subTitle' => 'Agregar',
		);

		# Llamado a la clase template
		$this->load->library('template');
		$this->template->load('admin', 'category/add', $data);
	} # End method add

	public function create()
	{
		# Recuperamos los datos de la vista que vienen por el method post
		$name = $this->input->post('name');
		$description = $this->input->post('description');

		# Array con los datos a enviar al modelo
		$data = array(
			'name' =>  $name,
			'description' => $description,
			'state_id' => '1'
		);

		# Validamos que la categoria halla sido registrado correctamente
		if ($this->CategoryModel->saveGategory($data)) {

			# Lo enviamos a la vista list 
			redirect(base_url() . 'matenimiento/categoria');
		} else {
			# Lo enviamos a la vista add con sus errores 
			$this->session->set_flashdata('error', 'No se pudo guradar la informacion');
			redirect(base_url() . 'categoria/add');
		}
	} # End method create

	public function edit($id)
	{
		# Array con los datos a enviar a la vista
		$data = array(
			'title' => 'Categorias',
			'subTitle' => 'editar',
			'category' => $this->CategoryModel->getGategoryById($id),
			'states' => $this->StateModel->getStates(),
		);

		# Llamado a la clase template
		$this->load->library('template');
		$this->template->load('admin', 'category/edit', $data);
	} # End method edit

	public function update($id)
	{
		# Recuperamos los datos de la vista que vienen por el method post
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$state_id = $this->input->post('state_id');

		# Array con los datos a enviar al modelo
		$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'state_id' => $this->input->post('state_id'),
		);

		# Validamos que el categoria halla sido modificado correctamente
		if ($this->CategoryModel->updateCategory($id, $data)) {
			# Lo enviamos a la vista list 
			redirect(base_url() . 'matenimiento/categoria');
		} else {
			# Lo enviamos a la vista update con sus errores 
			$this->session->set_flashdata('error', 'No se pudo editar la informacion');
			redirect(base_url() . 'categoria/edit');
		}
	} # End method udpate

	public function view($id)
	{
		# Array con los datos a enviar a la vista
		$data = array(
			'category' => $this->CategoryModel->getGategoryById($id),
		);
		# Lo enviamos a la vista view 
		$this->load->view('modules/admin/category/view', $data);
	} # End method view

	public function delete($id)
	{
		# Validamos que la categoria halla sido eliminado correctamente
		if ($this->CategoryModel->deleteCategory($id)) {
			# Lo enviamos a la vista list 
			redirect(base_url() . 'matenimiento/categoria');
		} else {
			# Lo enviamos a la vista list con sus errores 
			$this->session->set_flashdata('error', 'No se pudo borrar la informacion');
			redirect(base_url() . 'matenimiento/categoria');
		}
	} # End method delete

} # End class Admin