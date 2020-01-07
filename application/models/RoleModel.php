<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoleModel extends CI_Model
{

    public function getRoles()
    {
        # Traemos todas las tipos de clientes
        $roles = $this->db->get('roles');

        return $roles->result();
    } # End method getClients

} # End class RoleModel
