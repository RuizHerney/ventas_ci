<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permisos extends CI_Controller
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
        $this->load->model('PermissionModel');
        $this->load->model('RoleModel');
        $this->load->model('MenuModel');
    } # End method __construct

    public function index()
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionRead($this->permissions->p_read);

        # Array con los datos a enviar a la vista
        $data = array(
            'title' => 'Permisos',
            'permissions' => $this->PermissionModel->getPermissions(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'permission/list', $data);
    } # End method index


    public function add()
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionInsert($this->permissions->p_insert);
        
        # Array con los datos a enviar a la vista
        $data = array(
            'title'         => 'Permisos',
            'subTitle'      => 'Agregar',
            'roles'         => $this->RoleModel->getRoles(),
            'menus'         => $this->MenuModel->getMenus(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'permission/add', $data);
    } # End method add

    public function view()
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionRead($this->permissions->p_read);
    } # End method view

    public function create()
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionInsert($this->permissions->p_insert);
        
        # Recuperamos los datos de la vista que vienen por el method post
        $menu_id = $this->input->post('menu_id');
        $role_id = $this->input->post('role_id');
        $p_read = $this->input->post('p_read');
        $p_insert = $this->input->post('p_insert');
        $p_update = $this->input->post('p_update');
        $p_delete = $this->input->post('p_delete');

        # Array con los datos a enviar al modelo
        $data = array(
            'menu_id'   => $menu_id,
            'role_id'   => $role_id,
            'p_read'    => $p_read,
            'p_insert'  => $p_insert,
            'p_update'  => $p_update,
            'p_delete'  => $p_delete,
        );

        # Validamos que el permiso halla sido actualizado correctamente
        if ($this->PermissionModel->savePermission($data)) {
            # Lo enviamos a la vista list
            redirect(base_url() . 'adminstrador/permisos');
        } else {
            # Lo enviamos a la vista add con sus errores
            redirect(base_url() . 'adminstrador/permisos/add');
        }
    } # End method create

    public function edit($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionUpdate($this->permissions->p_update);
        
        # Array con los datos a enviar a la vista
        $data = array(
            'title'         => 'Permisos',
            'subTitle'      => 'Editar',
            'roles'         => $this->RoleModel->getRoles(),
            'menus'         => $this->MenuModel->getMenus(),
            'permission'    => $this->PermissionModel->getPermissionById($id),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'permission/edit', $data);
    } # End method edit

    public function update($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionUpdate($this->permissions->p_update);
        
        # Recuperamos los datos de la vista que vienen por el method post
        $menu_id = $this->input->post('menu_id');
        $role_id = $this->input->post('role_id');
        $p_read = $this->input->post('p_read');
        $p_insert = $this->input->post('p_insert');
        $p_update = $this->input->post('p_update');
        $p_delete = $this->input->post('p_delete');

        # Array con los datos a enviar al modelo
        $data = array(
            'menu_id'   => $menu_id,
            'role_id'   => $role_id,
            'p_read'    => $p_read,
            'p_insert'  => $p_insert,
            'p_update'  => $p_update,
            'p_delete'  => $p_delete,
        );

        # Validamos que el permiso halla sido actualizado correctamente
        if ($this->PermissionModel->updatePermission($id, $data)) {
            # Lo enviamos a la vista list
            redirect(base_url() . 'adminstrador/permisos');
        } else {
            # Lo enviamos a la vista add con sus errores
            redirect(base_url() . 'adminstrador/permisos/add');
        }
    } # End method update

    public function delete($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionDelete($this->permissions->p_delete);
        
        # Validamos que la permisos halla sido eliminado correctamente
        if ($this->PermissionModel->deletePermission($id)) {
            # Lo enviamos a la vista list
            redirect(base_url() . 'adminstrador/permisos');
        } else {
            # Lo enviamos a la vista list con sus errores
            $this->session->set_flashdata('error', 'No se pudo borrar la informacion');
            redirect(base_url() . 'adminstrador/permisos');
        }
    } # End method delete

} # End class Permisos
