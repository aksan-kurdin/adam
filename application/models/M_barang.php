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
    
}
