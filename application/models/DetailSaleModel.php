<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailSaleModel extends CI_Model
{

    public function getDetailsSales()
    {
        # Traemos todas las tipos de clientes
        $detailsSales = $this->db->get('details_sales');

        return $detailsSales->result();
    } # End method getDetailsSales

    public function saveDetailsSales($data)
    {
        $this->db->insert('details_sales', $data);
    } # End method saveDetailsSales

} # End class DetailSaleModel
