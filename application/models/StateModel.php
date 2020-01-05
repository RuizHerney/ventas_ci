<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StateModel extends CI_Model
{

    public function getStates()
    {
        # Traemos todas las estados
        $states = $this->db->get('states');

        # Retornamos los estados
        return $states->result();
    } # End method getState

} # End class User
