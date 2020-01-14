<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto extends CI_Controller
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
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
        $this->load->model('StateModel');
    } # End method __constructs

    public function index()
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionRead($this->permissions->p_read);

        # Array con los datos a enviar a la vista
        $data = array(
            'title'         => 'Productos',
            'products'      => $this->ProductModel->getProducts(),
        );

        # Llamado a la clase template
        $this->load->library('template');
        $this->template->load('admin', 'product/list', $data);
    } # End method index


    public function getProduct()
    {
        $value = $this->input->post('value');

        $client = $this->ProductModel->getProductByLike($value);

        echo json_encode($client, JSON_UNESCAPED_UNICODE);
    } # End method getProducts

    public function add()
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionInsert($this->permissions->p_insert);

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
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionInsert($this->permissions->p_insert);

        # Recuperamos los datos de la vista que vienen por el method post
        $code = $this->input->post('code');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $description = $this->input->post('description');
        $stock = $this->input->post('stock');
        $category_id = $this->input->post('category_id');
        $state_id = $this->input->post('state_id');

        $this->form_validation->set_rules(
            'code', # Nombre del campo
            'Codigo', # Alias del campo
            'required|is_unique[products.code]|numeric|min_length[4]' # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'name', # Nombre del campo
            'Nombre', # Alias del campo
            'required|is_unique[products.name]' # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'price', # Nombre del campo
            'Precio', # Alias del campo
            'required|numeric' # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'description', # Nombre del campo
            'Descripcion', # Alias del campo
            'required' # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'stock', # Nombre del campo
            'Stock', # Alias del campo
            'required' # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'category_id', # Nombre del campo
            'Categoria', # Alias del campo
            'required' # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'state_id', # Nombre del campo
            'Categoria', # Alias del campo
            'required' # Reglas de validacion
        );

        if ($this->form_validation->run()) {

            # Array con los datos a enviar al modelo
            $data = array(
                'code'              => $code,
                'name'              => $name,
                'price'              => $price,
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
        } else {
            $this->add();
        }
    } # End method create

    public function edit($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionUpdate($this->permissions->p_update);
        
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
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionUpdate($this->permissions->p_update);
        
        # Recuperamos los datos de la vista que vienen por el method post
        $code = $this->input->post('code');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $description = $this->input->post('description');
        $stock = $this->input->post('stock');
        $category_id = $this->input->post('category_id');
        $state_id = $this->input->post('state_id');

        $product = $this->ProductModel->getProductById($id);

        if ($code == $product->code) {
            $is_unique_code = '';
        } else {
            $is_unique_code = '|is_unique[products.code]';
        }

        if ($name == $product->name) {
            $is_unique_name = '';
        } else {
            $is_unique_name = '|is_unique[products.name]';
        }

        $this->form_validation->set_rules(
            'code', # Nombre del campo
            'Codigo', # Alias del campo
            'required|numeric|min_length[4]' . $is_unique_code # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'name', # Nombre del campo
            'Nombre', # Alias del campo
            'required' . $is_unique_name # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'price', # Nombre del campo
            'Precio', # Alias del campo
            'required|numeric' # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'description', # Nombre del campo
            'Descripcion', # Alias del campo
            'required' # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'stock', # Nombre del campo
            'Stock', # Alias del campo
            'required' # Reglas de validacion
        );

        $this->form_validation->set_rules(
            'category_id', # Nombre del campo
            'Categoria', # Alias del campo
            'required' # Reglas de validacion
        );

        if ($this->form_validation->run()) {
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
        } else {
            $this->edit($id);
        }
    } # End method update

    public function view($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionRead($this->permissions->p_read);

        # Array con los datos a enviar a la vista
        $data = array(
            'product' => $this->ProductModel->getProductById($id),
        );
        # Lo enviamos a la vista view 
        $this->load->view('modules/admin/product/view', $data);
    } # End method view

    public function delete($id)
    {
        # Verificamos que el usuario tenga los permisos necesarios
        $this->backendlib->checkPermissionDelete($this->permissions->p_delete);
        
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
