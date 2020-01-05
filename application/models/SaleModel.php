<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salemodel extends CI_Model
{
    public function getSales()
    {
        //
    } # End method getSales

    public function saveSale($data)
    {
        # Guardamos el registro de venta
        return $this->db->insert('sales', $data);
    } # End method saveSales

    public function getSaleById()
    {
        //
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