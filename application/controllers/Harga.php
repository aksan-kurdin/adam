<?php

class Harga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_harga');
        $this->load->model('M_barang');
        $this->load->model('M_cabang');
    }

    function index()
    {
        $data['harga'] = $this->M_harga->list()->result();
        $this->template->load('template/template', 'harga/v_harga', $data);
    }

    function input()
    {
        $data['barang'] = $this->M_barang->list()->result();
        $data['cabang'] = $this->M_cabang->list()->result();
        $this->load->view('harga/i_harga', $data);
    }

    function add()
    {
        $data = array(
            'kode_harga' => $this->input->post('kode_harga'),
            'kode_barang' => $this->input->post('kode_barang'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'kode_cabang' => $this->input->post('kode_cabang')
        );
        $added = $this->M_harga->insert($data);
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
        redirect('harga');
    }

    function edit()
    {
        $kode_harga = $this->uri->segment(3);
        $data['harga'] = $this->M_harga->get($kode_harga)->row_array();
        $data['barang'] = $this->M_barang->list()->result();
        $data['cabang'] = $this->M_cabang->list()->result();
        $this->load->view('harga/e_harga', $data);
    }

    function update()
    {
        $data = array(
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok')
        );
        $updated = $this->M_harga->update($data, $this->input->post('kode_harga'));
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
        redirect('harga');
    }

    function delete()
    {
        $kode_harga = $this->uri->segment(3);
        $deleted = $this->M_harga->delete($kode_harga);
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
        redirect('harga');
    }
}
