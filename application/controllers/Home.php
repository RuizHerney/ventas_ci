<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		# Heredamos
		parent::__construct();

		# Instancia con el modelo User
		$this->load->model('UserModel');
	} # End mehod __construct

	public function index()
	{
		# Validamos la session
		$this->validationLogin();

		# Llamaamos a la vista login
		$this->load->view('/modules/login');
	} # End method index


	# Metodo para login del usuario
	public function login()
	{
		# Validamos la session
		$this->validationLogin();
		
		# Recuperamos lo que viene por post
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');

		# Hacemos la consulta al modelo User
		$user =  $this->UserModel->login($user_name, sha1($password));

		# Verificamos si esta registrado o no
		if (!$user) {

			# Enviamos mensaje de error, si los datoas no considen
			$this->session->set_flashdata(
				'error', 'El usuario y/o contraseña son incorrectas'
			);
			
			# Devolvemos al login si no esta registrado o si la contraseña o user name es invalido
			redirect(base_url());
		} else {

			# Preparamos los datos de la session del usuario
			$data = array(
				'id' => $user->id,
				'name' => $user->name,
				'last_name' => $user->last_name,
				'rol' => $user->rol_id,
				'login' => TRUE
			);

			# Creamos la session
			$this->session->set_userdata($data);
			# llamamos a la vista admin
			redirect(base_url() . 'admin');
		}
	} # End method login

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	} # End method logout

	public function validationLogin()
	{
		# Validamos si existe una session
		if ($this->session->userdata('login')) {

			redirect(base_url() . 'admin');
		}
	} # End method validationLogin

} # End class Home
