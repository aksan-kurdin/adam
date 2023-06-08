<?php

class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_penjualan');
        $this->load->model('M_pelanggan');
        $this->load->model('M_harga');
    }

    function index()
    {
        $this->template->load('template/template', 'penjualan/v_penjualan');
    }

    function input()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $cabang = $this->session->userdata('kode_cabang');
        $get_last_invoice_no = $this->M_penjualan->get_last_invoice_no($bulan, $tahun, $cabang)->row_array();
        $last_no = $get_last_invoice_no['no_faktur'];
        $thn = substr($tahun, 2, 2);
        $no_faktur = buatkode($last_no, $cabang . $bulan . $thn, 4);
        $data['no_faktur'] = $no_faktur;
        $data['pelanggan'] = $this->M_pelanggan->list()->result();;
        $data['harga'] = $this->M_harga->list()->result();
        $this->template->load('template/template',  'penjualan/i_penjualan', $data);
    }

    function get_tgl_jatuh_tempo()
    {
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        $tgl_jatuh_tempo = date('Y-m-d', strtotime("+1 month", strtotime(date($tgl_transaksi))));
        echo $tgl_jatuh_tempo;
    }

    function cek_barang()
    {
        $jmldatabarang = $this->M_penjualan->cek_barang()->num_rows;
        echo $jmldatabarang;
    }

    function save_temp()
    {
        $kode_barang = $this->input->post('kode_barang');
        $harga = $this->input->post('harga');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');
        
        $is_temp_exist = $this->M_penjualan->is_temp_exist($kode_barang, $id_user)->num_rows();
        if ($is_temp_exist > 0) {
            echo "1";
        } else {
            $data = array(
                'kode_barang' => $kode_barang,
                'harga' => $harga,
                'qty' => $qty,
                'id_user' => $id_user,
            );
            $saved = $this->M_penjualan->insert_temp($data);
        }
    }

    function load_temp()
    {
        $id_user = $this->input->post('id_user');
        $data['barang_temp'] = $this->M_penjualan->get_temp($id_user)->result();
        $this->load->view('penjualan/v_temp', $data);
    }
}
