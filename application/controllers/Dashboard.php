<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        checkIfNotLoginYet();
        $this->load->model('M_penjualan');
        $this->load->model('M_pelanggan');
        $this->load->model('M_cabang');
    }

    function index()
    {
        $data['tot_cust'] = $this->M_pelanggan->list()->num_rows();
        $data['tot_sale'] = $this->M_penjualan->listtoday()->num_rows();
        $data['tot_branches'] = $this->M_cabang->list()->num_rows();
        $data['tot_paid'] = $this->M_penjualan->resulttoday()->row_array();
        $data['monthlysale'] = $this->M_penjualan->get_monthlysale()->result();
        $this->template->load('template/template', 'dashboard/dashboard', $data);
    }
}
