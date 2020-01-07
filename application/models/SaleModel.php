<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salemodel extends CI_Model
{
    public function getSales()
    {
        # Identificamos los campos a traer, de las tablas
        $this->db->select('s.*, c.name as client, tv.name as typeVoucher');

        # Identificamos la tabla principla para el inner join
        $this->db->from('sales s');

        # Identificamos los campos relacionados entre las tablas
        $this->db->join('clients c', 's.client_id = c.id');
        $this->db->join('types_voucher tv', 's.type_voucher_id = tv.id');

        # Obtenemos los datos de la tabla
        $sales = $this->db->get();

        # Verificamos que tenga registro
        if ($sales->num_rows() > 0) {
            # Retornamos todos los resgistros
            return $sales->result();
        } else {
            return false;
        }
    } # End method getSales

    public function saveSale($data)
    {
        # Guardamos el registro de venta
        return $this->db->insert('sales', $data);
    } # End method saveSales

    public function getSaleById($id)
    {
        # Identificamos los campos a traer, de las tablas
        $this->db->select('s.*, c.name as client, c.address, c.phone, c.num_document as document, tv.name as typeVoucher');

        # Identificamos la tabla principla para el inner join
        $this->db->from('sales s');

        # Identificamos los campos relacionados entre las tablas
        $this->db->join('clients c', 's.client_id = c.id');
        $this->db->join('types_voucher tv', 's.type_voucher_id = tv.id');

        # filtramos la venta por el id
        $this->db->where('s.id', $id);

        # Obtenemos los datos
        $sale = $this->db->get();
        
        # Obtenemos los datos del registro
        return $sale->row();
    } # End method getSaleById

    public function lastId()
    {
        # Retornamos el ultimo registro de la venta
        return $this->db->insert_id();
    } # End method lastId

    public function updateSale()
    {
        //
    } # End method updateSale

    public function deleteSale()
    {
        //
    } # End method deleteSale

} # End class Salemodel
