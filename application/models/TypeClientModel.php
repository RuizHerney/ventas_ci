<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TypeClientModel extends CI_Model
{

    public function getClients()
    {

        $clients = $this->db->get('types_clients');

        return $clients->result();
    } # End method getClients

} # End class TypeClientModel
