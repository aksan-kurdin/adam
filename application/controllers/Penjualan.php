<?php

class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_penjualan');
        $this->load->model('M_pelanggan');
        $this->load->model('M_harga');
        $this->load->model('M_bayar');
    }

    function index($row_no = 0)
    {
        $no_faktur = '';
        $nama_pelanggan = '';
        $tgl_mulai = '';
        $tgl_akhir = '';

        if (isset($_POST['submit'])) {
            $no_faktur = $this->input->post('no_faktur');
            $nama_pelanggan = $this->input->post('nama_pelanggan');
            $tgl_mulai = $this->input->post('tgl_mulai');
            $tgl_akhir = $this->input->post('tgl_akhir');
            $data = array(
                'no_faktur' => $no_faktur,
                'nama_pelanggan' => $nama_pelanggan,
                'tgl_mulai' => $tgl_mulai,
                'tgl_akhir' => $tgl_akhir
            );
            $this->session->set_userdata($data);
        } else {
            if ($this->session->userdata('no_faktur') != NULL) {
                $no_faktur = $this->session->userdata('no_faktur');
            }
            if ($this->session->userdata('nama_pelanggan') != NULL) {
                $nama_pelanggan = $this->session->userdata('nama_pelanggan');
            }
            if ($this->session->userdata('tgl_mulai') != NULL) {
                $tgl_mulai = $this->session->userdata('tgl_mulai');
            }
            if ($this->session->userdata('tgl_akhir') != NULL) {
                $tgl_akhir = $this->session->userdata('tgl_akhir');
            }
        }

        $row_per_page = 2;
        // Row position
        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }
        $rows     = $this->M_penjualan->get_rows($no_faktur, $nama_pelanggan, $tgl_mulai, $tgl_akhir)->num_rows();
        // Get records
        $row_records = $this->M_penjualan->list($row_no, $row_per_page, $no_faktur, $nama_pelanggan, $tgl_mulai, $tgl_akhir)->result();

        $config['base_url']         = base_url() . 'penjualan/index';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows']       = $rows;
        $config['per_page']         = $row_per_page;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        // Initialize
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['penjualan'] = $row_records;
        $data['row'] = $row_no;
        $data['no_faktur'] = $no_faktur;
        $data['nama_pelanggan'] = $nama_pelanggan;
        $data['tgl_mulai'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_akhir;


        $this->template->load('template/template', 'penjualan/v_penjualan', $data);
    }

    function input()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $thn = substr($tahun, 2, 2);
        $cabang = $this->session->userdata('kode_cabang');
        $get_last_invoice_no = $this->M_penjualan->get_last_invoice_no($bulan, $tahun, $cabang)->row_array();
        if (!$get_last_invoice_no) {
            $last_no = $cabang . $thn . $bulan . '0000';
        } else {
            $last_no = $get_last_invoice_no['no_faktur'];
        }
        $no_faktur = buatkode($last_no, $cabang . $bulan . $thn, 4);
        $data['no_faktur'] = $no_faktur;
        $data['pelanggan'] = $this->M_pelanggan->list()->result();;
        $data['harga'] = $this->M_harga->list()->result();
        $this->template->load('template/template',  'penjualan/i_penjualan', $data);
    }

    function save()
    {
        $no_faktur = $this->input->post('no_faktur');
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        $kode_pelanggan = $this->input->post('kode_pelanggan');
        $jenis_transaksi = $this->input->post('jenis_transaksi');
        $tgl_jatuh_tempo = $this->input->post('tgl_jatuh_tempo');
        $id_user = $this->input->post('id_user');

        $data = array(
            'no_faktur' => $no_faktur,
            'tgltransaksi' => $tgl_transaksi,
            'kode_pelanggan' => $kode_pelanggan,
            'jenistransaksi' => $jenis_transaksi,
            'jatuhtempo' => $tgl_jatuh_tempo,
            'id_user' => $id_user
        );

        $saved = $this->M_penjualan->insert($data, $jenis_transaksi, $id_user, $no_faktur);
    }

    function delete()
    {
        $no_faktur = $this->uri->segment(3);
        $deleted = $this->M_penjualan->delete($no_faktur);
    }

    function printout()
    {
        $no_faktur = $this->uri->segment(3);
        $data['penjualan'] = $this->M_penjualan->get($no_faktur)->row_array();
        $data['detail'] = $this->M_penjualan->get_detail($no_faktur)->result();
        $this->load->view('penjualan/v_print', $data);
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
        $data['barang_temp'] = $this->M_penjualan->get_temp($this->input->post('id_user'))->result();
        $this->load->view('penjualan/v_temp', $data);
    }

    function delete_temp()
    {
        $deleted = $this->M_penjualan->delete_temp(
            $this->input->post('kodebarang'),
            $this->input->post('iduser')
        );
        echo $deleted;
    }


    function detailfaktur()
    {
        $no_faktur = $this->uri->segment(3);
        $data['penjualan'] = $this->M_penjualan->get($no_faktur)->row_array();
        $data['detail'] = $this->M_penjualan->get_detail($no_faktur)->result();
        $data['bayar'] = $this->M_bayar->get($no_faktur)->result();
        $this->template->load('template/template', 'penjualan/v_detailfaktur', $data);
    }

    function input_pay()
    {
        $data['no_faktur'] = $this->input->post('no_faktur');
        $data['grand_total'] = $this->input->post('grand_total');
        $data['total_paid'] = $this->input->post('total_paid');
        $this->load->view('penjualan/i_pay', $data);
    }

    function save_pay()
    {
        $this->M_bayar->insert_pay();
    }

    function delete_pay()
    {
        $no_bukti = $this->uri->segment(3);
        $no_faktur = $this->uri->segment(4);
        $this->M_bayar->delete($no_bukti, $no_faktur);
    }
}
