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

    public function rowCount($table)
    {
        if ($table != 'sales') {
            $this->db->where('state_id', '1');
        }

        $result = $this->db->get($table);

        return $result->num_rows();
    } # End method rowCount

} # End class MenuModel
