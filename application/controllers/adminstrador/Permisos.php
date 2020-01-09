<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permisos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        # Hacemos los llamados a los modelos necesarios
        $this->load->model('PermissionModel');
        $this->load->model('RoleModel');
        $this->load->model('MenuModel');

        # Validamos si existe una session
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    } # End method __construct

    public function index()
    {
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
        //
    } # End method view

    public function create()
    {
        $menu_id = $this->input->post('menu_id');
        $role_id = $this->input->post('role_id');
        $p_read = $this->input->post('p_read');
        $p_insert = $this->input->post('p_insert');
        $p_update = $this->input->post('p_update');
        $p_delete = $this->input->post('p_delete');

        $data = array(
            'menu_id'   => $menu_id,
            'role_id'   => $role_id,
            'p_read'    => $p_read,
            'p_insert'  => $p_insert,
            'p_update'  => $p_update,
            'p_delete'  => $p_delete,
        );

        if ($this->PermissionModel->savePermission($data)) {
            redirect(base_url() . 'adminstrador/permisos');
        }else{
            redirect(base_url() . 'adminstrador/permisos/add');
        }
    } # End method create

    public function edit()
    {
        //
    } # End method edit

    public function update()
    {
        //
    } # End method update

    public function delete()
    {
        //
    } # End method delete
    
} # End class Permisos
