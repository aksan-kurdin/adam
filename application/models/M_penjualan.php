<?php
class M_penjualan extends CI_Model
{
    function list($row_no, $row_per_page, $no_faktur, $nama_pelanggan, $tgl_mulai, $tgl_akhir)
    {
        $this->db->select('no_faktur, tgltransaksi, kode_pelanggan, nama_pelanggan, jenistransaksi, jatuhtempo, id_user, nama_lengkap, total_jual, total_bayar, sisa');
        $this->db->from('v_total_penjualan');
        $this->db->limit($row_per_page, $row_no);
        if ($no_faktur != '') {
            $this->db->where('no_faktur', $no_faktur);
        }
        if ($nama_pelanggan != '') {
            $this->db->like('nama_pelanggan', $nama_pelanggan);
        }
        if ($tgl_mulai != '') {
            $this->db->where('tgltransaksi >=', $tgl_mulai);
        }
        if ($tgl_akhir != '') {
            $this->db->where('tgltransaksi <=', $tgl_akhir);
        }
        return $this->db->get();
    }

    function listtoday()
    {
        $today = date("Y-m-d");
        if ($this->session->userdata('kode_cabang') != 'PST') {
            $this->db->where('users.kode_cabang', $this->session->userdata('kode_cabang'));
        }
        $this->db->join('users', 'penjualan.id_user=users.id_user');
        return $this->db->get_where('penjualan', array('tgltransaksi' => $today));
    }

    function resulttoday()
    {
        $today = date("Y-m-d");
        $this->db->select("SUM(bayar) as tot_paid");
        $this->db->from("historibayar");
        $this->db->join("penjualan", "historibayar.no_faktur=penjualan.no_faktur");
        $this->db->join("users", "users.id_user=penjualan.id_user");
        $this->db->where("tglbayar", $today);
        return $this->db->get();
    }

    function insert($data)
    {
        $penjualan_saved = $this->db->insert('penjualan', $data);
        if ($penjualan_saved) {
            $detail_penjualan = $this->db->get_where('penjualan_detail_temp', array('id_user' => $data['id_user']))->result();
            $totalpenjualan = 0;
            $penjualan_detail_failed = 0;
            foreach ($detail_penjualan as $d) {
                $totalpenjualan = $totalpenjualan + ($d->qty * $d->harga);
                $data_detail = array(
                    'no_faktur' => $data['no_faktur'],
                    'kode_barang' => $d->kode_barang,
                    'harga' => $d->harga,
                    'qty' => $d->qty
                );
                $penjualan_detail_saved = $this->db->insert('penjualan_detail', $data_detail);
                if (!$penjualan_detail_saved) {
                    $penjualan_detail_failed++;
                }
            }
            if ($penjualan_detail_failed > 0) {
                $this->db->delete('penjualan_detail', array('no_faktur' => $no_faktur));
                $this->db->delete('penjualan', array('no_faktur' => $no_faktur));
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> <i class = "fa fa-close mr-2"></i> Failed to save! </div>');
                redirect('penjualan/input');
            } else {
                $penjualan_detail_temp_deleted = $this->db->delete('penjualan_detail_temp', array('id_user' => $data['id_user']));
                if ($penjualan_detail_temp_deleted) {
                    if ($data['jenistransaksi'] == "cash") {
                        $tahun = date('Y');
                        $thn = substr($tahun, 2, 2);
                        $getLastNoBukti = $this->db->query("SELECT nobukti FROM historibayar WHERE YEAR(tglbayar) = '$tahun' ORDER BY nobukti DESC limit 1")->row_array();
                        if (!$getLastNoBukti) {
                            $nomorterakhir = $thn . '000000';
                        } else {
                            $nomorterakhir = $getLastNoBukti['nobukti'];
                        };
                        $nobukti = buatkode($nomorterakhir, $thn, 6);
                        $databayar = array(
                            'nobukti' => $nobukti,
                            'no_faktur'  => $data['no_faktur'],
                            'tglbayar'  => $data['tgltransaksi'],
                            'bayar' => $totalpenjualan,
                            'id_user' => $data['id_user']
                        );
                        $histori_bayar_saved = $this->db->insert('historibayar', $databayar);
                        if ($histori_bayar_saved) {
                            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> <i class = "fa fa-check mr-2"></i> Succeed to save! </div>');
                            redirect('penjualan/input');
                        } else {
                            $this->db->delete('penjualan_detail', array('no_faktur' => $no_faktur));
                            $this->db->delete('penjualan', array('no_faktur' => $no_faktur));
                            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> <i class = "fa fa-close mr-2"></i> Failed to save! </div>');
                            redirect('penjualan/input');
                        }
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> <i class = "fa fa-check mr-2"></i> Succeed to save! </div>');
                        redirect('penjualan/input');
                    }
                } else {
                    $this->db->delete('penjualan_detail', array('no_faktur' => $no_faktur));
                    $this->db->delete('penjualan', array('no_faktur' => $no_faktur));
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> <i class = "fa fa-close mr-2"></i> Failed to save! </div>');
                    redirect('penjualan/input');
                }
            }
        } else {
            $this->db->delete('penjualan_detail', array('no_faktur' => $no_faktur));
            $this->db->delete('penjualan', array('no_faktur' => $no_faktur));
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> <i class = "fa fa-close mr-2"></i> Failed to save! </div>');
            redirect('penjualan/input');
        }
    }

