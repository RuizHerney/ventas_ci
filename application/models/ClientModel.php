<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientModel extends CI_Model
{

    /*    
        public function getClients()
        {
            # Filtramos cliente en el estado activo
            $this->db->where('state_id', 1);

            # Traemos todas las cliente con el filtro anterior
            $clients = $this->db->get('clients');

            # Retornamos los clientes
            return $clients->result();
        } # End method getClients
    */

    public function getClients()
    {
        # Creamos el inner join - con la clase db
        # Identificamos los campos a traer, de las tablas
        $this->db->select('c.*, tc.name as typeClient, td.name as typeDocument');
        # Identificamos la tabla principla para el inner join
        $this->db->from('clients c');

        # Identificamos los campos relacionados entre las tablas
        $this->db->join('types_clients tc', 'c.type_client_id = tc.id');
        $this->db->join('types_documents td', 'c.type_document_id = td.id');

        # Filtramos productos en el estado activo
        $this->db->where('c.state_id', '1');

        # Traemos todas los clientes con el inner join
        $clients = $this->db->get();

        # Retornamos los cleitnes
        return $clients->result();
    } # End method getCLients

    public function saveClient($data)
    {
        # Guardamos el registro de cliente
        return $this->db->insert('clients', $data);
    } # End method saveClient

    public function getClientById($id)
    {
        # Creamos el inner join - con la clase db
        # Identificamos los campos a traer, de las tablas
        $this->db->select('c.*, tc.name as typeClient, td.name as typeDocument');

        # Identificamos la tabla principla para el inner join
        $this->db->from('clients c');

        # Identificamos los campos relacionados entre las tablas
        $this->db->join('types_clients tc', 'c.type_client_id = tc.id');
        $this->db->join('types_documents td', 'c.type_document_id = td.id');

        # Filtramos productos en el estado activo
        $this->db->where('c.id', $id);

        # Traemos todas los clientes con el inner join  
        $client = $this->db->get();

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
