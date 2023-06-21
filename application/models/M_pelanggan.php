<?php

class M_pelanggan extends CI_Model
{
    function list()
    {
        $cabang = $this->session->userdata('kode_cabang');
        if ($cabang != 'PST') {
            $this->db->where('pelanggan.kode_cabang', $cabang);
        }
        $this->db->join('cabang', 'pelanggan.kode_cabang = cabang.kode_cabang');
        return $this->db->get('pelanggan');
    }

    function insert($data)
    {
        $inserted = $this->db->insert('pelanggan', $data);
        if ($inserted) {
            return 1;
        } else {
            return 0;
        }
    }

    function get($kode_pelanggan)
    {
        $this->db->join('cabang', 'pelanggan.kode_cabang = cabang.kode_cabang');
        return $this->db->get_where('pelanggan', array('kode_pelanggan' => $kode_pelanggan));
    }

    function update($data, $kode_pelanggan)
    {
        $updated = $this->db->update('pelanggan', $data, array('kode_pelanggan' => $kode_pelanggan));
        if ($updated) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete($kode_pelanggan)
    {
        $deleted = $this->db->delete('pelanggan', array('kode_pelanggan' => $kode_pelanggan));
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
