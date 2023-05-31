<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        checkLogin();
    }

    function index()
    {
        echo "Welcome " . $this->session->userdata('nama_lengkap') . " as " . $this->session->userdata('level');
    }
}
