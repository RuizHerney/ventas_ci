<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermissionModel extends CI_Model
{

    public function getPermissions()
    {
        # Creamos el inner join - con la clase db
        # Identificamos los campos a traer, de las tablas
        $this->db->select('p.*, m.name as menu, r.name as role');

        # Identificamos la tabla principla para el inner join
        $this->db->from('permissions p');

        # Identificamos los campos relacionados entre las tablas
        $this->db->join('menus m', 'p.menu_id = m.id');
        $this->db->join('roles r', 'p.role_id = r.id');

        # Traemos todos los permisos
        $permissions = $this->db->get();

        # Retornamos todos los permisos
        return $permissions->result();
    } # End method getPermissions

    public function savePermission($data)
    {
        # Guardamos el registro de permiso
        return $this->db->insert('permissions', $data);
    } # End method savePermission

    public function getPermissionById($id)
    {
        # Filtramos permisos por id
        $this->db->where('id', $id);

        # Traemos el permiso con el filtro anterior
        $permissions = $this->db->get('permissions');

        # Retornamos el permiso
        return $permissions->row();
    } # End method getPermissionById

    public function updatePermission($id, $data)
    {
        # Filtramos permisos por id
        $this->db->where('id', $id);

        # Modificamos el registro de categoria
        return $this->db->update('permissions', $data);
    } # End method updatePermission

    public function deletePermission($id)
    {
        # Filtramos permisos por id
        $this->db->where('id', $id);

        # Eliminar el registro de producto
        return $this->db->delete('permissions');
    } # End method deletePermission

} # End class PermissionModel
