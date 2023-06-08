<?php

class M_harga extends CI_Model
{

    function list()
    {
        $cabang = $this->session->userdata('kode_cabang');
        if ($cabang != 'PST') {
            $this->db->where('barang_harga.kode_cabang', $cabang);
        }
        $this->db->join('barang_master', 'barang_master.kode_barang = barang_harga.kode_barang');
        return $this->db->get('barang_harga');
    }

    function insert($data)
    {
        $inserted = $this->db->insert('barang_harga', $data);
        if ($inserted) {
            return 1;
        } else {
            return 0;
        }
    }

    function get($kode_harga)
    {
        $this->db->where('kode_harga', $kode_harga);
        $this->db->join('barang_master', 'barang_master.kode_barang = barang_harga.kode_barang');
        return $this->db->get('barang_harga');
    }

    function update($data, $kode_harga)
    {
        $updated = $this->db->update('barang_harga', $data, array('kode_harga' => $kode_harga));
        if ($updated) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete($kode_harga)
    {
        $deleted = $this->db->delete('barang_harga', array('kode_harga' => $kode_harga));
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
