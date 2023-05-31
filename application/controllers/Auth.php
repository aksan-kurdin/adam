<?php

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    function login()
    {
        checkLog();
        $this->load->view('auth/login');
    }

    function checkLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $login = $this->M_auth->getLogin($username, $password);
        $datalogin = $login->row_array();
        $data = array(
            'id_user' => $datalogin['id_user'],
            'nama_lengkap' => $datalogin['nama_lengkap'],
            'username' => $datalogin['username'],
            'password' => $datalogin['password'],
            'level' => $datalogin['level'],
            'kode_cabang' => $datalogin['kode_cabang']
        );
        $this->session->set_userdata($data);
        if ($login->num_rows() == 1) {
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">User Name / Password not match</div>');
            redirect('auth/login');
        }
    }

    function logout()
    {
        session_destroy();
        redirect('auth/login');
    }
}
