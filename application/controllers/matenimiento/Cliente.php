<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		# Hacemos los llamados a los modelos necesarios
		$this->load->model('ClientModel');
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
			'title' => 'Clientes',
			'clients' => $this->ClientModel->getClients(),
		);

		# Llamado a la clase template
		$this->load->library('template');
		$this->template->load('admin', 'client/list', $data);
	} # End method Admin

	public function add()
	{
		# Array con los datos a enviar a la vista
		$data = array(
			'title' => 'Clientes',
			'subTitle' => 'Agregar',
		);

		# Llamado a la clase template
		$this->load->library('template');
		$this->template->load('admin', 'client/add', $data);
	} # End method add

	public function create()
	{
		# Recuperamos los datos de la vista que vienen por el method post
		$name = $this->input->post('name');
		$last_name = $this->input->post('last_name');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$ruc = $this->input->post('ruc');
		$business = $this->input->post('business');

		# Array con los datos a enviar al modelo
		$data = array(
			'name' =>  $name,
			'last_name' => $last_name,
			'phone' => $phone,
			'address' => $address,
			'ruc' => $ruc,
			'business' => $business,
			'state_id' => '1'
		);

		# Validamos que el cliente halla sido registrado correctamente
		if ($this->ClientModel->saveClient($data)) {

			# Lo enviamos a la vista list 
			redirect(base_url() . 'matenimiento/cliente');
		} else {
			# Lo enviamos a la vista add con sus errores 
			$this->session->set_flashdata('error', 'No se pudo guradar la informacion');
			redirect(base_url() . 'cliente/add');
		}
	} # End method create

	public function edit($id)
	{
		# Array con los datos a enviar a la vista
		$data = array(
			'title' => 'Clientes',
			'subTitle' => 'editar',
			'client' => $this->ClientModel->getClientById($id),
			'states' => $this->StateModel->getStates(),
		);

		# Llamado a la clase template
		$this->load->library('template');
		$this->template->load('admin', 'client/edit', $data);
	} # End method edit

	public function update($id)
	{
		# Recuperamos los datos de la vista que vienen por el method post
		$name = $this->input->post('name');
		$last_name = $this->input->post('last_name');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$ruc = $this->input->post('ruc');
		$business = $this->input->post('business');
		$state_id = $this->input->post('state_id');

		# Array con los datos a enviar al modelo
		$data = array(
			'name' => $this->input->post('name'),
			'last_name' => $this->input->post('last_name'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'ruc' => $this->input->post('ruc'),
			'business' => $this->input->post('business'),
			'state_id' => $this->input->post('state_id'),
		);

		# Validamos que el cliente halla sido modificado correctamente
		if ($this->ClientModel->updateClient($id, $data)) {
			# Lo enviamos a la vista list 
			redirect(base_url() . 'matenimiento/cliente');
		} else {
			# Lo enviamos a la vista update con sus errores 
			$this->session->set_flashdata('error', 'No se pudo editar la informacion');
			redirect(base_url() . 'cliente/edit');
		}
	} # End method udpate

	public function view($id)
	{
		# Array con los datos a enviar a la vista
		$data = array(
			'client' => $this->ClientModel->getClientById($id),
		);
		# Lo enviamos a la vista view 
		$this->load->view('modules/admin/client/view', $data);
	} # End method view

	public function delete($id)
	{
		# Validamos que el cliente halla sido eliminado correctamente
		if ($this->ClientModel->deleteClient($id)) {
			# Lo enviamos a la vista list 
			redirect(base_url() . 'matenimiento/cliente');
		} else {
			# Lo enviamos a la vista list con sus errores 
			$this->session->set_flashdata('error', 'No se pudo borrar la informacion');
			redirect(base_url() . 'matenimiento/cliente');
		}
	} # End method delete

} # End class Admin
