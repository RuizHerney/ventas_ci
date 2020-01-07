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

    public function getDetailsSalesById($id_sale)
    {
        # Identificamos los campos a traer, de las tablas
        $this->db->select('ds.*, p.code, p.name');

        # Identificamos la tabla principla para el inner join
        $this->db->from('details_sales ds');

        # Identificamos los campos relacionados entre las tablas
        $this->db->join('products p', 'ds.product_id = p.id');

        # filtramos la venta por el id
        $this->db->where('ds.sale_id', $id_sale);

        # Obtenemos los datos
        $detail_sale = $this->db->get();

        # Obtenemos los datos del registro
        return $detail_sale->result();
    } # End method getByDetailsSalesId

    public function saveDetailsSales($data)
    {
        $this->db->insert('details_sales', $data);
    } # End method saveDetailsSales
    

} # End class DetailSaleModel
