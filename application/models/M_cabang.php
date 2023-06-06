<?php

class M_cabang extends CI_Model
{
    function list()
    {
        return $this->db->get('cabang');
    }
}
