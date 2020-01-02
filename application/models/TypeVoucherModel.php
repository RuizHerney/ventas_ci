<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TypeVoucherModel extends CI_Model
{
    public function getVouhers()
    {
        $vouchers = $this->db->get('types_voucher');

        return $vouchers->result();
    } # End method getVouhers
} # End class VoucherModel