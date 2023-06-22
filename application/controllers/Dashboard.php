<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        checkIfNotLoginYet();
        $this->load->model('M_penjualan');
    }

    function index()
    {
        $data['monthlysale'] = $this->M_penjualan->get_monthlysale()->result();
        $this->template->load('template/template', 'dashboard/dashboard', $data);
    }
}
