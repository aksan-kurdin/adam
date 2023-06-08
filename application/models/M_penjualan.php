<?php
class M_penjualan extends CI_Model
{
    function cek_barang()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->db - get_where('penjualan_detail_temp', array('id_user' => $id_user));
    }

    function get_last_invoice_no($bulan, $tahun, $cabang)
    {
        $this->db->select('no_faktur');
        $this->db->from('penjualan');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->where('kode_cabang', $cabang);
        $this->db->where('MONTH(tgltransaksi)', $bulan);
        $this->db->where('YEAR(tgltransaksi)', $tahun);
        $this->db->order_by('no_faktur', 'desc');
        $this->db->limit(1);

        return $this->db->get();
    }
}
