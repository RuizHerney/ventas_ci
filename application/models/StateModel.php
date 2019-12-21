<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StateModel extends CI_Model
{

    public function getStates()
    {

        $states = $this->db->get('states');

        return $states->result();
    } # End method getState

} # End class User
