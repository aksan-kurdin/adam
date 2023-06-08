<?php

class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_penjualan');
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
        $jmldatabarang = $this->model->M_penjualan->cek_barang()->num_rows;
        echo $jmldatabarang;
    }
}
