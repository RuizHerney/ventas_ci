<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermissionModel extends CI_Model
{

    public function getPermissions()
    {
        $this->db->select('p.*, m.name as menu, r.name as role');

        $this->db->from('permissions p');

        $this->db->join('menus m', 'p.menu_id = m.id');
        $this->db->join('roles r', 'p.role_id = r.id');

        $permissions = $this->db->get();

        # Retornamos todos los permisos
        return $permissions->result();
    } # End method getPermissions

    public function savePermission($data)
    {
        return $this->db->insert('permissions', $data);
    } # End method savePermission

    public function getPermissionById($id)
    {
        //
    } # End method getPermissionById

    public function updatePermission($id, $data)
    {
        //
    } # End method updatePermission

    public function deletePermission($id)
    {
        //
    } # End method deletePermission

} # End class PermissionModel
