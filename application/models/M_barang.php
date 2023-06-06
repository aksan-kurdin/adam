<?php

class M_barang extends CI_Model
{
    function list()
    {
        return $this->db->get('barang_master');
    }

    function insert($data)
    {
        $inserted = $this->db->insert('barang_master', $data);
        if ($inserted) {
            return 1;
        } else {
            return 0;
        }
    }

    function get($kode_barang)
    {
        return $this->db->get_where('barang_master', array('kode_barang' => $kode_barang));
    }

    function update($data, $kode_barang)
    {
        $updated = $this->db->update('barang_master', $data, array('kode_barang' => $kode_barang));
        if ($updated) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete($kode_barang)
    {
        $deleted = $this->db->delete('barang_master', array('kode_barang' => $kode_barang));
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }

    function list_harga()
    {
        $this->db->join('barang_master', 'barang_master.kode_barang = barang_harga.kode_barang');
        return $this->db->get('barang_harga');
    }

    function insert_harga($data)
    {
        $inserted = $this->db->insert('barang_harga', $data);
        if ($inserted) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_harga($kode_harga)
    {
        $this->db->where('kode_harga', $kode_harga);
        $this->db->join('barang_master', 'barang_master.kode_barang = barang_harga.kode_barang');
        return $this->db->get('barang_harga');
    }

    function update_harga($data, $kode_harga)
    {
        $updated = $this->db->update('barang_harga', $data, array('kode_harga' => $kode_harga));
        if ($updated) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete_harga($kode_harga)
    {
        $deleted = $this->db->delete('barang_harga', array('kode_harga' => $kode_harga));
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
