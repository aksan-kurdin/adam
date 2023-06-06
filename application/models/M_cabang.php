<?php

class M_cabang extends CI_Model
{
    function list()
    {
        return $this->db->get('cabang');
    }

    function insert($data)
    {
        $inserted = $this->db->insert('cabang', $data);
        if ($inserted) {
            return 1;
        } else {
            return 0;
        }
    }

    function get($kode_cabang)
    {
        return $this->db->get_where('cabang', array('kode_cabang' => $kode_cabang));
    }

    function update($data, $kode_cabang)
    {
        $updated = $this->db->update('cabang', $data, array('kode_cabang' => $kode_cabang));
        if ($updated) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete($kode_cabang)
    {
        $deleted = $this->db->delete('cabang', array('kode_cabang' => $kode_cabang));
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
