<?php

class M_bayar extends CI_Model
{
    function get($no_faktur)
    {
        return $this->db->get_where('historibayar', array('no_faktur' => $no_faktur));
    }

    function insert_pay()
    {
        $no_faktur = $this->input->post('no_faktur');
        $tahun = date('Y');
        $thn = substr($tahun, 2, 2);
        $getLastNoBukti = $this->db->query("SELECT nobukti FROM historibayar WHERE YEAR(tglbayar) = '$tahun' ORDER BY nobukti DESC")->row_array();
        if (!$getLastNoBukti) {
            $nomorterakhir = $thn . '000000';
        } else {
            $nomorterakhir = $getLastNoBukti['nobukti'];
        };
        $nobukti = buatkode($nomorterakhir, $thn, 6);

        $databayar = array(
            'nobukti' => $nobukti,
            'no_faktur'  => $no_faktur,
            'tglbayar'  => $this->input->post('tgl_bayar'),
            'bayar' => $this->input->post('bayar'),
            'id_user' => $this->session->userdata('id_user')
        );
        $histori_bayar_saved = $this->db->insert('historibayar', $databayar);
        if ($histori_bayar_saved) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data saved successfully!</div>');
            redirect('penjualan/detailfaktur/' . $no_faktur);
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Failed to saved!</div>');
            redirect('penjualan/detailfaktur/' . $no_faktur);
        }
    }

    function delete($no_bukti, $no_faktur)
    {
        $deleted = $this->db->delete('historibayar', array('nobukti' => $no_bukti));
        if ($deleted) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data saved successfully!</div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Failed to delete!</div>');
        }
        redirect('penjualan/detailfaktur/' . $no_faktur);
    }
}
