<?php
class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        checkIfNotLoginYet();
    }

    function index()
    {
        $this->template->load('template/template', 'dashboard/dashboard');
    }
}
