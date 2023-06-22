<?php

class M_user extends CI_Model
{
    function list()
    {
        return $this->db->get('users');
    }

    function insert($data)
    {
        $inserted = $this->db->insert('users', $data);
        if ($inserted) {
            return 1;
        } else {
            return 0;
        }
    }

    function get($id_user)
    {
        return $this->db->get_where('users', array('id_user' => $id_user));
    }

    function update($data, $id_user)
    {
        $updated = $this->db->update('users', $data, array('id_user' => $id_user));
        if ($updated) {
            return 1;
        } else {
            return 0;
        }
    }

    function delete($id_user)
    {
        $deleted = $this->db->delete('users', array('id_user' => $id_user));
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
