<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{

    public function login($user_name, $password)
    {
        # Recuperamos los datos
        $this->db->where('user_name', $user_name);
        $this->db->where('password', $password);

        # hacemos la consulta
        $result = $this->db->get('users');

        # Verificamos si trae el registro
        if ($result->num_rows() > 0) {
            # Retornamos el registro
            return $result->row();
        }else{
            # retotnamos falso
            return false;
        }

    } # End method login

} # End class User
