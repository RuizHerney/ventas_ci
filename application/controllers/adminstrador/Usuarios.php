<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
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
        $this->load->model('RoleModel');
    } # End method __construct

    public function index()
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionRead($this->permissions->p_read);

        # Array con los datos a enviar a la vista
        $data = array(
            'title' => 'Usuarios',
            # Pararn -> 1 = Activo
            'users' => $this->UserModel->getUsers(1),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'user/list', $data);
    } # End method index

    public function view($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionRead($this->permissions->p_read);

        # Array con los datos a enviar a la vista
        $data = array(
            'user' => $this->UserModel->getUserById($id),
        );
        # Lo enviamos a la vista view
        $this->load->view('modules/admin/user/view', $data);
    } # End method view

    public function add()
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionInsert($this->permissions->p_insert);

        # Array con los datos a enviar a la vista
        $data = array(
            'title' => 'Usuarios',
            'subTitle' => 'Agregar',
            'roles' => $this->RoleModel->getRoles(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'user/add', $data);
    } # End method add

    public function create()
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionInsert($this->permissions->p_insert);

        $name = $this->input->post('name');
        $last_name = $this->input->post('last_name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $role_id = $this->input->post('role_id');

        # Validacion de formularios
        $this->form_validation->set_rules(
            'name',
            'Nombre',
            'required|is_unique[categories.name]'
        );

        $this->form_validation->set_rules(
            'last_name',
            'Apellidos',
            'required'
        );

        $this->form_validation->set_rules(
            'phone',
            'Telefono',
            'required'
        );

        $this->form_validation->set_rules(
            'email',
            'Correo',
            'required'
        );

        $this->form_validation->set_rules(
            'user_name',
            'Nombre de Usuario',
            'required'
        );

        $this->form_validation->set_rules(
            'password',
            'Contraseña',
            'required'
        );

        $this->form_validation->set_rules(
            'role_id',
            'Rol',
            'required'
        );

        if ($this->form_validation->run()) {

            $data = array(
                'name'              => $name,
                'last_name'         => $last_name,
                'phone'             => $phone,
                'email'             => $email,
                'user_name'         => $user_name,
                'password'          => sha1($password),
                'role_id'           => $role_id,
                'state_id'           => 1,
            );
            if ($this->UserModel->saveUser($data)) {
                redirect(base_url() . 'adminstrador/usuarios');
            } else {
                # Lo enviamos a la vista add con sus errores
                $this->session->set_flashdata('error', 'No se pudo guradar la informacion');
                redirect(base_url() . 'usuarios/add');
            }
        } else {
            $this->add();
        }
    } # End method create

    public function edit($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionUpdate($this->permissions->p_update);

        # Array con los datos a enviar a la vista
        $data = array(
            'title' => 'Usuarios',
            'subTitle' => 'Editar',
            'user' => $this->UserModel->getUserById($id),
            'roles' => $this->RoleModel->getRoles(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'user/edit', $data);
    } # End method edit

    public function update($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionUpdate($this->permissions->p_update);

        $name = $this->input->post('name');
        $last_name = $this->input->post('last_name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $user_name = $this->input->post('user_name');
        $role_id = $this->input->post('role_id');

        # Validacion de formularios
        $this->form_validation->set_rules(
            'name',
            'Nombre',
            'required|is_unique[categories.name]'
        );

        $this->form_validation->set_rules(
            'last_name',
            'Apellidos',
            'required'
        );

        $this->form_validation->set_rules(
            'phone',
            'Telefono',
            'required'
        );

        $this->form_validation->set_rules(
            'email',
            'Correo',
            'required'
        );

        $this->form_validation->set_rules(
            'user_name',
            'Nombre de Usuario',
            'required'
        );

        $this->form_validation->set_rules(
            'role_id',
            'Rol',
            'required'
        );

        if ($this->form_validation->run()) {

            $data = array(
                'name'              => $name,
                'last_name'         => $last_name,
                'phone'             => $phone,
                'email'             => $email,
                'user_name'         => $user_name,
                'role_id'           => $role_id,
                'state_id'           => 1,
            );

            if ($this->UserModel->updateUser($id, $data)) {
                redirect(base_url() . 'adminstrador/usuarios');
            } else {
                # Lo enviamos a la vista add con sus errores
                $this->session->set_flashdata('error', 'No se pudo editar la informacion');
                redirect(base_url() . 'usuarios/edit');
            }
        } else {
            $this->edit($id);
        }
    } # End method update

    public function delete($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionDelete($this->permissions->p_delete);

        # Validamos que la categoria halla sido eliminado correctamente
        if ($this->UserModel->deleteUser($id)) {
            # Lo enviamos a la vista list
            redirect(base_url() . 'adminstrador/usuarios');
        } else {
            # Lo enviamos a la vista list con sus errores
            $this->session->set_flashdata('error', 'No se pudo borrar la informacion');
            redirect(base_url() . 'adminstrador/usuarios');
        }
    } # End method delete

} # End class Usuarios
