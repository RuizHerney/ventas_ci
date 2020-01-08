<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perfiles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        # Hacemos los llamados a los modelos necesarios
        $this->load->model('UserModel');

        # Validamos si existe una session
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    } # End method __construct

    public function usuario($id)
    {
        # Array con los datos a enviar a la vista
        $data = array(
            'title' => 'Perfil',
            'user' => $this->UserModel->getUserById($id),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'profile', $data);
    } # End method index

} # End class Perfiles
