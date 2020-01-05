<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TypeVoucherModel extends CI_Model
{
    public function getVouhers()
    {
        # Traemos todas las tipos de comprobantes
        $vouchers = $this->db->get('types_voucher');

        # Retornamos todos los comprobantes
        return $vouchers->result();
    } # End method getVouhers

    public function getVoucherById($voucher_id)
    {
        # Filtramos los voucher por id
        $this->db->where('id', $voucher_id);
        
        # Traemos todas las categorias con el filtro anterior
        $type_voucher = $this->db->get('types_voucher');

        # Retornamos el comprobante
        return $type_voucher->row();
    } # End method getVoucher

    public function updateVoucher($voucher_id, $data)
    {
        # Filtramos los voucher por id
        $this->db->where('id', $voucher_id);

        # Actualizamos el comprobante
        $this->db->update('types_voucher', $data);
    } # End method updateVoucher
} # End class VoucherModel