    function delete($no_faktur)
    {
        $deleted = $this->db->delete('penjualan', array('no_faktur' => $no_faktur));
        if ($deleted) {
            $detail_deleted = $this->db->delete('penjualan_detail', array('no_faktur' => $no_faktur));
            if ($detail_deleted) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Deleting successfully</div>');
                redirect('penjualan');
            }
        }
    }

    function get($no_faktur)
    {
        $this->db->select('penjualan.no_faktur, tgltransaksi, penjualan.kode_pelanggan, nama_pelanggan, alamat_pelanggan, jenistransaksi, jatuhtempo, penjualan.id_user, nama_lengkap as cashier');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->where('penjualan.no_faktur', $no_faktur);
        return $this->db->get();
    }

    function get_detail($no_faktur)
    {
        $this->db->select('penjualan_detail.kode_barang, nama_barang, penjualan_detail.harga, qty, satuan');
        $this->db->from('penjualan_detail');
        $this->db->join('barang_master', 'penjualan_detail.kode_barang = barang_master.kode_barang');
        $this->db->where('penjualan_detail.no_faktur', $no_faktur);
        return $this->db->get();
    }

    function get_rows($no_faktur, $nama_pelanggan, $tgl_mulai, $tgl_akhir)
    {
        $this->db->select('no_faktur, tgltransaksi, kode_pelanggan, nama_pelanggan, jenistransaksi, jatuhtempo, id_user, nama_lengkap, total_jual, total_bayar, sisa');
        $this->db->from('v_total_penjualan');
        if ($no_faktur != '') {
            $this->db->where('no_faktur', $no_faktur);
        }
        if ($nama_pelanggan != '') {
            $this->db->like('nama_pelanggan', $nama_pelanggan);
        }
        if ($tgl_mulai != '') {
            $this->db->where('tgltransaksi >=', $tgl_mulai);
        }
        if ($tgl_akhir != '') {
            $this->db->where('tgltransaksi <=', $tgl_akhir);
        }
        return $this->db->get();
    }



    function cek_barang()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->db->get_where('penjualan_detail_temp', array('id_user' => $id_user));
    }

    function get_last_invoice_no($bulan, $tahun, $cabang)
    {
        $this->db->select('no_faktur');
        $this->db->from('penjualan');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->where('kode_cabang', $cabang);
        $this->db->where('MONTH(tgltransaksi)', $bulan);
        $this->db->where('YEAR(tgltransaksi)', $tahun);
        $this->db->order_by('no_faktur', 'desc');
        $this->db->limit(1);

        return $this->db->get();
    }



    function is_temp_exist($kode_barang, $id_user)
    {
        return $this->db->get_where('penjualan_detail_temp', array('kode_barang' => $kode_barang, 'id_user' => $id_user));
    }

    function insert_temp($data)
    {
        $this->db->insert('penjualan_detail_temp', $data);
    }

    function get_temp($id_user)
    {
        $this->db->select('penjualan_detail_temp.kode_barang, nama_barang, harga, qty, (qty * harga) as total, id_user');
        $this->db->from('penjualan_detail_temp');
        $this->db->join('barang_master', 'penjualan_detail_temp.kode_barang = barang_master.kode_barang');
        $this->db->where('id_user', $id_user);
        return $this->db->get();
    }

    function delete_temp($kode_barang, $id_user)
    {
        $deleted = $this->db->delete('penjualan_detail_temp', array('kode_barang' => $kode_barang, 'id_user' => $id_user));
        if ($deleted) {
            return 1;
        }
    }

    function get_reportdata($cabang, $tgl_mulai, $tgl_akhir)
    {
        if ($cabang != "") {
            $this->db->where('kode_cabang', $cabang);
        }
        $this->db->where('tgltransaksi >=', $tgl_mulai);
        $this->db->where('tgltransaksi <=', $tgl_akhir);
        $this->db->select('no_faktur, tgltransaksi, kode_pelanggan, nama_pelanggan, jenistransaksi, jatuhtempo, id_user, nama_lengkap, total_jual, total_bayar, sisa');
        $this->db->from('v_total_penjualan');
        return $this->db->get();
    }

    function get_monthlysale()
    {
        $tahun = date("Y");
        $cabang = $this->session->userdata('kode_cabang');

        if ($cabang == 'PST') {
            $sql = "SELECT b.id, b.bulan, j.tahun, j.sale FROM bulan AS b"
                . " LEFT JOIN ("
                . " SELECT YEAR(h.tgltransaksi) as tahun, MONTH(h.tgltransaksi) AS bulan, SUM(d.harga * d.qty) AS sale"
                . " FROM penjualan_detail AS d"
                . " INNER JOIN penjualan AS h ON d.no_faktur = h.no_faktur "
                . " INNER JOIN users AS u ON h.id_user = u.id_user"
                . " WHERE YEAR(h.tgltransaksi) = $tahun "
                . " GROUP BY YEAR(h.tgltransaksi), MONTH(h.tgltransaksi) "
                . " ) as j ON (b.id = j.bulan)";
        } else {
            $sql = "SELECT b.id, b.bulan, j.tahun, j.sale FROM bulan AS b"
                . " LEFT JOIN ("
                . " SELECT YEAR(h.tgltransaksi) as tahun, MONTH(h.tgltransaksi) AS bulan, SUM(d.harga * d.qty) AS sale"
                . " FROM penjualan_detail AS d"
                . " INNER JOIN penjualan AS h ON d.no_faktur = h.no_faktur "
                . " INNER JOIN users AS u ON h.id_user = u.id_user"
                . " WHERE YEAR(h.tgltransaksi) = $tahun AND u.kode_cabang = '$cabang'"
                . " GROUP BY YEAR(h.tgltransaksi), MONTH(h.tgltransaksi) "
                . " ) as j ON (b.id = j.bulan)";
        }
        return $this->db->query($sql);
    }
}
