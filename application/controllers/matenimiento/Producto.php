<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        # Hacemos los llamados a los modelos necesarios
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
        $this->load->model('StateModel');

        # Validamos si existe una session
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    } # End method __constructs

    public function index()
    {
        # Array con los datos a enviar a la vista
        $data = array(
            'title'         => 'Productos',
            'products'      => $this->ProductModel->getProducts(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'product/list', $data);
    } # End method index

    public function add()
    {
        # Array con los datos a enviar a la vistas
        $data = array(
            'title'         => 'Productos',
            'subTitle'      => 'Agregar',
            'categories'    => $this->CategoryModel->getCategories(),
            'states'    => $this->StateModel->getStates(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'product/add', $data);
    } # End method add

    public function create()
    {
        # Recuperamos los datos de la vista que vienen por el method post
        $code = $this->input->post('code');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $stock = $this->input->post('stock');
        $category_id = $this->input->post('category_id');
        $state_id = $this->input->post('state_id');

        # Array con los datos a enviar al modelo
        $data = array(
            'code'              => $code,
            'name'              => $name,
            'description'       => $description,
            'stock'             => $stock,
            'category_id'       => $category_id,
            'state_id'          => $state_id,
        );

        # Validamos que el cliente halla sido registrado correctamente
        if ($this->ProductModel->saveProduct($data)) {

            # Lo enviamos a la vista list 
            redirect(base_url() . 'matenimiento/producto');
        } else {
            # Lo enviamos a la vista add con sus errores 
            $this->session->set_flashdata('error', 'No se pudo guradar la informacion');
            redirect(base_url() . 'producto/add');
        }
    } # End method create

    public function edit($id)
    {
        # Array con los datos a enviar a la vistas
        $data = array(
            'title'         => 'Productos',
            'subTitle'      => 'Editar',
            'product'      => $this->ProductModel->getProductById($id),
            'categories'    => $this->CategoryModel->getCategories(),
            'states'    => $this->StateModel->getStates(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'product/edit', $data);
    } # End method edit

    public function update($id)
    {
        # Recuperamos los datos de la vista que vienen por el method post
        $code = $this->input->post('code');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $stock = $this->input->post('stock');
        $category_id = $this->input->post('category_id');
        $state_id = $this->input->post('state_id');

        # Array con los datos a enviar al modelo
        $data = array(
            'code'              => $code,
            'name'              => $name,
            'description'       => $description,
            'stock'             => $stock,
            'category_id'       => $category_id,
            'state_id'          => $state_id,
        );

        # Validamos que el cliente halla sido editado correctamente
        if ($this->ProductModel->updateProduct($id, $data)) {

            # Lo enviamos a la vista list 
            redirect(base_url() . 'matenimiento/producto');
        } else {
            # Lo enviamos a la vista add con sus errores 
            $this->session->set_flashdata('error', 'No se pudo guradar la informacion');
            redirect(base_url() . 'producto/add');
        }
    } # End method update

    public function view($id)
    {
        # Array con los datos a enviar a la vista
        $data = array(
            'product' => $this->ProductModel->getProductById($id),
        );
        # Lo enviamos a la vista view 
        $this->load->view('modules/admin/product/view', $data);
    } # End method view

    public function delete($id)
    {
        # Validamos que el cliente halla sido eliminado correctamente
        if ($this->ProductModel->deleteProduct($id)) {
            # Lo enviamos a la vista list 
            redirect(base_url() . 'matenimiento/producto');
        } else {
            # Lo enviamos a la vista list con sus errores 
            $this->session->set_flashdata('error', 'No se pudo borrar la informacion');
            redirect(base_url() . 'matenimiento/producto');
        }
    } # End method delete

} # End class Producto
