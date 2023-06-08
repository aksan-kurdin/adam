<?php
class M_penjualan extends CI_Model
{
    function cek_barang()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->db->get_where('penjualan_detail_temp', array('id_user' => $id_user));
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

    function is_temp_exist($kode_barang, $id_user)
    {
        return $this->db->get_where('penjualan_detail_temp', array('kode_barang' => $kode_barang, 'id_user' => $id_user));
    }

    function insert_temp($data)
    {
        $this->db->insert('penjualan_detail_temp', $data);
    }

    function get_temp($id_user)
    {
        $this->db->select('penjualan_detail_temp.kode_barang, nama_barang, harga, qty, (qty * harga) as total');
        $this->db->from('penjualan_detail_temp');
        $this->db->join('barang_master', 'penjualan_detail_temp.kode_barang = barang_master.kode_barang');
        $this->db->where('id_user', $id_user);
        return $this->db->get();
    }
}
