<?php

class Cabang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checkIfNotLoginYet();
        $this->load->model('M_cabang');
    }

    function index()
    {
        $data['cabang'] = $this->M_cabang->list()->result();
        $this->template->load('template/template', 'cabang/v_cabang', $data);
    }

    function input()
    {
        $this->load->view('cabang/i_cabang');
    }

    function add()
    {
        $data = array(
            'kode_cabang' => $this->input->post('kode_cabang'),
            'nama_cabang' => $this->input->post('nama_cabang'),
            'alamat_cabang' => $this->input->post('alamat_cabang'),
            'telepon' => $this->input->post('telepon')
        );
        $added = $this->M_cabang->insert($data);
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
        redirect('cabang');
    }

    function edit()
    {
        $kode_cabang = $this->uri->segment(3);
        $data['cabang'] = $this->M_cabang->get($kode_cabang)->row_array();
        $this->load->view('cabang/e_cabang', $data);
    }

    function update()
    {
        $data = array(
            'nama_cabang' => $this->input->post('nama_cabang'),
            'alamat_cabang' => $this->input->post('alamat_cabang'),
            'telepon' => $this->input->post('telepon')
        );
        $updated = $this->M_cabang->update($data, $this->input->post('kode_cabang'));
        if ($updated == 1) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                Updated succesfully.
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="9" y1="10" x2="9.01" y2="10" /><line x1="15" y1="10" x2="15.01" y2="10" /><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" /></svg>
                Failed to update.
                </div>'
            );
        }
        redirect('cabang');
    }

    function delete()
    {
        $kode_cabang = $this->uri->segment(3);
        $deleted = $this->M_cabang->delete($kode_cabang);
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
        redirect('cabang');
    }
}
