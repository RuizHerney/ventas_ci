<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoriaModel extends CI_Model
{

    public function getCategorias()
    {
        $this->db->where('state_id', 1);

        $categorias = $this->db->get('categories');

        return $categorias->result();
    } # End method login

} # End class User
