<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		# Hacemos los llamados a los modelos necesarios
		$this->load->model('ClientModel');
		$this->load->model('TypeClientModel');
		$this->load->model('TypeDocumentModel');
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
			'title' 			=> 'Clientes',
			'subTitle' 			=> 'Agregar',
			'type_clients' 		=> $this->TypeClientModel->getClients(),
			'type_documents' 	=> $this->TypeDocumentModel->getDocuments(),
		);

		# Llamado a la clase template
		$this->load->library('template');
		$this->template->load('admin', 'client/add', $data);
	} # End method add

	public function create()
	{
		# Recuperamos los datos de la vista que vienen por el method post
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$type_document_id = $this->input->post('type_document_id');
		$num_document = $this->input->post('num_document');
		$type_client_id = $this->input->post('type_client_id');

		# Validacion de formularios
		$this->form_validation->set_rules(
			'name',
			'Nombre',
			'required|is_unique[clients.name]'
		);

		$this->form_validation->set_rules(
			'phone',
			'Telefono',
			'required'
		);

		$this->form_validation->set_rules(
			'address',
			'Direccion',
			'required'
		);

		$this->form_validation->set_rules(
			'type_client_id',
			'Tipo Cliente',
			'required'
		);

		$this->form_validation->set_rules(
			'type_document_id',
			'Tipo de documento',
			'required'
		);

		$this->form_validation->set_rules(
			'num_document',
			'Documento',
			'required'
		);


		if ($this->form_validation->run()) {

			# Array con los datos a enviar al modelo
			$data = array(
				'name' =>  $name,
				'phone' => $phone,
				'address' => $address,
				'state_id' => '1',
				'type_document_id' => $type_document_id,
				'num_document' => $num_document,
				'type_client_id' => $type_client_id,
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
		} else {
			$this->add();
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
			'type_clients' 		=> $this->TypeClientModel->getClients(),
			'type_documents' 	=> $this->TypeDocumentModel->getDocuments(),
		);

		# Llamado a la clase template
		$this->load->library('template');
		$this->template->load('admin', 'client/edit', $data);
	} # End method edit

	public function update($id)
	{
		# Recuperamos los datos de la vista que vienen por el method post
		/* 		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$ruc = $this->input->post('ruc');
		$state_id = $this->input->post('state_id');
		$type_document_id = $this->input->post('type_document_id');
		$num_document = $this->input->post('num_document');
		$type_client_id = $this->input->post('type_client_id'); */

		$name = $this->input->post('name');
		$num_document = $this->input->post('num_document');

		$client = $this->ClientModel->getClientById($id);

		if ($name == $client->name) {
			$is_unique_name = '';
		}else{
			$is_unique_name = '|is_unique[clients.name]';
		}

		if ($num_document == $client->num_document) {
			$is_unique_cum_document = '';
		}else{
			$is_unique_cum_document = '|is_unique[clients.num_document]';
		}

		# Validacion de formularios
		$this->form_validation->set_rules(
			'name',
			'Nombre',
			'required' . $is_unique_name
		);

		$this->form_validation->set_rules(
			'phone',
			'Telefono',
			'required'
		);

		$this->form_validation->set_rules(
			'address',
			'Direccion',
			'required'
		);

		$this->form_validation->set_rules(
			'type_client_id',
			'Tipo Cliente',
			'required'
		);

		$this->form_validation->set_rules(
			'type_document_id',
			'Tipo de documento',
			'required'
		);

		$this->form_validation->set_rules(
			'num_document',
			'Documento',
			'required' . $is_unique_cum_document
		);

		if ($this->form_validation->run()) {

			# Array con los datos a enviar al modelo
			$data = array(
				'name' 				=> $this->input->post('name'),
				'phone' 			=> $this->input->post('phone'),
				'address' 			=> $this->input->post('address'),
				'state_id' 			=> $this->input->post('state_id'),
				'type_document_id' 	=> $this->input->post('type_document_id'),
				'num_document' 		=> $this->input->post('num_document'),
				'type_client_id' 	=> $this->input->post('type_client_id'),
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
		}else{
			$this->edit($id);
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
