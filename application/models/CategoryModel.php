<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryModel extends CI_Model
{

    public function getCategories()
    {
        # Filtramos categorias en el estado activo
        $this->db->where('state_id', 1);

        $categorias = $this->db->get('categories');

        return $categorias->result();
    } # End method login

    public function saveGategory($data)
    {
        return $this->db->insert('categories', $data);
    } # End method saveCategoria

    public function getGategoryById($id)
    {
        $this->db->where('id', $id);

        $categories = $this->db->get('categories');

        return $categories->row();
    } # End method getGategoryById

    public function updateCategory($id, $data)
    {
        $this->db->where('id', $id);

        return $this->db->update('categories', $data);
    } # End method updateCategory

    public function deleteCategory($id)
    {
        $this->db->where('id', $id);

        $data = array(
            'state_id' => '2',
        );

        return $this->db->update('categories', $data);
    } # End method deleteCategory

} # End class User
