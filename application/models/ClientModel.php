<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientModel extends CI_Model
{

    public function getClients()
    {
        # Filtramos cliente en el estado activo
        $this->db->where('state_id', 1);

        # Traemos todas las cliente con el filtro anterior
        $clients = $this->db->get('clients');

        # Retornamos los clientes
        return $clients->result();
    } # End method getClients

    public function saveClient($data)
    {
        # Guardamos el registro de cliente
        return $this->db->insert('clients', $data);
    } # End method saveClient

    public function getClientById($id)
    {
        # Filtramos cliente por id
        $this->db->where('id', $id);

        # Traemos todas las client con el filtro anterior
        $client = $this->db->get('clients');

        # Retornamos el cliente
        return $client->row();
    } # End method getClientById

    public function updateClient($id, $data)
    {
        # Filtramos cliente por id
        $this->db->where('id', $id);

        # Modificamos el registro de cliente
        return $this->db->update('clients', $data);
    } # End method updateClient

    public function deleteClient($id)
    {
        # Filtramos categorias por id
        $this->db->where('id', $id);

        # array con datos a editar 
        $data = array(
            'state_id' => '2',
        );

        # Modificamos al cliente de estado 
        return $this->db->update('clients', $data);
    } # End method deleteClient

} # End class User
