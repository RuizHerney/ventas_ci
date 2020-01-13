<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BackendModel extends CI_Model
{

    public function getId($link)
    {
        $this->db->like('link', $link);

        $id = $this->db->get('menus');

        return $id->row();
    } # End method getId


    public function getPermission($idMenu, $idRole)
    {
        $this->db->where('menu_id', $idMenu);
        $this->db->where('role_id', $idRole);

        $permissions = $this->db->get('permissions');

        return $permissions->row();
    } # End method getPermission

} # End class MenuModel
