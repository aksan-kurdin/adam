<?php

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkIfNotLoginYet();
        $this->load->model('M_user');
        $this->load->model('M_cabang');
    }

    function index()
    {
        $data['users'] = $this->M_user->list()->result();
        $this->template->load('template/template', 'user/v_user', $data);
    }

    function input()
    {
        $data['cabang'] = $this->M_cabang->list()->result();
        $this->load->view('user/i_user', $data);
    }

    function add()
    {
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'no_hp' => $this->input->post('no_hp'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
            'kode_cabang' => $this->input->post('cabang')
        );
        $added = $this->M_user->insert($data);
        if ($added == 1) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                Saved succesfully.
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="9" y1="10" x2="9.01" y2="10" /><line x1="15" y1="10" x2="15.01" y2="10" /><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" /></svg>
                Failed to save.
                </div>'
            );
        }
        redirect('user');
    }

    // function edit()
    // {
    //     $kodebarang = $this->uri->segment(3);
    //     $data['barang'] = $this->M_barang->get($kodebarang)->row_array();
    //     $this->load->view('user/e_barang', $data);
    // }

    // function update()
    // {
    //     $data = array(
    //         'nama_barang' => $this->input->post('nama_barang'),
    //         'satuan' => $this->input->post('satuan')
    //     );
    //     $updated = $this->M_barang->update($data, $this->input->post('kode_barang'));
    //     if ($updated == 1) {
    //         $this->session->set_flashdata(
    //             'msg',
    //             '<div class="alert alert-success" role="alert">
    //             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
    //             Updated succesfully.
    //             </div>'
    //         );
    //     } else {
    //         $this->session->set_flashdata(
    //             'msg',
    //             '<div class="alert alert-success" role="alert">
    //             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="9" y1="10" x2="9.01" y2="10" /><line x1="15" y1="10" x2="15.01" y2="10" /><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" /></svg>
    //             Failed to update.
    //             </div>'
    //         );
    //     }
    //     redirect('barang');
    // }

    function delete()
    {
        $id_user = $this->uri->segment(3);
        $deleted = $this->M_user->delete($id_user);
        if ($deleted == 1) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                Delete succesfully.
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="9" y1="10" x2="9.01" y2="10" /><line x1="15" y1="10" x2="15.01" y2="10" /><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" /></svg>
                Failed to delete.
                </div>'
            );
        }
        redirect('user');
    }
}
