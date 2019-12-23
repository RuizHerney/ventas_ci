<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryModel extends CI_Model
{

    public function getCategories()
    {
        # Filtramos categorias en el estado activo
        $this->db->where('state_id', 1);

        # Traemos todas las categorias con el filtro anterior
        $categorias = $this->db->get('categories');

        # Retornamos las categorias
        return $categorias->result();
    } # End method login

    public function saveGategory($data)
    {
        # Guardamos el registro de categorias
        return $this->db->insert('categories', $data);
    } # End method saveCategoria

    public function getGategoryById($id)
    {
        # Filtramos categorias por id
        $this->db->where('id', $id);

        # Traemos todas las categorias con el filtro anterior
        $categories = $this->db->get('categories');

        # Retornamos la categoria
        return $categories->row();
    } # End method getGategoryById

    public function updateCategory($id, $data)
    {
        # Filtramos categoria por id
        $this->db->where('id', $id);

        # Modificamos el registro de categoria
        return $this->db->update('categories', $data);
    } # End method updateCategory

    public function deleteCategory($id)
    {
        # Filtramos categorias por id
        $this->db->where('id', $id);

        # array con datos a editar 
        $data = array(
            'state_id' => '2',
        );
        
        # Modificamos de la categoria le estado 
        return $this->db->update('categories', $data);
    } # End method deleteCategory

} # End class User
