<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Papelera extends CI_Controller
{
    private $permissions;

    public function __construct()
    {
        parent::__construct();

        # Validamos si existe una session
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }

        $this->permissions = $this->backendlib->control();

        # Hacemos los llamados a los modelos necesarios
        $this->load->model('UserModel');
        $this->load->model('CategoryModel');
        $this->load->model('ClientModel');
        $this->load->model('ProductModel');
    } # End method __construct

    public function index()
    {
        $data = array(
            'title'     => 'Papelera',
            # Pararn -> 2 = Inactivo
            'users'     => $this->UserModel->getUsers(2),
            // 'categories'     => $this->CategoryModel->getUserInactive(),
            // 'clients'     => $this->ClientModel->getUserInactive(),
            // 'products'     => $this->ProductModel->getUserInactive(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'paperbin/list', $data);
    } # End method index

    public function activeUser($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionDelete($this->permissions->p_delete);

        # Validamos que la categoria halla sido eliminado correctamente
        if ($this->UserModel->ActiveUser($id)) {
            # Lo enviamos a la vista list
            redirect(base_url() . 'adminstrador/papelera');
        } else {
            # Lo enviamos a la vista list con sus errores
            $this->session->set_flashdata('error', 'No se pudo borrar la informacion');
            redirect(base_url() . 'adminstrador/usuarios');
        }
    } # End method active

} # End class Papelera
