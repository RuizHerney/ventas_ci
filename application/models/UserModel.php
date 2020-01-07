<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{


    public function getUsers()
    {
        $this->db->select('u.*, r.name as role');
        $this->db->from('users u');

        $this->db->join('roles r', 'u.role_id = r.id');

        $this->db->where('u.state_id', 1);

        $users = $this->db->get();

        return $users->result();
    } # End method 

    public function saveUser($data)
    {
        #
        return $this->db->insert('users', $data);
    }

    public function login($user_name, $password)
    {
        # Recuperamos los datos, y los comparamos
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
